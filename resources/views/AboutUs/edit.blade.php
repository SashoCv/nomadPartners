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

            <div id="whoWeAreSection" class="section-content">
                <h2 class="section-heading">Who We Are Section</h2>
                <div class="form-group">
                    <label for="titleWhoWeAre">Title Who We Are</label>
                    <input type="text" class="form-control" id="titleWhoWeAre" name="titleWhoWeAre" value="{{ $aboutUs->titleWhoWeAre }}">
                </div>
                <div class="form-group">
                    <label for="contentWhoWeAre">Content Who We Are</label>
                    <textarea class="form-control" id="contentWhoWeAre" name="contentWhoWeAre" rows="3">{{ $aboutUs->contentWhoWeAre }}</textarea>
                </div>
                <div class="form-group">
                    <label for="whoWeArePictureAboutUs">Who We Are Picture About Us</label>
                    <input type="file" class="form-control-file" id="whoWeArePictureAboutUs" name="whoWeArePictureAboutUs">
                </div>
            </div>

            <div id="liveAboutUsSection" class="section-content">
                <h2 class="section-heading">Live About Us Section</h2>
                <div class="form-group">
                    <label for="liveTitleAboutUs">Live Title About Us</label>
                    <input type="text" class="form-control" id="liveTitleAboutUs" name="liveTitleAboutUs" value="{{ $aboutUs->liveTitleAboutUs }}">
                </div>
                <div class="form-group">
                    <label for="liveContentAboutUs">Live Content About Us</label>
                    <textarea class="form-control" id="liveContentAboutUs" name="liveContentAboutUs" rows="3">{{ $aboutUs->liveContentAboutUs }}</textarea>
                </div>
                <div class="form-group">
                    <label for="livePicturePathAboutUs">Live Picture Path About Us</label>
                    <input type="file" class="form-control-file" id="livePicturePathAboutUs" name="livePicturePathAboutUs">
                </div>
                <!-- New fields -->
                <div class="form-group">
                    <label for="liveButtonText1">Live Button Text 1</label>
                    <input type="text" class="form-control" id="liveButtonText1" name="liveButtonText1" value="{{ $aboutUs->liveButtonText1 }}">
                </div>
                <div class="form-group">
                    <label for="liveButtonLink1">Live Button Link 1</label>
                    <input type="text" class="form-control" id="liveButtonLink1" name="liveButtonLink1" value="{{ $aboutUs->liveButtonLink1 }}">
                </div>
                <div class="form-group">
                    <label for="liveButtonText2">Live Button Text 2</label>
                    <input type="text" class="form-control" id="liveButtonText2" name="liveButtonText2" value="{{ $aboutUs->liveButtonText2 }}">
                </div>
                <div class="form-group">
                    <label for="liveButtonLink2">Live Button Link 2</label>
                    <input type="text" class="form-control" id="liveButtonLink2" name="liveButtonLink2" value="{{ $aboutUs->liveButtonLink2 }}">
                </div>
                <div class="form-group">
                    <label for="liveButtonText3">Live Button Text 3</label>
                    <input type="text" class="form-control" id="liveButtonText3" name="liveButtonText3" value="{{ $aboutUs->liveButtonText3 }}">
                </div>
                <div class="form-group">
                    <label for="liveButtonLink3">Live Button Link 3</label>
                    <input type="text" class="form-control" id="liveButtonLink3" name="liveButtonLink3" value="{{ $aboutUs->liveButtonLink3 }}">
                </div>
                <div class="form-group">
                    <label for="liveButtonText4">Live Button Text 4</label>
                    <input type="text" class="form-control" id="liveButtonText4" name="liveButtonText4" value="{{ $aboutUs->liveButtonText4 }}">
                </div>
                <div class="form-group">
                    <label for="liveButtonLink4">Live Button Link 4</label>
                    <input type="text" class="form-control" id="liveButtonLink4" name="liveButtonLink4" value="{{ $aboutUs->liveButtonLink4 }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the default section to be displayed
            const defaultSectionId = '#heroAboutUsSection';
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
