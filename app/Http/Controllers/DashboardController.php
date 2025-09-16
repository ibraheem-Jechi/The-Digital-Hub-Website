<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // For now return a simple test view (we'll replace this with AdminLTE layout in Step 2)
        return view('dashboard.dashboard');
    }
}
