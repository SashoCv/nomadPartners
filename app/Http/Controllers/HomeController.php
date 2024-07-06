<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomePageResource;
use App\Models\Blog;
use App\Models\Home;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('HomePage.index');
    }

    public function getHomePageApi()
    {
        try {
            $home = Home::first();
            $latestFourBlogs = Blog::latest()->take(4)->get();
            $allPartners = Partner::all();

            return response()->json($home);

            // return response()->json([
            //     'status' => 200,
            //     'home' => $home,
            //     'latestFourBlogs' => $latestFourBlogs,
            //     'allPartners' => $allPartners
            // ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Error fetching home page'], 500);
        }
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
            $home = new Home();

            $home->titleHeroSection = $request->input('titleHeroSection');
            $home->subtitleHeroSection = $request->input('subtitleHeroSection');
            $home->buttonHeroSection = $request->input('buttonHeroSection');
            $home->testimonialTitleOne = $request->input('testimonialTitleOne');
            $home->testimonialContentOne = $request->input('testimonialContentOne');
            $home->linkTestimonialOne = $request->input('linkTestimonialOne');
            $home->titleTestimonialTwo = $request->input('titleTestimonialTwo');
            $home->contentTestimonialTwo = $request->input('contentTestimonialTwo');
            $home->linkTestimonialTwo = $request->input('linkTestimonialTwo');
            $home->titleTestimonialThree = $request->input('titleTestimonialThree');
            $home->contentTestimonialThree = $request->input('contentTestimonialThree');
            $home->linkTestimonialThree = $request->input('linkTestimonialThree');
            $home->titleAbout = $request->input('titleAbout');
            $home->subtitleAbout = $request->input('subtitleAbout');
            $home->contentAbout = $request->input('contentAbout');
            $home->liveTitle = $request->input('liveTitle');
            $home->liveContent = $request->input('liveContent');
            $home->chooseUsTitle = $request->input('chooseUsTitle');
            $home->chooseUsContent = $request->input('chooseUsContent');
            $home->listTitleOne = $request->input('listTitleOne');
            $home->listContentOne = $request->input('listContentOne');
            $home->listTitleTwo = $request->input('listTitleTwo');
            $home->listContentTwo = $request->input('listContentTwo');
            $home->listTitleThree = $request->input('listTitleThree');
            $home->listContentThree = $request->input('listContentThree');
            $home->missionTitle = $request->input('missionTitle');
            $home->missionContent = $request->input('missionContent');
            $home->partnersTitle = $request->input('partnersTitle');
            $home->partnersSubtitle = $request->input('partnersSubtitle');
            $home->statsTitleOne = $request->input('statsTitleOne');
            $home->statsNumberOne = $request->input('statsNumberOne');
            $home->statsTitleTwo = $request->input('statsTitleTwo');
            $home->statsNumberTwo = $request->input('statsNumberTwo');
            $home->statsTitleThree = $request->input('statsTitleThree');
            $home->statsNumberThree = $request->input('statsNumberThree');
            $home->statsTitleFour = $request->input('statsTitleFour');
            $home->statsNumberFour = $request->input('statsNumberFour');

            if ($request->hasFile('imageHeroSectionPath')) {
                $path = $request->file('imageHeroSectionPath')->store('images');
                $home->imageHeroSectionName = $request->file('imageHeroSectionPath')->getClientOriginalName();
                $home->imageHeroSectionPath = $path;
            }

            if ($request->hasFile('livePicturePath')) {
                $path = $request->file('livePicturePath')->store('images');
                $home->livePictureName = $request->file('livePicturePath')->getClientOriginalName();
                $home->livePicturePath = $path;
            }

            if ($request->hasFile('missionPicturePathOne')) {
                $path = $request->file('missionPicturePathOne')->store('images');
                $home->missionPictureNameOne = $request->file('missionPicturePathOne')->getClientOriginalName();
                $home->missionPicturePathOne = $path;
            }

            if ($request->hasFile('missionPicturePathTwo')) {
                $path = $request->file('missionPicturePathTwo')->store('images');
                $home->missionPictureNameTwo = $request->file('missionPicturePathTwo')->getClientOriginalName();
                $home->missionPicturePathTwo = $path;
            }

            if ($request->hasFile('missionPicturePathThree')) {
                $path = $request->file('missionPicturePathThree')->store('images');
                $home->missionPictureNameThree = $request->file('missionPicturePathThree')->getClientOriginalName();
                $home->missionPicturePathThree = $path;
            }

            $home->save();

            return redirect()->route('admin.homeViewForUpdate')->with('success', 'Home page created successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error creating home page');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        $home = Home::first();
        return view('HomePage.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $home = Home::find($id);
            $home->titleHeroSection = $request->input('titleHeroSection');
            $home->subtitleHeroSection = $request->input('subtitleHeroSection');
            $home->buttonHeroSection = $request->input('buttonHeroSection');
            $home->testimonialTitleOne = $request->input('testimonialTitleOne');
            $home->testimonialContentOne = $request->input('testimonialContentOne');
            $home->linkTestimonialOne = $request->input('linkTestimonialOne');
            $home->titleTestimonialTwo = $request->input('titleTestimonialTwo');
            $home->contentTestimonialTwo = $request->input('contentTestimonialTwo');
            $home->linkTestimonialTwo = $request->input('linkTestimonialTwo');
            $home->titleTestimonialThree = $request->input('titleTestimonialThree');
            $home->contentTestimonialThree = $request->input('contentTestimonialThree');
            $home->linkTestimonialThree = $request->input('linkTestimonialThree');
            $home->titleAbout = $request->input('titleAbout');
            $home->subtitleAbout = $request->input('subtitleAbout');
            $home->contentAbout = $request->input('contentAbout');
            $home->whoWeAreTitleAbout = $request->input('whoWeAreTitleAbout');
            $home->whoWeAreContentAbout = $request->input('whoWeAreContentAbout');
            $home->liveTitle = $request->input('liveTitle');
            $home->liveContent = $request->input('liveContent');
            $home->chooseUsTitle = $request->input('chooseUsTitle');
            $home->chooseUsContent = $request->input('chooseUsContent');
            $home->listTitleOne = $request->input('listTitleOne');
            $home->listContentOne = $request->input('listContentOne');
            $home->listTitleTwo = $request->input('listTitleTwo');
            $home->listContentTwo = $request->input('listContentTwo');
            $home->listTitleThree = $request->input('listTitleThree');
            $home->listContentThree = $request->input('listContentThree');
            $home->missionTitle = $request->input('missionTitle');
            $home->missionContent = $request->input('missionContent');
            $home->partnersTitle = $request->input('partnersTitle');
            $home->partnersSubtitle = $request->input('partnersSubtitle');
            $home->statsTitleOne = $request->input('statsTitleOne');
            $home->statsNumberOne = $request->input('statsNumberOne');
            $home->statsTitleTwo = $request->input('statsTitleTwo');
            $home->statsNumberTwo = $request->input('statsNumberTwo');
            $home->statsTitleThree = $request->input('statsTitleThree');
            $home->statsNumberThree = $request->input('statsNumberThree');
            $home->statsTitleFour = $request->input('statsTitleFour');
            $home->statsNumberFour = $request->input('statsNumberFour');

            if ($request->hasFile('imageHeroSectionPath')) {
                $path = $request->file('imageHeroSectionPath')->store('heroImages', 'public');
                $home->imageHeroSectionPath = $path;
                $home->imageHeroSectionName = $request->file('imageHeroSectionPath')->getClientOriginalName();
            }

            if ($request->hasFile('livePicturePath')) {
                $path = $request->file('livePicturePath')->store('liveImages', 'public');
                $home->livePicturePath = $path;
                $home->livePictureName = $request->file('livePicturePath')->getClientOriginalName();
            }

            if ($request->hasFile('missionPicturePathOne')) {
                $path = $request->file('missionPicturePathOne')->store('missionPictures', 'public');
                $home->missionPicturePathOne = $path;
                $home->missionPictureNameOne = $request->file('missionPicturePathOne')->getClientOriginalName();
            }

            if ($request->hasFile('missionPicturePathTwo')) {
                $path = $request->file('missionPicturePathTwo')->store('missionPictures', 'public');
                $home->missionPicturePathTwo = $path;
                $home->missionPictureNameTwo = $request->file('missionPicturePathTwo')->getClientOriginalName();
            }

            if ($request->hasFile('missionPicturePathThree')) {
                $path = $request->file('missionPicturePathThree')->store('missionPictures', 'public');
                $home->missionPicturePathThree = $path;
                $home->missionPictureNameThree = $request->file('missionPicturePathThree')->getClientOriginalName();
            }

            if ($request->hasFile('whoWeArePicturePathAbout')) {
                $path = $request->file('whoWeArePicturePathAbout')->store('aboutImages', 'public');
                $home->whoWeArePicturePathAbout = $path;
                $home->whoWeArePictureNameAbout = $request->file('whoWeArePicturePathAbout')->getClientOriginalName();
            }

            $home->save();

            return redirect()->route('admin.homeViewForUpdate')->with('success', 'Home page updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error updating home page');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
