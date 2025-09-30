<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard | Tailwind Admin</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
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
                        {{-- <a href="https://github.com/tailwindadmin/admin"
                            class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a>

                        <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full"
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
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="px-4 py-2">
                                        @csrf
                                        <button type="submit"
                                            class="text-left w-full text-black hover:bg-grey-light">Logout</button>
                                    </form>
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
                    <ul class="list-reset flex flex-col">
                        <li class=" w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="{{ url('/dashboard') }}"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                                Dashboard
                                <span><i class="fas fa-angle-right float-right"></i></span>
                            </a>
                       @if(auth()->check() && auth()->user()->role === 'super_admin')
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ url('/dashboard/manage-roles') }}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-user-shield float-left mx-2"></i> Manage Roles
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
                        <li class="w-full h-full py-3 px-2 border-b border-300-border bg-white">
                            <a href="{{ url('/dashboard/modals') }}"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-square-full float-left mx-2"></i>
                                Contact Messages
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        {{-- </li>
                        <li class="w-full h-full py-3 px-2">
                            <a href="#"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="far fa-file float-left mx-2"></i>
                                Pages
                                <span><i class="fa fa-angle-down float-right"></i></span>
                            </a>
                            <ul class="list-reset -mx-2 bg-white-medium-dark">
                                <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                    <a href="{{ url('/login') }}"
                                        class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        Login Page
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                                <li class="border-t border-light-border w-full h-full px-2 py-3">
                                    <a href="{{ url('/register') }}"
                                        class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        Register Page
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                                <li class="border-t border-light-border w-full h-full px-2 py-3">
                                    <a href="{{ route('dashboard.error') }}"
                                        class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        Contact Messages
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
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
                <!--/Sidebar-->

                <!--Main-->
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-col">
                        <!-- Stats Row (kept) -->

                        <!-- /Stats Row -->

                        <!-- Contact Messages table -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                                <div class="px-6 py-2 border-b border-light-grey">
                                    <div class="font-bold text-xl">Contact Messages</div>
                                </div>

                                @php($messages = $messages ?? ($contacts ?? collect()))
                                @if($messages instanceof \Illuminate\Pagination\LengthAwarePaginator || $messages instanceof \Illuminate\Support\Collection)
                                    @if($messages->isEmpty())
                                        <div class="p-6 text-grey-darkest">No messages have been received yet.</div>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table text-grey-darkest w-full">
                                                <thead class="bg-grey-dark text-white text-normal">
                                                    <tr>
                                                        <th class="px-3 py-2">#</th>
                                                        <th class="px-3 py-2">When</th>
                                                        <th class="px-3 py-2">Name</th>
                                                        <th class="px-3 py-2">Email</th>
                                                        <th class="px-3 py-2">Phone</th>
                                                        <th class="px-3 py-2">Project</th>
                                                        <th class="px-3 py-2">Subject</th>
                                                        <th class="px-3 py-2">Message</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($messages as $i => $m)
                                                        <tr class="border-b">
                                                            <td class="px-3 py-2">
                                                                @if(method_exists($messages, 'firstItem'))
                                                                    {{ $messages->firstItem() + $i }}
                                                                @else
                                                                    {{ $m->id }}
                                                                @endif
                                                            </td>
                                                            <td class="px-3 py-2">
                                                                {{ optional($m->created_at)->format('Y-m-d H:i') }}
                                                            </td>
                                                            <td class="px-3 py-2">{{ $m->name }}</td>
                                                            <td class="px-3 py-2">
                                                                @if(!empty($m->email))
                                                                    <a class="text-blue-600 hover:underline"
                                                                        href="mailto:{{ $m->email }}">{{ $m->email }}</a>
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td class="px-3 py-2">{{ $m->phone ?? '-' }}</td>
                                                            <td class="px-3 py-2">{{ $m->project ?? '-' }}</td>
                                                            <td class="px-3 py-2">{{ $m->subject ?? '-' }}</td>
                                                            <td class="px-3 py-2">
                                                                <div class="truncate max-w-xs" title="{{ $m->message }}">
                                                                    {{ $m->message }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        @if(method_exists($messages, 'links'))
                                            <div class="px-6 py-4">
                                                {{ $messages->links() }}
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <div class="p-6 text-red-700">Data variable not found. Controller must pass
                                        <code>$messages</code>.
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- /Contact Messages table -->



                        <!-- Profile cards (kept) -->
                        <div
                            class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 p-1 mt-2 mx-auto lg:mx-2 md:mx-2 justify-between">
                            <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                                <img src="https://i.imgur.com/w1Bdydo.jpg" alt="" class="w-full" />
                                <div class="flex justify-center -mt-8">
                                    <img src="https://i.imgur.com/8Km9tLL.jpg" alt=""
                                        class="rounded-full border-solid border-white border-2 -mt-3">
                                </div>

                            </div>
                            <!--/Profile Tabs-->
                        </div>
                </main>
                <!--/Main-->
            </div>

            <!-- Footer -->
        <footer class="bg-gray-900 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
        </footer>
        <!-- /footer -->

        </div>

    </div>

    <script src="{{ asset('main.js') }}"></script>
</body>

</html>