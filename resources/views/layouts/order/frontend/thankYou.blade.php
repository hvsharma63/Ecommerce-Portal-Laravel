@extends('layouts.frontend.app')
@section('title')
<title>Thank you</title>
@endsection
@section('content')

<div class="main-container col1-layout content-color color">
	<div class="breadcrumbs">
		<div class="container">
			<ul>
				<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
				<li> <strong>Checkout</strong></li>
			</ul>
		</div>
	</div><!--- .breadcrumbs-->

	<div class="woocommerce text-center" >
		<div class="container">
			<div class="content-top" style="margin-bottom: 15px;">
				<h2>THANK YOU </h2>
				<p>Your Order will be soon confirmed by us.</p>
			</div>
			<div class="checkout-step-process">
				<h2>
					Having trouble? <a href="">Contact us</a>
				</h2>
				<p class="lead">
					<a class="btn btn-default btn-lg" href={{URL('/index')}} role="button">Continue to homepage</a>
					<a class="btn btn-success btn-lg" href={{URL('/orderHistory')}} role="button">Check Order Status</a>
				</p>
			</div><!--- .checkout-step-process-->
		</div><!--- .container-->	
	</div><!--- .woocommerce-->
</div><!--- .main-container -->
@endsection