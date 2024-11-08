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

        .collapse {
            display: none; /* Initially hide all sections */
        }

        .collapse.show {
            display: block; /* Show the section when it has 'show' class */
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
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#heroAboutUsSection">Hero About Us</a>
                    </li>
                    @if($aboutUs)
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#boxAboutUsSection">Box About Us</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

        <!-- Hero About Us Section -->
        <div id="heroAboutUsSection" class="collapse">
            <form action="{{ route('admin.aboutUsPost') }}" method="POST" class="formAddAboutUs">
                @csrf
                <h2 class="section-heading">Hero About Us Section</h2>
                <div class="form-group">
                    <label for="titleHeroAboutUs">Title Hero About Us</label>
                    <input type="text" class="form-control" id="titleHeroAboutUs" name="titleHeroAboutUs">
                </div>
                <div class="form-group">
                    <label for="subtitleHeroAboutUs">Subtitle Hero About Us</label>
                    <input type="text" class="form-control" id="subtitleHeroAboutUs" name="subtitleHeroAboutUs">
                </div>
                <button type="submit" class="btn btn-primary mb-3 w-50">Save</button>
            </form>
        </div>

        <!-- Box About Us Section -->
        @if($aboutUs)
        <div id="boxAboutUsSection" class="collapse">
            <form action="{{ route('admin.boxAboutUsPost') }}" method="POST" class="formAddAboutUs">
                @csrf
                <input type="hidden" name="about_us_id" value="{{ $aboutUs->id }}">
                <h2 class="section-heading">Box About Us Section</h2>
                <div class="form-group mb-3">
                    <label for="titleBoxAboutUs">Title Box</label>
                    <input type="text" class="form-control" id="titleBoxAboutUs" name="titleBoxAboutUs">
                </div>
                <button type="submit" class="btn btn-primary mb-3 w-50">Save</button>
            </form>
        </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-link');
            const collapseElements = document.querySelectorAll('.collapse');

            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    // Get the target collapse ID
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.querySelector(targetId);

                    // Close all collapse elements
                    collapseElements.forEach(collapse => {
                        if (collapse !== targetElement) {
                            collapse.classList.remove('show');
                        }
                    });

                    // Toggle the target element
                    targetElement.classList.toggle('show');
                });
            });
        });
    </script>
@endsection
