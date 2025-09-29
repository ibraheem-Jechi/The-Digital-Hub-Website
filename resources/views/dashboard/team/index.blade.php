<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Team Members</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f9fafb; color: #374151; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 0.5rem 0.75rem; text-align: left; border: 1px solid #d1d5db; vertical-align: middle; }
        thead th { background-color: #f3f4f6; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; }
        tbody tr:hover { background-color: #f3f4f6; transition: 0.2s; }
        .btn { padding: 0.25rem 0.5rem; border-radius: 0.25rem; text-white; text-decoration: none; }
        .btn-edit { background-color: #f59e0b; color: #fff; }
        .btn-edit:hover { background-color: #d97706; }
        .btn-delete { background-color: #ef4444; color: #fff; }
        .btn-delete:hover { background-color: #dc2626; }
        .overflow-x-auto { overflow-x: auto; }
        .rounded-full { border-radius: 9999px; }
        .hover\:bg-gray-50:hover { background-color: #f9fafb; }
    </style>
</head>
<body>
<div class="mx-auto bg-grey-400">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Digital Hub</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    {{-- <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                    <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Admin</a> --}}
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute top-0 mt-12 mr-1 right-0">
                        <ul class="list-reset">
                            <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                            <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                            <li><hr class="border-t mx-2 border-grey-light"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="no-underline px-4 py-2 block text-black hover:bg-grey-light w-full text-left">Logout</button>
                                </form>
                            </li>
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
                       
                </ul>

            </aside>
            <!-- /Sidebar -->

            <!-- Main Content -->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                <div class="flex flex-col">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Team Members</h2>
                        <a href="{{ route('team.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Member</a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse border border-gray-300 shadow-sm">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 uppercase text-sm font-semibold">
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Photo</th>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Description</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teamMembers as $index => $member)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        @if($member->photo)
                                            <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}" class="w-16 h-16 object-cover rounded-full mx-auto">
                                        @else
                                            <img src="https://via.placeholder.com/60x60?text=No+Image" alt="No Image" class="w-16 h-16 object-cover rounded-full mx-auto">
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">{{ $member->name }}</td>
                                    <td class="border px-4 py-2">{{ $member->description }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <a href="{{ route('team.edit', $member->id) }}" class="btn btn-edit mr-2">Edit</a>
                                        <form action="{{ route('team.destroy', $member->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <!-- /Main -->
        </div>

         <!-- Footer -->
        <footer class="bg-gray-900 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
        </footer>
        <!-- /footer -->
    </div>
</div>

<script>
function sidebarToggle() { document.getElementById('sidebar').classList.toggle('hidden'); }
function profileToggle() { document.getElementById('ProfileDropDown').classList.toggle('hidden'); }
</script>
</body>
</html>
