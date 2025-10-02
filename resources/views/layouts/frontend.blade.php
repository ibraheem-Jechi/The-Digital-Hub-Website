<!DOCTYPE html>
<html lang="en">
@include('frontend.partials.head')

<body>
    @include('frontend.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')
    @include('frontend.partials.script')

    {{-- This renders scripts pushed from child views (like reCAPTCHA JS) --}}
    @stack('scripts')
</body>
</html>
