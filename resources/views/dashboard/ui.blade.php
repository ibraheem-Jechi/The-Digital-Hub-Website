<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsorship Form | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            font-family: 'Source Sans Pro', sans-serif;
        }
        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .flex-1 {
            flex: 1;
        }
        main {
            flex: 1;
            overflow-y: auto;
        }
        footer {
            background-color: #111827; /* bg-gray-900 */
            color: white;
            padding: 0.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="app">
    <!-- Header -->
    <header class="bg-nav">
        <div class="flex justify-between">
            <div class="p-1 mx-3 inline-flex items-center">
                <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                <h1 class="text-white p-2">Digital Hub</h1>
            </div>
            <div class="p-1 flex flex-row items-center">
                {{-- <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full"
                     src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                <a href="#" onclick="profileToggle()"
                   class="text-white p-2 no-underline hidden md:block lg:block">Adam Wathan</a> --}}
                <div id="ProfileDropDown"
                     class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                    <ul class="list-reset">
                        <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-light">My account</a></li>
                        <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-light">Notifications</a></li>
                        <li><hr class="border-t mx-2 border-gray-light"></li>
                        <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-gray-light">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
            <ul class="list-reset flex flex-col">
                <li class="w-full h-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard') ? 'bg-white' : '' }}">
                    <a href="{{ url('/dashboard') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-tachometer-alt float-left mx-2"></i> Dashboard
                        <span><i class="fas fa-angle-right float-right"></i></span>
                    </a>
                </li>

                @if(auth()->check() && auth()->user()->role === 'super_admin')
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="{{ url('/dashboard/manage-roles') }}"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-user-shield float-left mx-2"></i> Manage Roles
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                @endif

                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="{{ route('team.index') }}" 
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-users float-left mx-2"></i> Team Members
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>

                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                   <a href="{{ url('/dashboard/tables') }}"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-table float-left mx-2"></i> Programs
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>

                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="{{ url('/dashboard/workshops') }}" 
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-table float-left mx-2"></i> Workshops
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>

                <li class="w-full h-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/ui') ? 'bg-white' : '' }}">
                    <a href="{{ url('/dashboard/ui') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fab fa-uikit float-left mx-2"></i> Sponsors
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>

                <li class="w-full h-full py-3 px-2 border-b border-300-border">
                    <a href="{{ url('/dashboard/modals') }}"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-square-full float-left mx-2"></i> Contact Messages
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white-medium overflow-auto">
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
    <footer>
        <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
    </footer>
</div>

<script src="./main.js"></script>
</body>
</html>
