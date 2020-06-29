@extends('layouts.front')

@section('content')
<section class="banner-section p120">
	<div class="container">
		<div class="banner-text">
			<h2>Register</h2>
			<p>Please Register to have access to all videos and many more.</p>
		</div><!--banner-text end-->
	</div>
</section><!--banner-section end-->

<section class="form_popup">
	
	<div class="signup_form" id="signup_form">
		<div class="hd-lg">
			<img src="images/logo.png" alt="">
			<span>Register your account</span>
		</div><!--hd-lg end-->
		<div class="user-account-pr">
			<form method="POST" action="{{ route('register') }}">
                @csrf
				<div class="input-sec mgb25">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
					<label>Letters A-Z or a-z , Numbers 0-9 and Underscores _</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="input-sec">
				    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="input-sec">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="input-sec">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Re-enter password">
				</div>

				<!--
					<div class="input-sec flatpickr">
					<input type="number" name="date" class="flatpickr-input" placeholder="Select Date..." data-input>
					</div>
				-->
				<div class="input-sec mb-0">
					<button type="submit">Signup</button>
				</div><!--input-sec end-->
			</form>
			<div class="form-text">
				<p>By signing up you agree to our <a href="{{ url('privacy-policy') }}" title="">Privacy Policy</a>.</p>
			</div>
		</div><!--user-account end--->
		<div class="fr-ps">
			<h1>Already have an account? <a href="{{ url('login') }}" title="Login" class="show_signup">Login here</a></h1>
		</div><!--fr-ps end-->
	</div><!--login end--->
	
</section><!--form_popup end-->
@endsection
