<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <style>
        html, body { height: 100%; margin: 0; }
        body { display: flex; flex-direction: column; font-family: 'Source Sans Pro', sans-serif; }
        #app { flex: 1; display: flex; flex-direction: column; }
        .flex-1 { flex: 1; }
        main { flex: 1; overflow-y: auto; }
        footer { background-color: #111827; color: white; padding: 0.5rem; text-align: center; }
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
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 bg-white text-gray-800 hover:bg-gray-100 rounded">
                        {{ __('Log Out') }}
                    </button>
                </form>
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
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
    <a href="{{ route('sliders.index') }}" 
       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
        <i class="fas fa-images float-left mx-2"></i>
        Sliders
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

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white-medium overflow-auto">
            <div class="max-w-6xl mx-auto">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white p-6 shadow-sm sm:rounded-lg mb-6">
                    <a href="{{ route('about.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        Add New About
                    </a>

                    <div class="overflow-x-auto">
                       <table class="min-w-full table-auto border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Subtitle</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Feature 1 Icon</th>
            <th class="border px-4 py-2">Feature 1 Title</th>
            <th class="border px-4 py-2">Feature 1 Description</th>
            <th class="border px-4 py-2">Feature 2 Icon</th>
            <th class="border px-4 py-2">Feature 2 Title</th>
            <th class="border px-4 py-2">Feature 2 Description</th>
            <th class="border px-4 py-2">Feature 3 Icon</th>
            <th class="border px-4 py-2">Feature 3 Title</th>
            <th class="border px-4 py-2">Feature 3 Description</th>
            <th class="border px-4 py-2">Phone</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Created At</th>
            <th class="border px-4 py-2">Updated At</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($abouts as $about)
            <tr>
                <td class="border px-4 py-2">{{ $about->id }}</td>
                <td class="border px-4 py-2">{{ $about->title }}</td>
                <td class="border px-4 py-2">{{ $about->subtitle }}</td>
                <td class="border px-4 py-2 max-w-xs truncate" title="{{ $about->description }}">
                    {{ Str::limit($about->description, 50) }}
                </td>
                <td class="border px-4 py-2 text-center"><i class="{{ $about->feature_1_icon }}"></i></td>
                <td class="border px-4 py-2">{{ $about->feature_1_title }}</td>
                <td class="border px-4 py-2">{{ $about->feature_1_description }}</td>
                <td class="border px-4 py-2 text-center"><i class="{{ $about->feature_2_icon }}"></i></td>
                <td class="border px-4 py-2">{{ $about->feature_2_title }}</td>
                <td class="border px-4 py-2">{{ $about->feature_2_description }}</td>
                <td class="border px-4 py-2 text-center"><i class="{{ $about->feature_3_icon }}"></i></td>
                <td class="border px-4 py-2">{{ $about->feature_3_title }}</td>
                <td class="border px-4 py-2">{{ $about->feature_3_description }}</td>
                <td class="border px-4 py-2">{{ $about->phone }}</td>
                <td class="border px-4 py-2">
                    @if($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" class="w-20 h-12 object-cover rounded border">
                    @else
                        <span class="text-gray-400 text-xs">No Image</span>
                    @endif
                </td>
                <td class="border px-4 py-2">{{ $about->created_at }}</td>
                <td class="border px-4 py-2">{{ $about->updated_at }}</td>
                <td class="border px-4 py-2 flex space-x-2">
                    <a href="{{ route('about.edit', $about->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('about.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="18" class="border px-4 py-2 text-center text-gray-500">
                    No About sections found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
    </footer>
</div>

<script src="{{ asset('admin/dist/main.js') }}"></script>
</body>
</html>
