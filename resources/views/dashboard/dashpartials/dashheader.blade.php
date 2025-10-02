<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
    <ul class="list-reset flex flex-col">
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard') ? 'bg-white' : '' }}">
            <a href="{{ url('/dashboard') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                Dashboard
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- User Management Dropdown -->
        @if(auth()->check() && auth()->user()->role === 'super_admin')
        @php
            $userManagementActive = request()->is('dashboard/manage-roles*') || request()->is('dashboard/forms*');
        @endphp
        <li class="w-full border-b border-light-border">
            <button onclick="toggleDropdown('userManagementDropdown')" 
                    class="w-full flex items-center justify-between py-3 px-2 text-sm font-sans text-nav-item no-underline focus:outline-none {{ $userManagementActive ? 'bg-white font-bold' : '' }}">
                <span>
                    <i class="fas fa-users-cog float-left mx-2"></i>
                    User Management
                </span>
                <i class="fas fa-chevron-down float-right"></i>
            </button>

            <ul id="userManagementDropdown" class="flex-col ml-6 mt-1 {{ $userManagementActive ? '' : 'hidden' }}">
                <li class="py-2">
                    <a href="{{ url('/dashboard/manage-roles') }}" class="font-sans text-sm text-nav-item no-underline {{ request()->is('dashboard/manage-roles*') ? 'font-bold' : '' }}">
                        <i class="fas fa-user-shield float-left mx-2"></i>
                        Manage Roles
                    </a>
                </li>
                <li class="py-2">
                    <a href="{{ url('/dashboard/forms') }}" class="font-sans text-sm text-nav-item no-underline {{ request()->is('dashboard/forms*') ? 'font-bold' : '' }}">
                        <i class="fas fa-user-plus float-left mx-2"></i>
                        Add User
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <!-- Team Members -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/team*') ? 'bg-white' : '' }}">
            <a href="{{ route('team.index') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-users float-left mx-2"></i>
                Team Members
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- Programs -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/tables*') ? 'bg-white' : '' }}">
            <a href="{{ url('/dashboard/tables') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-table float-left mx-2"></i>
                Programs
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- Workshops -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/workshops*') ? 'bg-white' : '' }}">
            <a href="{{ url('/dashboard/workshops') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-chalkboard-teacher float-left mx-2"></i>
                Workshops
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- Sponsors -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/ui*') ? 'bg-white' : '' }}">
            <a href="{{ url('/dashboard/ui') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fab fa-uikit float-left mx-2"></i>
                Sponsors
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- FAQs -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/faqs*') ? 'bg-white' : '' }}">
            <a href="{{ route('faqs.index') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-question-circle float-left mx-2"></i>
                FAQs
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- Offers -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/offers*') ? 'bg-white' : '' }}">
            <a href="{{ route('offers.index') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-tags float-left mx-2"></i>
                Offers
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- Sliders -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/sliders*') ? 'bg-white' : '' }}">
            <a href="{{ route('sliders.index') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-images float-left mx-2"></i>
                Sliders
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- About -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/about*') ? 'bg-white' : '' }}">
            <a href="{{ route('about.index') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-info-circle float-left mx-2"></i>
                About
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- Contact Messages -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/modals*') ? 'bg-white' : '' }}">
            <a href="{{ url('/dashboard/modals') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-square-full float-left mx-2"></i>
                Contact Messages
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>

        <!-- Footer Actions -->
        <li class="w-full py-3 px-2 border-b border-light-border {{ request()->is('dashboard/footer-action*') ? 'bg-white' : '' }}">
            <a href="{{ url('/dashboard/footer-action') }}" class="font-sans text-sm text-nav-item no-underline">
                <i class="fas fa-square-full float-left mx-2"></i>
                Edit Footer
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>
    </ul>
</aside>

<script>
function toggleDropdown(id) {
    document.getElementById(id).classList.toggle('hidden');
}
</script>
