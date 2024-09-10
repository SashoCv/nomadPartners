<?php

namespace App\Http\Controllers;

use App\Models\BoxAboutUs;
use Illuminate\Http\Request;

class BoxAboutUsController extends Controller
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
        $boxAboutUs = new BoxAboutUs();
        $boxAboutUs->about_us_id = $request->input('about_us_id');
        $boxAboutUs->titleBoxAboutUs = $request->input('titleBoxAboutUs');

        $boxAboutUs->save();

        return redirect()->route('admin.aboutUsViewForUpdate')->with('success', 'Box about us created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BoxAboutUs $boxAboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoxAboutUs $boxAboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoxAboutUs $boxAboutUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoxAboutUs $boxAboutUs)
    {
        //
    }
}
