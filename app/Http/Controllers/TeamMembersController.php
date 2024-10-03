<?php

namespace App\Http\Controllers;

use App\Models\TeamMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $team_members = TeamMembers::oderBy('order', 'asc')->get();
            return view('TeamMembers.index', compact('team_members'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * API to get all team members.
     */
    public function getTeamMembersApi()
        {
        try {
            $team_members = TeamMembers::orderBy('order', 'asc')->get();
            return response()->json($team_members);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['error' => 'Error fetching team members']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $team_member = new TeamMembers();
            $team_member->full_name = $request->full_name;
            $team_member->position = $request->position;
            $team_member->description = $request->description;
            $team_member->order = $request->order;

            if ($request->hasFile('imagePath')) {
                $name = Storage::disk('public')->put('team_members', $request->file('imagePath'));
                $team_member->imagePath = $name;
                $team_member->imageName = $request->file('imagePath')->getClientOriginalName() ?? "image name";
            }

            $team_member->save();
            return redirect()->route('admin.teamMembersView');
        } catch (\Exception $e) {
            dd($e);
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMembers $team_member)
    {
        try {
            return view('TeamMembers.show', compact('team_member'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMembers $team_member)
    {
        try {
            return view('TeamMembers.edit', compact('team_member'));
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
            $team_member = TeamMembers::findOrFail($id);
            $team_member->full_name = $request->full_name;
            $team_member->position = $request->position;
            $team_member->description = $request->description;
            $team_member->order = $request->order;

            if ($request->hasFile('imagePath')) {
                // Delete the old image if it exists
                if ($team_member->imagePath) {
                    Storage::disk('public')->delete($team_member->imagePath);
                }

                $name = Storage::disk('public')->put('team_members', $request->file('imagePath'));
                $team_member->imagePath = $name;
                $team_member->imageName = $request->file('imagePath')->getClientOriginalName() ?? "image name";
            }

            $team_member->save();
            return redirect()->route('admin.teamMembersView');
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
        try {
            $team_member = TeamMembers::findOrFail($id);

            if ($team_member->imagePath) {
                Storage::disk('public')->delete($team_member->imagePath);
            }

            $team_member->delete();
            return redirect()->route('admin.teamMembersView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
