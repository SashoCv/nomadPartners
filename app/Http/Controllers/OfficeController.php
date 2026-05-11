<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OfficeController extends Controller
{
    public function index()
    {
        try {
            $language_id = Auth::user()->language_id;
            $offices = Office::where('language_id', $language_id)
                ->orderBy('order', 'asc')
                ->get();

            return view('Offices.index', compact('offices'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function getOfficesApi(Request $request)
    {
        try {
            $language = $request->language;
            $language_id = Language::where('name', $language)->first()->id;

            $offices = Office::where('language_id', $language_id)
                ->orderBy('order', 'asc')
                ->get();

            if ($offices->isEmpty()) {
                $offices = Office::where('language_id', 1)
                    ->orderBy('order', 'asc')
                    ->get();
            }

            return response()->json(['offices' => $offices]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return response()->json(['error' => 'Error fetching offices']);
        }
    }

    public function store(Request $request)
    {
        try {
            $language_id = Auth::user()->language_id;

            $office = new Office();
            $office->slug = $request->slug ?: Str::slug($request->name);
            $office->name = $request->name;
            $office->city = $request->city;
            $office->country = $request->country;
            $office->address = $request->address;
            $office->language_id = $language_id;

            if (! $request->order) {
                $lastOffice = Office::where('language_id', $language_id)
                    ->orderBy('order', 'desc')
                    ->first();
                $office->order = $lastOffice ? $lastOffice->order + 1 : 1;
            } else {
                $office->order = $request->order;
            }

            if ($request->hasFile('imagePath')) {
                $path = Storage::disk('public')->put('offices', $request->file('imagePath'));
                $office->imagePath = $path;
                $office->imageName = $request->file('imagePath')->getClientOriginalName() ?? 'image';
            }

            $office->save();

            return redirect()->route('admin.officesView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $office = Office::findOrFail($id);
            $office->slug = $request->slug ?: Str::slug($request->name);
            $office->name = $request->name;
            $office->city = $request->city;
            $office->country = $request->country;
            $office->address = $request->address;
            $office->order = $request->order;

            if ($request->hasFile('imagePath')) {
                if ($office->imagePath) {
                    Storage::disk('public')->delete($office->imagePath);
                }
                $path = Storage::disk('public')->put('offices', $request->file('imagePath'));
                $office->imagePath = $path;
                $office->imageName = $request->file('imagePath')->getClientOriginalName() ?? 'image';
            }

            $office->save();

            return redirect()->route('admin.officesView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $office = Office::findOrFail($id);

            if ($office->imagePath) {
                Storage::disk('public')->delete($office->imagePath);
            }

            $office->delete();

            return redirect()->route('admin.officesView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
