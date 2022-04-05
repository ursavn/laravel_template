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
    <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet">
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

{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav me-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ms-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('get-change-password') }}">--}}
{{--                                        {{ __('Change Password') }}--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}

<div class="page-wrapper landrick-theme toggled">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
            <div class="sidebar-brand">
                <a href="{{ route('home') }}">
                    <img
                        src="{{ asset('templates/landrick/images/logo-dark.png') }}" height="24" class="logo-light-mode"
                        alt=""
                    >
                    <img
                        src="{{ asset('templates/landrick/images/logo-light.png') }}" height="24" class="logo-dark-mode"
                        alt=""
                    >
                    <span class="sidebar-colored">
                            <img src="{{ asset('templates/landrick/images/logo-light.png') }}" height="24" alt="">
                        </span>
                </a>
            </div>

            <ul class="sidebar-menu">
                <li><a href="{{ route('home') }}"><i class="ti ti-home me-2"></i>{{ __('Dashboard') }}</a></li>
                {{--                    <li class="sidebar-dropdown">--}}
                {{--                        <a href="javascript:void(0)"><i class="ti ti-user me-2"></i>User Profile</a>--}}
                {{--                        <div class="sidebar-submenu">--}}
                {{--                            <ul>--}}
                {{--                                <li><a href="profile.html">Profile</a></li>--}}
                {{--                                <li><a href="profile-setting.html">Profile Setting</a></li>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                    </li>--}}

                <li><a href="{{ route('users.list') }}"><i class="ti ti-home me-2"></i>{{ __('User Management') }}</a></li>
            </ul>
            <!-- sidebar-menu  -->
        </div>
    </nav>
    <!-- sidebar-wrapper  -->

    <!-- Start Page Content -->
    <main class="page-content bg-light">
        <div class="top-header">
            <div class="header-bar d-flex justify-content-between border-bottom">
                <div class="d-flex align-items-center">
                    <a href="#" class="logo-icon me-3">
                        <img
                            src="{{ asset('templates/landrick/images/logo-icon.png') }}" height="30" class="small"
                            alt=""
                        >
                        <span class="big">
                                <img
                                    src="{{ asset('templates/landrick/images/logo-dark.png') }}" height="24"
                                    class="logo-light-mode" alt=""
                                >
                                <img
                                    src="{{ asset('templates/landrick/images/logo-light.png') }}" height="24"
                                    class="logo-dark-mode" alt=""
                                >
                            </span>
                    </a>
                    <a id="close-sidebar" class="btn btn-icon btn-soft-light" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                    <div class="search-bar p-0 d-none d-md-block ms-2">
                        <div id="search" class="menu-search mb-0">
                            <form role="search" method="get" id="searchform" class="searchform">
                                <div>
                                    <input
                                        type="text" class="form-control border rounded" name="s" id="s"
                                        placeholder="Search Keywords..."
                                    >
                                    <input type="submit" id="searchsubmit" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled mb-0">
                    <li class="list-inline-item mb-0">
                        <a
                            href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"
                        >
                            <div class="btn btn-icon btn-soft-light"><i class="ti ti-settings"></i></div>
                        </a>
                    </li>

                    <li class="list-inline-item mb-0 ms-1">
                        <div class="dropdown dropdown-primary">
                            <button
                                type="button" class="btn btn-icon btn-soft-light dropdown-toggle p-0"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            >
                                <i class="ti ti-bell"></i>
                            </button>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"
                            >
                                    <span class="visually-hidden">{{ __('New alerts') }}</span>
                                </span>

                            <div
                                class="dropdown-menu dd-menu bg-white shadow rounded border-0 mt-3 p-0" data-simplebar
                                style="height: 320px; width: 290px;"
                            >
                                <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                                    <h6 class="mb-0 text-dark">{{ __('Notifications') }}</h6>
                                    <span class="badge bg-soft-danger rounded-pill">3</span>
                                </div>
                                <div class="p-3">
                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="icon text-center rounded-circle me-2">
                                                <i class="ti ti-shopping-cart"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title">{{ __('Order Complete') }}</h6>
                                                <small class="text-muted">15 min ago</small>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="{{ asset('templates/landrick/images/client/04.jpg') }}"
                                                class="avatar avatar-md-sm rounded-circle border shadow me-2" alt=""
                                            >
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title"><span class="fw-bold">Message</span>
                                                    from Luis</h6>
                                                <small class="text-muted">1 hour ago</small>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon text-center rounded-circle me-2">
                                                <i class="ti ti-currency-dollar"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title"><span
                                                        class="fw-bold"
                                                    >{{ __('One Refund Request') }}</span></h6>
                                                <small class="text-muted">2 hour ago</small>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon text-center rounded-circle me-2">
                                                <i class="ti ti-truck-delivery"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title">{{ __('Deliverd your Order') }}</h6>
                                                <small class="text-muted">Yesterday</small>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="{{ asset('templates/landrick/images/client/15.jpg') }}"
                                                class="avatar avatar-md-sm rounded-circle border shadow me-2" alt=""
                                            >
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title"><span class="fw-bold">Cally</span>
                                                    started following you</h6>
                                                <small class="text-muted">2 days ago</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-inline-item mb-0 ms-1">
                        <div class="dropdown dropdown-primary">
                            <button
                                type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"
                            >
                                <img
                                    src="{{ asset('templates/landrick/images/client/05.jpg') }}"
                                    class="avatar avatar-ex-small rounded" alt=""
                                >
                            </button>
                            <div
                                class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3"
                                style="min-width: 200px;"
                            >
                                <a
                                    class="dropdown-item d-flex align-items-center text-dark pb-3"
                                    href="{{ route('profile.index') }}"
                                >
                                    <img
                                        src="{{ asset('templates/landrick/images/client/05.jpg') }}"
                                        class="avatar avatar-md-sm rounded-circle border shadow" alt=""
                                    >
                                    <div class="flex-1 ms-2">
                                            <span class="d-block">
                                                {{ Auth::user()->name }}
                                            </span>
                                        <small class="text-muted">UI / UX Designer</small>
                                    </div>
                                </a>
                                <a class="dropdown-item text-dark" href="{{ route('home') }}">
                                        <span class="mb-0 d-inline-block me-1">
                                            <i class="ti ti-home"></i>
                                        </span> {{ __('Dashboard') }}
                                </a>
                                <a class="dropdown-item text-dark" href="{{ route('profile.index') }}">
                                        <span class="mb-0 d-inline-block me-1">
                                            <i class="ti ti-settings"></i>
                                        </span> {{ __('Profile') }}
                                </a>
{{--                                <a class="dropdown-item text-dark" href="{{ route('get-change-password') }}">--}}
{{--                                        <span class="mb-0 d-inline-block me-1">--}}
{{--                                            <i class="ti ti-shield-lock"></i>--}}
{{--                                        </span> {{ __('Change Password') }}--}}
{{--                                </a>--}}
                                <div class="dropdown-divider border-top"></div>
                                <a class="dropdown-item text-dark" href="lock-screen.html">
                                        <span class="mb-0 d-inline-block me-1">
                                            <i class="ti ti-lock"></i>
                                        </span> {{ __('Lockscreen') }}
                                </a>
                                <a
                                    class="dropdown-item text-dark" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                        <span class="mb-0 d-inline-block me-1">
                                            <i class="ti ti-logout"></i>
                                        </span> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-fluid">
            <div class="layout-specing">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted mb-1">Welcome back, {{ Auth::user()->name }}!</h6>
                        <h5 class="mb-0">@yield('title')</h5>
                    </div>
                </div>

                @yield('content')
            </div>
        </div><!--end container-->

        <!-- Footer Start -->
        <footer class="bg-white shadow py-3">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-sm-start text-center">
                            <p class="mb-0 text-muted">©
                                <script>document.write(new Date().getFullYear());</script>
                                URSA
                            </p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- End -->
    </main>
    <!--End page-content" -->
</div>
<!-- page-wrapper -->

<!-- Offcanvas Start -->
<div
    class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel"
>
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0">
            <img src="{{ asset('templates/landrick/images/logo-dark.png') }}" height="24" class="light-version" alt="">
            <img src="{{ asset('templates/landrick/images/logo-light.png') }}" height="24" class="dark-version" alt="">
        </h5>
        <button
            type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas"
            aria-label="Close"
        ><i class="mdi mdi-close fs-4"></i></button>
    </div>
    <div class="offcanvas-body p-4 px-md-5">
        <div class="row">
            <div class="col-12">
                <!-- Style switcher -->
                <div id="style-switcher">
                    <div>
                        <ul class="text-center list-unstyled mb-0">
                            <li class="d-grid">
                                <a
                                    href="javascript:void(0)" class="rtl-version t-rtl-light"
                                    onclick="setTheme('style-rtl')"
                                >
                                    <img
                                        src="{{ asset('templates/landrick/images/demos/rtl.png') }}"
                                        class="img-fluid rounded-md shadow-md d-block" alt=""
                                    >
                                    <span class="text-muted mt-2 d-block">RTL Version</span>
                                </a>
                            </li>
                            <li class="d-grid">
                                <a
                                    href="javascript:void(0)" class="ltr-version t-ltr-light"
                                    onclick="setTheme('style')"
                                >
                                    <img
                                        src="{{ asset('templates/landrick/images/demos/ltr.png') }}"
                                        class="img-fluid rounded-md shadow-md d-block" alt=""
                                    >
                                    <span class="text-muted mt-2 d-block">LTR Version</span>
                                </a>
                            </li>
                            <li class="d-grid">
                                <a
                                    href="javascript:void(0)" class="dark-rtl-version t-rtl-dark"
                                    onclick="setTheme('style-dark-rtl')"
                                >
                                    <img
                                        src="{{ asset('templates/landrick/images/demos/dark-rtl.png') }}"
                                        class="img-fluid rounded-md shadow-md d-block" alt=""
                                    >
                                    <span class="text-muted mt-2 d-block">RTL Version</span>
                                </a>
                            </li>
                            <li class="d-grid">
                                <a
                                    href="javascript:void(0)" class="dark-ltr-version t-ltr-dark"
                                    onclick="setTheme('style-dark')"
                                >
                                    <img
                                        src="{{ asset('templates/landrick/images/demos/dark.png') }}"
                                        class="img-fluid rounded-md shadow-md d-block" alt=""
                                    >
                                    <span class="text-muted mt-2 d-block">LTR Version</span>
                                </a>
                            </li>
                            <li class="d-grid">
                                <a
                                    href="javascript:void(0)" class="dark-version t-dark mt-4"
                                    onclick="setTheme('style-dark')"
                                >
                                    <img
                                        src="{{ asset('templates/landrick/images/demos/dark.png') }}"
                                        class="img-fluid rounded-md shadow-md d-block" alt=""
                                    >
                                    <span class="text-muted mt-2 d-block">Dark Version</span>
                                </a>
                            </li>
                            <li class="d-grid">
                                <a
                                    href="javascript:void(0)" class="light-version t-light mt-4"
                                    onclick="setTheme('style')"
                                >
                                    <img
                                        src="{{ asset('templates/landrick/images/demos/ltr.png') }}"
                                        class="img-fluid rounded-md shadow-md d-block" alt=""
                                    >
                                    <span class="text-muted mt-2 d-block">Light Version</span>
                                </a>
                            </li>
                            <li class="d-grid">
                                <a href="../landing/index.html" target="_blank" class="mt-4">
                                    <img
                                        src="{{ asset('templates/landrick/images/demos/landing.png') }}"
                                        class="img-fluid rounded-md shadow-md d-block" alt=""
                                    >
                                    <span class="text-muted mt-2 d-block">Landing Demos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end Style switcher -->
            </div><!--end col-->
        </div>
    </div>

    <div class="offcanvas-footer p-3 border-top text-center">
        <ul class="list-unstyled social-icon mb-0">
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/4n73n" target="_blank" class="rounded"><i
                        class="ti ti-shopping-cart align-middle" title="Buy Now"
                    ></i></a></li>
            <li class="list-inline-item mb-0"><a
                    href="https://dribbble.com/shreethemes" target="_blank" class="rounded"
                ><i class="ti ti-brand-dribbble align-middle" title="dribbble"></i></a></li>
            <li class="list-inline-item mb-0"><a
                    href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"
                ><i class="ti ti-brand-facebook align-middle" title="facebook"></i></a></li>
            <li class="list-inline-item mb-0"><a
                    href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"
                ><i class="ti ti-brand-instagram align-middle" title="instagram"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i
                        class="ti ti-brand-twitter align-middle" title="twitter"
                    ></i></a></li>
            <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i
                        class="ti ti-mail align-middle" title="email"
                    ></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i
                        class="ti ti-world align-middle" title="website"
                    ></i></a></li>
        </ul><!--end icon-->
    </div>
</div>
<!-- Offcanvas End -->

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

<script>
    setTimeout(function(){
        $('.alert.alert-success.alert-block, .alert.alert-danger.alert-block').remove();
    }, 2000 );
</script>

@yield('footer-scripts')
</body>
</html>
