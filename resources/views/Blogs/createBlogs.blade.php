@extends('layouts.main')

@section('activePage')
@endsection

@section('style')
<style>
    .formBlogs {
        gap: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<h2 class="mb-5 pt-3">Create Blogs</h2>

<form method="POST" action="{{ route('admin.createBlogPost') }}" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
        <textarea id="blogContent" name="content" class="form-control" placeholder="Enter your blog content here"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#blogContent'), {
                ckfinder: {
                    uploadUrl: ''
                },
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'blockQuote', 'imageUpload', 'insertTable', 'undo', 'redo', 'fontSize'
                ],
                fontSize: {
                    options: ['tiny', 'small', 'default', 'big', 'huge'],
                    supportAllValues: true
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection
