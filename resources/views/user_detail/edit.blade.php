@extends('layouts.app')

@section('content')
<div id="create-form" class="create-form">
    <div class="container">
        <div class="create-form_wrapper">
            <h1 class="">Edit Personal Details</h1>

            <div class="form-wrapper">
                <form action="{{route('user-detail.update', $userDetail)}} " method='POST' class="p-3">
                    @csrf
                    @method('PUT')

                    <div class="row form-group">

                        <div class="left-col">
                            <label for="first_name">First Name</label>
                            <input type="text" class="@error('first_name') is-invalid @enderror" name="first_name" value="{{$userDetail->first_name}}" required>

                            @error('first_name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="right-col">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="@error('last_name') is-invalid @enderror" name="last_name" value="{{$userDetail->last_name}}" required>

                            @error('last_name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="left-col">
                            <label for="gender">Gender</label>
                            <select class="" name="gender" value="{{$userDetail->gender}}" required>
                                <option>----------</option>
                                <option value="male">Male</option>
                                <option value="female">female</option>
                            </select>
                        </div>


                        <div class="right-col">
                            <label for="age">Date of Birth:</label>
                            <input class="@error('age') is-invalid @enderror" type="date" name="age" value="{{$userDetail->age->format('Y')}}-{{$userDetail->age->format('m')}}-{{$userDetail->age->format('d')}}" required>

                            @error('age')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>  
                    </div>

                    <div class="row form-group">

                        <div class="left-col">
                            <label for="email">Email</label>
                            <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{$userDetail->email}}" required>

                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="right-col">
                            <label for="phone">Phone</label>
                            <input type="number" class="@error('phone') is-invalid @enderror" name="phone" value="{{$userDetail->phone}}" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror" name="address" value="{{$userDetail->address}}" autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summary">Professional Summary/Objective</label>
                        <textarea name="summary" class="@error('summary') is-invalid @enderror" value="{{ old('summary') }}" required rows="10">
                            {{$userDetail->summary}}
                        </textarea>

                        @error('summary')
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
