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
                        <a class="nav-link" href="#aboutSection">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#missionSection">Mission Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bookYourAppointment">Book Your Appointment</a>
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
                    <input type="text" class="form-control" id="testimonialTitleOne" name="infoBoxTitleOne">
                </div>
                <div class="form-group">
                    <label for="testimonialContentOne">Info Card Content One</label>
                    <textarea class="form-control" id="testimonialContentOne" name="infoBoxContentOne"></textarea>
                </div>
                <div class="form-group">
                    <label for="linkTestimonialOne">Button Info One</label>
                    <input type="text" class="form-control" id="linkTestimonialOne" name="buttonBoxTextOne">
                </div>
                <div class="form-group">
                    <label for="titleTestimonialTwo">Title Info Card Two</label>
                    <input type="text" class="form-control" id="titleTestimonialTwo" name="infoBoxTitleTwo">
                </div>
                <div class="form-group">
                    <label for="contentTestimonialTwo">Content Info Card Two</label>
                    <textarea class="form-control" id="contentTestimonialTwo" name="infoBoxContentTwo"></textarea>
                </div>
                <div class="form-group">
                    <label for="linkTestimonialTwo">Button Card Two</label>
                    <input type="text" class="form-control" id="linkTestimonialTwo" name="buttonBoxTextTwo">
                </div>
                <div class="form-group">
                    <label for="titleTestimonialThree">Title Info Card Three</label>
                    <input type="text" class="form-control" id="titleTestimonialThree" name="infoBoxTitleThree">
                </div>
                <div class="form-group">
                    <label for="contentTestimonialThree">Content Info Card Three</label>
                    <textarea class="form-control" id="contentTestimonialThree" name="infoBoxContentThree"></textarea>
                </div>
                <div class="form-group">
                    <label for="linkTestimonialThree">Button Card Three</label>
                    <input type="text" class="form-control" id="linkTestimonialThree" name="buttonBoxTextThree">
                </div>
            </div>

            <!-- About Section -->
            <div id="aboutSection">
                <h2 class="section-heading">About</h2>
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
                <div class="form-group">
                    <label for="buttonAboutHomeSection">Button About</label>
                    <input type="text" class="form-control" id="buttonAboutHomeSection" name="buttonTextAbout">
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
                <div class="form-group">
                    <label for="missionIcon">Mission Icon One</label>
                    <input type="file" class="form-control-file" id="missionIcon" name="missionIconOne">
                </div>
                <div class="form-group">
                    <label for="missionStatsNumberOne">Mission Stats Number One</label>
                    <input type="text" class="form-control" id="missionStatsNumberOne" name="missionStatsNumberOne">
                </div>
                <div class="form-group">
                    <label for="missionStatsTitleOne">Mission Stats Title One</label>
                    <input type="text" class="form-control" id="missionStatsTitleOne" name="missionStatsTitleOne">
                </div>

                <div class="form-group">
                    <label for="missionIconTwo">Mission Icon Two</label>
                    <input type="file" class="form-control-file" id="missionIconTwo" name="missionIconTwo">
                </div>
                <div class="form-group">
                    <label for="missionStatsNumberTwo">Mission Stats Number Two</label>
                    <input type="text" class="form-control" id="missionStatsNumberTwo" name="missionStatsNumberTwo">
                </div>
                <div class="form-group">
                    <label for="missionStatsTitleTwo">Mission Stats Title Two</label>
                    <input type="text" class="form-control" id="missionStatsTitleTwo" name="missionStatsTitleTwo">
                </div>

                <div class="form-group">
                    <label for="missionIconThree">Mission Icon Three</label>
                    <input type="file" class="form-control-file" id="missionIconThree" name="missionIconThree">
                </div>
                <div class="form-group">
                    <label for="missionStatsNumberThree">Mission Stats Number Three</label>
                    <input type="text" class="form-control" id="missionStatsNumberThree" name="missionStatsNumberThree">
                </div>
                <div class="form-group">
                    <label for="missionStatsTitleThree">Mission Stats Title Three</label>
                    <input type="text" class="form-control" id="missionStatsTitleThree" name="missionStatsTitleThree">
                </div>
            </div>

            <!-- Book Your Appointment Section -->
            <div id="bookYourAppointment">
                <h2 class="section-heading">Book Your Appointment</h2>
                <div class="form-group">
                    <label for="titleBookYourAppointment">Title Book Your Appointment</label>
                    <input type="text" class="form-control" id="titleBookYourAppointment" name="titleBookYourAppointment">
                </div>
                <div class="form-group">
                    <label for="subtitleBookYourAppointment">Subtitle Book Your Appointment</label>
                    <input type="text" class="form-control" id="subtitleBookYourAppointment" name="subtitleBookYourAppointment">
                </div>
                <div class="form-group">
                    <label for="buttonBookYourAppointment">Button Book Your Appointment</label>
                    <input type="text" class="form-control" id="buttonBookYourAppointment" name="buttonBookYourAppointment">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
