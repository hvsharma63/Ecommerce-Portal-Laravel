@extends('layouts.frontend.app')
@section('title')
<title>Register</title>
@endsection
@section('content')
<div class="main-container col1-layout content-color color">
	<div class="container">
		<div class="main">
			<div class="row">
				<div class="col-lg-12 offset-3" style="padding-top: 100px;padding-bottom: 100px">
					<form action="{{route('register')}}" class="login form-in-checkout" method="post">
						{{ csrf_field() }}
						<div class="checkout-info-text ">
							<h3>Registration </h3>
						</div>
						<p class="form-row">
							<label for="username">First Name <span class="required">*</span></label>
							<input type="text" class="input-text" name="firstName" id="firstName">
						</p>
						@if ($errors->has('firstName'))
						<span class="help-block label label-warning errorText">
							<strong>{{ $errors->first('firstName') }}</strong>
						</span>
						@endif
						<p class="form-row">
							<label for="username">Last Name <span class="required">*</span></label>
							<input type="text" class="input-text" name="lastName" id="lastName">
						</p>
						@if ($errors->has('lastName'))
						<span class="help-block label label-warning errorText">
							<strong>{{ $errors->first('lastName') }}</strong>
						</span>
						@endif
						<p class="form-row">
							<label for="username">Email address <span class="required">*</span></label>
							<input type="text" class="input-text" name="email" id="email">
						</p>
						@if ($errors->has('email'))
						<span class="help-block label label-warning errorText">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
						<p class="form-row">
							<label for="password">Password <span class="required">*</span></label>
							<input class="input-text" type="password" name="password" id="password">
						</p>
						@if ($errors->has('password'))
						<span class="help-block label label-warning errorText">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
						<p class="form-row">
							<label for="password">Confirm Password <span class="required">*</span></label>
							<input class="input-text" type="password" name="password_confirmation" id="password_confirmation">
						</p>
						@if ($errors->has('confirmed'))
						<span class="help-block label label-warning errorText">
							<strong>{{ $errors->first('confirmed') }}</strong>
						</span>
						@endif
						<p class="form-row">
							<label for="username">Mobile No. <span class="required">*</span></label>
							<input type="text" class="input-text" name="mobileNo" id="mobileNo">
						</p>
						@if ($errors->has('mobileNo'))
						<span class="help-block label label-warning errorText">
							<strong>{{ $errors->first('mobileNo') }}</strong>
						</span>
						@endif
						<div class="form-row m-b-20">
							<div class="col-12">
								<div class="checkbox checkbox-success">
									<input id="remember" type="checkbox" unchecked name="remember_token">
									<label for="remember">
										I accept <a href="#">Terms and Conditions</a>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group row text-center m-t-10">
							<div class="col-12">
								<button class="btn btn-md  btn-primary waves-effect waves-light" type="submit" >Sign Up Free</button>
							</div>
						</div>
					</form>
					<div class="row m-t-50">
						<div class="col-12 text-center">
							<p class="text-muted">Already have an account?  <a href="{{URL('/login')}}" class="text-dark m-l-5"><b>Sign In</b></a></p>
						</div>
					</div>						
				</div>			
			</div>
		</div>
	</div>
</div>
@endsection