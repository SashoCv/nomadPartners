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
</style>
@endsection

@section('content')
<h2 class="mb-5 pt-3 titleBlogs">Blogs</h2>

<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col" style="width: 30%;">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td style="width: 30%;">{{ $blog->titleOfBlog }}</td>
                <td style="width: 25%;">{{ $blog->user->email }}</td>
                <td style="width: 15%;">{{ $blog->deleted_at ? 'Inactive' : 'Active' }}</td>
                <td style="width: 15%;">{{ $blog->created_at->format('F j, Y') }}</td>
                <td class="d-flex align-items-center" style="width: 15%;">
                    <a href="{{ route('admin.editBlogPost', $blog->id) }}" class="btnBlogsEdit">Edit</a>
                    <form action="{{ route('admin.deleteBlogPost', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');" class="m-0">
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
