@extends('layouts.app')

@section('content')
<div id="login" class="login">
    <div class="container">
        <div class="login-wrapper">
            <h1>Login</h1>

            <div class="form-wrapper">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="">E-Mail Address</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="">Password</label>

                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="" type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }} style="width: auto">

                            <label class="form-check-label remember-me" for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn submit">
                            Login
                        </button>

                        @if (Route::has('password.request'))
                            <a class="forgot-password" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection