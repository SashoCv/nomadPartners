<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Contact.index');
    }

    public function getContactApi()
    {
        try {
            $contact = Contact::first();
            return response()->json($contact);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Error fetching contact']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $contact = new Contact();
            $contact->titleContact = $request->titleContact;
            $contact->subtitleContact = $request->subtitleContact;
            $contact->addressContact = $request->addressContact;
            $contact->phoneContact = $request->phoneContact;
            $contact->emailContact = $request->emailContact;
            $contact->workingHoursContact = $request->workingHoursContact;
            $contact->save();

            return redirect()->route('admin.contactViewForUpdate')->with('success', 'Contact page details saved successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        try{
            $contact = Contact::first();
            return view('Contact.edit', compact('contact'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $contact = Contact::find($id);
            $contact->titleContact = $request->titleContact;
            $contact->subtitleContact = $request->subtitleContact;
            $contact->addressContact = $request->addressContact;
            $contact->phoneContact = $request->phoneContact;
            $contact->emailContact = $request->emailContact;
            $contact->workingHoursContact = $request->workingHoursContact;
            $contact->save();

            return redirect()->route('admin.contactViewForUpdate')->with('success', 'Contact page details updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
