@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/styleHomePage.css">

<style>
    .formAddHomePage .form-group {
        margin-bottom: 20px;
    }

    .navbar {
        margin-bottom: 20px;
    }

    .section-heading {
        margin-top: 40px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h2 class="mb-5 pt-3 titleBlogs">Create Home Page</h2>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#heroSection">Hero Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonialSection">Info Cards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutSection">About / Who we are sections</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#liveSection">Live Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chooseUsSection">Choose Us Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#listSection">List Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#missionSection">Mission Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#getStartedSection">Get Started Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#partnersSection">Partners Section</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="{{ route('admin.homePagePost') }}" method="POST" enctype="multipart/form-data" class="formAddHomePage">
        @csrf

        <!-- Hero Section -->
        <div id="heroSection">
            <h2 class="section-heading">Hero Section</h2>
            <div class="form-group">
                <label for="taglineHeroSection">Tagline Hero Section</label>
                <input type="text" class="form-control" id="taglineHeroSection" name="taglineHeroSection">
            </div>
            <div class="form-group">
                <label for="titleHeroSection">Title Hero Section</label>
                <input type="text" class="form-control" id="titleHeroSection" name="titleHeroSection">
            </div>
            <div class="form-group">
                <label for="subtitleHeroSection">Subtitle Hero Section</label>
                <input type="text" class="form-control" id="subtitleHeroSection" name="subtitleHeroSection">
            </div>
            <div class="form-group">
                <label for="buttonHeroSection">Button Hero Section</label>
                <input type="text" class="form-control" id="buttonHeroSection" name="buttonHeroSection">
            </div>
            <div class="form-group">
                <label for="imageHeroSectionPath">Image Hero Section</label>
                <input type="file" class="form-control-file" id="imageHeroSectionPath" name="imageHeroSectionPath">
            </div>
        </div>

        <!-- Info Cards Section -->
        <div id="testimonialSection">
            <h2 class="section-heading">Info Cards</h2>
            <div class="form-group">
                <label for="testimonialTitleOne">Info Card Title One</label>
                <input type="text" class="form-control" id="testimonialTitleOne" name="testimonialTitleOne">
            </div>
            <div class="form-group">
                <label for="testimonialContentOne">Info Card Content One</label>
                <textarea class="form-control" id="testimonialContentOne" name="testimonialContentOne"></textarea>
            </div>
            <div class="form-group">
                <label for="linkTestimonialOne">Link Info One</label>
                <input type="text" class="form-control" id="linkTestimonialOne" name="linkTestimonialOne">
            </div>
            <div class="form-group">
                <label for="titleTestimonialTwo">Title Info Card Two</label>
                <input type="text" class="form-control" id="titleTestimonialTwo" name="titleTestimonialTwo">
            </div>
            <div class="form-group">
                <label for="contentTestimonialTwo">Content Info Card Two</label>
                <textarea class="form-control" id="contentTestimonialTwo" name="contentTestimonialTwo"></textarea>
            </div>
            <div class="form-group">
                <label for="linkTestimonialTwo">Link Info Card Two</label>
                <input type="text" class="form-control" id="linkTestimonialTwo" name="linkTestimonialTwo">
            </div>
            <div class="form-group">
                <label for="titleTestimonialThree">Title Info Card Three</label>
                <input type="text" class="form-control" id="titleTestimonialThree" name="titleTestimonialThree">
            </div>
            <div class="form-group">
                <label for="contentTestimonialThree">Content Info Card Three</label>
                <textarea class="form-control" id="contentTestimonialThree" name="contentTestimonialThree"></textarea>
            </div>
            <div class="form-group">
                <label for="linkTestimonialThree">Link Info Card Three</label>
                <input type="text" class="form-control" id="linkTestimonialThree" name="linkTestimonialThree">
            </div>
        </div>

        <!-- About Section -->
        <div id="aboutSection">
            <h2 class="section-heading">About / Who we are sections</h2>
            <div class="form-group">
                <label for="titleAbout">Title About</label>
                <input type="text" class="form-control" id="titleAbout" name="titleAbout">
            </div>
            <div class="form-group">
                <label for="subtitleAbout">Subtitle About</label>
                <input type="text" class="form-control" id="subtitleAbout" name="subtitleAbout">
            </div>
            <div class="form-group">
                <label for="contentAbout">Content About</label>
                <textarea class="form-control" id="contentAbout" name="contentAbout"></textarea>
            </div>
        </div>

        <!-- Live Section -->
        <div id="liveSection">
            <h2 class="section-heading">Live Section</h2>
            <div class="form-group">
                <label for="liveTitle">Live Title</label>
                <input type="text" class="form-control" id="liveTitle" name="liveTitle">
            </div>
            <div class="form-group">
                <label for="liveContent">Live Content</label>
                <textarea class="form-control" id="liveContent" name="liveContent"></textarea>
            </div>
            <div class="form-group">
                <label for="livePicturePath">Live Picture</label>
                <input type="file" class="form-control-file" id="livePicturePath" name="livePicturePath">
            </div>
        </div>

        <!-- Choose Us Section -->
        <div id="chooseUsSection">
            <h2 class="section-heading">Choose Us Section</h2>
            <div class="form-group">
                <label for="chooseUsTitle">Choose Us Title</label>
                <input type="text" class="form-control" id="chooseUsTitle" name="chooseUsTitle">
            </div>
            <div class="form-group">
                <label for="chooseUsContent">Choose Us Content</label>
                <textarea class="form-control" id="chooseUsContent" name="chooseUsContent"></textarea>
            </div>
        </div>

        <!-- List Section -->
        <div id="listSection">
            <h2 class="section-heading">List Section</h2>
            <div class="form-group">
                <label for="listTitleOne">List Title One</label>
                <input type="text" class="form-control" id="listTitleOne" name="listTitleOne">
            </div>
            <div class="form-group">
                <label for="listContentOne">List Content One</label>
                <textarea class="form-control" id="listContentOne" name="listContentOne"></textarea>
            </div>
            <div class="form-group">
                <label for="listTitleTwo">List Title Two</label>
                <input type="text" class="form-control" id="listTitleTwo" name="listTitleTwo">
            </div>
            <div class="form-group">
                <label for="listContentTwo">List Content Two</label>
                <textarea class="form-control" id="listContentTwo" name="listContentTwo"></textarea>
            </div>
            <div class="form-group">
                <label for="listTitleThree">List Title Three</label>
                <input type="text" class="form-control" id="listTitleThree" name="listTitleThree">
            </div>
            <div class="form-group">
                <label for="listContentThree">List Content Three</label>
                <textarea class="form-control" id="listContentThree" name="listContentThree"></textarea>
            </div>
        </div>

        <!-- Mission Section -->
        <div id="missionSection">
            <h2 class="section-heading">Mission Section</h2>
            <div class="form-group">
                <label for="missionTitle">Mission Title</label>
                <input type="text" class="form-control" id="missionTitle" name="missionTitle">
            </div>
            <div class="form-group">
                <label for="missionContent">Mission Content</label>
                <textarea class="form-control" id="missionContent" name="missionContent"></textarea>
            </div>
        </div>

        <!-- Get Started Section -->
        <div id="getStartedSection">
            <h2 class="section-heading">Get Started Section</h2>
            <div class="form-group">
                <label for="getStartedTitle">Get Started Title</label>
                <input type="text" class="form-control" id="getStartedTitle" name="getStartedTitle">
            </div>
            <div class="form-group">
                <label for="getStartedContent">Get Started Content</label>
                <textarea class="form-control" id="getStartedContent" name="getStartedContent"></textarea>
            </div>
            <div class="form-group">
                <label for="getStartedLink">Get Started Link</label>
                <input type="text" class="form-control" id="getStartedLink" name="getStartedLink">
            </div>
        </div>

        <!-- Partners Section -->
        <div id="partnersSection">
            <h2 class="section-heading">Partners Section</h2>
            <div class="form-group">
                <label for="partnerTitle">Partner Title</label>
                <input type="text" class="form-control" id="partnerTitle" name="partnerTitle">
            </div>
            <div class="form-group">
                <label for="partnerContent">Partner Content</label>
                <textarea class="form-control" id="partnerContent" name="partnerContent"></textarea>
            </div>
            <div class="form-group">
                <label for="partnerLink">Partner Link</label>
                <input type="text" class="form-control" id="partnerLink" name="partnerLink">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Save</button>
    </form>
</div>
@endsection
