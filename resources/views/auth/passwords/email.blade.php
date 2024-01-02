@extends('layouts.auth')

@section('title', 'Recover password')
@section('content')

    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0">Reset Password</h5>
            <p class="text-muted mt-2">Reset Password to Continue.</p>
        </div>
        <div class="alert alert-success text-center my-4" role="alert">
            Enter your Email and instructions will be sent to you!
        </div>
        <form class="mt-4" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-floating form-floating-custom mb-4">
                <input type="email" name="email" class="form-control" id="input-email" placeholder="Enter Email">
                <label for="input-email">Email</label>
                <div class="form-floating-icon">
                    <i data-feather="mail"></i>
                </div>
            </div>
            <div class="mb-3 mt-4">
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reset</button>
            </div>
        </form>

        <div class="mt-5 text-center">
            <p class="text-muted mb-0">Remember It ? <a href="{{ route('login') }}" class="text-primary fw-semibold"> Sign
                    In </a> </p>
        </div>
    </div>

@endsection
