@extends('layouts.app')

@section('content')
<div id="create-form" class="create-form">
    <div class="container">
        <div class="create-form_wrapper">
            <h1 class="">Add Education</h1>

            <div class="form-wrapper">
                <form action="{{ route('education.store') }}" method='POST'>
                    @csrf

                    <div class="form-group">
                        <label for="school_name">School Name</label>
                        <input type="text" class="@error('school_name') is-invalid @enderror" name="school_name" value="{{ old('school_name') }}" required autocomplete="school_name" autofocus>

                        @error('school_name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="row form-group">
                        <div class="left-col">
                            <label for="degree">Degree</label>
                            <input type="text" class="@error('degree') is-invalid @enderror" name="degree" value="{{ old('degree') }}" required autocomplete="degree">

                            @error('degree')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="right-col">
                            <label for="field_of_study">Field of Study</label>
                            <input type="text" class="@error('field_of_study') is-invalid @enderror" name="field_of_study" value="{{ old('field_of_study') }}"  autocomplete="field_of_study">

                            @error('field_of_study')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
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
                                <label for="current_school"><strong>I currently attend here</strong></label>
                                &nbsp;<input type="checkbox" name="current_school" value="{{ old('current_school') }}" style="width: auto;">
                            </div>

                            @error('end_date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror

                            @error('current_school')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edu_desc">Description</label>
                        <textarea class="myTextarea @error('edu_desc') is-invalid @enderror" name="edu_desc" rows="10">
                            {{ old('edu_desc') }}
                        </textarea>

                        @error('edu_desc')
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