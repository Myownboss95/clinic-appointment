@extends('layouts.auth')

@section('content')
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
                                        <img src="{{ asset('lineone/images/logo-sm.svg') }}" alt="" height="28">
                                        <span class="logo-txt">{{ config('app.name') }}</span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                            <div class="avatar-xl mx-auto">
                                                <div class="avatar-title bg-light text-primary h1 rounded-circle">
                                                    <i class="bx bxs-user"></i>
                                                </div>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <h5>You are Logged Out</h5>
                                                <p class="text-muted font-size-15">Thank you for using <span class="fw-semibold text-dark">{{ config('app.name') }}</span></p>
                                                <div class="mt-4">
                                                    <a href="{{route('login')}}" class="btn btn-primary w-100 waves-effect waves-light">Sign In</a>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="mt-1 text-center">
                                        <p class="text-muted mb-0">Don't have an account ? <a href="{{ route('register') }}"
                                                class="text-primary fw-semibold">
                                                Signup now </a> </p>
                                    </div>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> {{ config('app.name') }} .
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
@endsection
