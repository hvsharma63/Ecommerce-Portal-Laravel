@extends('layouts.frontend.app')
@section('title')
<title>Login</title>
@endsection
@section('content')
<div class="main-container col1-layout content-color color">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="wrapper-page">
					<div class="account-pages">
						<div class="account-box">								
							<div class="account-content">
								<form action="{{ route('login') }}" method="POST" class="login form-in-checkout ">
									{{@csrf_field()}}
									<div class="checkout-info-text">
										<h3>Login</h3>
										<p>Already Registed? Please login below.</p>
									</div>
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
										<input class="input-text" type="hidden" name="userSide" value="userOnly">
									</p>
									@if ($errors->has('password'))
									<span class="help-block label label-warning errorText">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
									@endif
									<!-- <p class="form-row">
										<a class="lost_username" href="#">Forgot your username?</a>
									</p>
									<p class="form-row">
										<a class="lost_password" href="#">Forgot your password?</a>
									</p> -->
									<div class="clear"></div>
									<div class="checkout-col-footer">
										<input type="submit" class="button btn-step" name="login" value="Login">
										<label for="rememberme" class="inline">
											<input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me?
										</label>

									</div>
									<div class="clear"></div>
								</form>
								<div class="row m-t-50">
									<div class="col-sm-12 text-center">
										<p class="text-muted">Don't have an account? <a href="{{URL('/register')}}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection