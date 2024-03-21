
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title', 'Login') | {{ config('app.name') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Clinic Template" name="description" />
    <meta content="Clinic" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('lineone/images/favicon.ico') }}">


    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('lineone/css/preloader.min.css') }}" type="text/css" />
    <link href="{{ asset('clinic/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('clinic/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('clinic/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('clinic/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('lineone/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('lineone/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('lineone/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="dark">
    @php
        $settings = app(App\Settings\GeneralSettings::class);
    @endphp
    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="{{ url('/') }}" class="d-block auth-logo">
                                        <img src="{{ asset('lineone/images/logo-sm.svg') }}" alt=""
                                            height="28">
                                        <span class="logo-txt">{{ $settings->app_name ?? config('app.name') }}</span>
                                    </a>
                                </div>
                                @yield('content')
                                <a href="{{ $settings->whatsapp_contact}}" target="_blank" class="btn btn-success" style="margin-left: -5px;">
                                    <i class="bi bi-whatsapp" style="font-size: 18px;"></i> Chat with an Admin</a>
                                 <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> {{ $settings->app_name ?? config('app.name') }} 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                @include('partials.auth-column')
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>

                                <!-- JAVASCRIPT -->
                                <script src="{{ asset('lineone/js/libs/jquery/jquery.min.js') }}"></script>
                                <script src="{{ asset('lineone/js/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                                <script src="{{ asset('lineone/js/libs/metismenu/metisMenu.min.js') }}"></script>
                                <script src="{{ asset('lineone/js/libs/simplebar/simplebar.min.js') }}"></script>
                                <script src="{{ asset('lineone/js/libs/node-waves/waves.min.js') }}"></script>
                                <script src="{{ asset('lineone/js/libs/feather-icons/feather.min.js') }}"></script>
                                <!-- pace js -->
                                <script src="{{ asset('lineone/js/libs/pace-js/pace.min.js') }}"></script>

                                <script src="{{ asset('lineone/js/js/pages/pass-addon.init.js') }}"></script>

                                <script src="{{ asset('lineone/js/js/pages/feather-icon.init.js') }}"></script>

</body>

</html>
