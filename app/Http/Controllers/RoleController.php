<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    // Show the manage roles page
    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'super_admin') {
            abort(403, 'Unauthorized access');
        }

        $users = User::all();
        return view('dashboard.manage_roles', compact('users'));
    }

    // Update role
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

    // Update name
    public function editName(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'super_admin') {
            abort(403, 'Unauthorized access');
        }

        $targetUser = User::findOrFail($request->user_id);
        $targetUser->name = $request->name;
        $targetUser->save();

        return redirect()->back()->with('success', 'Name updated successfully!');
    }

    // Update permissions
    public function updatePermissions(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'super_admin') {
            abort(403, 'Unauthorized access');
        }

        $targetUser = User::findOrFail($request->user_id);

        // Define sections and actions
        $sections = ['blog', 'admins', 'events', 'home_content'];
        $actions = ['read', 'create', 'edit', 'delete'];

        // Get input
        $input = $request->input('permissions', []);

        // Normalize permissions (true/false)
        $permissions = [];
        foreach ($sections as $section) {
            foreach ($actions as $action) {
                $permissions[$section][$action] =
                    isset($input[$section][$action]) && $input[$section][$action] === 'on';
            }
        }

        $targetUser->permissions = $permissions; // saved as JSON
        $targetUser->save();

        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }

    // Delete user
    public function destroy(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'super_admin') {
            abort(403, 'Unauthorized access');
        }

        $targetUser = User::findOrFail($request->user_id);

        // Prevent deletion of super admin
        if ($targetUser->role === 'super_admin') {
            return redirect()->back()->with('success', 'Super admin cannot be deleted.');
        }

        $targetUser->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
