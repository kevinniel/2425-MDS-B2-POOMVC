<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body>
    @include('layout.header')
    
    @yield('content')
    
    @include('layout.footer')

    @yield('scripts')
</body>
</html>