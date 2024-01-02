@extends('layouts.auth')

@section('title', 'Password Confirm')
@section('content')
    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0">Please confirm your password before continuing.</h5>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" required autocomplete="current-password">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-lock"></span></div>
                </div>
                @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>


            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Confirm Password</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
        </p>
    </div>
