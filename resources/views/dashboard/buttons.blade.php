<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Buttons | Tailwind Admin</title>
</head>

<body>
<div class="mx-auto bg-grey-400">
    <div class="min-h-screen flex flex-col">
        <!--Header-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                <div class="p-1 flex flex-row items-center">
                    <a href="https://github.com/tailwindadmin/admin" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a>
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full"
                         src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                    <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Adam Wathan</a>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
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
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
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
                       <li class="w-full h-full py-3 px-2 border-b border-light-borderbg-white">
                        <a href="{{ route('faqs.index') }}" class="text-sm text-nav-item no-underline font-bold">
                            <i class="fas fa-question-circle float-left mx-2"></i> FAQs
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full py-3 px-2 border-b">
                        <a href="{{ route('offers.index') }}" class="text-sm text-nav-item no-underline hover:font-bold">
                            <i class="fas fa-tags float-left mx-2"></i> Offers
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
            <!--/Sidebar-->

            <!--Main Content-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                <div class="flex flex-col">
                    <!-- Buttons Content -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <!--Outline Buttons form-->
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                Outline Buttons
                            </div>
                            <div class="p-3">
                                <button class="bg-transparent hover:bg-blue-500 text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded">
                                    Button
                                </button>
                                <button class="bg-transparent hover:bg-green-500 text-green-dark font-semibold hover:text-white py-2 px-4 border border-green hover:border-transparent rounded">
                                    Button
                                </button>
                                <button class="bg-transparent hover:bg-orange-500 text-orange-800 font-semibold hover:text-white py-2 px-4 border border-orange-500 hover:border-transparent rounded">
                                    Button
                                </button>
                                <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                    Button
                                </button>
                            </div>
                        </div>

                        <!--Solid Buttons-->
                        <div class="mb-2 mx-2 border-solid border-gray-300 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                Solid Buttons
                            </div>
                            <div class="p-3">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Button
                                </button>
                                <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                                    Button
                                </button>
                                <button class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded">
                                    Button
                                </button>
                                <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">
                                    Button
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Add the rest of your Buttons page content here -->
                </div>
            </main>
            <!--/Main Content-->
        </div>

        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
            <div class="flex flex-1 mx-auto">Distributed by: <a href="https://themewagon.com/" target="_blank">Themewagon</a></div>
        </footer>
        <!--/footer-->

    </div>
</div>

<script src="./main.js"></script>
</body>
</html>
