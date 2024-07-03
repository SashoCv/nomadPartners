@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/style.css">
<style>
    .ck-editor__editable {
        min-height: 300px; /* Adjust height as needed */
    }
</style>
@endsection

@section('content')
<h2 class="mb-5 pt-3 titleBlogs">Edit Blog</h2>

<form method="POST" action="{{ route('admin.updateBlog', $blog->id) }}" enctype="multipart/form-data" class="w-100 p-0">
    @csrf
    @method('PUT')
    
    <div class="form-group w-100 mb-3">
        <label for="titleOfBlog">Title</label>
        <input type="text" id="titleOfBlog" name="titleOfBlog" class="form-control" value="{{ $blog->titleOfBlog }}" placeholder="Enter the title of your blog">
    </div>

    <div class="form-group w-100 mb-3">
        <label for="blogContent">Content</label>
        <textarea id="blogContent" name="content" class="form-control">{{ $blog->content }}</textarea>
    </div>

    <div class="form-group w-100 mb-3">
        <label for="picturePathBlog">Blog Picture</label>
        <input type="file" id="picturePathBlog" name="picturePathBlog" class="form-control-file">
        <div>
        @if ($blog->picturePathBlog)
            <img src="{{ asset('storage/' . $blog->picturePathBlog) }}" alt="Blog Picture" style="max-width: 100px; margin-top: 10px;">
        @endif
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#blogContent'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'blockQuote', 'imageUpload', 'insertTable', 'undo', 'redo'
                ],
                ckfinder: {
                    uploadUrl: "{{ route('admin.updatePicture') }}"
                },
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection
