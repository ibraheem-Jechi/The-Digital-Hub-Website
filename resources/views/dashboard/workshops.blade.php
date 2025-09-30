<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshops Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
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
                    {{-- <a href="https://github.com/tailwindadmin/admin" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a>
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                    <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Adam Wathan</a> --}}
                            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" 
        class="block w-full text-left px-4 py-2 bg-white text-gray-800 hover:bg-gray-100 rounded">
        {{ __('Log Out') }}
    </button>
</form>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute top-0 mt-12 mr-1 right-0">
                        <ul class="list-reset">
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                          <li><hr class="border-t mx-2 border-grey-ligght"></li>
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-1">

            <!-- Sidebar -->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    @if(auth()->check() && auth()->user()->role === 'super_admin')
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="{{ url('/dashboard/manage-roles') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-user-shield float-left mx-2"></i>
                                Manage Roles
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                    @endif
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ route('team.index') }}" class="text-sm text-nav-item no-underline">
                            <i class="fas fa-users float-left mx-2"></i>
                            Team Members
                        </a>
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </li>
                     <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/tables') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Programs
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="{{ url('/dashboard/workshops') }}" class="font-sans font-hairline font-bold text-sm text-nav-item no-underline">
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
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                <div class="flex flex-col">
                    <!-- Workshops Table -->
                    <div class="mb-2 border rounded shadow-sm w-full">
                        <div class="bg-gray-200 px-2 py-3 border-b flex justify-between items-center">
                            <span class="font-bold">Workshops Table</span>
                            <button onclick="openModal('addWorkshopModal')" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                + Add Workshop
                            </button>
                        </div>
                        <div class="p-3 overflow-x-auto">
                            <table class="table-auto w-full border-collapse">
                                <thead>
                                <tr>
                                    <th class="border px-4 py-2">Image</th>
                                    <th class="border px-4 py-2">Title</th>
                                    <th class="border px-4 py-2">Description</th>
                                    <th class="border px-4 py-2">Event Date</th>
                                    <th class="border px-4 py-2">Program ID</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($workshops as $workshop)
                                    <tr>
                                        <td class="border px-4 py-2">
                                            @if($workshop->image)
                                                <img src="{{ asset('storage/' . $workshop->image) }}" class="h-12 w-12 object-cover rounded">
                                            @else
                                                <span class="text-gray-400">No Image</span>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">{{ $workshop->title }}</td>
                                        <td class="border px-4 py-2">{{ Str::limit($workshop->description, 50) }}</td>
                                        <td class="border px-4 py-2">{{ $workshop->event_date->format('Y-m-d') }}</td>
                                        <td class="border px-4 py-2">{{ $workshop->program_id ?? '-' }}</td>
                                        <td class="border px-4 py-2">
                                            <button onclick="openModal('viewWorkshopModal-{{ $workshop->workshop_id }}')" class="bg-green-500 rounded p-1 mx-1 text-white"><i class="fas fa-eye"></i></button>
                                            <button onclick="openModal('editWorkshopModal-{{ $workshop->workshop_id }}')" class="bg-yellow-500 rounded p-1 mx-1 text-white"><i class="fas fa-edit"></i></button>
                                            <form action="{{ route('workshops.destroy', $workshop->workshop_id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 rounded p-1 mx-1 text-white"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Add Workshop Modal -->
                    <div id="addWorkshopModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white rounded-lg p-5 w-1/2">
                            <h2 class="text-xl font-bold mb-4">Add Workshop</h2>
                            <form action="{{ route('workshops.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="title" placeholder="Title" class="w-full border p-2 mb-2">
                                <textarea name="description" placeholder="Description" class="w-full border p-2 mb-2"></textarea>
                                <input type="date" name="event_date" class="w-full border p-2 mb-2">
                                <input type="number" name="program_id" placeholder="Program ID" class="w-full border p-2 mb-2">
                                <input type="file" name="image" class="w-full border p-2 mb-2">
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
                                <button type="button" onclick="closeModal('addWorkshopModal')" class="bg-gray-500 text-white px-3 py-1 rounded">Cancel</button>
                            </form>
                        </div>
                    </div>

                </div>
            </main>

        </div>

        <<!-- Footer -->
        <footer class="bg-gray-900 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
        </footer>
        <!-- /footer -->

    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
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
