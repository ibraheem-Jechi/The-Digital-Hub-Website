<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Tables | Tailwind Admin</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-lightest">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
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
                                    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" 
        class="block w-full text-left px-4 py-2 bg-white text-gray-800 hover:bg-gray-100 rounded">
        {{ __('Log Out') }}
    </button>
</form>
                        <div id="ProfileDropDown"
                            class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My
                                        account</a></li>
                                <li><a href="#"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a>
                                </li>
                                <li>
                                    <hr class="border-t mx-2 border-grey-ligght">
                                </li>
                                <li><a href="#"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <aside id="sidebar"
                    class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                    <div class="flex">

                    </div>
                    <ul class="list-reset flex flex-col">
                        <li class=" w-full h-full py-3 px-2 border-b border-light-border ">
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

        
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                <a href="{{ route('team.index') }}" 
                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fas fa-users float-left mx-2"></i>
                                Team Members
                            </a>
                           <span><i class="fa fa-angle-right float-right"></i></span>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
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
                <!--/Sidebar-->
                <!--Main-->
                <main class="bg-white-500 flex-1 p-3 overflow-hidden">
                    <div class="flex flex-col">
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <div
                                    class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between">
                                    <span>Programs Table</span>
                                    <button onclick="openModal('addModal')"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                        + Add Program
                                    </button>
                                </div>
                                <div class="p-3">
                                    <table class="table-responsive w-full rounded">
                                        <thead>
                                            <tr>
                                                <th class="border px-4 py-2">Image</th>
                                                <th class="border px-4 py-2">Title</th>
                                                <th class="border px-4 py-2">Category</th>
                                                <th class="border px-4 py-2">Duration</th>
                                                <th class="border px-4 py-2">Start</th>
                                                <th class="border px-4 py-2">End</th>
                                                <th class="border px-4 py-2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($programs as $program)
                                                    <tr>
                                                        <td class="border px-4 py-2">
                                                @if($program->image)
                                                    <img src="{{ asset('storage/' . $program->image) }}"
                                                        class="h-12 w-12 object-cover rounded">
                                                @else
                                                                <span class="text-gray-400">No Image</span>
                                                            @endif
                                                        </td>
                                                        <td class="border px-4 py-2">{{ $program->title }}</td>
                                                        <td class="border px-4 py-2">{{ $program->category }}</td>
                                                        <td class="border px-4 py-2">{{ $program->duration }}</td>
                                                        <td class="border px-4 py-2">{{ $program->start_date }}</td>
                                                        <td class="border px-4 py-2">{{ $program->end_date }}</td>
                                                        <td class="border px-4 py-2">
                                                            <!-- View -->
                                                            <button onclick="openModal('viewModal-{{ $program->program_id }}')"
                                                                class="bg-green-500 rounded p-1 mx-1 text-white">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <!-- Edit -->
                                                            <button onclick="openModal('editModal-{{ $program->program_id }}')"
                                                                class="bg-yellow-500 rounded p-1 mx-1 text-white">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <!-- Delete -->
                                                            <form action="{{ route('programs.destroy', $program->program_id) }}"
                                                                method="POST" class="inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="bg-red-500 rounded p-1 mx-1 text-white">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    <!-- View Modal -->
                                                    <div id="viewModal-{{ $program->program_id }}"
                                                        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                                        <div class="bg-white rounded-lg p-5 w-1/2">
                                                            <h2 class="text-xl font-bold mb-4">View Program</h2>
                                                           @if($program->image)
                                                            <img src="{{ asset('storage/' . $program->image) }}"
                                                                class="mb-3 w-32 h-32 object-cover rounded">
                                                        @endif
                                                            <p><b>Title:</b> {{ $program->title }}</p>
                                                            <p><b>Description:</b> {{ $program->description }}</p>
                                                            <p><b>Category:</b> {{ $program->category }}</p>
                                                            <p><b>Duration:</b> {{ $program->duration }}</p>
                                                            <p><b>Start Date:</b> {{ $program->start_date }}</p>
                                                            <p><b>End Date:</b> {{ $program->end_date }}</p>
                                                            <button onclick="closeModal('viewModal-{{ $program->program_id }}')"
                                                                class="bg-gray-500 text-white px-3 py-1 rounded mt-3">Close</button>
                                                        </div>
                                                    </div>

                                                    <!-- Edit Modal -->
                                                    <div id="editModal-{{ $program->program_id }}"
                                                        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                                        <div class="bg-white rounded-lg p-5 w-1/2">
                                                            <h2 class="text-xl font-bold mb-4">Edit Program</h2>
                                                            <form action="{{ route('programs.update', $program->program_id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="text" name="title" value="{{ $program->title }}"
                                                                    placeholder="Title" class="w-full border p-2 mb-2">
                                                                <textarea name="description" placeholder="Description"
                                                                    class="w-full border p-2 mb-2">{{ $program->description }}</textarea>
                                                                <input type="text" name="category"
                                                                    value="{{ $program->category }}" placeholder="Category"
                                                                    class="w-full border p-2 mb-2">
                                                                <input type="text" name="duration"
                                                                    value="{{ $program->duration }}" placeholder="Duration"
                                                                    class="w-full border p-2 mb-2">
                                                                <input type="date" name="start_date"
                                                                    value="{{ $program->start_date }}"
                                                                    class="w-full border p-2 mb-2">
                                                                <input type="date" name="end_date"
                                                                    value="{{ $program->end_date }}"
                                                                    class="w-full border p-2 mb-2">
                                                                <input type="file" name="image" class="w-full border p-2 mb-2">
                                                                <button type="submit"
                                                                    class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
                                                                <button type="button"
                                                                    onclick="closeModal('editModal-{{ $program->program_id }}')"
                                                                    class="bg-gray-500 text-white px-3 py-1 rounded">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Add Program Modal -->
                        <div id="addModal"
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <div class="bg-white rounded-lg p-5 w-1/2">
                                <h2 class="text-xl font-bold mb-4">Add Program</h2>
                                <form action="{{ route('programs.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="title" placeholder="Title" class="w-full border p-2 mb-2">
                                    <textarea name="description" placeholder="Description"
                                        class="w-full border p-2 mb-2"></textarea>
                                    <input type="text" name="category" placeholder="Category"
                                        class="w-full border p-2 mb-2">
                                    <input type="text" name="duration" placeholder="Duration"
                                        class="w-full border p-2 mb-2">
                                    <input type="date" name="start_date" class="w-full border p-2 mb-2">
                                    <input type="date" name="end_date" class="w-full border p-2 mb-2">
                                    <input type="file" name="image" class="w-full border p-2 mb-2">
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
                                    <button type="button" onclick="closeModal('addModal')"
                                        class="bg-gray-500 text-white px-3 py-1 rounded">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <!--/Main-->

                <script>
                    function openModal(id) {
                        document.getElementById(id).classList.remove('hidden');
                    }
                    function closeModal(id) {
                        document.getElementById(id).classList.add('hidden');
                    }
                </script>

            </div>
            <!-- Footer -->
        <footer class="bg-gray-900 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
        </footer>
        <!-- /footer -->

        </div>

    </div>

    <script src="./main.js"></script>

</body>

</html>