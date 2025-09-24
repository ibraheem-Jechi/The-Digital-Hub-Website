<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorshipController extends Controller
{

public function publicIndex()
{
    $sponsorships = Sponsorship::all();
    return view('frontend.sponsors', compact('sponsorships'));
}


    // Show form + table in one page (ui.blade.php)
    public function ui()
    {
        $sponsorships = Sponsorship::all();
        return view('dashboard.ui', compact('sponsorships'));
    }

    // Store a new sponsorship
    public function store(Request $request)
    {
        $request->validate([
            'description'  => 'required|string|max:255',
            'logo'         => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'website_url'  => 'required|url|max:255',
        ]);

        // Handle image upload
        $logoPath = $request->file('logo')->store('sponsorships', 'public');

        Sponsorship::create([
            'description'  => $request->description,
            'logo_url'     => $logoPath, // store path in DB
            'website_url'  => $request->website_url,
        ]);

        return redirect()->route('dashboard.ui')->with('success', 'Sponsorship added successfully.');
    }

    // Edit sponsorship (opens in edit page)
    public function edit(string $id)
    {
        $sponsorship = Sponsorship::findOrFail($id);
        return view('dashboard.sponsorships.edit', compact('sponsorship'));
    }

    // Update sponsorship
    public function update(Request $request, string $id)
    {
        $sponsorship = Sponsorship::findOrFail($id);

        $request->validate([
            'description'  => 'required|string|max:255',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'website_url'  => 'required|url|max:255',
        ]);

        $data = [
            'description'  => $request->description,
            'website_url'  => $request->website_url,
        ];

        // If new logo uploaded, replace old one
        if ($request->hasFile('logo')) {
            // delete old logo if exists
            if ($sponsorship->logo_url && Storage::disk('public')->exists($sponsorship->logo_url)) {
                Storage::disk('public')->delete($sponsorship->logo_url);
            }

            $logoPath = $request->file('logo')->store('sponsorships', 'public');
            $data['logo_url'] = $logoPath;
        }

        $sponsorship->update($data);

        return redirect()->route('dashboard.ui')->with('success', 'Sponsorship updated successfully.');
    }

    // Delete sponsorship
    public function destroy(string $id)
    {
        $sponsorship = Sponsorship::findOrFail($id);

        // Delete logo file if exists
        if ($sponsorship->logo_url && Storage::disk('public')->exists($sponsorship->logo_url)) {
            Storage::disk('public')->delete($sponsorship->logo_url);
        }

        $sponsorship->delete();

        return redirect()->route('dashboard.ui')->with('success', 'Sponsorship deleted successfully.');
    }
}
