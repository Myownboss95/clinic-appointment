@extends('layouts.auth')

@section('title', 'Verify Mail')
@section('content')
    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0">Verify Your Email Address</h5>
        </div>



        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                A fresh verification link has been sent to your email address
            </div>
        @endif
        <p>
            Before proceeding, please check your email for a verification link.If you did not receive
            the email,
        </p>

        <a href="#" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
            click here to request another
        </a>
        <form id="resend-form" action="{{ route('verification.resend') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>



@endsection
