@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/styleHomePage.css">

<style>
    .formAddContactPage .form-group {
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
    <h2 class="mb-5 pt-3 titleBlogs">Edit Contact Page</h2>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#contactInfoSection">Contact Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#workingHoursSection">Working Hours</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="{{ route('admin.contactUpdate', $contact->id) }}" method="POST" enctype="multipart/form-data" class="formAddContactPage">
        @csrf
        @method('PUT')

        <div id="contactInfoSection" class="section-content">
            <h2 class="section-heading">Contact Information Section</h2>
            <div class="form-group">
                <label for="titleContact">Title Contact</label>
                <input type="text" class="form-control" id="titleContact" name="titleContact" value="{{ $contact->titleContact }}">
            </div>

            <div class="form-group">
                <label for="subtitleContact">Subtitle Contact</label>
                <input type="text" class="form-control" id="subtitleContact" name="subtitleContact" value="{{ $contact->subtitleContact }}">
            </div>

            <div class="form-group">
                <label for="addressContact">Address Contact</label>
                <input type="text" class="form-control" id="addressContact" name="addressContact" value="{{ $contact->addressContact }}">
            </div>

            <div class="form-group">
                <label for="phoneContact">Phone Contact</label>
                <input type="text" class="form-control" id="phoneContact" name="phoneContact" value="{{ $contact->phoneContact }}">
            </div>

            <div class="form-group">
                <label for="emailContact">Email Contact</label>
                <input type="email" class="form-control" id="emailContact" name="emailContact" value="{{ $contact->emailContact }}">
            </div>
        </div>

        <div id="workingHoursSection" class="section-content">
            <h2 class="section-heading">Working Hours Section</h2>
            <div class="form-group">
                <label for="workingHoursContact">Working Hours Contact</label>
                <input type="text" class="form-control" id="workingHoursContact" name="workingHoursContact" value="{{ $contact->workingHoursContact }}">
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
