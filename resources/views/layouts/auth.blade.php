<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | {{ config('app.name') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Clinic Template" name="description" />
    <meta content="Clinic" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('lineone/images/favicon.ico')}}">


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
    @yield('content')

    <!-- JAVASCRIPT -->
    <script src="{{asset('lineone/js/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('lineone/js/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lineone/js/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('lineone/js/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('lineone/js/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('lineone/js/libs/feather-icons/feather.min.js')}}"></script>
        <!-- pace js -->
        <script src="{{asset('lineone/js/libs/pace-js/pace.min.js')}}"></script>

    <script src="{{asset('lineone/js/js/pages/pass-addon.init.js')}}"></script>

    <script src="{{asset('lineone/js/js/pages/feather-icon.init.js')}}"></script>

</body>

</html>
