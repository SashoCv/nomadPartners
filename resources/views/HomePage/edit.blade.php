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
                @for ($i = 1; $i <= 3; $i++)
                    <div class="form-group">
                        <label for="infoBoxTitle{{ $i }}">Info Card Title {{ $i }}</label>
                        <input type="text" class="form-control" id="infoBoxTitle{{ $i }}" name="infoBoxTitle{{ $i }}" value="{{ old('infoBoxTitle' . $i, $homePage->{'infoBoxTitle' . $i}) }}">
                    </div>
                    <div class="form-group">
                        <label for="infoBoxContent{{ $i }}">Info Card Content {{ $i }}</label>
                        <textarea class="form-control" id="infoBoxContent{{ $i }}" name="infoBoxContent{{ $i }}">{{ old('infoBoxContent' . $i, $homePage->{'infoBoxContent' . $i}) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="buttonBoxText{{ $i }}">Button Info {{ $i }}</label>
                        <input type="text" class="form-control" id="buttonBoxText{{ $i }}" name="buttonBoxText{{ $i }}" value="{{ old('buttonBoxText' . $i, $homePage->{'buttonBoxText' . $i}) }}">
                    </div>
                    <div class="form-group">
                        <label for="infoBoxImage{{ $i }}">Info Card Image {{ $i }}</label>
                        <input type="file" class="form-control-file" id="infoBoxImage{{ $i }}" name="infoBoxImage{{ $i }}">
                        @if ($homePage->{'infoBoxImage' . $i})
                            <img src="{{ asset('storage/' . $homePage->{'infoBoxImage' . $i}) }}" alt="Info Card Image {{ $i }}" style="max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>
                @endfor
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
                    <label for="buttonTextAbout">Button About</label>
                    <input type="text" class="form-control" id="buttonTextAbout" name="buttonTextAbout" value="{{ old('buttonTextAbout', $homePage->buttonTextAbout) }}">
                </div>
            </div>

            <!-- Mission Section -->
            <div id="missionSection" class="collapse">
                <h2 class="section-heading">Mission Section</h2>
                <div class="form-group">
                    <label for="missionTitle">Mission Title</label>
                    <input type="text" class="form-control" id="missionTitle" name="missionTitle" value="{{ old('missionTitle', $homePage->missionTitle) }}">
                </div>
                <div class="form-group">
                    <label for="missionContent">Mission Content</label>
                    <textarea class="form-control" id="missionContent" name="missionContent">{{ old('missionContent', $homePage->missionContent) }}</textarea>
                </div>
                @for ($i = 1; $i <= 3; $i++)
                    <div class="form-group">
                        <label for="missionPicturePath{{ $i }}">Mission Icon {{ $i }}</label>
                        <input type="file" class="form-control-file" id="missionPicturePath{{ $i }}" name="missionPicturePath{{ $i }}">
                        @if ($homePage->{'missionPicturePath' . $i})
                            <img src="{{ asset('storage/' . $homePage->{'missionPicturePath' . $i}) }}" alt="Mission Icon {{ $i }}" style="max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="missionStatsNumber{{ $i }}">Mission Stats Number {{ $i }}</label>
                        <input type="text" class="form-control" id="missionStatsNumber{{ $i }}" name="missionStatsNumber{{ $i }}" value="{{ old('missionStatsNumber' . $i, $homePage->{'missionStatsNumber' . $i}) }}">
                    </div>
                    <div class="form-group">
                        <label for="missionStatsText{{ $i }}">Mission Stats Text {{ $i }}</label>
                        <input type="text" class="form-control" id="missionStatsText{{ $i }}" name="missionStatsText{{ $i }}" value="{{ old('missionStatsText' . $i, $homePage->{'missionStatsText' . $i}) }}">
                    </div>
                @endfor
            </div>

            <!-- Book Your Appointment Section -->
            <div id="bookYourAppointment" class="collapse">
                <h2 class="section-heading">Book Your Appointment</h2>
                <div class="form-group">
                    <label for="bookYourAppointmentTitle">Title</label>
                    <input type="text" class="form-control" id="bookYourAppointmentTitle" name="bookYourAppointmentTitle" value="{{ old('bookYourAppointmentTitle', $homePage->bookYourAppointmentTitle) }}">
                </div>
                <div class="form-group">
                    <label for="bookYourAppointmentSubtitle">Subtitle</label>
                    <input type="text" class="form-control" id="bookYourAppointmentSubtitle" name="bookYourAppointmentSubtitle" value="{{ old('bookYourAppointmentSubtitle', $homePage->bookYourAppointmentSubtitle) }}">
                </div>
                <div class="form-group">
                    <label for="bookYourAppointmentButtonText">Button Text</label>
                    <input type="text" class="form-control" id="bookYourAppointmentButtonText" name="bookYourAppointmentButtonText" value="{{ old('bookYourAppointmentButtonText', $homePage->bookYourAppointmentButtonText) }}">
                </div>
                <div class="form-group">
                    <label for="bookYourAppointmentImage">Image</label>
                    <input type="file" class="form-control-file" id="bookYourAppointmentImage" name="bookYourAppointmentImage">
                    @if ($homePage->bookYourAppointmentImage)
                        <img src="{{ asset('storage/' . $homePage->bookYourAppointmentImage) }}" alt="Book Your Appointment Image" style="max-width: 200px; margin-top: 10px;">
                    @endif
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
