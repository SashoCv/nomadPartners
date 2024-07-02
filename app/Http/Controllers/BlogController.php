<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('Blogs.viewBlogs', compact('blogs'));
    }


    public function getBlogsApi()
    {
       try {
            $blogs = Blog::all();
            return response()->json($blogs);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['error' => 'Error fetching blogs']);
       }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Blogs.createBlogs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $blog = new Blog();
            $blog->titleOfBlog = $request->titleOfBlog;
            $blog->content = $request->content;
            $blog->save();

            return redirect()->route('admin.blogsView')->with('success', 'Blog created successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error creating blog');
        }
    }

    public function updatePicture(Request $request)
    {
        try {
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/uploads', $filename);

                $url = Storage::url($path);
                $msg = 'Image uploaded successfully';

                return response()->json([
                    'uploaded' => true,
                    'url' => $url,
                    'message' => $msg,
                ]);
            } else {
                return response()->json([
                    'uploaded' => false,
                    'error' => [
                        'message' => 'No file was uploaded.',
                    ]
                ]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => 'File upload error: ' . $e->getMessage(),
                ]
            ]);
        }
    }
    


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        try {
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
