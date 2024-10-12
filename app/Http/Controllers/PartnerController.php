<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Partner;
use App\Models\PartnerInfo;
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
       try {
            $partners = Partner::all();
            $items = PartnerInfo::first();
            return view('Partners.index', compact(['partners','items']));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
       }
    }

    public function getPartnersApi()
    {
        try {
            $partners = Partner::all();
            $partnerInfo = PartnerInfo::first();
            return response()->json([
                'partners' => $partners,
                'partnerPageInfo' => $partnerInfo
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['error' => 'Error fetching partners']);
        }
    }

    public function updatePartnersInfo(Request $request, $id)
    {
        $partnerInfo = PartnerInfo::where('id', $id)->first();

        $partnerInfo->title = $request->title;
        $partnerInfo->description = $request->description;

        $partnerInfo->save();

        return redirect()->route('admin.partnersView')->with('success', 'Blog updated successfully');
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
                $partner->logoName = $request->file('logoPathPartner')->getClientOriginalName() ?? "logo name";
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $partner = Partner::findOrFail($id);
            $partner->namePartner = $request->namePartner;
            $partner->linkPartner = $request->linkPartner;

            if ($request->hasFile('logoPathPartner')) {
                // Delete the old logo if it exists
                if ($partner->logoPath) {
                    Storage::disk('public')->delete($partner->logoPath);
                }

                $name = $request->file('logoPathPartner')->store('partners', 'public');
                $partner->logoPath = $name;
                $partner->logoName = $request->file('logoPathPartner')->getClientOriginalName() ?? "logo name";
            }

            $partner->save();
            return redirect()->route('admin.partnersView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
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
