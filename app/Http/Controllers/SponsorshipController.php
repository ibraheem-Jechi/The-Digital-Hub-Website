<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorshipController extends Controller
{
    /**
     * Display public sponsors (frontend).
     */
    public function publicIndex()
    {
        $sponsorships = Sponsorship::all();
        return view('frontend.about', compact('sponsorships'));
    }
 public function publicSpon()
    {
        $sponsorships = Sponsorship::all();
        return view('frontend.features', compact('sponsorships'));
    }
    /**
     * Show form + table in dashboard UI.
     */
    public function ui()
    {
        $sponsorships = Sponsorship::all();
        return view('dashboard.ui', compact('sponsorships'));
    }

    /**
     * Display a list of sponsorships for dashboard (index route).
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();
        return view('dashboard.sponsorships.index', compact('sponsorships'));
    }

    /**
     * Store a new sponsorship.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'website_url' => 'required|url|max:255',
        ]);

        // Handle logo upload
        $logoPath = $request->file('logo')->store('sponsorships', 'public');

        Sponsorship::create([
            'description' => $request->description,
            'logo_url' => $logoPath,
            'website_url' => $request->website_url,
        ]);

        return redirect()->route('dashboard.ui')->with('success', 'Sponsorship added successfully.');
    }

    /**
     * Show the form for editing a sponsorship.
     */
    public function edit(int $id)
    {
        $sponsorship = Sponsorship::findOrFail($id);
        return view('dashboard.sponsorships.edit', compact('sponsorship'));
    }

    /**
     * Update a sponsorship.
     */
    public function update(Request $request, int $id)
    {
        $sponsorship = Sponsorship::findOrFail($id);

        $request->validate([
            'description' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'website_url' => 'required|url|max:255',
        ]);

        $data = [
            'description' => $request->description,
            'website_url' => $request->website_url,
        ];

        // Handle logo replacement
        if ($request->hasFile('logo')) {
            if ($sponsorship->logo_url && Storage::disk('public')->exists($sponsorship->logo_url)) {
                Storage::disk('public')->delete($sponsorship->logo_url);
            }

            $logoPath = $request->file('logo')->store('sponsorships', 'public');
            $data['logo_url'] = $logoPath;
        }

        $sponsorship->update($data);

        return redirect()->route('dashboard.ui')->with('success', 'Sponsorship updated successfully.');
    }

    /**
     * Delete a sponsorship.
     */
    public function destroy(int $id)
    {
        $sponsorship = Sponsorship::findOrFail($id);

        if ($sponsorship->logo_url && Storage::disk('public')->exists($sponsorship->logo_url)) {
            Storage::disk('public')->delete($sponsorship->logo_url);
        }

        $sponsorship->delete();

        return redirect()->route('dashboard.ui')->with('success', 'Sponsorship deleted successfully.');
    }
}