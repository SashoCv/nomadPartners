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
                        <a class="nav-link" href="#ourMissionSection">Our Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactUsSection">Contact Us Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutUsTextSection">About Us Text</a>
                    </li>
                </ul>
            </div>
        </nav>

        <form action="{{ route('admin.aboutUsUpdate', $aboutUs->id) }}" method="POST" enctype="multipart/form-data" class="formAddAboutUs">
            @csrf
            @method('PUT')

            <!-- Hero About Us Section -->
            <div id="heroAboutUsSection" class="section-content">
                <div class="form-group">
                    <label for="titleHeroAboutUs">Title Hero About Us</label>
                    <input type="text" class="form-control" id="titleHeroAboutUs" name="titleHeroAboutUs" value="{{ $aboutUs->titleHeroAboutUs }}">
                </div>
                <div class="form-group">
                    <label for="subtitleHeroAboutUs">Subtitle Hero About Us</label>
                    <input type="text" class="form-control" id="subtitleHeroAboutUs" name="subtitleHeroAboutUs" value="{{ $aboutUs->subtitleHeroAboutUs }}">
                </div>
                <div class="form-group">
                    <label for="imageHeroAboutUsPath">Image Hero About Us</label>
                    <input type="file" class="form-control-file" id="imageHeroAboutUsPath" name="imageHeroAboutUsPath">
                </div>
                <!-- New fields -->
                <div class="form-group">
                    <label for="linkHeroAboutUs1">Link Hero About Us 1</label>
                    <input type="text" class="form-control" id="linkHeroAboutUs1" name="linkHeroAboutUs1" value="{{ $aboutUs->linkHeroAboutUs1 }}">
                </div>
                <div class="form-group">
                    <label for="buttonNameHeroAboutUs1">Button Name Hero About Us 1</label>
                    <input type="text" class="form-control" id="buttonNameHeroAboutUs1" name="buttonNameHeroAboutUs1" value="{{ $aboutUs->buttonNameHeroAboutUs1 }}">
                </div>
                <div class="form-group">
                    <label for="linkHeroAboutUs2">Link Hero About Us 2</label>
                    <input type="text" class="form-control" id="linkHeroAboutUs2" name="linkHeroAboutUs2" value="{{ $aboutUs->linkHeroAboutUs2 }}">
                </div>
                <div class="form-group">
                    <label for="buttonNameHeroAboutUs2">Button Name Hero About Us 2</label>
                    <input type="text" class="form-control" id="buttonNameHeroAboutUs2" name="buttonNameHeroAboutUs2" value="{{ $aboutUs->buttonNameHeroAboutUs2 }}">
                </div>
            </div>

            <!-- Testimonial About Us Section -->
            <div id="whoWeAreSection" class="section-content">
                <!-- Card 1 -->
                <div class="form-group">
                    <label for="iconWhoWeAre1">Icon 1</label>
                    <input type="file" class="form-control-file" id="iconWhoWeAre1" name="iconWhoWeAre1">
                </div>
                <div class="form-group">
                    <label for="titleWhoWeAre1">Title 1</label>
                    <input type="text" class="form-control" id="titleWhoWeAre1" name="titleWhoWeAre1" value="{{ $aboutUs->titleWhoWeAre1 }}">
                </div>
                <div class="form-group">
                    <label for="contentWhoWeAre1">Content 1</label>
                    <textarea class="form-control" id="contentWhoWeAre1" name="contentWhoWeAre1">{{ $aboutUs->contentWhoWeAre1 }}</textarea>
                </div>
                <!-- Card 2 -->
                <div class="form-group">
                    <label for="iconWhoWeAre2">Icon 2</label>
                    <input type="file" class="form-control-file" id="iconWhoWeAre2" name="iconWhoWeAre2">
                </div>
                <div class="form-group">
                    <label for="titleWhoWeAre2">Title 2</label>
                    <input type="text" class="form-control" id="titleWhoWeAre2" name="titleWhoWeAre2" value="{{ $aboutUs->titleWhoWeAre2 }}">
                </div>
                <div class="form-group">
                    <label for="contentWhoWeAre2">Content 2</label>
                    <textarea class="form-control" id="contentWhoWeAre2" name="contentWhoWeAre2">{{ $aboutUs->contentWhoWeAre2 }}</textarea>
                </div>
                <!-- Card 3 -->
                <div class="form-group">
                    <label for="iconWhoWeAre3">Icon 3</label>
                    <input type="file" class="form-control-file" id="iconWhoWeAre3" name="iconWhoWeAre3">
                </div>
                <div class="form-group">
                    <label for="titleWhoWeAre3">Title 3</label>
                    <input type="text" class="form-control" id="titleWhoWeAre3" name="titleWhoWeAre3" value="{{ $aboutUs->titleWhoWeAre3 }}">
                </div>
                <div class="form-group">
                    <label for="contentWhoWeAre3">Content 3</label>
                    <textarea class="form-control" id="contentWhoWeAre3" name="contentWhoWeAre3">{{ $aboutUs->contentWhoWeAre3 }}</textarea>
                </div>
            </div>

            <!-- Our Mission Section -->
            <div id="ourMissionSection" class="section-content">
                <div class="form-group">
                    <label for="titleOurMission">Title</label>
                    <input type="text" class="form-control" id="titleOurMission" name="titleOurMission" value="{{ $aboutUs->titleOurMission }}">
                </div>
                <div class="form-group">
                    <label for="descriptionOurMission">Description</label>
                    <textarea class="form-control" id="descriptionOurMission" name="descriptionOurMission">{{ $aboutUs->descriptionOurMission }}</textarea>
                </div>
                <!-- Card 1 -->
                <div class="form-group">
                    <label for="iconMission1">Icon 1</label>
                    <input type="file" class="form-control-file" id="iconMission1" name="iconMission1">
                </div>
                <div class="form-group">
                    <label for="titleMission1">Title 1</label>
                    <input type="text" class="form-control" id="titleMission1" name="titleMission1" value="{{ $aboutUs->titleMission1 }}">
                </div>
                <div class="form-group">
                    <label for="descriptionMission1">Description 1</label>
                    <textarea class="form-control" id="descriptionMission1" name="descriptionMission1">{{ $aboutUs->descriptionMission1 }}</textarea>
                </div>
                <!-- Card 2 -->
                <div class="form-group">
                    <label for="iconMission2">Icon 2</label>
                    <input type="file" class="form-control-file" id="iconMission2" name="iconMission2">
                </div>
                <div class="form-group">
                    <label for="titleMission2">Title 2</label>
                    <input type="text" class="form-control" id="titleMission2" name="titleMission2" value="{{ $aboutUs->titleMission2 }}">
                </div>
                <div class="form-group">
                    <label for="descriptionMission2">Description 2</label>
                    <textarea class="form-control" id="descriptionMission2" name="descriptionMission2">{{ $aboutUs->descriptionMission2 }}</textarea>
                </div>
                <!-- Card 3 -->
                <div class="form-group">
                    <label for="iconMission3">Icon 3</label>
                    <input type="file" class="form-control-file" id="iconMission3" name="iconMission3">
                </div>
                <div class="form-group">
                    <label for="titleMission3">Title 3</label>
                    <input type="text" class="form-control" id="titleMission3" name="titleMission3" value="{{ $aboutUs->titleMission3 }}">
                </div>
                <div class="form-group">
                    <label for="descriptionMission3">Description 3</label>
                    <textarea class="form-control" id="descriptionMission3" name="descriptionMission3">{{ $aboutUs->descriptionMission3 }}</textarea>
                </div>
            </div>

            <!-- Contact Us Now Section -->
            <div id="contactUsSection" class="section-content">
                <div class="form-group">
                    <label for="contactUsTitle">Title</label>
                    <input type="text" class="form-control" id="contactUsTitle" name="contactUsTitle" value="{{ $aboutUs->contactUsTitle }}">
                </div>
                <div class="form-group">
                    <label for="contactUsText">Text</label>
                    <textarea class="form-control" id="contactUsText" name="contactUsText">{{ $aboutUs->contactUsText }}</textarea>
                </div>
            </div>

            <!-- About Us Text Section -->
            <div id="aboutUsTextSection" class="section-content">
                <div class="form-group">
                    <label for="aboutUsText">Text</label>
                    <textarea class="form-control" id="aboutUsText" name="aboutUsText">{{ $aboutUs->aboutUsText }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Show the appropriate section based on the URL hash
            function showSection() {
                const hash = window.location.hash;
                if (hash) {
                    document.querySelectorAll('.section-content').forEach(section => section.classList.remove('active-section'));
                    const sectionToShow = document.querySelector(hash);
                    if (sectionToShow) {
                        sectionToShow.classList.add('active-section');
                    }
                    document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                    const navLinkToActivate = document.querySelector(`.nav-link[href="${hash}"]`);
                    if (navLinkToActivate) {
                        navLinkToActivate.classList.add('active');
                    }
                }
            }

            // Initial load
            showSection();

            // Update section on hash change
            window.addEventListener('hashchange', showSection);
        });
    </script>
@endsection
