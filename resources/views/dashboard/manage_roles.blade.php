@extends('layouts.backend')

@section('content')
<div class="flex flex-col min-h-screen">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Manage Users & Roles</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Users & Roles Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300 shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Set Role</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Edit</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Permissions</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Delete</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $index => $user)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $user->role == 'super_admin' ? 'bg-red-500 text-white' : ($user->role == 'admin' ? 'bg-blue-500 text-white' : 'bg-gray-400 text-white') }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        @if($user->role !== 'super_admin')
                        <form action="{{ url('/dashboard/manage-roles') }}" method="POST" class="flex space-x-2">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <select name="role" class="border-gray-300 rounded px-2 py-1">
                                <option value="editor" {{ $user->role=='editor' ? 'selected' : '' }}>Editor</option>
                                <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Set</button>
                        </form>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if($user->role !== 'super_admin')
                        <button onclick="toggleEdit({{ $user->id }})" class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300">Edit</button>
                        <div id="edit-{{ $user->id }}" class="hidden mt-2">
                            <form action="{{ url('/dashboard/manage-roles/edit-name') }}" method="POST" class="flex space-x-2">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="text" name="name" value="{{ $user->name }}" class="border-gray-300 rounded px-2 py-1">
                                <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">Save</button>
                            </form>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if($user->role !== 'super_admin')
                        <button onclick="togglePermissions({{ $user->id }})" class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300">Permissions</button>
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
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="px-2 py-1">Section</th>
                                            @foreach($actions as $action)
                                                <th class="px-2 py-1">{{ ucfirst($action) }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sections as $section)
                                        <tr>
                                            <td class="px-2 py-1">{{ ucfirst(str_replace('_',' ',$section)) }}</td>
                                            @foreach($actions as $action)
                                            <td class="text-center px-2 py-1">
                                                <input type="checkbox" 
                                                    name="permissions[{{ $section }}][{{ $action }}]"
                                                    {{ isset($user->permissions[$section][$action]) && $user->permissions[$section][$action] ? 'checked' : '' }}>
                                            </td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="mt-2 bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">Save Permissions</button>
                            </form>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if($user->role !== 'super_admin')
                        <form action="{{ url('/dashboard/manage-roles/delete') }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleEdit(id) {
    document.getElementById('edit-'+id).classList.toggle('hidden');
}
function togglePermissions(id) {
    document.getElementById('perm-'+id).classList.toggle('hidden');
}
</script>
@endpush
