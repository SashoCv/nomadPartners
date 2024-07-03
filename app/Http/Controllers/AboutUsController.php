<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AboutUs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $aboutUs = new AboutUs();
            $aboutUs->title = $request->titleHeroAboutUs;
            $aboutUs->subtitle = $request->subtitleHeroAboutUs;
            $aboutUs->titleWhoWeAre = $request->titleWhoWeAre;
            $aboutUs->contentWhoWeAre = $request->contentWhoWeAre;

            if ($request->hasFile('imageHeroAboutUsPath')) {
                Storage::disk('public')->put('aboutUs', $request->file('imageHeroAboutUsPath'));
                $name = Storage::disk('public')->put('partners', $request->file('imageHeroAboutUsPath'));
                $aboutUs->image_hero_path = $name;
            }

            if ($request->hasFile('whoWeArePictureAboutUs')) {
                Storage::disk('public')->put('aboutUs', $request->file('whoWeArePictureAboutUs'));
                $name = Storage::disk('public')->put('partners', $request->file('whoWeArePictureAboutUs'));
                $aboutUs->whoWeArePictureAboutUs = $name;
            }

            $aboutUs->liveTitleAboutUs = $request->liveTitleAboutUs;
            $aboutUs->liveContentAboutUs = $request->liveContentAboutUs;

            if ($request->hasFile('livePicturePathAboutUs')) {
                Storage::disk('public')->put('aboutUs', $request->file('livePicturePathAboutUs'));
                $name = Storage::disk('public')->put('partners', $request->file('livePicturePathAboutUs'));
                $aboutUs->live_picture_path = $name;
            }

            $aboutUs->save();

            return redirect()->route('admin.aboutUsView')->with('success', 'About us created successfully');
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
            $aboutUs = AboutUs::first();
            return view('AboutUs.edit', compact('aboutUs'));
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
            $aboutUs->title = $request->input('titleHeroAboutUs');
            $aboutUs->subtitle = $request->input('subtitleHeroAboutUs');
            $aboutUs->titleWhoWeAre = $request->input('titleWhoWeAre');
            $aboutUs->contentWhoWeAre = $request->input('contentWhoWeAre');
            $aboutUs->liveTitleAboutUs = $request->input('liveTitleAboutUs');
            $aboutUs->liveContentAboutUs = $request->input('liveContentAboutUs');

            // Update imageHeroAboutUsPath if a new file is uploaded
            if ($request->hasFile('imageHeroAboutUsPath')) {
                Storage::disk('public')->delete($aboutUs->image_hero_path); // Delete old file if exists
                $name = Storage::disk('public')->put('partners', $request->file('imageHeroAboutUsPath'));
                $aboutUs->image_hero_path = $name;
            }

            // Update whoWeArePictureAboutUs if a new file is uploaded
            if ($request->hasFile('whoWeArePictureAboutUs')) {
                Storage::disk('public')->delete($aboutUs->whoWeArePictureAboutUs); // Delete old file if exists
                $name = Storage::disk('public')->put('partners', $request->file('whoWeArePictureAboutUs'));
                $aboutUs->whoWeArePictureAboutUs = $name;
            }

            // Update livePicturePathAboutUs if a new file is uploaded
            if ($request->hasFile('livePicturePathAboutUs')) {
                Storage::disk('public')->delete($aboutUs->live_picture_path); // Delete old file if exists
                $name = Storage::disk('public')->put('partners', $request->file('livePicturePathAboutUs'));
                $aboutUs->live_picture_path = $name;
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
