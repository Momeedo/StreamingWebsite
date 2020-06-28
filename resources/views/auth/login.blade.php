@extends('layouts.front')

@section('content')

<section class="banner-section p120">
	<div class="container">
		<div class="banner-text">
			<h2>Sign In</h2>
			<p>Please sign in to have access to all channels.</p>
		</div><!--banner-text end-->
	</div>
</section><!--banner-section end-->

<section class="form_popup">
	<div class="login_form" id="login_form">
		<div class="hd-lg">
			<img src="images/logo.png" alt="">
			<span>Log into your account</span>
		</div><!--hd-lg end-->
		<div class="user-account-pr">
			<form method="POST" action="{{ route('login') }}">
                @csrf
				<div class="input-sec">
					<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="input-sec">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="chekbox-lg">
					<label>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<b class="checkmark"> </b>
						<span>{{ __('Remember Me') }}</span>
					</label>
				</div>
				<div class="input-sec mb-0">
					<button type="submit">{{ __('Login') }}</button>
				</div><!--input-sec end-->
			</form>
            @if (Route::has('password.request'))
			<a href="{{ route('password.request') }}" title="" class="fg_btn">Forgot password?</a>
            @endif
		</div><!--user-account end--->
		<div class="fr-ps">
			<h1>Don’t have an account? <a href="register.html" title="" class="show_signup"> Signup here</a></h1>
		</div><!--fr-ps end-->
	</div><!--login end--->
</section><!--form_popup end-->
@endsection
