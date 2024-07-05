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

    .section-content {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h2 class="mb-5 pt-3 titleBlogs">Edit About Us Page</h2>

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

    <form action="{{ route('admin.aboutUsUpdate', $aboutUs->id) }}" method="POST" enctype="multipart/form-data" class="formAddHomePage">
        @csrf
        @method('PUT')

        <div id="heroAboutUsSection" class="section-content">
            <h2 class="section-heading">Hero About Us Section</h2>
            <div class="form-group">
                <label for="titleHeroAboutUs">Title Hero About Us</label>
                <input type="text" class="form-control" id="titleHeroAboutUs" name="titleHeroAboutUs" value="{{ $aboutUs->title }}">
            </div>

            <div class="form-group">
                <label for="subtitleHeroAboutUs">Subtitle Hero About Us</label>
                <input type="text" class="form-control" id="subtitleHeroAboutUs" name="subtitleHeroAboutUs" value="{{ $aboutUs->subtitle }}">
            </div>

            <div class="form-group">
                <label for="linkHeroAboutUs1">Hero About Us Link 1</label>
                <input type="text" class="form-control" id="linkHeroAboutUs1" name="linkHeroAboutUs1" value="{{ $aboutUs->linkHeroAboutUs1 }}">
            </div>

            <div class="form-group">
                <label for="buttonNameHeroAboutUs1">Hero About Us Button Name 1</label>
                <input type="text" class="form-control" id="buttonNameHeroAboutUs1" name="buttonNameHeroAboutUs1" value="{{ $aboutUs->buttonNameHeroAboutUs1 }}">
            </div>

            <div class="form-group">
                <label for="linkHeroAboutUs2">Hero About Us Link 2</label>
                <input type="text" class="form-control" id="linkHeroAboutUs2" name="linkHeroAboutUs2" value="{{ $aboutUs->linkHeroAboutUs2 }}">
            </div>

            <div class="form-group">
                <label for="buttonNameHeroAboutUs2">Hero About Us Button Name 2</label>
                <input type="text" class="form-control" id="buttonNameHeroAboutUs2" name="buttonNameHeroAboutUs2" value="{{ $aboutUs->buttonNameHeroAboutUs2 }}">
            </div>

            <div class="form-group">
                <label for="imageHeroAboutUsPath">Image Hero About Us</label>
                <input type="file" class="form-control-file" id="imageHeroAboutUsPath" name="imageHeroAboutUsPath">
                @if($aboutUs->imageHeroAboutUsPath)
                <div>
                    <img src="{{ asset('storage/' . $aboutUs->imageHeroAboutUsPath) }}" alt="Hero About Us Image" style="max-width: 100px; margin-top: 10px;">
                </div>
                @endif
            </div>
        </div>

        <div id="whoWeAreSection" class="section-content">
            <h2 class="section-heading">Who We Are Section</h2>
            <div class="form-group">
                <label for="titleWhoWeAre">Title Who We Are</label>
                <input type="text" class="form-control" id="titleWhoWeAre" name="titleWhoWeAre" value="{{ $aboutUs->titleWhoWeAre }}">
            </div>

            <div class="form-group">
                <label for="contentWhoWeAre">Content Who We Are</label>
                <textarea class="form-control" id="contentWhoWeAre" name="contentWhoWeAre">{{ $aboutUs->contentWhoWeAre }}</textarea>
            </div>

            <div class="form-group">
                <label for="whoWeArePictureAboutUs">Who We Are Picture</label>
                <input type="file" class="form-control-file" id="whoWeArePictureAboutUs" name="whoWeArePictureAboutUs">
                @if($aboutUs->whoWeArePictureAboutUs)
                <div>
                    <img src="{{ asset('storage/' . $aboutUs->whoWeArePictureAboutUs) }}" alt="Who We Are Picture" style="max-width: 100px; margin-top: 10px;">
                </div>
                @endif
            </div>
        </div>


        <div id="liveAboutUsSection" class="section-content">
            <h2 class="section-heading">Live Section About Us</h2>
            <div class="form-group">
                <label for="liveTitleAboutUs">Live Title About Us</label>
                <input type="text" class="form-control" id="liveTitleAboutUs" name="liveTitleAboutUs" value="{{ $aboutUs->liveTitleAboutUs }}">
            </div>

            <div class="form-group">
                <label for="liveContentAboutUs">Live Content About Us</label>
                <textarea class="form-control" id="liveContentAboutUs" name="liveContentAboutUs">{{ $aboutUs->liveContentAboutUs }}</textarea>
            </div>

            <div class="form-group">
                <label for="livePicturePathAboutUs">Live Picture About Us</label>
                <input type="file" class="form-control-file" id="livePicturePathAboutUs" name="livePicturePathAboutUs">
                @if($aboutUs->livePicturePathAboutUs)
                <div>
                    <img src="{{ asset('storage/' . $aboutUs->livePicturePathAboutUs) }}" alt="Live Picture About Us" style="max-width: 100px; margin-top: 10px;">
                </div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3 w-50">Submit</button>
    </form>
</div>

<script>
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            document.querySelectorAll('.section-content').forEach(section => {
                section.style.display = 'none';
            });
            const section = document.querySelector(this.getAttribute('href'));
            if (section) {
                section.style.display = 'block';
            }
        });
    });
</script>
@endsection
