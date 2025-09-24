<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team Member</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f9fafb; color: #374151; }
        .form-card { background-color: #fff; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); max-width: 600px; margin: 2rem auto; }
        .form-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 1.5rem; color: #374151; }
        .input-field { width: 100%; padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #d1d5db; margin-bottom: 1rem; }
        .input-field:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,0.3); }
        .btn { padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; cursor: pointer; text-decoration: none; margin-right: 0.5rem; }
        .btn-success { background-color: #3b82f6; color: #fff; }
        .btn-success:hover { background-color: #2563eb; }
        .btn-secondary { background-color: #6b7280; color: #fff; }
        .btn-secondary:hover { background-color: #4b5563; }
    </style>
</head>
<body>
<div class="mx-auto bg-gray-300est min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-nav">
        <div class="flex justify-between">
            <div class="p-1 mx-3 inline-flex items-center">
                <i class="fas fa-bars pr-2 text-white cursor-pointer" onclick="sidebarToggle()"></i>
                <h1 class="text-white p-2">Logo</h1>
            </div>
            <div class="p-1 flex flex-row items-center">
                <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Admin</a>
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
    <!-- /Header -->

    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
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
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="{{ route('team.index') }}" class="text-sm text-nav-item no-underline bg-white">
                            <i class="fas fa-users float-left mx-2"></i> Team Members
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/tables') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i> Tables
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/ui') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i> Ui components
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-300-border">
                        <a href="{{ url('/dashboard/modals') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-square-full float-left mx-2"></i> Modals
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                </ul>
            </aside>
        <!-- /Sidebar -->

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="form-card">
                <h2 class="form-title">Add New Team Member</h2>

                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" class="input-field" placeholder="Name" value="{{ old('name') }}" required>
                    <textarea name="description" class="input-field" rows="4" placeholder="Description">{{ old('description') }}</textarea>
                    <input type="file" name="photo" class="input-field" accept="image/*">
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">Add Member</button>
                        <a href="{{ route('team.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<script>
function sidebarToggle() { document.getElementById('sidebar').classList.toggle('hidden'); }
function profileToggle() { document.getElementById('ProfileDropDown').classList.toggle('hidden'); }
</script>
</body>
</html>
