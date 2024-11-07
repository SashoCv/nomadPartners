<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Home;
use App\Models\Language;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function getHomePageApi(Request $request)
    {
        try {
            $language = $request->language;
            $language_id = Language::where('name', $language)->first()->id;
            $home = Home::where('language_id', $language_id)->first();
            $latestFourBlogs = Blog::latest()->take(4)->where('language_id', $language_id)->get();
            $allPartners = Partner::all();

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


            $home->infoBoxTitleOne = $request->input('infoBoxTitleOne');
            $home->infoBoxContentOne = $request->input('infoBoxContentOne');
            $home->buttonBoxTextOne = $request->input('buttonBoxTextOne');
            $home->buttonBoxLinkOne = $request->input('buttonBoxLinkOne');

            $home->infoBoxTitleTwo = $request->input('infoBoxTitleTwo');
            $home->infoBoxContentTwo = $request->input('infoBoxContentTwo');
            $home->buttonBoxTextTwo = $request->input('buttonBoxTextTwo');
            $home->buttonBoxLinkTwo = $request->input('buttonBoxLinkTwo');

            $home->infoBoxTitleThree = $request->input('infoBoxTitleThree');
            $home->infoBoxContentThree = $request->input('infoBoxContentThree');
            $home->buttonBoxTextThree = $request->input('buttonBoxTextThree');
            $home->buttonBoxLinkThree = $request->input('buttonBoxLinkThree');

            $home->titleAbout = $request->input('titleAbout');
            $home->subtitleAbout = $request->input('subtitleAbout');
            $home->contentAbout = $request->input('contentAbout');
            $home->buttonTextAbout = $request->input('buttonTextAbout');
            $home->buttonLinkAbout = $request->input('buttonLinkAbout');

            $home->missionTitle = $request->input('missionTitle');
            $home->missionContent = $request->input('missionContent');
            $home->missionStatsTextOne = $request->input('missionStatsTextOne');
            $home->missionStatsTextTwo = $request->input('missionStatsTextTwo');
            $home->missionStatsTextThree = $request->input('missionStatsTextThree');
            $home->missionStatsTitleOne = $request->input('missionStatsTitleOne');
            $home->missionStatsTitleTwo = $request->input('missionStatsTitleTwo');
            $home->missionStatsTitleThree = $request->input('missionStatsTitleThree');

            $home->bookYourAppointmentTitle = $request->input('bookYourAppointmentTitle');
            $home->bookYourAppointmentContent = $request->input('bookYourAppointmentContent');
            $home->bookYourAppointmentButton = $request->input('bookYourAppointmentButton');
            $home->bookYourAppointmentButtonLink = $request->input('bookYourAppointmentButtonLink');


            if ($request->hasFile('imageHeroSectionPath')) {
                $path = $request->file('imageHeroSectionPath')->store('heroImages', 'public');
                $home->imageHeroSectionPath = $path;
                $home->imageHeroSectionName = $request->file('imageHeroSectionPath')->getClientOriginalName();
            }

            if($request->hasFile('infoBoxImageOne')) {
                $path = $request->file('infoBoxIconOne')->store('infoBoxImages', 'public');
                $home->infoBoxImageOne = $path;
                $home->infoBoxImageNameOne = $request->file('infoBoxIconOne')->getClientOriginalName();
            }

            if($request->hasFile('infoBoxImageTwo')) {
                $path = $request->file('infoBoxIconTwo')->store('infoBoxImages', 'public');
                $home->infoBoxImageTwo = $path;
                $home->infoBoxImageNameTwo = $request->file('infoBoxIconTwo')->getClientOriginalName();
            }

            if($request->hasFile('infoBoxImageThree')) {
                $path = $request->file('infoBoxIconThree')->store('infoBoxImages', 'public');
                $home->infoBoxImageThree = $path;
                $home->infoBoxImageNameThree = $request->file('infoBoxIconThree')->getClientOriginalName();
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
        $userLang = Auth::user()->language_id;
        $homePage = Home::where('language_id', $userLang)->first();
        return view('HomePage.edit', compact('homePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $home = Home::findOrFail($id);

            $home->titleHeroSection = $request->input('titleHeroSection');
            $home->subtitleHeroSection = $request->input('subtitleHeroSection');
            $home->buttonHeroSection = $request->input('buttonHeroSection');

            $home->infoBoxTitleOne = $request->input('infoBoxTitleOne');
            $home->infoBoxContentOne = $request->input('infoBoxContentOne');
            $home->buttonBoxTextOne = $request->input('buttonBoxTextOne');
            $home->buttonBoxLinkOne = $request->input('buttonBoxLinkOne');

            $home->infoBoxTitleTwo = $request->input('infoBoxTitleTwo');
            $home->infoBoxContentTwo = $request->input('infoBoxContentTwo');
            $home->buttonBoxTextTwo = $request->input('buttonBoxTextTwo');
            $home->buttonBoxLinkTwo = $request->input('buttonBoxLinkTwo');

            $home->infoBoxTitleThree = $request->input('infoBoxTitleThree');
            $home->infoBoxContentThree = $request->input('infoBoxContentThree');
            $home->buttonBoxTextThree = $request->input('buttonBoxTextThree');
            $home->buttonBoxLinkThree = $request->input('buttonBoxLinkThree');

            $home->titleAbout = $request->input('titleAbout');
            $home->subtitleAbout = $request->input('subtitleAbout');
            $home->contentAbout = $request->input('contentAbout');
            $home->buttonTextAbout = $request->input('buttonTextAbout');
            $home->buttonLinkAbout = $request->input('buttonLinkAbout');

            $home->missionTitle = $request->input('missionTitle');
            $home->missionContent = $request->input('missionContent');
            $home->missionStatsTextOne = $request->input('missionStatsTextOne');
            $home->missionStatsTextTwo = $request->input('missionStatsTextTwo');
            $home->missionStatsTextThree = $request->input('missionStatsTextThree');
            $home->missionStatsTitleOne = $request->input('missionStatsTitleOne');
            $home->missionStatsTitleTwo = $request->input('missionStatsTitleTwo');
            $home->missionStatsTitleThree = $request->input('missionStatsTitleThree');

            $home->bookYourAppointmentTitle = $request->input('bookYourAppointmentTitle');
            $home->bookYourAppointmentContent = $request->input('bookYourAppointmentContent');
            $home->bookYourAppointmentButton = $request->input('bookYourAppointmentButton');
            $home->bookYourAppointmentButtonLink = $request->input('bookYourAppointmentButtonLink');

            $home->serviceTitle = $request->input('serviceTitle');
            $home->serviceContent = $request->input('serviceContent');
            $home->serviceStatsNumberOne = $request->input('serviceStatsNumberOne');
            $home->serviceStatsTextOne = $request->input('serviceStatsTextOne');
            $home->serviceStatsNumberTwo = $request->input('serviceStatsNumberTwo');
            $home->serviceStatsTextTwo = $request->input('serviceStatsTextTwo');
            $home->serviceStatsNumberThree = $request->input('serviceStatsNumberThree');
            $home->serviceStatsTextThree = $request->input('serviceStatsTextThree');

//            $table->string('serviceTitle')->nullable();
//            $table->string('serviceContent')->nullable();
//            $table->string('serviceImageStatsOnePath')->nullable();
//            $table->string('serviceImageStatsOneName')->nullable();
//            $table->string('serviceStatsNumberOne')->nullable();
//            $table->string('serviceStatsTextOne')->nullable();
//            $table->string('serviceImageStatsTwoPath')->nullable();
//            $table->string('serviceImageStatsTwoName')->nullable();
//            $table->string('serviceStatsNumberTwo')->nullable();
//            $table->string('serviceStatsTextTwo')->nullable();
//            $table->string('serviceImageStatsThreePath')->nullable();
//            $table->string('serviceImageStatsThreeName')->nullable();
//            $table->string('serviceStatsNumberThree')->nullable();
//            $table->string('serviceStatsTextThree')->nullable();

            // Handle file uploads
            if ($request->hasFile('imageHeroSectionPath')) {
                $path = $request->file('imageHeroSectionPath')->store('heroImages', 'public');
                $home->imageHeroSectionPath = $path;
                $home->imageHeroSectionName = $request->file('imageHeroSectionPath')->getClientOriginalName();
            }

            if ($request->hasFile('infoBoxImageOne')) {
                $path = $request->file('infoBoxImageOne')->store('infoBoxImages', 'public');
                $home->infoBoxImageOne = $path;
                $home->infoBoxImageNameOne = $request->file('infoBoxImageOne')->getClientOriginalName();
            }

            if ($request->hasFile('infoBoxImageTwo')) {
                $path = $request->file('infoBoxImageTwo')->store('infoBoxImages', 'public');
                $home->infoBoxImageTwo = $path;
                $home->infoBoxImageNameTwo = $request->file('infoBoxImageTwo')->getClientOriginalName();
            }

            if ($request->hasFile('infoBoxImageThree')) {
                $path = $request->file('infoBoxImageThree')->store('infoBoxImages', 'public');
                $home->infoBoxImageThree = $path;
                $home->infoBoxImageNameThree = $request->file('infoBoxImageThree')->getClientOriginalName();
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

            if ($request->hasFile('missionMainImage')) {
                $path = $request->file('missionMainImage')->store('missionMainImage', 'public');
                $home->missionMainImagePath = $path;
                $home->missionMainImageName = $request->file('missionMainImage')->getClientOriginalName();
            }

            if ($request->hasFile('serviceImageStatsOne')) {
                $path = $request->file('serviceImageStatsOne')->store('serviceImages', 'public');
                $home->serviceImageStatsOnePath = $path;
                $home->serviceImageStatsOneName = $request->file('serviceImageStatsOne')->getClientOriginalName();
            }

            if ($request->hasFile('serviceImageStatsTwo')) {
                $path = $request->file('serviceImageStatsTwo')->store('serviceImages', 'public');
                $home->serviceImageStatsTwoPath = $path;
                $home->serviceImageStatsTwoName = $request->file('serviceImageStatsTwo')->getClientOriginalName();
            }

            if ($request->hasFile('serviceImageStatsThree')) {
                $path = $request->file('serviceImageStatsThree')->store('serviceImages', 'public');
                $home->serviceImageStatsThreePath = $path;
                $home->serviceImageStatsThreeName = $request->file('serviceImageStatsThree')->getClientOriginalName();
            }


            // Save the updated record
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
