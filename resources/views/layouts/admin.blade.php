<!doctype html>
<html lang="{{ $lang }}">
    <head>
        @include('include.head')
        <link href="{{ asset('css/admin/general.css') }}" rel="stylesheet" />
    </head>
    <body>
        @include('include.navbar')
        <div class="container-fluid">
            <div class="row">
                @include('include.menu')
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="app">
                    @yield('content')
                </main>
                @include('include.footer')
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
