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
                    <a class="nav-link" href="#testimonialSection">Testimonial Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutSection">About Section</a>
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
                    <a class="nav-link" href="#partnersSection">Partners Section</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="{{ route('admin.homePagePost') }}" method="POST" enctype="multipart/form-data" class="formAddHomePage">
        @csrf

        <div id="heroSection">
            <h2 class="section-heading">Hero Section</h2>
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

        <div id="testimonialSection">
            <h2 class="section-heading">Testimonial Section</h2>
            <div class="form-group">
                <label for="testimonialTitleOne">Testimonial Title One</label>
                <input type="text" class="form-control" id="testimonialTitleOne" name="testimonialTitleOne">
            </div>

            <div class="form-group">
                <label for="testimonialContentOne">Testimonial Content One</label>
                <textarea class="form-control" id="testimonialContentOne" name="testimonialContentOne"></textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialOne">Link Testimonial One</label>
                <input type="text" class="form-control" id="linkTestimonialOne" name="linkTestimonialOne">
            </div>

            <div class="form-group">
                <label for="titleTestimonialTwo">Title Testimonial Two</label>
                <input type="text" class="form-control" id="titleTestimonialTwo" name="titleTestimonialTwo">
            </div>

            <div class="form-group">
                <label for="contentTestimonialTwo">Content Testimonial Two</label>
                <textarea class="form-control" id="contentTestimonialTwo" name="contentTestimonialTwo"></textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialTwo">Link Testimonial Two</label>
                <input type="text" class="form-control" id="linkTestimonialTwo" name="linkTestimonialTwo">
            </div>

            <div class="form-group">
                <label for="titleTestimonialThree">Title Testimonial Three</label>
                <input type="text" class="form-control" id="titleTestimonialThree" name="titleTestimonialThree">
            </div>

            <div class="form-group">
                <label for="contentTestimonialThree">Content Testimonial Three</label>
                <textarea class="form-control" id="contentTestimonialThree" name="contentTestimonialThree"></textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialThree">Link Testimonial Three</label>
                <input type="text" class="form-control" id="linkTestimonialThree" name="linkTestimonialThree">
            </div>
        </div>

        <div id="aboutSection">
            <h2 class="section-heading">About Section</h2>
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

            <div class="form-group">
                <label for="missionPicturePathOne">Mission Picture One</label>
                <input type="file" class="form-control-file" id="missionPicturePathOne" name="missionPicturePathOne">
            </div>

            <div class="form-group">
                <label for="missionPicturePathTwo">Mission Picture Two</label>
                <input type="file" class="form-control-file" id="missionPicturePathTwo" name="missionPicturePathTwo">
            </div>

            <div class="form-group">
                <label for="missionPicturePathThree">Mission Picture Three</label>
                <input type="file" class="form-control-file" id="missionPicturePathThree" name="missionPicturePathThree">
            </div>
        </div>

        <div id="partnersSection">
            <h2 class="section-heading">Partners Section</h2>
            <div class="form-group">
                <label for="partnersTitle">Partners Title</label>
                <input type="text" class="form-control" id="partnersTitle" name="partnersTitle">
            </div>

            <div class="form-group">
                <label for="partnersSubtitle">Partners Subtitle</label>
                <input type="text" class="form-control" id="partnersSubtitle" name="partnersSubtitle">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3 w-50">Submit</button>
    </form>
</div>
@endsection
