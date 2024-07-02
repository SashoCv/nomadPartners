<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('blogs.viewBlogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.createBlogs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        try {
            $blog = new Blog();
            $blog->titleOfBlog = $request->titleOfBlog;
            $blog->contentOfBlog = $request->contentOfBlog;
            $blog->blog_category_id = $request->blog_category_id ?? null;
            $blog->pictureOfBlogPath = storage_path('app/public/blogs/' . $request->pictureOfBlog);
            $blog->pictureOfBlog = $request->pictureOfBlog->getClientOriginalName();
            $blog->save();

            return redirect()->route('admin.blogsView')->with('success', 'Blog created successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error creating blog');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        try{
            return view('blogs.showBlog', compact('blog'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error showing blog');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        try {
            $blog->update($request->all());
            return redirect()->route('admin.blogsView')->with('success', 'Blog updated successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error updating blog');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            return redirect()->route('admin.blogsView')->with('success', 'Blog deleted successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error deleting blog');
        }
    }
}
