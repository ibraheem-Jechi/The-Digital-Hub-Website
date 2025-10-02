<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Head --}}
    @include('dashboard.dashpartials.dashhead')
</head>
<body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">

            {{-- Navbar/Header Section --}}
            @include('dashboard.dashpartials.dashnavbar')

            <div class="flex flex-1">
                {{-- Sidebar / Header --}}
                @include('dashboard.dashpartials.dashheader')

                {{-- Main Content --}}
                <main class="flex-1 p-6">
                    @yield('content')
                </main>
            </div>

            {{-- Footer --}}
            @include('dashboard.dashpartials.dashfooter')
        </div>
    </div>

    {{-- Scripts --}}
    @include('dashboard.dashpartials.dashscript')
    @stack('scripts')
</body>
</html>
