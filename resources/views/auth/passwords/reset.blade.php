@extends('layouts.app')

@section('content')
<div id="reset" class="reset">
    <div class="container">
        <div class="reset-wrapper">
            <h1>Reset Password</h1>

                <div class="form-wrapper">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email" class="">E-Mail Address</label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="">Password</label>

                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="">Confirm Password</label>

                            <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn submit">
                                Reset Password
                            </button>
                        </div>

                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
