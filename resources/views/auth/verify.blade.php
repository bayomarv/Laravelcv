@extends('layouts.app')

@section('content')
<div id="verify" class="verify">
    <div class="container">
        <div class="verify-wrapper">
            <h1>Verify Your Email Address</h1>

            @if (session('resent'))
                <div class="success">
                    A fresh verification link has been sent to your email address
                </div>
            @endif

            <p>Before proceeding, please check your email for a verification link</p>
            <p class="text">If you did not receive the email,</p>
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn submit">click here to request another </button>.
            </form>
        </div>
    </div>
</div>
@endsection
