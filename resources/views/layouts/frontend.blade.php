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
</body>


</html>