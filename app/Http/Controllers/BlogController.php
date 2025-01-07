<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use App\Models\BlogPage;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $language = Auth::user()->language_id;
            $blogs = Blog::with('user')->where('language_id', $language)->paginate(8);
            $items = BlogPage::where('language_id', $language)->first();

            return view('Blogs.viewBlogs', compact(['blogs', 'items']));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error fetching blogs');
        }
    }


    public function getBlogsApi(Request $request)
    {
        try {
            $language = $request->language;
            $language_id = Language::where('name', $language)->first()->id;
            $blogs = Blog::with('user')->where('language_id', $language_id)->paginate(8);
            $items = BlogPage::where('language_id', $language_id)->first();

            return response()->json([
                'blogs' => $blogs,
                'items' => $items
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['error' => 'Error fetching blogs']);
        }
    }

    public function getBlogApi($id)
    {
        try {
            $blog = Blog::with('user')->find($id);
            return response()->json($blog);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['error' => 'Error fetching blog']);
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
            $blog->user_id = Auth::user()->id;
            $blog->language_id = Auth::user()->language_id;

            if ($request->hasFile('picturePathBlog')) {
                Storage::disk('public')->put('blogs', $request->file('picturePathBlog'));
                $name = Storage::disk('public')->put('blogs', $request->file('picturePathBlog'));
                $blog->picturePathBlog = $name;
                $blog->pictureNameBlog = $request->file('picturePathBlog')->getClientOriginalName();
            }

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
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('uploads/blog_images', 'public'); // Чувај слика во storage

                return response()->json(['url' => asset('storage/' . $path)], 200);
            }

            return response()->json(['error' => 'No file uploaded'], 400);
        } catch (\Exception $e) {
            // Додади логирање за дебагирање
            \Log::error('Error uploading image: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
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
    public function edit($id)
    {
        try {
            $blog = Blog::find($id);
            return view('Blogs.editBlog', compact('blog'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error editing blog');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $blog = Blog::find($id);
            $blog->titleOfBlog = $request->titleOfBlog;
            $blog->content = $request->content;
            $blog->user_id = Auth::user()->id;


            if ($request->hasFile('picturePathBlog')) {
                Storage::disk('public')->put('blogs', $request->file('picturePathBlog'));
                $name = Storage::disk('public')->put('blogs', $request->file('picturePathBlog'));
                $blog->picturePathBlog = $name;
                $blog->pictureNameBlog = $request->file('picturePathBlog')->getClientOriginalName();
            }


            $blog->save();
            return redirect()->route('admin.blogsView')->with('success', 'Blog updated successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error updating blog');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $blog = Blog::find($id);
            $blog->delete();
            return redirect()->route('admin.blogsView')->with('success', 'Blog deleted successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error deleting blog');
        }
    }
}
