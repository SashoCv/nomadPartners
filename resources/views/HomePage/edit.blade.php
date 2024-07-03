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
    <h2 class="mb-5 pt-3 titleBlogs">Edit Home Page</h2>

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

    <form action="{{ route('admin.homePageUpdate', $home->id) }}" method="POST" enctype="multipart/form-data" class="formAddHomePage">
    @csrf
    @method('PUT')

        <div id="heroSection" class="section-content">
            <h2 class="section-heading">Hero Section</h2>
            <div class="form-group">
                <label for="titleHeroSection">Title Hero Section</label>
                <input type="text" class="form-control" id="titleHeroSection" name="titleHeroSection" value="{{ $home->titleHeroSection }}">
            </div>

            <div class="form-group">
                <label for="subtitleHeroSection">Subtitle Hero Section</label>
                <input type="text" class="form-control" id="subtitleHeroSection" name="subtitleHeroSection" value="{{ $home->subtitleHeroSection }}">
            </div>

            <div class="form-group">
                <label for="buttonHeroSection">Button Hero Section</label>
                <input type="text" class="form-control" id="buttonHeroSection" name="buttonHeroSection" value="{{ $home->buttonHeroSection }}">
            </div>

            <div class="form-group">
                <label for="imageHeroSectionPath">Image Hero Section</label>
                <input type="file" class="form-control-file" id="imageHeroSectionPath" name="imageHeroSectionPath">
                @if($home->imageHeroSectionPath)
                <div>
                <img src="{{ asset('storage/' . $home->imageHeroSectionPath) }}" alt="Hero Section Image" style="max-width: 100px; margin-top: 10px;">
                </div>
                @endif
            </div>
        </div>

        <div id="testimonialSection" class="section-content">
            <h2 class="section-heading">Testimonial Section</h2>
            <div class="form-group">
                <label for="testimonialTitleOne">Testimonial Title One</label>
                <input type="text" class="form-control" id="testimonialTitleOne" name="testimonialTitleOne" value="{{ $home->testimonialTitleOne }}">
            </div>

            <div class="form-group">
                <label for="testimonialContentOne">Testimonial Content One</label>
                <textarea class="form-control" id="testimonialContentOne" name="testimonialContentOne">{{ $home->testimonialContentOne }}</textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialOne">Link Testimonial One</label>
                <input type="text" class="form-control" id="linkTestimonialOne" name="linkTestimonialOne" value="{{ $home->linkTestimonialOne }}">
            </div>

            <div class="form-group">
                <label for="titleTestimonialTwo">Title Testimonial Two</label>
                <input type="text" class="form-control" id="titleTestimonialTwo" name="titleTestimonialTwo" value="{{ $home->titleTestimonialTwo }}">
            </div>

            <div class="form-group">
                <label for="contentTestimonialTwo">Content Testimonial Two</label>
                <textarea class="form-control" id="contentTestimonialTwo" name="contentTestimonialTwo">{{ $home->contentTestimonialTwo }}</textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialTwo">Link Testimonial Two</label>
                <input type="text" class="form-control" id="linkTestimonialTwo" name="linkTestimonialTwo" value="{{ $home->linkTestimonialTwo }}">
            </div>

            <div class="form-group">
                <label for="titleTestimonialThree">Title Testimonial Three</label>
                <input type="text" class="form-control" id="titleTestimonialThree" name="titleTestimonialThree" value="{{ $home->titleTestimonialThree }}">
            </div>

            <div class="form-group">
                <label for="contentTestimonialThree">Content Testimonial Three</label>
                <textarea class="form-control" id="contentTestimonialThree" name="contentTestimonialThree">{{ $home->contentTestimonialThree }}</textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialThree">Link Testimonial Three</label>
                <input type="text" class="form-control" id="linkTestimonialThree" name="linkTestimonialThree" value="{{ $home->linkTestimonialThree }}">
            </div>
        </div>

        <div id="aboutSection" class="section-content">
            <h2 class="section-heading">About Section</h2>
            <div class="form-group">
                <label for="titleAbout">Title About</label>
                <input type="text" class="form-control" id="titleAbout" name="titleAbout" value="{{ $home->titleAbout }}">
            </div>

            <div class="form-group">
                <label for="subtitleAbout">Subtitle About</label>
                <input type="text" class="form-control" id="subtitleAbout" name="subtitleAbout" value="{{ $home->subtitleAbout }}">
            </div>

            <div class="form-group">
                <label for="contentAbout">Content About</label>
                <textarea class="form-control" id="contentAbout" name="contentAbout">{{ $home->contentAbout }}</textarea>
            </div>
        </div>

        <div id="liveSection" class="section-content">
            <h2 class="section-heading">Live Section</h2>
            <div class="form-group">
                <label for="liveTitle">Live Title</label>
                <input type="text" class="form-control" id="liveTitle" name="liveTitle" value="{{ $home->liveTitle }}">
            </div>

            <div class="form-group">
                <label for="liveContent">Live Content</label>
                <textarea class="form-control" id="liveContent" name="liveContent">{{ $home->liveContent }}</textarea>
            </div>

            <div class="form-group">
                <label for="livePicturePath">Live Picture</label>
                <input type="file" class="form-control-file" id="livePicturePath" name="livePicturePath">
                @if($home->livePicturePath)
                    <img src="{{ asset($home->livePicturePath) }}" alt="Live Section Image" style="max-width: 100px; margin-top: 10px;">
                @endif
            </div>
        </div>

        <div id="chooseUsSection" class="section-content">
            <h2 class="section-heading">Choose Us Section</h2>
            <div class="form-group">
                <label for="chooseUsTitle">Choose Us Title</label>
                <input type="text" class="form-control" id="chooseUsTitle" name="chooseUsTitle" value="{{ $home->chooseUsTitle }}">
            </div>

            <div class="form-group">
                <label for="chooseUsContent">Choose Us Content</label>
                <textarea class="form-control" id="chooseUsContent" name="chooseUsContent">{{ $home->chooseUsContent }}</textarea>
            </div>
        </div>

        <div id="listSection" class="section-content">
            <h2 class="section-heading">List Section</h2>
            <div class="form-group">
                <label for="listTitleOne">List Title One</label>
                <input type="text" class="form-control" id="listTitleOne" name="listTitleOne" value="{{ $home->listTitleOne }}">
            </div>

            <div class="form-group">
                <label for="listContentOne">List Content One</label>
                <textarea class="form-control" id="listContentOne" name="listContentOne">{{ $home->listContentOne }}</textarea>
            </div>

            <div class="form-group">
                <label for="listTitleTwo">List Title Two</label>
                <input type="text" class="form-control" id="listTitleTwo" name="listTitleTwo" value="{{ $home->listTitleTwo }}">
            </div>

            <div class="form-group">
                <label for="listContentTwo">List Content Two</label>
                <textarea class="form-control" id="listContentTwo" name="listContentTwo">{{ $home->listContentTwo }}</textarea>
            </div>

            <div class="form-group">
                <label for="listTitleThree">List Title Three</label>
                <input type="text" class="form-control" id="listTitleThree" name="listTitleThree" value="{{ $home->listTitleThree }}">
            </div>

            <div class="form-group">
                <label for="listContentThree">List Content Three</label>
                <textarea class="form-control" id="listContentThree" name="listContentThree">{{ $home->listContentThree }}</textarea>
            </div>
        </div>

        <div id="missionSection" class="section-content">
            <h2 class="section-heading">Mission Section</h2>
            <div class="form-group">
                <label for="missionTitle">Mission Title</label>
                <input type="text" class="form-control" id="missionTitle" name="missionTitle" value="{{ $home->missionTitle }}">
            </div>

            <div class="form-group">
                <label for="missionContent">Mission Content</label>
                <textarea class="form-control" id="missionContent" name="missionContent">{{ $home->missionContent }}</textarea>
            </div>

            <div class="form-group">
                <label for="missionPicturePathOne">Mission Picture One</label>
                <input type="file" class="form-control-file" id="missionPicturePathOne" name="missionPicturePathOne">
                @if($home->missionPicturePathOne)
                    <img src="{{ asset($home->missionPicturePathOne) }}" alt="Mission Picture One" style="max-width: 100px; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="missionPicturePathTwo">Mission Picture Two</label>
                <input type="file" class="form-control-file" id="missionPicturePathTwo" name="missionPicturePathTwo">
                @if($home->missionPicturePathTwo)
                    <img src="{{ asset($home->missionPicturePathTwo) }}" alt="Mission Picture Two" style="max-width: 100px; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="missionPicturePathThree">Mission Picture Three</label>
                <input type="file" class="form-control-file" id="missionPicturePathThree" name="missionPicturePathThree">
                @if($home->missionPicturePathThree)
                    <img src="{{ asset($home->missionPicturePathThree) }}" alt="Mission Picture Three" style="max-width: 100px; margin-top: 10px;">
                @endif
            </div>
        </div>

        <div id="partnersSection" class="section-content">
            <h2 class="section-heading">Partners Section</h2>
            <div class="form-group">
                <label for="partnersTitle">Partners Title</label>
                <input type="text" class="form-control" id="partnersTitle" name="partnersTitle" value="{{ $home->partnersTitle }}">
            </div>

            <div class="form-group">
                <label for="partnersSubtitle">Partners Subtitle</label>
                <input type="text" class="form-control" id="partnersSubtitle" name="partnersSubtitle" value="{{ $home->partnersSubtitle }}">
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
