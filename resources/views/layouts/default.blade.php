<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('header-scripts')

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('templates/landrick/images/favicon.ico') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('templates/landrick/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- simplebar -->
    <link href="{{ asset('templates/landrick/css/simplebar.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons -->
    <link href="{{ asset('templates/landrick/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('templates/landrick/css/tabler-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css"  rel="stylesheet">
    <!-- Css -->
    <link href="{{ asset('templates/landrick/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('header-styles')
</head>
<body>
    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
    <!-- Loader -->

    @yield('content')

    <!-- javascript -->
    <script src="{{ asset('templates/landrick/js/bootstrap.bundle.min.js') }}"></script>
    <!-- simplebar -->
    <script src="{{ asset('templates/landrick/js/simplebar.min.js') }}"></script>
    <!-- Icons -->
    <script src="{{ asset('templates/landrick/js/feather.min.js') }}"></script>
    <!-- Chart -->
    <script src="{{ asset('templates/landrick/js/apexcharts.min.js') }}"></script>
    <!-- Main Js -->
    {{--    <script src="{{ asset('templates/landrick/js/plugins.init.js') }}"></script>--}}
    <script src="{{ asset('templates/landrick/js/app.js') }}"></script>
    @yield('footer-scripts')
</body>
</html>
