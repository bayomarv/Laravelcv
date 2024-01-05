@extends('layouts.app')

@section('content')
<div id="create-form" class="create-form">
    <div class="container">
		<div class="create-form_wrapper">
			<h1 class="">Personal Details</h1>

			<div class="form-wrapper">
				<form action="{{ route('user-detail.store') }}" method='POST'>
				    @csrf

				    <div class="row form-group">

				    	<div class="left-col">
	                        <label for="first_name">First Name</label>
	                        <input type="text" class="@error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

	                        @error('first_name')
	                            <span class="invalid-feedback">
	                                {{ $message }}
	                            </span>
	                        @enderror
	                    </div>

	                    <div class="right-col">
	                        <label for="last_name">Last Name</label>
	                        <input type="text" class="@error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

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
	                		<select class="" name="gender" value="{{ old('gender') }}">
	                			<option>----------</option>
	                			<option value="male">Male</option>
								<option value="female">female</option>
	                		</select>
	                	</div>


	                	<div class="right-col">
	                		<label for="age">Date of Birth:</label>
							<input class="@error('age') is-invalid @enderror" type="date" name="age"  value="{{ old('age') }}" required autocomplete="age">

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
	                        <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

	                        @error('email')
	                            <span class="invalid-feedback">
	                                {{ $message }}
	                            </span>
	                        @enderror
	                    </div>

	                    <div class="right-col">
	                        <label for="phone">Phone</label>
	                        <input type="number" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

	                        @error('phone')
	                            <span class="invalid-feedback">
	                                {{ $message }}
	                            </span>
	                        @enderror
	                    </div>
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

                    <div class="form-group">
	                    <label for="summary">Professional Summary/Objective</label>
	                    <textarea name="summary" class="@error('summary') is-invalid @enderror" required rows="10">
	                    	{{ old('summary') }}
	                    </textarea>

	                    @error('summary')
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
