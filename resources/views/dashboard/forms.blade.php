<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f9fafb; color: #374151; }
        input, select { padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.25rem; width: 100%; margin-bottom: 1rem; }
        button { padding: 0.5rem 1rem; background-color: #3b82f6; color: white; border: none; border-radius: 0.25rem; cursor: pointer; }
        button:hover { background-color: #2563eb; }
    </style>
</head>
<body>
<div class="mx-auto">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                <div class="p-1 flex flex-row items-center">
                    <img class="inline-block h-8 w-8 rounded-full" 
                         src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                    <a href="#" class="text-white p-2 no-underline hidden md:block lg:block">
                        {{ auth()->user()->name ?? 'User' }}
                    </a>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar (SAME AS DASHBOARD) -->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard') }}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    @if(auth()->check() && auth()->user()->role === 'super_admin')
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="{{ url('/dashboard/manage-roles') }}"
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-user-shield float-left mx-2"></i>
                                Manage Roles
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->check() && in_array(auth()->user()->role, ['super_admin', 'admin']))
                        <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href="{{ url('/dashboard/forms') }}"
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fab fa-wpforms float-left mx-2"></i>
                                Add User
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                    @endif

                    {{-- <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/buttons') }}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-grip-horizontal float-left mx-2"></i>
                            Buttons
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li> --}}
                     <li class="w-full h-full py-3 px-2 border-b border-light-border">
                <a href="{{ route('team.index') }}" class="text-sm text-nav-item no-underline">
                    <i class="fas fa-users float-left mx-2"></i>
                                Team Members
                            </a>
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </li>

                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                       <a href="{{ url('/dashboard/tables') }}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tables
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/ui') }}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i>
                            Sponsorships
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-300-border">
                        <a href="{{ url('/dashboard/modals') }}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-square-full float-left mx-2"></i>
                            Modals
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Main content -->
            <div class="p-6 bg-gray-50 flex-1">
                <h2 class="text-2xl font-bold mb-6">Add New User</h2>

                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-3 mb-4 rounded shadow">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('forms.store') }}" method="POST">
                    @csrf
                    <label>Full Name</label>
                    <input type="text" name="name" required>

                    <label>Email</label>
                    <input type="email" name="email" required>

                    <label>Password</label>
                    <input type="password" name="password" required>

                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" required>

                    <label>Phone Number</label>
                    <input type="text" name="phone">

                    <label>Role</label>
                    <select name="role" required>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                    </select>

                    <button type="submit">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
