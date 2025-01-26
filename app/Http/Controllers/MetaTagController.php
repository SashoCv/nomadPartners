<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\MetaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MetaTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metaTags = MetaTag::with(['page', "keywords"])->get();
        return view('MetaTags.index', compact('metaTags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function metaTagsApi()
    {
        $metaTags = MetaTag::with(['page', "keywords"])->get();
        return response()->json($metaTags);
    }

    public function showMetaTagApi(Request $request, $id)
    {
        $language = $request->language;
        $language_id = Language::where('name', $language)->first()->id;
        $metaTags = MetaTag::with(['page', "keywords"])
            ->where('language_id', $language_id)
            ->where('page_id', $id)
            ->first();

        return response()->json($metaTags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $keywords = explode(',', $request->keywords);

        $metaTag = MetaTag::create([
            'page_id' => $request->page_id,
            'meta_title' => $request->title,
            'meta_description' => $request->description,
            'meta_cannonical_link' => $request->meta_cannonical_link,
        ]);

        foreach ($keywords as $keyword) {
            $metaTag->keywords()->create([
                'keyword' => $keyword,
            ]);
        }

        return redirect()->route('admin.metaTags')->with('success', 'Meta Tag created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($pageId)
    {
        $metaTag = MetaTag::with('keywords')->where('page_id', $pageId)
            ->where('language_id', Auth::user()->language_id)
            ->first();
        return response()->json([
            'meta_tag' => $metaTag,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetaTag $metaTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $metaTag = MetaTag::find($id);
        $metaTag->update([
            'meta_title' => $request->title,
            'meta_description' => $request->description,
            'meta_cannonical_link' => $request->meta_cannonical_link,
        ]);

        $metaTag->keywords()->delete();

        $keywords = explode(',', $request->keywords);

        foreach ($keywords as $keyword) {
            $metaTag->keywords()->create([
                'keyword' => $keyword,
            ]);
        }

        return redirect()->route('admin.metaTags')->with('success', 'Meta Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetaTag $metaTag)
    {
        //
    }
}
