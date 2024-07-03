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
                    <a class="nav-link" href="#whoWeAreSection">Who We Are</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#liveAboutUsSection">Live Section</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="{{ route('admin.aboutUsPost') }}" method="POST" enctype="multipart/form-data" class="formAddAboutUs">
        @csrf
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

        <div id="whoWeAreSection">
            <h2 class="section-heading">Who We Are Section</h2>
            <div class="form-group">
                <label for="titleWhoWeAre">Title Who We Are</label>
                <input type="text" class="form-control" id="titleWhoWeAre" name="titleWhoWeAre">
            </div>

            <div class="form-group">
                <label for="contentWhoWeAre">Content Who We Are</label>
                <textarea class="form-control" id="contentWhoWeAre" name="contentWhoWeAre"></textarea>
            </div>
        </div>

        <div id="liveAboutUsSection">
            <h2 class="section-heading">Live Section About Us</h2>
            <div class="form-group">
                <label for="liveTitleAboutUs">Live Title About Us</label>
                <input type="text" class="form-control" id="liveTitleAboutUs" name="liveTitleAboutUs">
            </div>

            <div class="form-group">
                <label for="liveContentAboutUs">Live Content About Us</label>
                <textarea class="form-control" id="liveContentAboutUs" name="liveContentAboutUs"></textarea>
            </div>

            <div class="form-group">
                <label for="livePicturePathAboutUs">Live Picture About Us</label>
                <input type="file" class="form-control-file" id="livePicturePathAboutUs" name="livePicturePathAboutUs">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3 w-50">Submit</button>
    </form>
</div>
@endsection
