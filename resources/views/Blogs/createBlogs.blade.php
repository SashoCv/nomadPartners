@extends('layouts.main')

@section('style')
    <!-- Include Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <style>
        /* Additional styles for Summernote editor */
        #blogContent {
            min-height: 300px; /* Adjust the height as needed */
        }

        .note-editor .note-editable {
            min-height: 300px; /* Ensure it has enough space for text */
        }

        .note-editable img {
            max-width: 100%;
            height: auto;
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
    <!-- Include jQuery (required by Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Summernote editor
            $('#blogContent').summernote({
                height: 300, // Set editor height
                minHeight: 200, // Minimum height
                maxHeight: 500, // Maximum height
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname', ['Arial', 'Verdana', 'Times New Roman']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
                callbacks: {
                    onImageUpload: function(files) {
                        // Handle image upload when an image is selected
                        for (let i = 0; i < files.length; i++) {
                            uploadImage(files[i]);
                        }
                    }
                }
            });

            // Function to upload the image and insert it into Summernote
            function uploadImage(file) {
                const formData = new FormData();
                formData.append('file', file);

                // Send the image to the server
                fetch("{{ route('admin.updatePicture') }}?_token={{ csrf_token() }}", {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => response.json())  // Assuming server returns JSON with image URL
                    .then(result => {
                        if (result.url) {
                            $('#blogContent').summernote('insertImage', result.url);
                        } else {
                            console.error('Failed to upload image:', result.error || 'Unknown error.');
                        }
                    })
                    .catch(error => console.error('Image upload failed:', error));
            }
        });
    </script>
@endsection
