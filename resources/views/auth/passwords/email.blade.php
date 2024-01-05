@extends('layouts.app')

@section('content')

<div id="reset" class="reset">
    <div class="container">
        <div class="reset-wrapper">
            <h1>Reset Password</h1>

            @if (session('status'))
                <div class="success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-wrapper">
                <form method="POST" action="{{ route('password.email') }}">
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
                        <button type="submit" class="btn submit">
                            Send Password Reset Link
                        </button>
                    </div>
          
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
