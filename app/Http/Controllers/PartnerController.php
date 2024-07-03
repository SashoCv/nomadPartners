<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('Partners.index', compact('partners'));
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
        try{
            $homeId = Home::first()->id;
            $partner = new Partner();
            $partner->namePartner = $request->namePartner;
            $partner->linkPartner = $request->linkPartner;
            $partner->home_id = $homeId;
                        
            if ($request->hasFile('logoPathPartner')) {
                Storage::disk('public')->put('partners', $request->file('logoPathPartner'));
                $name = Storage::disk('public')->put('partners', $request->file('logoPathPartner'));
                $partner->logoPath = $name;
                $partner->logoName = $request->file('logoPathPartner')->getClientOriginalName();
            }

            $partner->save();
            return redirect()->route('admin.partnersView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $partner = Partner::find($id);
            $partner->delete();
            return redirect()->route('admin.partnersView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
