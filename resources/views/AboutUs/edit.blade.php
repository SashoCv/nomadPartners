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
                        <a class="nav-link" href="#aboutUsConnectWithUs">About Us Connect</a>
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

        <!-- Combined form for both sections -->
        <form action="{{ route('admin.aboutUsUpdate', $aboutUs->id) }}" method="POST" enctype="multipart/form-data" class="formAddAboutUs">
            @csrf
            @method('PUT')

            <!-- Hero About Us Section -->
            <div id="heroAboutUsSection" class="section-content">
                <div class="form-group">
                    <label for="titleHeroAboutUs">Title Hero About Us</label>
                    <input type="text" class="form-control" id="titleHeroAboutUs" name="titleHeroAboutUs" value="{{ $aboutUs->titleHeroAboutUs }}">
                </div>

                <div class="form-group w-100 mb-3">
                    <label for="blogContent">Content</label>
                    <textarea id="blogContent" name="subtitleHeroAboutUs" class="form-control" placeholder="Enter your content here">{{ $aboutUs->subtitleHeroAboutUs }}</textarea>
                </div>
            </div>

            <!-- Connect With Us Section -->
            <div id="aboutUsConnectWithUs" class="section-content">
                <div class="form-group d-flex">
                   <div>
                       <label for="picture">Upload Picture</label>
                       <input type="file" class="form-control-file mt-3" id="picture" name="picture">
                   </div>
                    <div>
                        <img src="{{ asset('storage/' . $aboutUs->picture) }}" alt="Picture" class="img-fluid mt-3" style="max-width: 200px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="titleConnect">Title</label>
                    <input type="text" class="form-control" id="titleConnect" name="titleConnect" value="{{ $aboutUs->titleConnect }}">
                </div>

                <div class="form-group">
                    <label for="descriptionConnect">Description</label>
                    <textarea id="descriptionConnect" name="descriptionConnect" class="form-control" placeholder="Enter a short description here">{{ $aboutUs->descriptionConnect }}</textarea>
                </div>

                <div class="form-group">
                    <label for="buttonTextConnect">Button Text</label>
                    <input type="text" class="form-control" id="buttonTextConnect" name="buttonTextConnect" value="{{ $aboutUs->buttonTextConnect }}">
                </div>

                <div class="form-group">
                    <label for="buttonLinkConnect">Button Link</label>
                    <input type="text" class="form-control" id="buttonLinkConnect" name="buttonLinkConnect" value="{{ $aboutUs->buttonLinkConnect }}">
                </div>
            </div>

            <!-- Submit button common for both sections -->
            <button type="submit" class="btn btn-primary mt-3">Save</button>
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

            const csrfToken = '{{ csrf_token() }}';

            ClassicEditor
                .create(document.querySelector('#blogContent'), {
                    ckfinder: {
                        uploadUrl: "{{ route('admin.updatePicture') }}?_token=" + csrfToken
                    },
                    toolbar: [
                        'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                        'blockQuote', 'imageUpload', 'insertTable', 'undo', 'redo'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
