@extends('layouts.app')

@section('content')
<div id="create-form" class="create-form">
    <div class="container">
        <div class="create-form_wrapper">
            <h1 class="">Edit Work</h1>

            <div class="form-wrapper">
                <form action="{{route('experience.update', $experience)}}" method='POST'>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" class="@error('job_title') is-invalid @enderror" name="job_title" value="{{$experience->job_title}}" required autocomplete="job_title" autofocus>

                        @error('job_title')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="employer">Employer</label>
                        <input type="text" class="@error('employer') is-invalid @enderror" name="employer" value="{{$experience->employer}}" required autocomplete="employer">

                        @error('employer')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror" name="address" value="{{$experience->address}}" autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="row form-group">
                        <div class="left-col">
                            <label for="start_date">Start Date</label>
                            <input type="month" class="@error('start_date') is-invalid @enderror" name="start_date" value="{{$experience->start_date->format('Y')}}-{{$experience->start_date->format('m')}}" required autocomplete="start_date">

                            @error('start_date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                            
                        <div class="right-col">
                            <label for="end_date">End Date</label>
                            <input type="month" class="@error('end_date') is-invalid @enderror" name="end_date" value="@if ($experience->end_date) {{$experience->end_date->format('Y')}}-{{$experience->end_date->format('m')}} @endif" autocomplete="end_date"> 

                            <div class="" style="margin-top: 1rem;">
                                <label for="current_job"><strong>I currently work here</strong></label>
                                &nbsp;<input type="checkbox" name="current_job" value=" {{ $experience->current_job }}"  @if ($experience->current_job) checked @endif style="width: auto;">

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
                            {{ $experience->job_desc }}
                        </textarea>

                        @error('job_desc')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
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
