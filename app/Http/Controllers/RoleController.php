<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'super_admin') {
            abort(403, 'Unauthorized access');
        }

        $users = User::all();
        return view('dashboard.manage_roles', compact('users'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'super_admin') {
            abort(403, 'Unauthorized access');
        }

        $targetUser = User::findOrFail($request->user_id);
        $targetUser->role = $request->role;
        $targetUser->save();

        return redirect()->back()->with('success', 'Role updated successfully!');
    }
}
