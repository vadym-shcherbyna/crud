<!doctype html>
<html lang="{{ $lang }}">
<head>
    @include('include.head')
</head>
<body class="text-center">
    @yield('content')
    @include('include.scripts')
    @stack('scripts')
</body>
</html>
