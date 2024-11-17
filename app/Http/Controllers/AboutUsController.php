<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\BoxAboutUs;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('AboutUs.index', compact('aboutUs'));
    }

    public function getAboutUsApi(Request $request)
    {
        try {
            $language = $request->language;
            $language_id = Language::where('name', $language)->first()->id;
            $aboutUs = AboutUs::where('language_id', $language_id)->first();
            $aboutUsBoxes = BoxAboutUs::where('about_us_id', $aboutUs->id)->get();
            return response()->json([
                'aboutUs' => $aboutUs,
                'aboutUsBoxes' => $aboutUsBoxes
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Error fetching about us']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $aboutUs = new AboutUs();
            $aboutUs->titleHeroAboutUs = $request->input('titleHeroAboutUs');
            $aboutUs->subtitleHeroAboutUs = $request->input('subtitleHeroAboutUs'); // need to be text

            $aboutUs->save();

            return redirect()->route('admin.aboutUsViewForUpdate')->with('success', 'About us created successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error creating about us');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        try {
            $language_id = Auth::user()->language_id;
            $aboutUs = AboutUs::where('language_id', $language_id)->first();
            $boxes = $aboutUs->boxAboutUs ?? [];
            return view('AboutUs.edit', compact(['aboutUs', 'boxes']));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error editing about us');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $aboutUs = AboutUs::findOrFail($id);

            $aboutUs->titleHeroAboutUs = $request->input('titleHeroAboutUs');
            $aboutUs->subtitleHeroAboutUs = $request->input('subtitleHeroAboutUs');
            $aboutUs->titleConnect = $request->input('titleConnect');
            $aboutUs->descriptionConnect = $request->input('descriptionConnect');
            $aboutUs->buttonTextConnect = $request->input('buttonTextConnect');
            $aboutUs->buttonLinkConnect = $request->input('buttonLinkConnect');

            if ($request->hasFile('picture')) {
                $name = Storage::disk('public')->put('about-us', $request->file('picture'));
                $aboutUs->picture = $name;
            }

            $aboutUs->save();

            return redirect()->route('admin.aboutUsViewForUpdate')->with('success', 'About us updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error updating about us');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
