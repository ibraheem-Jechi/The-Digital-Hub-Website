<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Footer | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block w-full px-4 py-2 bg-white text-gray-800 hover:bg-gray-100 rounded">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
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

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h1 class="text-2xl font-bold mb-4">View Footer</h1>

                <div class="flex flex-wrap gap-4 mt-4 mb-6">
                    <a href="{{ route('dashboard.footer.action') }}"
                       class="px-6 py-3 bg-gray-600 text-white rounded mr-4 hover:bg-gray-700 transition">
                        Back to Actions
                    </a>
                    <a href="{{ route('dashboard.footer.edit') }}"
                       class="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Edit Footer
                    </a>
                </div>

                <table class="min-w-full bg-white rounded shadow-md">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 text-left">Field</th>
                        <th class="py-2 px-4 text-left">Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><td class="py-2 px-4 font-semibold">Title</td><td class="py-2 px-4">{{ $footer->title ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Description</td><td class="py-2 px-4">{{ $footer->description ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Address</td><td class="py-2 px-4">{{ $footer->address ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Email</td><td class="py-2 px-4">{{ $footer->email ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Phone</td><td class="py-2 px-4">{{ $footer->phone ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Website</td><td class="py-2 px-4">{{ $footer->website ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Facebook</td><td class="py-2 px-4">{{ $footer->facebook ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Twitter</td><td class="py-2 px-4">{{ $footer->twitter ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Instagram</td><td class="py-2 px-4">{{ $footer->instagram ?? 'N/A' }}</td></tr>
                    <tr><td class="py-2 px-4 font-semibold">LinkedIn</td><td class="py-2 px-4">{{ $footer->linkedin ?? 'N/A' }}</td></tr>
                    </tbody>
                </table>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
        </footer>
    </div>
</div>
<script src="{{ asset('main.js') }}"></script>
</body>
</html>
