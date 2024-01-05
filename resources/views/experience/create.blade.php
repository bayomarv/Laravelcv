@extends('layouts.app')

@section('content')
<div id="create-form" class="create-form">
    <div class="container">
        <div class="create-form_wrapper">
            <h1 class="">Add Work</h1>

            <div class="form-wrapper">
                <form action="{{ route('experience.store') }}" method='POST'>
                    @csrf

                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" class="@error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title" autofocus>

                        @error('job_title')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="employer">Employer</label>
                        <input type="text" class="@error('employer') is-invalid @enderror" name="employer" value="{{ old('employer') }}" required autocomplete="employer">

                        @error('employer')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="row form-group">
                        <div class="left-col">
                            <label for="start_date">Start Date</label>
                            <input type="month" class="@error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date">

                            @error('start_date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                            
                        <div class="right-col">
                            <label for="end_date">End Date</label>
                            <input type="month" class="@error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" autocomplete="end_date">       

                            <div class="" style="margin-top: 1rem;">
                                <label for="current_job"><strong>I currently work here</strong></label>
                                &nbsp;<input type="checkbox" name="current_job" value="{{ old('current_job') }}" style="width: auto;">
                            </div>

                            @error('end_date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror

                            @error('current_job')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="job_desc">Description</label>
                        <textarea class="myTextarea @error('job_desc') is-invalid @enderror" name="job_desc" rows="10">
                            {{ old('job_desc') }}
                        </textarea>

                        @error('job_desc')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
