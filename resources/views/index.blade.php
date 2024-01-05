@extends('layouts.app')

@section('content')
<div class="hero">
	<div class="container">
		<div class="hero-wrapper">			
			<div>
				<h1>Create Your Resume in 5 Minutes</h1>
				<div class="hero-buttons">
					<a href="{{ route('user-detail.create') }}" class="btn hero-btn">Get Started</a>
					<a href="{{ route('register') }}" class="btn next" style="">Register</a>
				</div>
			</div>
			<div class="img-wrapper"><img src="{{asset('storage/images/cv.png')}}" alt=""></div>

		</div>
	</div>
</div>


@endsection
