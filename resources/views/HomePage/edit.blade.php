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

    .active-section {
        display: block;
    }

    .nav-link.active {
        font-weight: bold;
        color: #007bff;
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
                    <a class="nav-link" href="#testimonialSection">Info cards section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutSection">About / Who we are sections</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#liveSection">Live Section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chooseUsSection">Choose Us Section Stats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#listSection">Choose Us Section List</a>
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
                    <img src="{{ asset('storage/' . $home->imageHeroSectionPath) }}" alt="Hero Section Image" style="max-width: 200px; margin-top: 10px;">
                </div>
                @endif
            </div>
        </div>

        <div id="testimonialSection" class="section-content">
            <h2 class="section-heading">Info Cards Session</h2>
            <div class="form-group">
                <label for="testimonialTitleOne">Info Card One</label>
                <input type="text" class="form-control" id="testimonialTitleOne" name="testimonialTitleOne" value="{{ $home->testimonialTitleOne }}">
            </div>

            <div class="form-group">
                <label for="testimonialContentOne">Info Card Content One</label>
                <textarea class="form-control" id="testimonialContentOne" name="testimonialContentOne">{{ $home->testimonialContentOne }}</textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialOne">Link Info Card One</label>
                <input type="text" class="form-control" id="linkTestimonialOne" name="linkTestimonialOne" value="{{ $home->linkTestimonialOne }}">
            </div>

            <div class="form-group">
                <label for="titleTestimonialTwo">Title Info Card Two</label>
                <input type="text" class="form-control" id="titleTestimonialTwo" name="titleTestimonialTwo" value="{{ $home->titleTestimonialTwo }}">
            </div>

            <div class="form-group">
                <label for="contentTestimonialTwo">Content Info Card Two</label>
                <textarea class="form-control" id="contentTestimonialTwo" name="contentTestimonialTwo">{{ $home->contentTestimonialTwo }}</textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialTwo">Link Info Card Two</label>
                <input type="text" class="form-control" id="linkTestimonialTwo" name="linkTestimonialTwo" value="{{ $home->linkTestimonialTwo }}">
            </div>

            <div class="form-group">
                <label for="titleTestimonialThree">Title Info Card Three</label>
                <input type="text" class="form-control" id="titleTestimonialThree" name="titleTestimonialThree" value="{{ $home->titleTestimonialThree }}">
            </div>

            <div class="form-group">
                <label for="contentTestimonialThree">Content Info Card Three</label>
                <textarea class="form-control" id="contentTestimonialThree" name="contentTestimonialThree">{{ $home->contentTestimonialThree }}</textarea>
            </div>

            <div class="form-group">
                <label for="linkTestimonialThree">Link Testimonial Three</label>
                <input type="text" class="form-control" id="linkTestimonialThree" name="linkTestimonialThree" value="{{ $home->linkTestimonialThree }}">
            </div>
        </div>

        <div id="aboutSection" class="section-content">
            <h2 class="section-heading">About / Who we are sections</h2>
            <div class="form-group">
                <label for="titleAbout">Title About</label>
                <input type="text" class="form-control" id="titleAbout" name="titleAbout" value="{{ $home->titleAbout }}">
            </div>

            <div class="form-group">
                <label for="contentAbout">Content About</label>
                <textarea class="form-control" id="contentAbout" name="contentAbout">{{ $home->contentAbout }}</textarea>
            </div>

            <div class="form-group">
                <label for="buttonTextAbout">Button Text About</label>
                <input type="text" class="form-control" id="buttonTextAbout" name="buttonTextAbout" value="{{ $home->buttonTextAbout }}">
            </div>

            <div class="form-group">
                <label for="buttonLinkAbout">Button Link About</label>
                <textarea class="form-control" id="buttonLinkAbout" name="buttonLinkAbout">{{ $home->buttonLinkAbout }}</textarea>
            </div>


            <div class="form-group">
                <label for="whoWeAreTitleAbout">Who We Are Title</label>
                <input type="text" class="form-control" id="whoWeAreTitleAbout" name="whoWeAreTitleAbout" value="{{ $home->whoWeAreTitleAbout }}">
            </div>

            <div class="form-group">
                <label for="whoWeAreContentAbout">Who We Are Content</label>
                <textarea class="form-control" id="whoWeAreContentAbout" name="whoWeAreContentAbout">{{ $home->whoWeAreContentAbout }}</textarea>
            </div>

            <div class="form-group">
                <label for="whoWeArePicturePathAbout">Who We Are Picture</label>
                <input type="file" class="form-control-file" id="whoWeArePicturePathAbout" name="whoWeArePicturePathAbout">
                <div>
                    @if($home->whoWeArePicturePathAbout)
                    <img src="{{ asset('storage/' . $home->whoWeArePicturePathAbout) }}" alt="Who We Are Picture" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
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
                <label for="buttonText1">Live Button 1</label>
                <input type="text" class="form-control" id="buttonText1" name="buttonText1" value="{{ $home->buttonText1 }}">
            </div>

            <div class="form-group">
                <label for="buttonLink1">Live Text 1</label>
                <input type="text" class="form-control" id="buttonLink1" name="buttonLink1" value="{{ $home->buttonLink1 }}">
            </div>

            <div class="form-group">
                <label for="buttonText2">Live Button 2</label>
                <input type="text" class="form-control"  id="buttonLink1" name="buttonText2" value="{{ $home->buttonText2 }}">
            </div>

            <div class="form-group">
                <label for="buttonLink2">Live Text 2</label>
                <input type="text" class="form-control" id="buttonLink2" name="buttonLink2" value="{{ $home->buttonLink2 }}">
            </div>

            <div class="form-group">
                <label for="livePicturePath">Live Picture</label>
                <input type="file" class="form-control-file" id="livePicturePath" name="livePicturePath">
                @if($home->livePicturePath)
                <img src="{{ asset('storage/' . $home->livePicturePath) }}" alt="Live Section Image" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>
        </div>

        <div id="chooseUsSection" class="section-content">
            <h2 class="section-heading">Choose Us Section Stats</h2>
            <div class="form-group">
                <label for="chooseUsTitle">Choose Us Title</label>
                <input type="text" class="form-control" id="chooseUsTitle" name="chooseUsTitle" value="{{ $home->chooseUsTitle }}">
            </div>

            <div class="form-group">
                <label for="chooseUsContent">Choose Us Content</label>
                <textarea class="form-control" id="chooseUsContent" name="chooseUsContent">{{ $home->chooseUsContent }}</textarea>
            </div>

            <!-- Нови полиња за Choose Us Section -->
            <div class="form-group">
                <label for="statsTitleOne">Stats Title One</label>
                <input type="text" class="form-control" id="statsTitleOne" name="statsTitleOne" value="{{ $home->statsTitleOne }}">
            </div>

            <div class="form-group">
                <label for="statsNumberOne">Stats Number One</label>
                <input type="text" class="form-control" id="statsNumberOne" name="statsNumberOne" value="{{ $home->statsNumberOne }}">
            </div>

            <div class="form-group">
                <label for="statsTitleTwo">Stats Title Two</label>
                <input type="text" class="form-control" id="statsTitleTwo" name="statsTitleTwo" value="{{ $home->statsTitleTwo }}">
            </div>

            <div class="form-group">
                <label for="statsNumberTwo">Stats Number Two</label>
                <input type="text" class="form-control" id="statsNumberTwo" name="statsNumberTwo" value="{{ $home->statsNumberTwo }}">
            </div>

            <div class="form-group">
                <label for="statsTitleThree">Stats Title Three</label>
                <input type="text" class="form-control" id="statsTitleThree" name="statsTitleThree" value="{{ $home->statsTitleThree }}">
            </div>

            <div class="form-group">
                <label for="statsNumberThree">Stats Number Three</label>
                <input type="text" class="form-control" id="statsNumberThree" name="statsNumberThree" value="{{ $home->statsNumberThree }}">
            </div>

            <div class="form-group">
                <label for="statsTitleFour">Stats Title Four</label>
                <input type="text" class="form-control" id="statsTitleFour" name="statsTitleFour" value="{{ $home->statsTitleFour }}">
            </div>

            <div class="form-group">
                <label for="statsNumberFour">Stats Number Four</label>
                <input type="text" class="form-control" id="statsNumberFour" name="statsNumberFour" value="{{ $home->statsNumberFour }}">
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

            <div class="form-group">
                <label for="listTitleFour">List Title Four</label>
                <input type="text" class="form-control" id="listTitleFour" name="listTitleFour" value="{{ $home->listTitleFour }}">
            </div>

            <div class="form-group">
                <label for="listContentFour">List Content Four</label>
                <textarea class="form-control" id="listContentFour" name="listContentFour">{{ $home->listContentFour }}</textarea>
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
                <img src="{{ asset('storage/' . $home->missionPicturePathOne) }}" alt="Mission Picture One" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="missionPicturePathTwo">Mission Picture Two</label>
                <input type="file" class="form-control-file" id="missionPicturePathTwo" name="missionPicturePathTwo">
                @if($home->missionPicturePathTwo)
                <img src="{{ asset('storage/' . $home->missionPicturePathTwo) }}" alt="Mission Picture Two" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="missionPicturePathThree">Mission Picture Three</label>
                <input type="file" class="form-control-file" id="missionPicturePathThree" name="missionPicturePathThree">
                @if($home->missionPicturePathThree)
                <img src="{{ asset('storage/' . $home->missionPicturePathThree) }}" alt="Mission Picture Three" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="missionPicturePathFour">Mission Picture Four ( Signature )</label>
                <input type="file" class="form-control-file" id="missionPicturePathFour" name="missionPicturePathFour">
                @if($home->missionPicturePathFour)
                    <img src="{{ asset('storage/' . $home->missionPicturePathFour) }}" alt="Mission Picture Four" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>
        </div>

        <div id="getStartedSection" class="section-content">
            <h2 class="section-heading">Get Started Section</h2>
            <div class="form-group">
                <label for="getStartedTitle">Get Started Title</label>
                <input type="text" class="form-control" id="getStartedTitle" name="getStartedTitle" value="{{ $home->getStartedTitle }}">
            </div>

            <div class="form-group">
                <label for="getStartedDescription">Get Started Description</label>
                <textarea class="form-control" id="getStartedDescription" name="getStartedDescription">{{ $home->getStartedDescription }}</textarea>
            </div>

            <div class="form-group">
                <label for="getStartedButton">Get Started Button</label>
                <input type="text" class="form-control" id="getStartedButton" name="getStartedButton" value="{{ $home->getStartedButton }}">
            </div>

            <div class="form-group">
                <label for="getStartedLink">Get Started Link</label>
                <input class="form-control" id="getStartedLink" name="getStartedLink" value="{{ $home->getStartedLink }}">
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
    document.addEventListener('DOMContentLoaded', function() {
        // Set the default section to be displayed
        const defaultSectionId = '#heroSection';
        const defaultSection = document.querySelector(defaultSectionId);
        if (defaultSection) {
            defaultSection.style.display = 'block';
        }

        // Set the default active tab
        const defaultNavLink = document.querySelector(`.nav-link[href="${defaultSectionId}"]`);
        if (defaultNavLink) {
            defaultNavLink.classList.add('active');
        }

        // Add click event listeners to section navigation links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                const href = this.getAttribute('href');
                if (href && href.startsWith('#')) {
                    event.preventDefault();

                    document.querySelectorAll('.section-content').forEach(section => {
                        section.style.display = 'none';
                    });

                    document.querySelectorAll('.nav-link').forEach(navLink => {
                        navLink.classList.remove('active');
                    });

                    const section = document.querySelector(href);
                    if (section) {
                        section.style.display = 'block';
                    }

                    this.classList.add('active');
                }
            });
        });
    });
</script>

@endsection
