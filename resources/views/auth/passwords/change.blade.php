@extends('layouts.auth')

@section('title', 'Update Password')
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
                                        <h5 class="mb-0">Update your password</h5>
                                        <p class="text-muted mt-2">Ensure you use a secure password.</p>
                                    </div>
                                    <form class="mt-4 pt-2" method="post" action="{{ route('password.update') }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password"
                                                class="form-control pe-5 @error('current_password') is-invalid @enderror"
                                                id="current-password-input" placeholder="Enter your current password" name="current_password">

                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="current-password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-current-password">Current password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                            @error('current_password')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password"
                                                class="form-control pe-5 @error('password') is-invalid @enderror"
                                                id="password-input" placeholder="Enter New password" name="password">

                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-new-password">New password</label>
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
                                                id="confirm-password-input" placeholder="Confirm password" name="password_confirmation">

                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="confirm-password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-confirm-password">Confirm password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                            @error('password_confirmation')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Update Password</button>
                                        </div>
                                    </form>
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
