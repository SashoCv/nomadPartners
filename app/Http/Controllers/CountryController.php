<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    public function index()
    {
        try {
            $language_id = Auth::user()->language_id;
            $countries = Country::where('language_id', $language_id)
                ->orderBy('order', 'asc')
                ->get();

            return view('Countries.index', compact('countries'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function getCountriesApi(Request $request)
    {
        try {
            $language = $request->language;
            $language_id = Language::where('name', $language)->first()->id;

            $countries = Country::where('language_id', $language_id)
                ->orderBy('order', 'asc')
                ->get();

            if ($countries->isEmpty()) {
                $countries = Country::where('language_id', 1)
                    ->orderBy('order', 'asc')
                    ->get();
            }

            return response()->json(['countries' => $countries]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return response()->json(['error' => 'Error fetching countries']);
        }
    }

    public function getCountryApi(Request $request, $slug)
    {
        try {
            $language = $request->language;
            $language_id = Language::where('name', $language)->first()->id;

            $country = Country::where('slug', $slug)
                ->where('language_id', $language_id)
                ->first();

            // Fall back to the English record if this language has no translation yet.
            if (! $country) {
                $country = Country::where('slug', $slug)
                    ->where('language_id', 1)
                    ->first();
            }

            return response()->json(['country' => $country]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return response()->json(['error' => 'Error fetching country']);
        }
    }

    public function store(Request $request)
    {
        try {
            $language_id = Auth::user()->language_id;

            $country = new Country();
            $country->slug = $request->slug ?: Str::slug($request->name);
            $country->iso_code = $request->iso_code ? strtolower($request->iso_code) : null;
            $country->name = $request->name;
            $country->title = $request->title ?: $request->name;
            $country->short_description = $request->short_description;
            $country->content = $request->content;
            $country->sectors = $request->sectors;
            $country->languages = $request->languages;
            $country->permit_time = $request->permit_time;
            $country->language_id = $language_id;

            if (! $request->order) {
                $lastCountry = Country::where('language_id', $language_id)
                    ->orderBy('order', 'desc')
                    ->first();
                $country->order = $lastCountry ? $lastCountry->order + 1 : 1;
            } else {
                $country->order = $request->order;
            }

            if ($request->hasFile('imagePath')) {
                $path = Storage::disk('public')->put('countries', $request->file('imagePath'));
                $country->imagePath = $path;
                $country->imageName = $request->file('imagePath')->getClientOriginalName() ?? 'image';
            }

            $country->save();

            return redirect()->route('admin.countriesView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $country = Country::findOrFail($id);
            $country->slug = $request->slug ?: Str::slug($request->name);
            $country->iso_code = $request->iso_code ? strtolower($request->iso_code) : null;
            $country->name = $request->name;
            $country->title = $request->title ?: $request->name;
            $country->short_description = $request->short_description;
            $country->content = $request->content;
            $country->sectors = $request->sectors;
            $country->languages = $request->languages;
            $country->permit_time = $request->permit_time;
            $country->order = $request->order;

            if ($request->hasFile('imagePath')) {
                if ($country->imagePath) {
                    Storage::disk('public')->delete($country->imagePath);
                }
                $path = Storage::disk('public')->put('countries', $request->file('imagePath'));
                $country->imagePath = $path;
                $country->imageName = $request->file('imagePath')->getClientOriginalName() ?? 'image';
            }

            $country->save();

            return redirect()->route('admin.countriesView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $country = Country::findOrFail($id);

            if ($country->imagePath) {
                Storage::disk('public')->delete($country->imagePath);
            }

            $country->delete();

            return redirect()->route('admin.countriesView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
