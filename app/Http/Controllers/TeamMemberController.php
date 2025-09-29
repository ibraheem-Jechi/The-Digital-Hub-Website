<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Program; // added to fetch programs for frontend
use Illuminate\Support\Facades\Storage;
use App\Models\Workshop; 
use App\Models\Sponsorship;
class TeamMemberController extends Controller
{
    // ========================
    // DASHBOARD METHODS
    // ========================

    // List all team members (dashboard)
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('dashboard.team.index', compact('teamMembers'));
    }

    // Show form to create new member
    public function create()
    {
        return view('dashboard.team.create');
    }

    // Store new member
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team_photos', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('team.index')->with('success', 'Team member added successfully!');
    }

    // Show form to edit member
    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('dashboard.team.edit', compact('teamMember'));
    }

    // Update member
    public function update(Request $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('photo')) {
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            $data['photo'] = $request->file('photo')->store('team_photos', 'public');
        }

        $teamMember->update($data);

        return redirect()->route('team.index')->with('success', 'Team member updated successfully!');
    }

    // Delete member
    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);

        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }

        $teamMember->delete();

        return redirect()->route('team.index')->with('success', 'Team member deleted successfully!');
    }

    // ========================
    // FRONTEND METHODS
    // ========================

    // Frontend homepage
    public function frontendIndex()
    {
        $teamMembers = TeamMember::all();
        $programs = Program::latest()->get();
        $workshops = Workshop::latest()->get();
        $sponsorships=Sponsorship::latest()->get();
        return view('frontend.index', compact('teamMembers', 'programs', 'workshops','sponsorships'));
    }
      public function frontendteam()
    {
        $teamMembers = TeamMember::all();
        

        return view('frontend.team', compact('teamMembers', ));
    }


    // Frontend about page
    public function frontendAbout()
    {
        $teamMembers = TeamMember::all();
        $programs = Program::latest()->get();

        return view('frontend.about', compact('teamMembers', 'programs'));
    }
}
