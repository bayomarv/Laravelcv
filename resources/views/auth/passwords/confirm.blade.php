@extends('layouts.app')

@section('content')
<div id="reset" class="reset">
    <div class="container">
        <div class="reset-wrapper">
            <h1>Confirm Password</h1>

                <div class="form-wrapper">
                    <p style="margin-bottom: 1rem;">Please confirm your password before continuing.</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf


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
                            <button type="submit" class="btn submit">
                                Confirm Password
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
</div>
@endsection