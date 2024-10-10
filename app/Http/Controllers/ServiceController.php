<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use App\Models\ServiceBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::first();
        if($services){
            $servicesBoxes = ServiceBox::where('service_id', $services->id)->get();
        } else {
            $servicesBoxes = [];
        }
        return view('Services.index', compact(['services', 'servicesBoxes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getServicesApi()
    {
        $services = Service::with('serviceBoxes')->first();
        $contactInfo = Contact::first(['phoneContact', 'emailContact']);
        return response()->json([$services, $contactInfo]);
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
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->hasFile('image')) {
            $name = Storage::disk('public')->put('services', $request->file('image'));
            $service->image = $name;
        }

        $service->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
