<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Home;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

            // Some modification on the data that we need on the FE.
            $home = $this->transformHomeData($home);

            return response()->json([
                'status' => 200,
                'home' => $home,
                'latestFourBlogs' => $latestFourBlogs,
                'allPartners' => $allPartners
            ]);
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
            $home->buttonTextAbout = $request->input('buttonTextAbout');
            $home->buttonLinkAbout = $request->input('buttonLinkAbout');
            $home->whoWeAreTitleAbout = $request->input('whoWeAreTitleAbout');
            $home->whoWeAreContentAbout = $request->input('whoWeAreContentAbout');
            $home->liveTitle = $request->input('liveTitle');
            $home->liveContent = $request->input('liveContent');
            $home->buttonText1 = $request->input('buttonText1');
            $home->buttonLink1 = $request->input('buttonLink1');
            $home->buttonText2 = $request->input('buttonText2');
            $home->buttonLink2 = $request->input('buttonLink2');
            $home->chooseUsTitle = $request->input('chooseUsTitle');
            $home->chooseUsContent = $request->input('chooseUsContent');
            $home->listTitleOne = $request->input('listTitleOne');
            $home->listContentOne = $request->input('listContentOne');
            $home->listTitleTwo = $request->input('listTitleTwo');
            $home->listContentTwo = $request->input('listContentTwo');
            $home->listTitleThree = $request->input('listTitleThree');
            $home->listContentThree = $request->input('listContentThree');
            $home->listTitleFour = $request->input('listTitleFour');
            $home->listContentFour = $request->input('listContentFour');
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
            $home->getStartedTitle = $request->input('getStartedTitle');
            $home->getStartedDescription = $request->input('getStartedDescription');
            $home->getStartedButton = $request->input('getStartedButton');
            $home->getStartedLink = $request->input('getStartedLink');
    
            // Handle file uploads
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
    
            if ($request->hasFile('missionPicturePathFour')) {
                $path = $request->file('missionPicturePathFour')->store('missionPictures', 'public');
                $home->missionPicturePathFour = $path;
                $home->missionPictureNameFour = $request->file('missionPicturePathFour')->getClientOriginalName();
            }
    
            if ($request->hasFile('whoWeArePicturePathAbout')) {
                $path = $request->file('whoWeArePicturePathAbout')->store('aboutImages', 'public');
                $home->whoWeArePicturePathAbout = $path;
                $home->whoWeArePictureNameAbout = $request->file('whoWeArePicturePathAbout')->getClientOriginalName();
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
            $home->buttonTextAbout = $request->input('buttonTextAbout');
            $home->buttonLinkAbout = $request->input('buttonLinkAbout');
            $home->whoWeAreTitleAbout = $request->input('whoWeAreTitleAbout');
            $home->whoWeAreContentAbout = $request->input('whoWeAreContentAbout');
            $home->liveTitle = $request->input('liveTitle');
            $home->liveContent = $request->input('liveContent');
            $home->buttonText1 = $request->input('buttonText1');
            $home->buttonLink1 = $request->input('buttonLink1');
            $home->buttonText2 = $request->input('buttonText2');
            $home->buttonLink2 = $request->input('buttonLink2');
            $home->chooseUsTitle = $request->input('chooseUsTitle');
            $home->chooseUsContent = $request->input('chooseUsContent');
            $home->listTitleOne = $request->input('listTitleOne');
            $home->listContentOne = $request->input('listContentOne');
            $home->listTitleTwo = $request->input('listTitleTwo');
            $home->listContentTwo = $request->input('listContentTwo');
            $home->listTitleThree = $request->input('listTitleThree');
            $home->listContentThree = $request->input('listContentThree');
            $home->listTitleFour = $request->input('listTitleFour');
            $home->listContentFour = $request->input('listContentFour');
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
            $home->getStartedTitle = $request->input('getStartedTitle');
            $home->getStartedDescription = $request->input('getStartedDescription');
            $home->getStartedButton = $request->input('getStartedButton');
            $home->getStartedLink = $request->input('getStartedLink');

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

            if ($request->hasFile('missionPicturePathFour')) {
                $path = $request->file('missionPicturePathFour')->store('images');
                $home->missionPictureNameFour = $request->file('missionPicturePathFour')->getClientOriginalName();
                $home->missionPicturePathFour = $path;
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

    /**
     * Modify the data so we will just use on FE.
     */
    protected function transformHomeData($home) {
        $home->cardsInfoArray = [
            [
                'title' => $home->testimonialTitleOne ?? "",
                'subtitle' => $home->testimonialContentOne ?? "",
                'href' => $home->linkTestimonialOne ?? "",
                'Icon' => 'Users',
            ],
            [
                'title' => $home->titleTestimonialTwo ?? "",
                'subtitle' => $home->contentTestimonialTwo ?? "",
                'href' => $home->linkTestimonialTwo ?? "",
                'Icon' => 'Globe',
            ],
            [
                'title' => $home->titleTestimonialThree ?? "",
                'subtitle' => $home->contentTestimonialThree ?? "",
                'href' => $home->linkTestimonialThree ?? "",
                'Icon' => 'MessageSquareText',
            ],
        ];

        unset($home->testimonialTitleOne, $home->testimonialContentOne, $home->linkTestimonialOne);
        unset($home->titleTestimonialTwo, $home->contentTestimonialTwo, $home->linkTestimonialTwo);
        unset($home->titleTestimonialThree, $home->contentTestimonialThree, $home->linkTestimonialThree);

        $home->statItemsArray = [
            [
                'value' => $home->statsNumberOne ?? "",
                'description' => $home->statsTitleOne ?? "",
            ],
            [
                'value' => $home->statsNumberTwo ?? "",
                'description' => $home->statsTitleTwo ?? "",
            ],
            [
                'value' => $home->statsNumberThree ?? "",
                'description' => $home->statsTitleThree ?? "",
            ],
            [
                'value' => $home->statsNumberFour ?? "",
                'description' => $home->statsTitleFour ?? "",
            ],
        ];

        unset($home->statsNumberOne, $home->statsTitleOne, $home->statsNumberTwo, $home->statsTitleTwo);
        unset($home->statsNumberThree, $home->statsTitleThree, $home->statsNumberFour, $home->statsTitleFour);

        $home->statsFeatures = [
            [
                'title' => $home->listTitleOne ?? "",
                'description' => $home->listContentOne ?? "",
            ],
            [
                'title' => $home->listTitleTwo ?? "",
                'description' => $home->listContentTwo ?? "",
            ],
            [
                'title' => $home->listTitleThree ?? "",
                'description' => $home->listContentThree ?? "",
            ],
            [
                'title' => $home->listTitleFour ?? "",
                'description' => $home->listContentFour ?? "",
            ],
        ];

        unset($home->listTitleOne, $home->listContentOne, $home->listTitleTwo, $home->listContentTwo);
        unset($home->listTitleThree, $home->listContentThree, $home->listTitleFour, $home->listContentFour);

        return $home;
    }
}
