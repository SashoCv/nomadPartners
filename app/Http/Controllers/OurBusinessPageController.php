<?php

namespace App\Http\Controllers;

use App\Models\OurBusinessPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OurBusinessPageController extends Controller
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
    public function show(OurBusinessPage $ourBusinessPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurBusinessPage $ourBusinessPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $ourBusinessPage = OurBusinessPage::find($id);
            $ourBusinessPage->title = $request->title;
            $ourBusinessPage->description = $request->description;

            if ($request->hasFile('image')) {
                Storage::disk('public')->put('BusinessPage', $request->file('image'));
                $name = Storage::disk('public')->put('BusinessPage', $request->file('image'));
                $ourBusinessPage->image = $name;
            }

            $ourBusinessPage->save();

            return redirect()->route('admin.forBusinessView')->with('success', 'Business page updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurBusinessPage $ourBusinessPage)
    {
        //
    }
}
