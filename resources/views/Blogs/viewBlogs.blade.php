@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/styleHomePage.css">

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

    <!-- Table for listing titles and descriptions -->
    <table class="table mb-4">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($items)
            <tr>
                <td>{{ $items->title }}</td>
                <td>{{ $items->description }}</td>
                <td>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#editItemModal"
                            data-id="{{ $items->id }}"
                            data-title="{{ $items->title }}"
                            data-description="{{ $items->description }}">
                        Edit
                    </button>
                </td>
            </tr>
        @endif
        </tbody>
    </table>

    <!-- Modal for editing title and description -->
    <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editItemForm" method="POST" action="{{ route('admin.updateBlogPage', $items->id) }}" class="formAddHomePage">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editItemTitle">Title</label>
                            <input type="text" class="form-control" id="editItemTitle" name="title" value="{{ $items->title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="editItemDescription">Description</label>
                            <textarea class="form-control" id="editItemDescription" name="description" rows="4">{{ $items->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 mt-3 w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
