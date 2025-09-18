<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users & Roles</title>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f9fafb; color: #374151; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 0.5rem 0.75rem; text-align: left; border: 1px solid #d1d5db; vertical-align: middle; }
        thead th { background-color: #f3f4f6; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; }
        tbody tr:hover { background-color: #f3f4f6; transition: 0.2s; }
        td select, td input[type="text"], td input[type="checkbox"] { margin: 0; font-size: 0.85rem; }
        button { font-size: 0.85rem; font-weight: 500; cursor: pointer; transition: 0.2s; }
        button:hover { opacity: 0.9; }
        .role-badge { padding: 0.2rem 0.5rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; color: #fff; display: inline-block; }
        .role-super_admin { background-color: #ef4444; }
        .role-admin { background-color: #3b82f6; }
        .role-editor { background-color: #6b7280; }
        td form { display: flex; align-items: center; gap: 0.25rem; }
        td input[type="text"], td select { padding: 0.25rem 0.5rem; border-radius: 0.25rem; border: 1px solid #d1d5db; outline: none; }
        td input[type="text"]:focus { border-color: #10b981; box-shadow: 0 0 0 2px rgba(16,185,129,0.3); }
        td select:focus { border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,0.3); }
        td div form table { font-size: 0.75rem; margin-top: 0.25rem; }
        td div form table th, td div form table td { padding: 0.25rem 0.5rem; }
        td div form table th { background-color: #e5e7eb; }
        button[type="submit"] { background-color: #3b82f6; color: #fff; padding: 0.25rem 0.5rem; border-radius: 0.25rem; border: none; }
        button[type="submit"]:hover { background-color: #2563eb; }
        .overflow-x-auto { overflow-x: auto; }
        .hidden { display: none; }
        .btn-delete { background-color:#ef4444; color:white; padding:0.25rem 0.5rem; border:none; border-radius:0.25rem; }
        .btn-delete:hover { background-color:#dc2626; }
    </style>
</head>
<body>
    <div class="p-6 bg-gray-50 min-h-screen">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Manage Users & Roles</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 mb-4 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300 shadow-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Set Role</th>
                        <th>Edit</th>
                        <th>Permissions</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="role-badge role-{{ $user->role }}">{{ ucfirst($user->role) }}</span>
                        </td>

                        <!-- Set Role -->
                        <td>
                            @if($user->role !== 'super_admin')
                            <form action="{{ url('/dashboard/manage-roles') }}" method="POST" class="flex space-x-2">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <select name="role">
                                    <option value="editor" {{ $user->role=='editor' ? 'selected' : '' }}>Editor</option>
                                    <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                <button type="submit">Set</button>
                            </form>
                            @endif
                        </td>

                        <!-- Edit Name -->
                        <td>
                            @if($user->role !== 'super_admin')
                            <button onclick="toggleEdit({{ $user->id }})">Edit</button>
                            <div id="edit-{{ $user->id }}" class="hidden mt-2">
                                <form action="{{ url('/dashboard/manage-roles/edit-name') }}" method="POST" class="flex space-x-2">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="text" name="name" value="{{ $user->name }}">
                                    <button type="submit">Save</button>
                                </form>
                            </div>
                            @endif
                        </td>

                        <!-- Permissions -->
                        <td>
                            @if($user->role !== 'super_admin')
                            <button onclick="togglePermissions({{ $user->id }})">Permissions</button>
                            <div id="perm-{{ $user->id }}" class="hidden mt-2 p-2 border rounded bg-gray-50 shadow-inner">
                                <form action="{{ url('/dashboard/manage-roles/permissions') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    @php
                                        $sections = ['blog','admins','events','home_content'];
                                        $actions = ['read','create','edit','delete'];
                                        $userPermissions = $user->permissions ?? [];
                                    @endphp

                                    <table class="w-full table-auto border-collapse border border-gray-300 text-sm">
                                        <thead>
                                            <tr>
                                                <th>Section</th>
                                                @foreach($actions as $action)
                                                    <th>{{ ucfirst($action) }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sections as $section)
                                            <tr>
                                                <td>{{ ucfirst(str_replace('_',' ',$section)) }}</td>
                                                @foreach($actions as $action)
                                                <td class="text-center">
                                                    <input type="checkbox" 
    name="permissions[{{ $section }}][{{ $action }}]"
    {{ isset($user->permissions[$section][$action]) && $user->permissions[$section][$action] ? 'checked' : '' }}>
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="mt-2">Save Permissions</button>
                                </form>
                            </div>
                            @endif
                        </td>

                        <!-- Delete User -->
                        <td>
                            @if($user->role !== 'super_admin')
                            <form action="{{ url('/dashboard/manage-roles/delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<script>
function toggleEdit(id) {
    document.getElementById('edit-'+id).classList.toggle('hidden');
}
function togglePermissions(id) {
    document.getElementById('perm-'+id).classList.toggle('hidden');
}
</script>
</body>
</html>
