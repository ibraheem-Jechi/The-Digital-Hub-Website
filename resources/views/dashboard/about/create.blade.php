<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create About | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <style>
        html, body { height: 100%; margin: 0; }
        body { display: flex; flex-direction: column; font-family: 'Source Sans Pro', sans-serif; background: #f9fafb; }
        #app { flex: 1; display: flex; flex-direction: column; }
        main { flex: 1; overflow-y: auto; }
        footer { background-color: #111827; color: white; padding: 0.5rem; text-align: center; }
    </style>
</head>
<body>
<div id="app">
    <!-- Header -->
    <header class="bg-nav shadow-md">
        <div class="flex justify-between items-center px-6 py-3">
            <div class="inline-flex items-center">
                <i class="fas fa-bars pr-2 text-white cursor-pointer" onclick="sidebarToggle()"></i>
                <h1 class="text-white text-xl font-semibold">Digital Hub</h1>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-white text-gray-800 hover:bg-gray-200 rounded-lg shadow-sm transition">
                    {{ __('Log Out') }}
                </button>
            </form>
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
        <main class="flex-1 p-6">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h1 class="text-2xl font-bold mb-6 text-gray-800">Create About Section</h1>

                    @if($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold mb-1">Subtitle</label>
                            <input type="text" name="subtitle" value="{{ old('subtitle') }}"
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-300">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1">Title *</label>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-300">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1">Description</label>
                            <textarea name="description" rows="4"
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-300">{{ old('description') }}</textarea>
                        </div>

                        <!-- Feature 1 -->
                        <div class="pt-4 border-t">
                            <h2 class="text-lg font-semibold text-gray-700 mb-3">Feature 1</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="feature_1_icon" placeholder="Icon class"
                                    value="{{ old('feature_1_icon') }}" class="border rounded-lg px-4 py-2 w-full">
                                <input type="text" name="feature_1_title" placeholder="Title"
                                    value="{{ old('feature_1_title') }}" class="border rounded-lg px-4 py-2 w-full">
                            </div>
                            <textarea name="feature_1_description" rows="2"
                                class="mt-2 w-full border rounded-lg px-4 py-2">{{ old('feature_1_description') }}</textarea>
                        </div>

                        <!-- Feature 2 -->
                        <div class="pt-4 border-t">
                            <h2 class="text-lg font-semibold text-gray-700 mb-3">Feature 2</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="feature_2_icon" placeholder="Icon class"
                                    value="{{ old('feature_2_icon') }}" class="border rounded-lg px-4 py-2 w-full">
                                <input type="text" name="feature_2_title" placeholder="Title"
                                    value="{{ old('feature_2_title') }}" class="border rounded-lg px-4 py-2 w-full">
                            </div>
                            <textarea name="feature_2_description" rows="2"
                                class="mt-2 w-full border rounded-lg px-4 py-2">{{ old('feature_2_description') }}</textarea>
                        </div>

                        <!-- Feature 3 -->
                        <div class="pt-4 border-t">
                            <h2 class="text-lg font-semibold text-gray-700 mb-3">Feature 3</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="feature_3_icon" placeholder="Icon class"
                                    value="{{ old('feature_3_icon') }}" class="border rounded-lg px-4 py-2 w-full">
                                <input type="text" name="feature_3_title" placeholder="Title"
                                    value="{{ old('feature_3_title') }}" class="border rounded-lg px-4 py-2 w-full">
                            </div>
                            <textarea name="feature_3_description" rows="2"
                                class="mt-2 w-full border rounded-lg px-4 py-2">{{ old('feature_3_description') }}</textarea>
                        </div>

                        

                        <div>
                            <label class="block text-sm font-semibold mb-1">Image</label>
                            <input type="file" name="image" class="w-full border rounded-lg px-4 py-2">
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t">
                            <a href="{{ route('about.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Cancel</a>
                            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                                Create Section
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        <div class="flex justify-center">&copy; DIGITAL HUB</div>
    </footer>
</div>

<script src="{{ asset('admin/dist/main.js') }}"></script>
</body>
</html>
