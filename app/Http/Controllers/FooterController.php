<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    /**
     * Show dashboard action page
     */
    public function action()
    {
        return view('dashboard.footeraction');
    }

    /**
     * Show footer view page
     */
    public function index()
    {
        $footer = Footer::first();  // Retrieve the first footer record
        return view('dashboard.footer.view', compact('footer'));
    }

    /**
     * Show footer edit page
     */
    public function edit()
    {
        $footer = Footer::first();  // Retrieve the first footer record
        return view('dashboard.footer.edit', compact('footer'));
    }

    /**
     * Update or create footer
     */
    public function update(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
        ]);

        // Ensure a footer record exists and update it
        Footer::updateOrCreate(
            ['id' => 1],  // enforce only one footer row
            $validated
        );

        // Redirect with a success message
        return redirect()
            ->route('dashboard.footer.view')
            ->with('success', 'Footer saved successfully!');
    }
}
