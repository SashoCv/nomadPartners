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

    <form action="{{ route('admin.contactPost') }}" method="POST" enctype="multipart/form-data" class="formAddContact">
        @csrf
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
            <label for="descriptionContact">Description</label>
            <textarea class="form-control" id="descriptionContact" name="descriptionContact"></textarea>
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

        <button type="submit" class="btn btn-primary mb-3 w-50">Save</button>
    </form>
</div>
@endsection
