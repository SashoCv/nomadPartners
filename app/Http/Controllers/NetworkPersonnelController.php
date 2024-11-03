<?php

namespace App\Http\Controllers;

use App\Models\CartsNetworkPersonnel;
use App\Models\NetworkPersonnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NetworkPersonnelController extends Controller
{
    public function getNetworkPersonnelApi()
    {
        try {
            $network = NetworkPersonnel::first();
            $carts = CartsNetworkPersonnel::where('network_personnel_id', $network->id)->get();

            return response()->json([
                'message' => 'Network Personnel retrieved successfully',
                'network' => $network,
                'carts' => $carts
            ]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $network = NetworkPersonnel::first();
        $carts = CartsNetworkPersonnel::where('network_personnel_id', $network->id)->get();
        return view('NetworkPersonnel.index', compact(['network', 'carts']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateCarts(Request $request, $id)
    {
        try {
            $carts = CartsNetworkPersonnel::find($id);

            $carts->title = $request->title;
            $carts->description = $request->description;

            if($request->hasFile('icon')) {
                Storage::disk('public')->put('network', $request->file('icon'));
                $name = Storage::disk('public')->put('network', $request->file('icon'));
                $carts->icon = $name;
            }

            $carts->save();

            return redirect()->route('admin.networkPersonnelView')->with('success', 'Cart updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.networkPersonnelView')->with('error', 'Something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addCarts(Request $request)
    {
        try {
            $carts = new CartsNetworkPersonnel();
            $carts->network_personnel_id = $request->network_personnel_id;
            $carts->title = $request->title;
            $carts->description = $request->description;

            if($request->hasFile('icon')) {
                Storage::disk('public')->put('network', $request->file('icon'));
                $name = Storage::disk('public')->put('network', $request->file('icon'));
                $carts->icon = $name;
            }

            $carts->save();

            return redirect()->route('admin.networkPersonnelView')->with('success', 'Cart added successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.networkPersonnelView')->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NetworkPersonnel $networkPersonnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NetworkPersonnel $networkPersonnel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $network = NetworkPersonnel::find($id);

        $network->title = $request->title;
        $network->description = $request->description;
        $network->subtitle = $request->subtitle;
        $network->testimonial_title = $request->testimonial_title;
        $network->testimonial_description = $request->testimonial_description;
        $network->carts_title = $request->carts_title;
        $network->button_text = $request->button_text;
        $network->button_link = $request->button_link;

        if ($request->hasFile('image')) {
            Storage::disk('public')->put('network', $request->file('image'));
            $name = Storage::disk('public')->put('network', $request->file('image'));
            $network->image = $name;
        }

        $network->save();

        return redirect()->route('admin.networkPersonnelView')->with('success', 'Network Personnel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $carts = CartsNetworkPersonnel::find($id);
            $network_personnel_id = $carts->network_personnel_id;

            $countCarts = CartsNetworkPersonnel::where('network_personnel_id', $network_personnel_id)->count();

            if($countCarts > 3) {
                $carts->delete();
                return redirect()->route('admin.networkPersonnelView')->with('success', 'Cart deleted successfully');
            } else {
                return redirect()->route('admin.networkPersonnelView')->with('error', 'You can not delete this cart');
            }

        } catch (\Exception $e) {
            return redirect()->route('admin.networkPersonnelView')->with('error', 'Something went wrong');
        }
    }
}
