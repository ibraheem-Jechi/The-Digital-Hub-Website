<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Footer;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data including reCAPTCHA
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'project' => ['nullable', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'g-recaptcha-response' => ['required', 'captcha'], // reCAPTCHA validation
        ]);

        // Save the contact message
        Contact::create($data);

        return back()->with('success', 'Message submitted successfully.');
    }

    // Admin view of messages
    public function adminIndex()
    {
        $messages = Contact::latest()->paginate(20);
        return view('dashboard.error', compact('messages'));
    }

    // Frontend contact page
    public function contact()
    {
        $footer = Footer::first(); 
        $messages = Contact::latest()->paginate(20);
        return view('frontend.contact', compact('messages', 'footer'));
    }
}
