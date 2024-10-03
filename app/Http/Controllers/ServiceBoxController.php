<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ServiceBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceBoxController extends Controller
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
        $serviceBox = new ServiceBox();
        $serviceBox->title = $request->title;
        $serviceBox->description = $request->description;
        $serviceBox->service_id = $request->service_id;

        if($request->hasFile('iconForStore')) {
            Storage::disk('public')->put('service-boxes', $request->file('iconForStore'));
            $icon = Storage::disk('public')->put('service-boxes', $request->file('iconForStore'));

            $serviceBox->icon = $icon;
        }

        $serviceBox->save();

        return redirect()->back()->with('success', 'Service Box created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $serviceBox = ServiceBox::find($id);
        $contact = Contact::first('emailContact', 'phoneContact');

        return response()->json([
            'serviceBox' => $serviceBox,
            'contact' => $contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $serviceBox = ServiceBox::find($id);
        return view('ServiceBoxes.edit', compact('serviceBox'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $serviceBox = ServiceBox::find($id);
        $serviceBox->title = $request->title;
        $serviceBox->description = $request->description;

        if($request->hasFile('iconForEdit')) {
            Storage::disk('public')->put('service-boxes', $request->file('iconForEdit'));
            $icon = Storage::disk('public')->put('service-boxes', $request->file('iconForEdit'));

            $serviceBox->icon = $icon;
        }

        $serviceBox->save();

        return redirect()->back()->with('success', 'Service Box updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $serviceBox = ServiceBox::find($id);
        $serviceBox->delete();

        return redirect()->back()->with('success', 'Service Box deleted successfully');
    }
}
