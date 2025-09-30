<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Slider | Dashboard</title>
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
                    <button type="submit" 
                        class="block w-full text-left px-4 py-2 bg-white text-gray-800 hover:bg-gray-100 rounded">
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
                    <a href="{{ url('/dashboard/manage-roles') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-user-shield float-left mx-2"></i> Manage Roles
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                @endif
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="{{ route('team.index') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-users float-left mx-2"></i> Team Members
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="{{ url('/dashboard/tables') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-table float-left mx-2"></i> Programs
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="{{ url('/dashboard/workshops') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
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
                    <a href="{{ url('/dashboard/modals') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
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
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white-medium overflow-auto">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    <h2 class="font-semibold text-xl text-gray-800 mb-4">Edit Slider</h2>

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Title</label>
                            <input type="text" name="title" value="{{ old('title', $slider->title) }}" class="w-full border rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Subtitle</label>
                            <input type="text" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}" class="w-full border rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Description</label>
                            <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description', $slider->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Video Link</label>
                            <input type="url" name="video_link" value="{{ old('video_link', $slider->video_link) }}" class="w-full border rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Background Image</label>
                            @if($slider->background_image)
                                <img src="{{ asset('storage/' . $slider->background_image) }}" alt="BG Image" class="h-24 mb-2 object-cover">
                            @endif
                            <input type="file" name="background_image" class="w-full border rounded px-3 py-2" accept="image/*">
                        </div>

                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Update Slider</button>
                        <a href="{{ route('sliders.index') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
                    </form>
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
