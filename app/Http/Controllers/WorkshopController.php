<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
    // Display all workshops
    public function index()
    {
        $workshops = Workshop::all();
        return view('workshops.index', compact('workshops'));
    }

    // Show form to create a new workshop
    public function create()
    {
        return view('workshops.create');
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

    // Show a single workshop
    public function show($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('workshops.show', compact('workshop'));
    }

    // Show form to edit a workshop
    public function edit($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('workshops.edit', compact('workshop'));
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
            // Delete old image if exists
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

        // Delete image if exists
        if ($workshop->image) {
            Storage::disk('public')->delete($workshop->image);
        }

        $workshop->delete();

        return redirect()->route('workshops.index')->with('success', 'Workshop deleted successfully.');
    }
}
