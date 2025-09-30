<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.Sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'video_link' => 'nullable|url',
            'background_image' => 'required|image|max:2048',
        ]);

        if($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')->store('sliders', 'public');
        }

        Slider::create($data);

        return redirect()->route('sliders.index')->with('success', 'Slider added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'video_link' => 'nullable|url',
            'background_image' => 'nullable|image|max:2048',
        ]);

        if($request->hasFile('background_image')) {
            // Delete old image
            if ($slider->background_image && Storage::disk('public')->exists($slider->background_image)) {
                Storage::disk('public')->delete($slider->background_image);
            }
            $data['background_image'] = $request->file('background_image')->store('sliders', 'public');
        }

        $slider->update($data);

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        // Delete background image
        if ($slider->background_image && Storage::disk('public')->exists($slider->background_image)) {
            Storage::disk('public')->delete($slider->background_image);
        }

        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully');
    }
}
