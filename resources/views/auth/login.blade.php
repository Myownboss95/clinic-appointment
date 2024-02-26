@extends('layouts.auth')

@section('title', 'Login')
@section('content')

    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0">Welcome Back !</h5>
            <p class="text-muted mt-2">Sign in to continue to {{ $settings->app_name ?? config('app.name') }}.</p>
        </div>
        <form class="mt-4 pt-2" method="post" action="{{ url('/login') }}">
            @csrf
            <div class="form-floating form-floating-custom mb-4">
                <input type="text" class="form-control  @error('email') is-invalid @enderror" id="input-email"
                    placeholder="Enter User Name" value="{{ old('email') }}" name="email">
                <label for="input-email">Email</label>
                <div class="form-floating-icon">
                    <i data-feather="mail"></i>
                </div>
                @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror" id="password-input"
                    placeholder="Enter Password" name="password">

                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
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

            <div class="row mb-4">
                <div class="col">
                    <div class="form-check font-size-15">
                        <input class="form-check-input" type="checkbox" id="remember-check">
                        <label class="form-check-label font-size-13" for="remember-check">
                            Remember me
                        </label>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
            </div>
        </form>

        <div class="mt-4 pt-2 text-center">
            <div class="signin-other-title">
                <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
            </div>

            <ul class="list-inline mb-0">
                {{-- <li class="list-inline-item">
                    <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li> --}}
                <li class="list-inline-item">
                    <a href="{{ route('login.google') }}" class="social-list-item bg-danger text-white border-danger">
                        <i class="mdi mdi-google"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mt-3 text-center">
            <p class="text-muted mb-0"><a href="{{ route('password.request') }}" class="text-primary fw-semibold">
                    Forgot Password?</a> </p>
        </div>
        <div class="mt-1 text-center">
            <p class="text-muted mb-0">Don't have an account ? <a href="{{ route('register') }}"
                    class="text-primary fw-semibold">
                    Signup now </a> </p>
        </div>
    </div>






@endsection
