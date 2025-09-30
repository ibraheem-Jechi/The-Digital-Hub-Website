<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('dashboard.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'feature_1_icon' => 'nullable|string|max:255',
            'feature_1_title' => 'nullable|string|max:255',
            'feature_1_description' => 'nullable|string',
            'feature_2_icon' => 'nullable|string|max:255',
            'feature_2_title' => 'nullable|string|max:255',
            'feature_2_description' => 'nullable|string',
            'feature_3_icon' => 'nullable|string|max:255',
            'feature_3_title' => 'nullable|string|max:255',
            'feature_3_description' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about', 'public');
        }

        About::create($data);

        return redirect()->route('about.index')->with('success', 'About section created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('dashboard.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'feature_1_icon' => 'nullable|string|max:255',
            'feature_1_title' => 'nullable|string|max:255',
            'feature_1_description' => 'nullable|string',
            'feature_2_icon' => 'nullable|string|max:255',
            'feature_2_title' => 'nullable|string|max:255',
            'feature_2_description' => 'nullable|string',
            'feature_3_icon' => 'nullable|string|max:255',
            'feature_3_title' => 'nullable|string|max:255',
            'feature_3_description' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($data);

        return redirect()->route('about.index')->with('success', 'About section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('about.index')->with('success', 'About section deleted!');
    }
}
