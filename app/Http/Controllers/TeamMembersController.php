<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Team;
use App\Models\TeamMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $language_id = Auth::user()->language_id;
            $team_members = TeamMembers::orderBy('order', 'asc')->get();
            $items = Team::where('language_id', $language_id)->first();
            return view('TeamMembers.index', compact(['team_members', 'items']));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * API to get all team members.
     */
    public function getTeamMembersApi(Request $request)
        {
        try {
            $language = $request->language;
            $language_id = Language::where('name', $language)->first()->id;
            $team_page = Team::where('language_id', $language_id)->first();
            $team_members = TeamMembers::orderBy('order', 'asc')->get();
            return response()->json([
                'team_page' => $team_page,
                'team_members' => $team_members
            ]);
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

            if(! $request->order) {
                $orderTeamMember = TeamMembers::orderBy('order', 'desc')->first();
                $team_member->order = $orderTeamMember->order + 1;
            } else {
                $team_member->order = $request->order;
            }

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
