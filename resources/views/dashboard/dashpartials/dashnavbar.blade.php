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
                    class="block w-full text-left px-4 py-2 bg-white text-gray-800 hover:bg-gray-100 rounded">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</header>
