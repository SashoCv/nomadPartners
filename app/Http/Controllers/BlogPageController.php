<?php

namespace App\Http\Controllers;

use App\Models\BlogPage;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPage $blogPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPage $blogPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $blogPage = BlogPage::find($id);
            $blogPage->title = $request->title;
            $blogPage->description = $request->description;

            $blogPage->save();
            return redirect()->back()->with('success', 'Blog page updated successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error updating blog page');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPage $blogPage)
    {
        //
    }
}
