<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="top-content">
                    @yield('top')
                </div>
                <div class="center-content">
                    @yield('center')
                </div>
                <div class="bottom-content">
                    @yield('bottom')
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</body>

</html>