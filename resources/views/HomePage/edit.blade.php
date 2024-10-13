@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/styleHomePage.css">

    <style>
        .formUpdateHomePage .form-group {
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
        <h2 class="mb-5 pt-3 titleBlogs">Update Home Page</h2>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#heroSection" role="button" aria-expanded="false" aria-controls="heroSection">Hero Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#testimonialSection" role="button" aria-expanded="false" aria-controls="testimonialSection">Info Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#aboutSection" role="button" aria-expanded="false" aria-controls="aboutSection">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#missionSection" role="button" aria-expanded="false" aria-controls="missionSection">Mission Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#bookYourAppointment" role="button" aria-expanded="false" aria-controls="bookYourAppointment">Book Your Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#service" role="button" aria-expanded="false" aria-controls="service">Services</a>
                    </li>
                </ul>
            </div>
        </nav>

        <form action="{{ route('admin.homePageUpdate', $homePage->id) }}" method="POST" enctype="multipart/form-data" class="formUpdateHomePage">
            @csrf
            @method('PUT')

            <!-- Hero Section -->
            <div id="heroSection" class="collapse show">
                <h2 class="section-heading">Hero Section</h2>
                <div class="form-group">
                    <label for="titleHeroSection">Title Hero Section</label>
                    <input type="text" class="form-control" id="titleHeroSection" name="titleHeroSection" value="{{ old('titleHeroSection', $homePage->titleHeroSection) }}">
                </div>
                <div class="form-group">
                    <label for="subtitleHeroSection">Subtitle Hero Section</label>
                    <input type="text" class="form-control" id="subtitleHeroSection" name="subtitleHeroSection" value="{{ old('subtitleHeroSection', $homePage->subtitleHeroSection) }}">
                </div>
                <div class="form-group">
                    <label for="buttonHeroSection">Button Hero Section</label>
                    <input type="text" class="form-control" id="buttonHeroSection" name="buttonHeroSection" value="{{ old('buttonHeroSection', $homePage->buttonHeroSection) }}">
                </div>
                <div class="form-group">
                    <label for="imageHeroSectionPath">Image Hero Section</label>
                    <input type="file" class="form-control-file" id="imageHeroSectionPath" name="imageHeroSectionPath">
                    @if ($homePage->imageHeroSectionPath)
                        <img src="{{ asset('storage/' . $homePage->imageHeroSectionPath) }}" alt="Hero Image" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
            </div>

            <!-- Info Cards Section -->
            <div id="testimonialSection" class="collapse">
                <h2 class="section-heading">Info Cards</h2>
                    <div class="form-group">
                        <label for="infoBoxTitleOne">Info Card Title One</label>
                        <input type="text" class="form-control" id="infoBoxTitleOne" name="infoBoxTitleOne" value="{{ old('infoBoxTitleOne' , $homePage->{'infoBoxTitleOne'}) }}">
                    </div>
                    <div class="form-group">
                        <label for="infoBoxContentOne">Info Card Content One</label>
                        <textarea class="form-control" id="infoBoxContentOne" name="infoBoxContentOne">{{ old('infoBoxContentOne', $homePage->{'infoBoxContentOne'}) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="buttonBoxTextOne">Button Info One</label>
                        <input type="text" class="form-control" id="buttonBoxTextOne" name="buttonBoxTextOne" value="{{ old('buttonBoxTextOne', $homePage->{'buttonBoxTextOne'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="buttonBoxLinkOne">Button Link One</label>
                        <input type="text" class="form-control" id="buttonBoxLinkOne" name="buttonBoxLinkOne" value="{{ old('buttonBoxLinkOne', $homePage->{'buttonBoxLinkOne'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="infoBoxImageOne">Info Card Image One</label>
                        <input type="file" class="form-control-file" id="infoBoxImageOne" name="infoBoxImageOne">
                        @if($homePage->infoBoxImageOne)
                            <img src="{{ asset('storage/' . $homePage->infoBoxImageOne) }}" alt="Info Card Image One" style="width: 200px">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="infoBoxTitleTwo">Info Card Title Two</label>
                        <input type="text" class="form-control" id="infoBoxTitleTwo" name="infoBoxTitleTwo" value="{{ old('infoBoxTitleTwo' , $homePage->{'infoBoxTitleTwo'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="infoBoxContentTwo">Info Card Content Two</label>
                        <textarea class="form-control" id="infoBoxContentTwo" name="infoBoxContentTwo">{{ old('infoBoxContentTwo', $homePage->{'infoBoxContentTwo'}) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="buttonBoxTextTwo">Button Info Two</label>
                        <input type="text" class="form-control" id="buttonBoxTextTwo" name="buttonBoxTextTwo" value="{{ old('buttonBoxTextTwo', $homePage->{'buttonBoxTextTwo'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="buttonBoxLinkTwo">Button Link Two</label>
                        <input type="text" class="form-control" id="buttonBoxLinkTwo" name="buttonBoxLinkTwo" value="{{ old('buttonBoxLinkTwo', $homePage->{'buttonBoxLinkTwo'}) }}">
                    </div>

                    <div class="form-group" >
                        <label for="infoBoxImageTwo">Info Card Image Two</label>
                        <input type="file" class="form-control-file" id="infoBoxImageTwo" name="infoBoxImageTwo">
                        @if($homePage->infoBoxImageTwo)
                            <img src="{{ asset('storage/' . $homePage->infoBoxImageTwo) }}" alt="Info Card Image Two" style="max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="infoBoxTitleThree">Info Card Title Three</label>
                        <input type="text" class="form-control" id="infoBoxTitleThree" name="infoBoxTitleThree" value="{{ old('infoBoxTitleThree' , $homePage->{'infoBoxTitleThree'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="infoBoxContentThree">Info Card Content Three</label>
                        <textarea class="form-control" id="infoBoxContentThree" name="infoBoxContentThree">{{ old('infoBoxContentThree', $homePage->{'infoBoxContentThree'}) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="buttonBoxTextThree">Button Info Three</label>
                        <input type="text" class="form-control" id="buttonBoxTextThree" name="buttonBoxTextThree" value="{{ old('buttonBoxTextThree', $homePage->{'buttonBoxTextThree'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="buttonBoxLinkThree">Button Link Three</label>
                        <input type="text" class="form-control" id="buttonBoxLinkThree" name="buttonBoxLinkThree" value="{{ old('buttonBoxLinkThree', $homePage->{'buttonBoxLinkThree'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="infoBoxImageThree">Info Card Image Three</label>
                        <input type="file" class="form-control-file" id="infoBoxImageThree" name="infoBoxImageThree">
                         @if($homePage->infoBoxImageThree)
                            <img src="{{ asset('storage/' . $homePage->infoBoxImageThree) }}" alt="Info Card Image Three" style="max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>
            </div>

            <!-- About Section -->
            <div id="aboutSection" class="collapse">
                <h2 class="section-heading">About</h2>
                <div class="form-group">
                    <label for="titleAbout">Title About</label>
                    <input type="text" class="form-control" id="titleAbout" name="titleAbout" value="{{ old('titleAbout', $homePage->titleAbout) }}">
                </div>
                <div class="form-group">
                    <label for="subtitleAbout">Subtitle About</label>
                    <input type="text" class="form-control" id="subtitleAbout" name="subtitleAbout" value="{{ old('subtitleAbout', $homePage->subtitleAbout) }}">
                </div>
                <div class="form-group">
                    <label for="contentAbout">Content About</label>
                    <textarea class="form-control" id="contentAbout" name="contentAbout">{{ old('contentAbout', $homePage->contentAbout) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="buttonTextAbout">Button About Text</label>
                    <input type="text" class="form-control" id="buttonTextAbout" name="buttonTextAbout" value="{{ old('buttonTextAbout', $homePage->buttonTextAbout) }}">
                </div>

                <div class="form-group">
                    <label for="buttonLinkAbout">Button About Link</label>
                    <input type="text" class="form-control" id="buttonLinkAbout" name="buttonLinkAbout" value="{{ old('buttonLinkAbout', $homePage->buttonLinkAbout) }}">
                </div>
            </div>

            <!-- Mission Section -->
            <div id="missionSection" class="collapse">
                <h2 class="section-heading">Mission Section</h2>
                <div class="form-group">
                    <label for="missionSubtitle">Mission Main Image</label>
                    <input type="file" class="form-control" id="missionSubtitle" name="missionMainImage">
                    @if ($homePage->{'missionMainImagePath'})
                        <img src="{{ asset('storage/' . $homePage->missionMainImagePath) }}" alt="Main Image" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
                <div class="form-group">
                    <label for="missionTitle">Mission Title</label>
                    <input type="text" class="form-control" id="missionTitle" name="missionTitle" value="{{ old('missionTitle', $homePage->missionTitle) }}">
                </div>
                <div class="form-group">
                    <label for="missionContent">Mission Content</label>
                    <textarea class="form-control" id="missionContent" name="missionContent">{{ old('missionContent', $homePage->missionContent) }}</textarea>
                </div>
                    <div class="form-group">
                        <label for="missionPicturePathOne">Mission Icon One</label>
                        <input type="file" class="form-control-file" id="missionPicturePathOne" name="missionPicturePathOne">
                        @if ($homePage->{'missionPicturePathOne'})
                            <img src="{{ asset('storage/' . $homePage->missionPicturePathOne) }}" alt="Mission Icon One" style="max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="missionStatsTitleOne">Mission Stats Title One</label>
                        <input type="text" class="form-control" id="missionStatsTitleOne" name="missionStatsTitleOne" value="{{ old('missionStatsTitleOne', $homePage->{'missionStatsTitleOne'}) }}">
                    </div>
                    <div class="form-group">
                        <label for="missionStatsTextOne">Mission Stats Text One</label>
                        <input type="text" class="form-control" id="missionStatsTextOne" name="missionStatsTextOne" value="{{ old('missionStatsTextOne', $homePage->{'missionStatsTextOne'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="missionPicturePathTwo">Mission Icon Two</label>
                        <input type="file" class="form-control-file" id="missionPicturePathTwo" name="missionPicturePathTwo">
                        @if ($homePage->{'missionPicturePathTwo'})
                            <img src="{{ asset('storage/' . $homePage->missionPicturePathTwo) }}" alt="Mission Icon Two" style="max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="missionStatsTitleTwo">Mission Stats Title Two</label>
                        <input type="text" class="form-control" id="missionStatsTitleTwo" name="missionStatsTitleTwo" value="{{ old('missionStatsTitleTwo', $homePage->{'missionStatsTitleTwo'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="missionStatsTextTwo">Mission Stats Text Two</label>
                        <input type="text" class="form-control" id="missionStatsTextTwo" name="missionStatsTextTwo" value="{{ old('missionStatsTextTwo', $homePage->{'missionStatsTextTwo'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="missionPicturePathThree">Mission Icon Three</label>
                        <input type="file" class="form-control-file" id="missionPicturePathThree" name="missionPicturePathThree">
                        @if ($homePage->{'missionPicturePathThree'})
                            <img src="{{ asset('storage/' . $homePage->missionPicturePathThree) }}" alt="Mission Icon Three" style="max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="missionStatsTitleThree">Mission Stats Title Three</label>
                        <input type="text" class="form-control" id="missionStatsTitleThree" name="missionStatsTitleThree" value="{{ old('missionStatsTitleThree', $homePage->{'missionStatsTitleThree'}) }}">
                    </div>

                    <div class="form-group">
                        <label for="missionStatsTextThree">Mission Stats Text Three</label>
                        <input type="text" class="form-control" id="missionStatsTextThree" name="missionStatsTextThree" value="{{ old('missionStatsTextThree', $homePage->{'missionStatsTextThree'}) }}">
                    </div>
            </div>

            <!-- Book Your Appointment Section -->
            <div id="bookYourAppointment" class="collapse">
                <h2 class="section-heading">Book Your Appointment</h2>
                <div class="form-group">
                    <label for="bookYourAppointmentTitle">Title</label>
                    <input type="text" class="form-control" id="bookYourAppointmentTitle" name="bookYourAppointmentTitle" value="{{ old('bookYourAppointmentTitle', $homePage->bookYourAppointmentTitle) }}">
                </div>
                <div class="form-group">
                    <label for="bookYourAppointmentContent	">Subtitle</label>
                    <input type="text" class="form-control" id="bookYourAppointmentContent" name="bookYourAppointmentContent" value="{{ old('bookYourAppointmentContent', $homePage->bookYourAppointmentContent) }}">
                </div>
                <div class="form-group">
                    <label for="bookYourAppointmentButton">Button Text</label>
                    <input type="text" class="form-control" id="bookYourAppointmentButton" name="bookYourAppointmentButton" value="{{ old('bookYourAppointmentButton', $homePage->bookYourAppointmentButton) }}">
                </div>
                <div class="form-group">
                    <label for="bookYourAppointmentImage">Image</label>
                    <input type="file" class="form-control-file" id="bookYourAppointmentImage" name="bookYourAppointmentImage">
                    @if ($homePage->bookYourAppointmentImage)
                        <img src="{{ asset('storage/' . $homePage->bookYourAppointmentImage) }}" alt="Book Your Appointment Image" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
            </div>

            <!-- Services Section -->
            <div id="service" class="collapse">
                <h2 class="section-heading">Services</h2>
                <div class="form-group">
                    <label for="serviceTitle">Title</label>
                        <input type="text" class="form-control" id="serviceTitle" name="serviceTitle" value="{{ old('serviceTitle', $homePage->serviceTitle) }}">
                </div>
                <div class="form-group" >
                    <label for="serviceContent">Content</label>
                    <textarea class="form-control" id="serviceContent" name="serviceContent">{{ old('serviceContent', $homePage->serviceContent) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="serviceImage">Image For Stats One</label>
                    <input type="file" class="form-control-file" id="serviceImage" name="serviceImageStatsOne">
                    @if ($homePage->serviceImageStatsOnePath)
                        <img src="{{ asset('storage/' . $homePage->serviceImageStatsOnePath) }}" alt="Service Image" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
                <div class="form-group">
                    <label for="serviceStatsNumberOne">Stats Number One</label>
                    <input type="text" class="form-control" id="serviceStatsNumberOne" name="serviceStatsNumberOne" value="{{ old('serviceStatsNumberOne', $homePage->serviceStatsNumberOne) }}">
                </div>
                <div class="form-group" >
                    <label for="serviceStatsTextOne">Stats Text One</label>
                    <input type="text" class="form-control" id="serviceStatsTextOne" name="serviceStatsTextOne" value="{{ old('serviceStatsTextOne', $homePage->serviceStatsTextOne) }}">
                </div>

                <div class="form-group">
                    <label for="serviceImageStatsTwo">Image For Stats Two</label>
                    <input type="file" class="form-control-file" id="serviceImageStatsTwo" name="serviceImageStatsTwo">
                    @if ($homePage->serviceImageStatsTwoPath)
                        <img src="{{ asset('storage/' . $homePage->serviceImageStatsTwoPath) }}" alt="Service Image" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
                <div class="form-group">
                    <label for="serviceStatsNumberTwo">Stats Number Two </label>
                    <input type="text" class="form-control" id="serviceStatsNumberTwo" name="serviceStatsNumberTwo" value="{{ old('serviceStatsNumberTwo', $homePage->serviceStatsNumberTwo) }}">
                </div>
                <div class="form-group">
                    <label for="serviceStatsTextTwo">Stats Text Two</label>
                    <input type="text" class="form-control" id="serviceStatsTextTwo" name="serviceStatsTextTwo" value="{{ old('serviceStatsTextTwo', $homePage->serviceStatsTextTwo) }}">
                </div>
                <div class="form-group">
                    <label for="serviceImageStatsThree">Image For Stats Three</label>
                    <input type="file" class="form-control-file" id="serviceImageStatsThree" name="serviceImageStatsThree">
                    @if ($homePage->serviceImageStatsThreePath)
                        <img src="{{ asset('storage/' . $homePage->serviceImageStatsThreePath) }}" alt="Service Image" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
                <div class="form-group">
                    <label for="serviceStatsNumberThree">Stats Number Three</label>
                    <input type="text" class="form-control" id="serviceStatsNumberThree" name="serviceStatsNumberThree" value="{{ old('serviceStatsNumberThree', $homePage->serviceStatsNumberThree) }}">
                </div>
                <div class="form-group">
                    <label for="serviceStatsTextThree">Stats Text Three</label>
                    <input type="text" class="form-control" id="serviceStatsTextThree" name="serviceStatsTextThree" value="{{ old('serviceStatsTextThree', $homePage->serviceStatsTextThree) }}">
                </div>

            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all nav links and collapse elements
            const navLinks = document.querySelectorAll('.nav-link');
            const collapseElements = document.querySelectorAll('.collapse');

            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    // Get the target collapse ID
                    const targetId = this.getAttribute('href').substring(1);

                    collapseElements.forEach(collapse => {
                        // Only collapse sections that are not the one being opened
                        if (collapse.id !== targetId && collapse.classList.contains('show')) {
                            new bootstrap.Collapse(collapse, { toggle: false }).hide();
                        }
                    });
                });
            });
        });
    </script>
@endsection
