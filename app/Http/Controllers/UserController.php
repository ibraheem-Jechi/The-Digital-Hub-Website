<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show Add User page
    public function create()
    {
        $user = Auth::user();
        if ($user->email !== 'bob@gmail.com') {
            abort(403, 'Unauthorized access');
        }

        return view('dashboard.forms');
    }

    // Store new user
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->email !== 'bob@gmail.com') {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:admin,editor',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User created successfully!');
    }
}
