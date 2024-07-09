@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/style.css">

<style>
    .btnBlogsEdit {
        margin: 0px;
        padding: 5px 10px;
        border: none;
        text-decoration: none;
        color: #fff;
        background-color: #333;
        border-radius: 6px;
        transition: all 0.3s;
    }

    .btnBlogsEdit:hover {
        background-color: #444444;
        color: #fff;
    }

    .blog-thumbnail {
        max-width: 100px;
        /* Adjust the maximum width as per your design */
        height: auto;
        display: block;
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
<h2 class="mb-5 pt-3 titleBlogs">Blogs</h2>

<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>
                @if($blog->picturePathBlog)
                <div style="width: 150px; height: 150px">
                    <img src="{{ asset('storage/' . $blog->picturePathBlog) }}" alt="Blog Image" class="blog-thumbnail" style="width: 100%;">
                </div>
                @else
                <span>No Image</span>
                @endif
            </td>
            <td>{{ $blog->titleOfBlog }}</td>
            <td>{{ $blog->user->email }}</td>
            <td>{{ $blog->deleted_at ? 'Inactive' : 'Active' }}</td>
            <td>{{ $blog->created_at->format('F j, Y') }}</td>
            <td>
                <a href="{{ route('admin.editBlogPost', $blog->id) }}" class="btnBlogsEdit">Edit</a>
                <form action="{{ route('admin.deleteBlogPost', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');" class="m-0 p-0" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnBlogsEdit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection