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
                        <a class="nav-link" href="#aboutUsBoxesSection">About Us Boxes</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="aboutUsBoxesSection" class="section-content">
        <form action="{{ route('admin.boxAboutUsPost') }}" method="POST" id="formForAddBoxAbout" class="mb-4">
            @csrf
            <input type="hidden" name="about_us_id" value="{{ $aboutUs->id }}">
            <div class="form-group">
                <label for="titleBoxAboutUs">Title box</label>
                <input type="text" class="form-control" id="titleBoxAboutUs" name="titleBoxAboutUs">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($boxes as $box)
                <tr>
                    <td>{{ $box->titleBoxAboutUs }}</td>
                    <td>
                        <form action="{{ route('admin.deleteBoxAboutUs', $box->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <div id="heroAboutUsSection" class="section-content">
        <form action="{{ route('admin.aboutUsUpdate', $aboutUs->id) }}" method="POST" enctype="multipart/form-data" class="formAddAboutUs">
            @csrf
            @method('PUT')

            <!-- Hero About Us Section -->
                <div class="form-group">
                    <label for="titleHeroAboutUs">Title Hero About Us</label>
                    <input type="text" class="form-control" id="titleHeroAboutUs" name="titleHeroAboutUs" value="{{ $aboutUs->titleHeroAboutUs }}">
                </div>
                <div class="form-group">
                    <label for="subtitleHeroAboutUs">Subtitle Hero About Us</label>
                    <input type="text" class="form-control" id="subtitleHeroAboutUs" name="subtitleHeroAboutUs" value="{{ $aboutUs->subtitleHeroAboutUs }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </div>

        </form>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
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

            showSection();

            window.addEventListener('hashchange', showSection);
        });
    </script>
@endsection
