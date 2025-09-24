<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsorship Form | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
<div class="mx-auto bg-gray-300est">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <!-- Dashboard -->
                    <li class="w-full h-full py-3 px-2 border-b border-light-border 
                        {{ request()->is('dashboard') ? 'bg-gray-200 font-bold' : 'bg-white' }}">
                        <a href="{{ url('/dashboard') }}" class="font-sans text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <!-- Manage Roles (super_admin only) -->
                    @if(auth()->check() && auth()->user()->role === 'super_admin')
                        <li class="w-full h-full py-3 px-2 border-b border-light-border 
                            {{ request()->is('dashboard/manage-roles') ? 'bg-gray-200 font-bold' : 'bg-white' }}">
                            <a href="{{ url('/dashboard/manage-roles') }}" class="font-sans text-sm text-nav-item no-underline">
                                <i class="fas fa-user-shield float-left mx-2"></i>
                                Manage Roles
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                    @endif

                    <!-- Forms -->
                    <li class="w-full h-full py-3 px-2 border-b border-light-border 
                        {{ request()->is('dashboard/forms') ? 'bg-gray-200 font-bold' : 'bg-white' }}">
                        <a href="{{ url('/dashboard/forms') }}" class="font-sans text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            Forms
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <!-- Buttons -->
                    <li class="w-full h-full py-3 px-2 border-b border-light-border 
                        {{ request()->is('dashboard/buttons') ? 'bg-gray-200 font-bold' : 'bg-white' }}">
                        <a href="{{ url('/dashboard/buttons') }}" class="font-sans text-sm text-nav-item no-underline">
                            <i class="fas fa-grip-horizontal float-left mx-2"></i>
                            Buttons
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <!-- Tables -->
                    <li class="w-full h-full py-3 px-2 border-b border-light-border 
                        {{ request()->is('dashboard/tables') ? 'bg-gray-200 font-bold' : 'bg-white' }}">
                        <a href="{{ url('/dashboard/tables') }}" class="font-sans text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tables
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <!-- Sponsorships -->
                    <li class="w-full h-full py-3 px-2 border-b border-light-border 
                        {{ request()->is('dashboard/ui') ? 'bg-gray-200 font-bold' : 'bg-white' }}">
                        <a href="{{ url('/dashboard/ui') }}" class="font-sans text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i>
                            Sponsorships
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <!-- Modals -->
                    <li class="w-full h-full py-3 px-2 border-b border-light-border 
                        {{ request()->is('dashboard/modals') ? 'bg-gray-200 font-bold' : 'bg-white' }}">
                        <a href="{{ url('/dashboard/modals') }}" class="font-sans text-sm text-nav-item no-underline">
                            <i class="fas fa-square-full float-left mx-2"></i>
                            Modals
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                </ul>
            </aside>
            <!--/Sidebar-->

            <!-- Main -->
            <main class="bg-white-medium flex-1 p-6 overflow-hidden">
                <div class="max-w-4xl mx-auto">

                    <!-- Add Sponsorship Form -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg mb-6">
                        <h2 class="font-semibold text-xl text-gray-800 mb-4">Add Sponsorship</h2>

                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('sponsorships.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2">Description</label>
                                <input type="text" name="description" class="w-full border rounded px-3 py-2" value="{{ old('description') }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2">Upload Logo</label>
                                <input type="file" name="logo" class="w-full border rounded px-3 py-2" accept="image/*" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2">Website URL</label>
                                <input type="url" name="website_url" class="w-full border rounded px-3 py-2" value="{{ old('website_url') }}" required>
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Sponsorship</button>
                        </form>
                    </div>

                    <!-- Sponsorships Table -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                        <h2 class="font-semibold text-xl text-gray-800 mb-4">All Sponsorships</h2>
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Description</th>
                                    <th class="border px-4 py-2">Logo</th>
                                    <th class="border px-4 py-2">Website</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sponsorships as $sponsorship)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $sponsorship->id }}</td>
                                        <td class="border px-4 py-2">{{ $sponsorship->description }}</td>
                                        <td class="border px-4 py-2">
                                            @if($sponsorship->logo_url)
                                                <img src="{{ asset('storage/' . $sponsorship->logo_url) }}" alt="Logo" class="h-10 object-contain">
                                            @else
                                                <span class="text-gray-500">No Logo</span>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ $sponsorship->website_url }}" target="_blank" class="text-blue-600 underline">Visit</a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <!-- Buttons side by side with space -->
                                            <div style="display:flex; gap:8px;">
                                                <a href="{{ route('sponsorships.edit', $sponsorship->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                                <form action="{{ route('sponsorships.destroy', $sponsorship->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="border px-4 py-2 text-center text-gray-500">No sponsorships found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-darkest text-white p-2 text-center">
            &copy; 2025 My Design
        </footer>
    </div>
</div>

<script src="./main.js"></script>
</body>
</html>

