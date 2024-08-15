<?php

namespace App\Http\Controllers;

use App\Models\BusinessForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BusinessFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allBusinessForms = BusinessForm::all();
        return view('Business.index', compact('allBusinessForms'));
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
        try {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'company_name' => 'required',
                'message' => 'required',
            ]);

            $contactForm = new BusinessForm();
            $contactForm->first_name = $request->first_name;
            $contactForm->last_name = $request->last_name;
            $contactForm->email = $request->email;
            $contactForm->company_name = $request->company_name;
            $contactForm->phone_number = $request->phone_number;
            $contactForm->message = $request->message;
            $contactForm->save();


            return response()->json([
                'message' => 'Message sent successfully'
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessForm $forBusinessFrom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessForm $forBusinessFrom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessForm $forBusinessFrom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $business = BusinessForm::find($id);
            $business->delete();
            return redirect()->route('admin.forBusinessView')->with('success', 'Business submit deleted successfully.');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Error deleting business submit.');
        }
    }
}
