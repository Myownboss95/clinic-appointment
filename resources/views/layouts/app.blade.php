@php
        $settings = app(App\Settings\GeneralSettings::class);
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $settings->app_name ?? config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    
    @livewireStyles
    @stack('third_party_stylesheets')

    @stack('page_css')
    <!-- plugin css -->
    @vite(['resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="{{ asset('lineone/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('lineone/css/select2.min.css')}}" rel="stylesheet" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('lineone/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('lineone/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('lineone/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('lineone/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="dark">
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{url('/')}}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('lineone/images/logo-sm.svg') }}" alt="" height="30">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('lineone/images/logo-sm.svg') }}" alt="" height="24">
                                <span class="logo-txt">{{ $settings->app_name ?? config('app.name') }}</span>
                            </span>
                        </a>

                        <a href="{{url('/')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('lineone/images/logo-sm.svg') }}" alt="" height="30">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('lineone/images/logo-sm.svg') }}" alt="" height="24">
                                <span class="logo-txt">{{ $settings->app_name ?? config('app.name') }}</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button> 
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="search" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Search Result">

                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img id="header-lang-img" src="{{ asset('lineone/images/flags/us.jpg') }}"
                                alt="Header Language" height="16">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                                <img src="{{ asset('lineone/images/flags/us.jpg') }}" alt="user-image" class="me-1"
                                    height="12"> <span class="align-middle">English</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                                <img src="{{ asset('lineone/images/flags/spain.jpg') }}" alt="user-image"
                                    class="me-1" height="12"> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                                <img src="{{ asset('lineone/images/flags/germany.jpg') }}" alt="user-image"
                                    class="me-1" height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                                <img src="{{ asset('lineone/images/flags/italy.jpg') }}" alt="user-image"
                                    class="me-1" height="12"> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                                <img src="{{ asset('lineone/images/flags/russia.jpg') }}" alt="user-image"
                                    class="me-1" height="12"> <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ profilePicture(auth()->user()) }}" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ userName() }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('profile.index') }}"><i
                                    class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i
                                        class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->

        @include('layouts.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> 
                        </div>
                        <div class="col-sm-6">
                            {{-- <div class="text-sm-end d-none d-sm-block">
                                Maintained by <a href="#!"
                                    class="text-decoration-underline">{{ $settings->app_name ?? config('app.name') }}</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('lineone/js/libs/jquery/jquery.min.js') }}"></script> 
    <script src="{{ asset('lineone/js/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lineone/js/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('lineone/js/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('lineone/js/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('lineone/js/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('lineone/js/libs/pace-js/pace.min.js') }}"></script>

    <!-- nouisliderribute js -->
    <script src="{{ asset('lineone/js/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('lineone/js/libs/wnumb/wNumb.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('lineone/js/js/pages/product-filter-range.init.js') }}"></script>
    <script src="{{asset('lineone/js/js/pages/pass-addon.init.js')}}"></script>
    <script src="{{asset('lineone/js/js/pages/password-addon.init.js')}}"></script>


    <script src="{{ asset('lineone/js/js/app.js') }}"></script> 
    {{-- @livewireScripts
    @powerGridScripts --}}
@stack('scripts')
@stack('page_scripts')
</body>

</html>
