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
            $aboutUs->title = $request->titleHeroAboutUs;
            $aboutUs->subtitle = $request->subtitleHeroAboutUs;
            $aboutUs->titleWhoWeAre = $request->titleWhoWeAre;
            $aboutUs->contentWhoWeAre = $request->contentWhoWeAre;

            if ($request->hasFile('imageHeroAboutUsPath')) {
                $name = Storage::disk('public')->put('aboutUs', $request->file('imageHeroAboutUsPath'));
                $aboutUs->imageHeroAboutUsPath = $name;
            }

            if ($request->hasFile('whoWeArePictureAboutUs')) {
                $name = Storage::disk('public')->put('aboutUs', $request->file('whoWeArePictureAboutUs'));
                $aboutUs->whoWeArePictureAboutUs = $name;
            }

            $aboutUs->liveTitleAboutUs = $request->liveTitleAboutUs;
            $aboutUs->liveContentAboutUs = $request->liveContentAboutUs;

            if ($request->hasFile('livePicturePathAboutUs')) {
                $name = Storage::disk('public')->put('aboutUs', $request->file('livePicturePathAboutUs'));
                $aboutUs->livePicturePathAboutUs = $name;
            }

            // New fields
            $aboutUs->linkHeroAboutUs1 = $request->linkHeroAboutUs1;
            $aboutUs->buttonNameHeroAboutUs1 = $request->buttonNameHeroAboutUs1;
            $aboutUs->linkHeroAboutUs2 = $request->linkHeroAboutUs2;
            $aboutUs->buttonNameHeroAboutUs2 = $request->buttonNameHeroAboutUs2;

            $aboutUs->liveButtonText1 = $request->liveButtonText1;
            $aboutUs->liveButtonLink1 = $request->liveButtonLink1;
            $aboutUs->liveButtonText2 = $request->liveButtonText2;
            $aboutUs->liveButtonLink2 = $request->liveButtonLink2;
            $aboutUs->liveButtonText3 = $request->liveButtonText3;
            $aboutUs->liveButtonLink3 = $request->liveButtonLink3;
            $aboutUs->liveButtonText4 = $request->liveButtonText4;
            $aboutUs->liveButtonLink4 = $request->liveButtonLink4;

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
            $aboutUs->liveButtonText1 = $request->input('liveButtonText1');
            $aboutUs->liveButtonLink1 = $request->input('liveButtonLink1');
            $aboutUs->liveButtonText2 = $request->input('liveButtonText2');
            $aboutUs->liveButtonLink2 = $request->input('liveButtonLink2');
            $aboutUs->liveButtonText3 = $request->input('liveButtonText3');
            $aboutUs->liveButtonLink3 = $request->input('liveButtonLink3');
            $aboutUs->liveButtonText4 = $request->input('liveButtonText4');
            $aboutUs->liveButtonLink4 = $request->input('liveButtonLink4');
            $aboutUs->linkHeroAboutUs1 = $request->input('linkHeroAboutUs1');
            $aboutUs->buttonNameHeroAboutUs1 = $request->input('buttonNameHeroAboutUs1');
            $aboutUs->linkHeroAboutUs2 = $request->input('linkHeroAboutUs2');
            $aboutUs->buttonNameHeroAboutUs2 = $request->input('buttonNameHeroAboutUs2');

            if ($request->hasFile('imageHeroAboutUsPath')) {
                $name = Storage::disk('public')->put('aboutUs', $request->file('imageHeroAboutUsPath'));
                $aboutUs->imageHeroAboutUsPath = $name;
            }

            if ($request->hasFile('whoWeArePictureAboutUs')) {
                $name = Storage::disk('public')->put('aboutUs', $request->file('whoWeArePictureAboutUs'));
                $aboutUs->whoWeArePictureAboutUs = $name;
            }

            if ($request->hasFile('livePicturePathAboutUs')) {
                $name = Storage::disk('public')->put('aboutUs', $request->file('livePicturePathAboutUs'));
                $aboutUs->livePicturePathAboutUs = $name;
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
