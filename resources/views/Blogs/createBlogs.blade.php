@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/style.css">
<style>
    /* Additional styles for textarea and CKEditor */
    #blogContent,
    .ck-content {
        min-height: 300px; /* Adjust the height as needed */
    }
</style>
@endsection

@section('activePage')
@endsection

@section('content')
<h2 class="mb-5 pt-3 titleBlogs">Create Blogs</h2>

<form method="POST" action="{{ route('admin.createBlogPost') }}" enctype="multipart/form-data" class="w-100 p-0">
    @csrf

    <div class="form-group w-100 mb-3">
        <label for="titleOfBlog">Title</label>
        <input type="text" id="titleOfBlog" name="titleOfBlog" class="form-control" placeholder="Enter the title of your blog">
    </div>

    <div class="form-group w-100 mb-3">
        <label for="blogContent">Content</label>
        <textarea id="blogContent" name="content" class="form-control" placeholder="Enter your blog content here"></textarea>
    </div>

    <div class="form-group w-100 mb-3">
        <label for="picturePathBlog">Blog Picture</label>
        <input type="file" id="picturePathBlog" name="picturePathBlog" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const csrfToken = '{{ csrf_token() }}';

        ClassicEditor
            .create(document.querySelector('#blogContent'), {
                ckfinder: {
                    uploadUrl: "{{ route('admin.updatePicture') }}", // Remove the CSRF token from the URL
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Add CSRF token in the headers
                    },
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
