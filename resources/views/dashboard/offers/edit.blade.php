<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Edit Offer</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
<div class="mx-auto bg-grey-400">
    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <header class="bg-nav">
            <div class="flex justify-between items-center p-2">
                <div class="inline-flex items-center mx-3">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Digital Hub</h1>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-white text-gray-800 rounded hover:bg-gray-100">
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
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border">
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

                    {{-- <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/forms') }}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            Forms
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li> --}}
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                <a href="{{ route('team.index') }}" 
                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fas fa-users float-left mx-2"></i>
                                Team Members
                            </a>
                           <span><i class="fa fa-angle-right float-right"></i></span>
                        </li>

                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                       <a href="{{ url('/dashboard/tables') }}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Programs
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/workshops') }}" 
                        class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Workshops
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/ui') }}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i>
                            Sponsors
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-300-border">
                        <a href="{{ url('/dashboard/modals') }}"
                        class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-square-full float-left mx-2"></i>
                            Contact Messages
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                       
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="{{ route('offers.index') }}" class="text-sm text-nav-item no-underline hover:font-bold">
                            <i class="fas fa-tags float-left mx-2"></i> Offers
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Main -->
            <main class="bg-white-300 flex-1 p-6 overflow-auto">
                <div class="container mx-auto">
                    <h1 class="text-2xl font-bold mb-4">Edit Offer</h1>

                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('offers.update', $offer) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block">Title</label>
                            <input type="text" name="title" class="w-full border px-2 py-1 rounded" value="{{ old('title', $offer->title) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block">Subtitle</label>
                            <input type="text" name="subtitle" class="w-full border px-2 py-1 rounded" value="{{ old('subtitle', $offer->subtitle) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block">Description</label>
                            <textarea name="description" class="w-full border px-2 py-1 rounded">{{ old('description', $offer->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block">Current Image</label>
                            @if($offer->image)
                                <img src="{{ asset('storage/' . $offer->image) }}" alt="" width="120" class="mb-2">
                            @endif
                            <input type="file" name="image" class="w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block">Button Text</label>
                            <input type="text" name="button_text" class="w-full border px-2 py-1 rounded" value="{{ old('button_text', $offer->button_text) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block">Button Link</label>
                            <input type="text" name="button_link" class="w-full border px-2 py-1 rounded" value="{{ old('button_link', $offer->button_link) }}">
                        </div>

                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Update Offer</button>
                        <a href="{{ route('offers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 ml-2">Cancel</a>
                    </form>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
        </footer>
    </div>
</div>
<script src="./main.js"></script>
</body>
</html>
