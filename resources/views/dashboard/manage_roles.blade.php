<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users & Roles</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

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
    
<div class="mx-auto bg-gray-300est">
    <div class="min-h-screen flex flex-col">
        <!--Header-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white cursor-pointer" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    {{-- <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                    <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Adam Wathan</a> --}}
        {{-- <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" 
        class="block w-full text-left px-4 py-2 !bg-white !text-gray-800 hover:!bg-gray-100 rounded shadow">
        {{ __('Log Out') }}
    </button>
</form> --}}
<style>
    .logout-btn {
        background-color: #ffffff !important;
        color: #374151 !important; /* gray-800 */
        border-radius: 0.375rem !important; /* rounded */
        padding: 0.5rem 1rem !important;
        display: block;
        text-align: left;
        box-shadow: 0 1px 2px rgba(0,0,0,0.1); /* shadow */
    }
    .logout-btn:hover {
        background-color: #f3f4f6 !important; /* gray-100 */
    }
</style>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-btn">
        {{ __('Log Out') }}
    </button>
</form>


                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute top-0 mt-12 mr-1 right-0">
                        <ul class="list-reset">
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-300">My account</a></li>
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-300">Notifications</a></li>
                          <li><hr class="border-t mx-2 border-gray-light"></li>
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-300">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    @if(auth()->check() && auth()->user()->role === 'super_admin')
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="{{ url('/dashboard/manage-roles') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-user-shield float-left mx-2"></i>
                            Manage Roles
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    @endif

                    @if(auth()->check() && auth()->user()->email === 'bob@gmail.com')
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/forms') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-user-plus float-left mx-2"></i>
                            Add User
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    @endif

                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ route('team.index') }}" class="text-sm text-nav-item no-underline">
                            <i class="fas fa-users float-left mx-2"></i>
                            Team Members
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/tables') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Programs
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/workshops') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Workshops
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/ui') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i>
                            Sponsors
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-300-border">
                        <a href="{{ url('/dashboard/modals') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-square-full float-left mx-2"></i>
                            Contact Messages
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                      <li class="w-full h-full py-3 px-2 border-b border-light-borderbg-white">
                        <a href="{{ route('faqs.index') }}" class="text-sm text-nav-item no-underline font-bold">
                            <i class="fas fa-question-circle float-left mx-2"></i> FAQs
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full py-3 px-2 border-b ">
                        <a href="{{ route('offers.index') }}" class="text-sm text-nav-item no-underline hover:font-bold">
                            <i class="fas fa-tags float-left mx-2"></i> Offers
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
    <a href="{{ route('about.index') }}" 
       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
        <i class="fas fa-info-circle float-left mx-2"></i>
        About
        <span><i class="fa fa-angle-right float-right"></i></span>
    </a>
</li>
                </ul>
                
            </aside>
            <!--/Sidebar-->

            <!-- Main Content -->
            <div class="p-6 bg-gray-50 flex-1">
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
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
        </footer>
        <!-- /footer -->

    </div>
</div>

<script>
function toggleEdit(id) {
    document.getElementById('edit-'+id).classList.toggle('hidden');
}
function togglePermissions(id) {
    document.getElementById('perm-'+id).classList.toggle('hidden');
}
function sidebarToggle() {
    document.getElementById('sidebar').classList.toggle('hidden');
}
function profileToggle() {
    document.getElementById('ProfileDropDown').classList.toggle('hidden');
}
</script>

</body>
</html>
