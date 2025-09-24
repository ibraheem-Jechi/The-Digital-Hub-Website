<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
class FrontController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('frontend.index', compact('programs'));
    }

}
