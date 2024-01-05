@extends('layouts.app')

@section('content')
<div id="create-form" class="create-form">
    <div class="container">
        <div class="create-form_wrapper">
            <h1 class="">Edit Certificate</h1>

            <div class="form-wrapper">
                <form action="{{route('certificate.update', $certificate)}}" method='POST'>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="certificate">Certificate</label>
                        <input type="text" class="@error('certificate') is-invalid @enderror" name="certificate" value="{{$certificate->certificate}}" required autocomplete="certificate" autofocus>

                        @error('certificate')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="issuer">Awarded by</label>
                        <input type="text" class="@error('issuer') is-invalid @enderror" name="issuer" value="{{$certificate->issuer}}" required autocomplete="issuer">

                        @error('issuer')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="left-col">
                            <label for="date">Date</label>
                            <input type="month" class="@error('date') is-invalid @enderror" name="date" value="{{$certificate->date->format('Y')}}-{{$certificate->date->format('m')}}" required autocomplete="date">

                            @error('date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                            
                        <div class="right-col">
                            <label for="address">Address</label>
                            <input type="text" class="@error('address') is-invalid @enderror" name="address" value="{{$certificate->address}}" autocomplete="address">

                            @error('address')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
