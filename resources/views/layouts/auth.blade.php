<!doctype html>
<html lang="{{ $lang }}">
<head>
    @include('include.head')
    @stack('styles')
</head>
<body class="text-center">
    @yield('content')
    @include('include.scripts')
    @stack('scripts')
</body>
</html>