<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
    // Frontend: show workshops in blog page
    public function workshops()
    {
        $workshops = Workshop::latest()->get();
        return view('frontend.blog', compact('workshops'));
    }

    // Dashboard: list all workshops
    public function index()
    {
        $workshops = Workshop::all();
        return view('dashboard.workshops', compact('workshops'));
    }

    // Show form to create a new workshop
    public function create()
    {
        return view('dashboard.workshops-create');
    }

    // Store a new workshop
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'program_id' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $workshop = new Workshop();
        $workshop->title = $request->title;
        $workshop->description = $request->description;
        $workshop->event_date = $request->event_date;
        $workshop->program_id = $request->program_id;

        if ($request->hasFile('image')) {
            $workshop->image = $request->file('image')->store('workshops', 'public');
        }

        $workshop->save();

        return redirect()->route('workshops.index')->with('success', 'Workshop created successfully.');
    }

    // Show form to edit a workshop
    public function edit($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('dashboard.workshops-edit', compact('workshop'));
    }

    // Update a workshop
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'program_id' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $workshop = Workshop::findOrFail($id);
        $workshop->title = $request->title;
        $workshop->description = $request->description;
        $workshop->event_date = $request->event_date;
        $workshop->program_id = $request->program_id;

        if ($request->hasFile('image')) {
            if ($workshop->image) {
                Storage::disk('public')->delete($workshop->image);
            }
            $workshop->image = $request->file('image')->store('workshops', 'public');
        }

        $workshop->save();

        return redirect()->route('workshops.index')->with('success', 'Workshop updated successfully.');
    }

    // Delete a workshop
    public function destroy($id)
    {
        $workshop = Workshop::findOrFail($id);
        if ($workshop->image) {
            Storage::disk('public')->delete($workshop->image);
        }
        $workshop->delete();
        return redirect()->route('workshops.index')->with('success', 'Workshop deleted successfully.');
    }
}
