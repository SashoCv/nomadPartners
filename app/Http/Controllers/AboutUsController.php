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

    public function getAboutUsApi()
    {
        try {
            $aboutUs = AboutUs::first();
            return response()->json($aboutUs);
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
            $aboutUs->subtitleHeroAboutUs = $request->input('subtitleHeroAboutUs');

            if ($request->hasFile('imageHeroAboutUsPath')) {
                $name = Storage::disk('public')->put('aboutUs', $request->file('imageHeroAboutUsPath'));
                $aboutUs->imageHeroAboutUsPath = $name;
            }

            $aboutUs->linkHeroAboutUs1 = $request->input('linkHeroAboutUs1');
            $aboutUs->buttonNameHeroAboutUs1 = $request->input('buttonNameHeroAboutUs1');
            $aboutUs->linkHeroAboutUs2 = $request->input('linkHeroAboutUs2');
            $aboutUs->buttonNameHeroAboutUs2 = $request->input('buttonNameHeroAboutUs2');

            $aboutUs->iconWhoWeAre1 = $request->input('iconWhoWeAre1');
            $aboutUs->titleWhoWeAre1 = $request->input('titleWhoWeAre1');
            $aboutUs->contentWhoWeAre1 = $request->input('contentWhoWeAre1');
            $aboutUs->iconWhoWeAre2 = $request->input('iconWhoWeAre2');
            $aboutUs->titleWhoWeAre2 = $request->input('titleWhoWeAre2');
            $aboutUs->contentWhoWeAre2 = $request->input('contentWhoWeAre2');
            $aboutUs->iconWhoWeAre3 = $request->input('iconWhoWeAre3');
            $aboutUs->titleWhoWeAre3 = $request->input('titleWhoWeAre3');
            $aboutUs->contentWhoWeAre3 = $request->input('contentWhoWeAre3');

            $aboutUs->titleOurMission = $request->input('titleOurMission');
            $aboutUs->descriptionOurMission = $request->input('descriptionOurMission');
            $aboutUs->iconMission1 = $request->input('iconMission1');
            $aboutUs->titleMission1 = $request->input('titleMission1');
            $aboutUs->descriptionMission1 = $request->input('descriptionMission1');
            $aboutUs->iconMission2 = $request->input('iconMission2');
            $aboutUs->titleMission2 = $request->input('titleMission2');
            $aboutUs->descriptionMission2 = $request->input('descriptionMission2');
            $aboutUs->iconMission3 = $request->input('iconMission3');
            $aboutUs->titleMission3 = $request->input('titleMission3');
            $aboutUs->descriptionMission3 = $request->input('descriptionMission3');

            $aboutUs->contactUsTitle = $request->input('contactUsTitle');
            $aboutUs->contactUsText = $request->input('contactUsText');
            $aboutUs->aboutUsText = $request->input('aboutUsText');

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

            $aboutUs->titleHeroAboutUs = $request->input('titleHeroAboutUs');
            $aboutUs->subtitleHeroAboutUs = $request->input('subtitleHeroAboutUs');

            if ($request->hasFile('imageHeroAboutUsPath')) {
                if ($aboutUs->imageHeroAboutUsPath) {
                    Storage::disk('public')->delete($aboutUs->imageHeroAboutUsPath);
                }
                $name = Storage::disk('public')->put('aboutUs', $request->file('imageHeroAboutUsPath'));
                $aboutUs->imageHeroAboutUsPath = $name;
            }

            // Update other fields
            $aboutUs->linkHeroAboutUs1 = $request->input('linkHeroAboutUs1');
            $aboutUs->buttonNameHeroAboutUs1 = $request->input('buttonNameHeroAboutUs1');
            $aboutUs->linkHeroAboutUs2 = $request->input('linkHeroAboutUs2');
            $aboutUs->buttonNameHeroAboutUs2 = $request->input('buttonNameHeroAboutUs2');

            $aboutUs->iconWhoWeAre1 = $request->input('iconWhoWeAre1');
            $aboutUs->titleWhoWeAre1 = $request->input('titleWhoWeAre1');
            $aboutUs->contentWhoWeAre1 = $request->input('contentWhoWeAre1');
            $aboutUs->iconWhoWeAre2 = $request->input('iconWhoWeAre2');
            $aboutUs->titleWhoWeAre2 = $request->input('titleWhoWeAre2');
            $aboutUs->contentWhoWeAre2 = $request->input('contentWhoWeAre2');
            $aboutUs->iconWhoWeAre3 = $request->input('iconWhoWeAre3');
            $aboutUs->titleWhoWeAre3 = $request->input('titleWhoWeAre3');
            $aboutUs->contentWhoWeAre3 = $request->input('contentWhoWeAre3');

            $aboutUs->titleOurMission = $request->input('titleOurMission');
            $aboutUs->descriptionOurMission = $request->input('descriptionOurMission');
            $aboutUs->iconMission1 = $request->input('iconMission1');
            $aboutUs->titleMission1 = $request->input('titleMission1');
            $aboutUs->descriptionMission1 = $request->input('descriptionMission1');
            $aboutUs->iconMission2 = $request->input('iconMission2');
            $aboutUs->titleMission2 = $request->input('titleMission2');
            $aboutUs->descriptionMission2 = $request->input('descriptionMission2');
            $aboutUs->iconMission3 = $request->input('iconMission3');
            $aboutUs->titleMission3 = $request->input('titleMission3');
            $aboutUs->descriptionMission3 = $request->input('descriptionMission3');

            $aboutUs->contactUsTitle = $request->input('contactUsTitle');
            $aboutUs->contactUsText = $request->input('contactUsText');
            $aboutUs->aboutUsText = $request->input('aboutUsText');

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
