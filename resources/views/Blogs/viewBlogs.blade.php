@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/style.css">
@endsection

@section('content')
<h2 class="mb-5 pt-3 titleBlogs">Blogs</h2>

<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col" style="width: 40%;">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td style="width: 40%;">{{ $blog->titleOfBlog }}</td>
                <td>{{ $blog->deleted_at ? 'Inactive' : 'Active' }}</td>
                <td>{{ $blog->created_at->format('F j, Y') }}</td>
                <td class="d-flex align-items-center">
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
