@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/styleContactPage.css">

<style>
.formAddContact .form-group {
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
    <h2 class="mb-5 pt-3 titleBlogs">Create Contact Page</h2>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#contactSection">Contact Section</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action=" {{ route('admin.contactPost') }}" method="POST" enctype="multipart/form-data" class="formAddContact">
        @csrf
        <div id="contactSection">
            <h2 class="section-heading">Contact Section</h2>
            <div class="form-group">
                <label for="titleContact">Title</label>
                <input type="text" class="form-control" id="titleContact" name="titleContact">
            </div>

            <div class="form-group">
                <label for="subtitleContact">Subtitle</label>
                <input type="text" class="form-control" id="subtitleContact" name="subtitleContact">
            </div>

            <div class="form-group">
                <label for="addressContact">Address</label>
                <input type="text" class="form-control" id="addressContact" name="addressContact">
            </div>

            <div class="form-group">
                <label for="phoneContact">Phone</label>
                <input type="text" class="form-control" id="phoneContact" name="phoneContact">
            </div>

            <div class="form-group">
                <label for="emailContact">Email</label>
                <input type="email" class="form-control" id="emailContact" name="emailContact">
            </div>

            <div class="form-group">
                <label for="workingHoursContact">Working Hours</label>
                <input type="text" class="form-control" id="workingHoursContact" name="workingHoursContact">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3 w-50">Submit</button>
    </form>
</div>
@endsection
