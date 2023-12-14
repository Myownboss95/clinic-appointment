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
                                        <h5 class="mb-0">Register a new membership</h5>
                                    </div>
                                    <form class="mt-4 pt-2" method="post" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" id="input-name" placeholder="Enter User Name"
                                                name="name" required>
                                            <div class="invalid-feedback">
                                                Please Enter Full Name
                                            </div>
                                            <label for="input-name">Full Name</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                            @error('name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                                id="input-email" placeholder="Enter Email" value="{{ old('email') }}"
                                                name="email">
                                            <label for="input-email">Email</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="mail"></i>
                                            </div>
                                            @error('email')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password"
                                                class="form-control pe-5 @error('password') is-invalid @enderror"
                                                id="password-input" placeholder="Enter Password" name="password">

                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                            @error('password')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password"
                                                class="form-control pe-5 @error('password_confirmation') is-invalid @enderror"
                                                id="password-input_confirmation" placeholder="Confirm Password"
                                                name="password_confirmation">

                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-password_confirmation">Confirm Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                            @error('password_confirmation')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <livewire:country-state-selector/>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-check font-size-15">
                                                    <input class="form-check-input" type="checkbox" id="remember-check"
                                                        name="terms" value="agree">
                                                    <label class="form-check-label font-size-13" for="remember-check">
                                                        I agree to the <a href="#">terms</a>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Sign Up</button>
                                        </div>
                                    </form>

                                    <div class="mt-4 pt-2 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign up with -</h5>
                                        </div>

                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ route('register.google')}}"
                                                    class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-1 text-center">
                                        <p class="text-muted mb-0">Have an account ? <a href="{{ route('login') }}"
                                                class="text-primary fw-semibold">
                                                Login </a> </p>
                                    </div>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> {{ config('app.name') }} . Crafted with <i
                                            class="mdi mdi-heart text-danger"></i> by Themesbrand
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
