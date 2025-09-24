<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

use App\Models\Program;
class FrontController extends Controller
{
    // Home page
   public function index()
{
    $teamMembers = TeamMember::all();
    $programs = Program::latest()->get();

    return view('frontend.index', compact('programs', 'teamMembers'));
}

    // Team page
    public function team()
    {
        $teamMembers = TeamMember::all();
        return view('frontend.team', compact('teamMembers'));
    }

    // About page
    public function about()
    {
        $teamMembers = TeamMember::all();
        return view('frontend.about', compact('teamMembers'));
    }

    // Services page
    public function services()
    {
        return view('frontend.services');
    }

    // Blog page
    public function blog()
    {
        return view('frontend.blog');
    }

    // Contact page
    public function contact()
    {
        return view('frontend.contact');
    }

    // Features page
    public function features()
    {
        return view('frontend.features');
    }

    // Testimonial page
    public function testimonial()
    {
        return view('frontend.testimonial');
    }

    // Offer page
    public function offer()
    {
        return view('frontend.offer');
    }

    // FAQ page
    public function faqs()
    {
        return view('frontend.faqs');
    }

    // 404 page
    public function error404()
    {
        return view('frontend.404');
    }
       
    }


