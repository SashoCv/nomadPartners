@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/styleHomePage.css">

<style>
.formAddAboutUs .form-group {
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
    <h2 class="mb-5 pt-3 titleBlogs">Create About Us Page</h2>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#heroAboutUsSection">Hero About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#whoWeAreSection">Who we are</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ourMissionSection">Our Mission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contactUsSection">Contact us now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutUsTextSection">About us text</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="{{ route('admin.aboutUsPost') }}" method="POST" enctype="multipart/form-data" class="formAddAboutUs">
        @csrf
        <!-- Hero About Us Section -->
        <div id="heroAboutUsSection">
            <h2 class="section-heading">Hero About Us Section</h2>
            <div class="form-group">
                <label for="titleHeroAboutUs">Title Hero About Us</label>
                <input type="text" class="form-control" id="titleHeroAboutUs" name="titleHeroAboutUs">
            </div>
            <div class="form-group">
                <label for="subtitleHeroAboutUs">Subtitle Hero About Us</label>
                <input type="text" class="form-control" id="subtitleHeroAboutUs" name="subtitleHeroAboutUs">
            </div>
            <div class="form-group">
                <label for="imageHeroAboutUsPath">Image Hero About Us</label>
                <input type="file" class="form-control-file" id="imageHeroAboutUsPath" name="imageHeroAboutUsPath">
            </div>
        </div>

        <!-- Testimonial About Us Section -->
        <div id="whoWeAreSection">
            <h2 class="section-heading">Who we are Section</h2>
            <!-- Card 1 -->
            <div class="form-group">
                <label for="iconWhoWeAre1">Icon 1</label>
                <input type="file" class="form-control-file" id="iconWhoWeAre1" name="iconWhoWeAre1">
            </div>
            <div class="form-group">
                <label for="titleWhoWeAre1">Title 1</label>
                <input type="text" class="form-control" id="titleWhoWeAre1" name="titleWhoWeAre1">
            </div>
            <div class="form-group">
                <label for="contentWhoWeAre1">Content 1</label>
                <textarea class="form-control" id="contentWhoWeAre1" name="contentWhoWeAre1"></textarea>
            </div>
            <!-- Card 2 -->
            <div class="form-group">
                <label for="iconWhoWeAre2">Icon 2</label>
                <input type="file" class="form-control-file" id="iconWhoWeAre2" name="iconWhoWeAre2">
            </div>
            <div class="form-group">
                <label for="titleWhoWeAre2">Title 2</label>
                <input type="text" class="form-control" id="titleWhoWeAre2" name="titleWhoWeAre2">
            </div>
            <div class="form-group">
                <label for="contentWhoWeAre2">Content 2</label>
                <textarea class="form-control" id="contentWhoWeAre2" name="contentWhoWeAre2"></textarea>
            </div>
            <!-- Card 3 -->
            <div class="form-group">
                <label for="iconWhoWeAre3">Icon 3</label>
                <input type="file" class="form-control-file" id="iconWhoWeAre3" name="iconWhoWeAre3">
            </div>
            <div class="form-group">
                <label for="titleWhoWeAre3">Title 3</label>
                <input type="text" class="form-control" id="titleWhoWeAre3" name="titleWhoWeAre3">
            </div>
            <div class="form-group">
                <label for="contentWhoWeAre3">Content 3</label>
                <textarea class="form-control" id="contentWhoWeAre3" name="contentWhoWeAre3"></textarea>
            </div>
        </div>

        <!-- Our Mission Section -->
        <div id="ourMissionSection">
            <h2 class="section-heading">Our Mission Section</h2>
            <div class="form-group">
                <label for="titleOurMission">Title</label>
                <input type="text" class="form-control" id="titleOurMission" name="titleOurMission">
            </div>
            <div class="form-group">
                <label for="descriptionOurMission">Description</label>
                <textarea class="form-control" id="descriptionOurMission" name="descriptionOurMission"></textarea>
            </div>
            <!-- Card 1 -->
            <div class="form-group">
                <label for="iconMission1">Icon 1</label>
                <input type="file" class="form-control-file" id="iconMission1" name="iconMission1">
            </div>
            <div class="form-group">
                <label for="titleMission1">Title 1</label>
                <input type="text" class="form-control" id="titleMission1" name="titleMission1">
            </div>
            <div class="form-group">
                <label for="descriptionMission1">Description 1</label>
                <textarea class="form-control" id="descriptionMission1" name="descriptionMission1"></textarea>
            </div>
            <!-- Card 2 -->
            <div class="form-group">
                <label for="iconMission2">Icon 2</label>
                <input type="file" class="form-control-file" id="iconMission2" name="iconMission2">
            </div>
            <div class="form-group">
                <label for="titleMission2">Title 2</label>
                <input type="text" class="form-control" id="titleMission2" name="titleMission2">
            </div>
            <div class="form-group">
                <label for="descriptionMission2">Description 2</label>
                <textarea class="form-control" id="descriptionMission2" name="descriptionMission2"></textarea>
            </div>
            <!-- Card 3 -->
            <div class="form-group">
                <label for="iconMission3">Icon 3</label>
                <input type="file" class="form-control-file" id="iconMission3" name="iconMission3">
            </div>
            <div class="form-group">
                <label for="titleMission3">Title 3</label>
                <input type="text" class="form-control" id="titleMission3" name="titleMission3">
            </div>
            <div class="form-group">
                <label for="descriptionMission3">Description 3</label>
                <textarea class="form-control" id="descriptionMission3" name="descriptionMission3"></textarea>
            </div>
        </div>

        <!-- Contact Us Now Section -->
        <div id="contactUsSection">
            <h2 class="section-heading">Contact Us Now Section</h2>
            <div class="form-group">
                <label for="titleContactUs">Title</label>
                <input type="text" class="form-control" id="titleContactUs" name="titleContactUs">
            </div>
            <div class="form-group">
                <label for="contentContactUs">Content</label>
                <textarea class="form-control" id="contentContactUs" name="contentContactUs"></textarea>
            </div>
            <div class="form-group">
                <label for="buttonTextContactUs">Button Text</label>
                <input type="text" class="form-control" id="buttonTextContactUs" name="buttonTextContactUs">
            </div>
        </div>

        <!-- About Us Text Section -->
        <div id="aboutUsTextSection">
            <h2 class="section-heading">About Us Text Section</h2>
            <div class="form-group">
                <label for="titleAboutUsText">Title</label>
                <input type="text" class="form-control" id="titleAboutUsText" name="titleAboutUsText">
            </div>
            <div class="form-group">
                <label for="contentAboutUsText">Content</label>
                <textarea class="form-control" id="contentAboutUsText" name="contentAboutUsText"></textarea>
            </div>
            <div class="form-group">
                <label for="buttonTextAboutUsText">Button Text</label>
                <input type="text" class="form-control" id="buttonTextAboutUsText" name="buttonTextAboutUsText">
            </div>
            <div class="form-group">
                <label for="buttonLinkAboutUsText">Button Link</label>
                <input type="text" class="form-control" id="buttonLinkAboutUsText" name="buttonLinkAboutUsText">
            </div>
            <div class="form-group">
                <label for="imageAboutUsText">Image</label>
                <input type="file" class="form-control-file" id="imageAboutUsText" name="imageAboutUsText">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3 w-50">Save</button>
    </form>
</div>
@endsection
