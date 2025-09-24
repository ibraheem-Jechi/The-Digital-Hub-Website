<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsorship; // <- import the model

class FrontController extends Controller
{
    public function index()
    {
        // Fetch all sponsorships
        $sponsorships = Sponsorship::all();

        // Pass sponsorships to the view
        return view("frontend.index", compact('sponsorships'));
    }
}

