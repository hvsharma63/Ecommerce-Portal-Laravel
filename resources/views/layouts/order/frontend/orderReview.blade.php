@extends('layouts.frontend.app')
@section('title')
<title>Order Review</title>
@endsection
@section('content')
@php									
	$product = cartList();
	$i=0;				
@endphp
<div class="main-container col1-layout content-color color">
	<div class="breadcrumbs">
		<div class="container">
			<ul>
				<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
				<li> <strong>Checkout</strong></li>
			</ul>
		</div>
	</div><!--- .breadcrumbs-->

	<div class="woocommerce">
		<div class="container">
			<div class="content-top">
				<h2>Checkout</h2>
				<p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p>
			</div>
			<div class="checkout-step-process">
				<ul>
					<li>
						<div class="step-process-item"><i data-href="checkout-step1.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Checkout method</span></div>
					</li>
					<li>
						<div class="step-process-item"><i data-href="checkout-step2.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Address</span></div>
					</li>
					<li>
						<div class="step-process-item"><i class="fa fa-check step-icon"></i><span class="text">Shipping</span></div>
					</li>
					<li>
						<div class="step-process-item"><i data-href="checkout-step3.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Delivery & Payment</span></div>
					</li>
					<li>
						<div class="step-process-item active"><i data-href="checkout-step4.html" class="redirectjs step-icon icon-notebook"></i><span class="text">Order Review</span></div>
					</li>
				</ul>
			</div><!--- .checkout-step-process-->						

			<ul class="row">
				<li class="col-md-9 col-padding-right">
					<table class="table-order table-order-review">
						<thead>
							<tr>
								<td width="68">Product Name</td>
								<td width="14">price</td>
								<td width="14">QTY</td>
								<td width="14">Total</td>
							</tr>
						</thead>
						<tbody>
							@if(!empty($product))
							@foreach($product as $productlist)
							<tr>
								<td class="name">{{$productlist['productName']}}</td>
								<td>${{$productlist['productPrice']}}</td>
								<td>{{$productlist['productQty']}}</td>
								<td class="price">${{$productlist['productSubTotal']}}</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
					<table class="table-order table-order-review-bottom">
						<tr>
							<td class="first" width="80%">Total Payment</td>
							<td class="price large" width="20%">${{$productlist['productTotal']}}</td>
						</tr>
						<tfoot>
							<td colspan="2">
								<div class="left">Forgot an Item? <a href="#">Edit Your Cart</a></div>
								<div class="right">
									<form method="POST" id="orderForm" action="{{URL('/placeOrder')}}">
										{{@csrf_field()}}
										<input type="hidden" name="billingId" id="billingId">
										<input type="hidden" name="shippingId" id="shippingId">
										{{-- <input type="hidden" name="shippingName" id="shippingName"> --}}
										{{-- <input type="button" value="Back" class="btn-step"> --}}
										<a href="{{URL('/billingCheckout')}}" class="btn-step" >Back</a>
										<input type="submit" value="Place Order" class="btn-step btn-highligh">
									</form>
								</div>
							</td>
						</tfoot>
					</table>
				</li>
				<li class="col-md-3">
					<ul class="step-list-info">
						<li>
							<div class="title-step">Billing Address</div>
							{{-- {{dd($billingData)}} --}}
							@foreach($billingData as $billing)
							<p><strong id="billingGetId" title="{{$billing->id}}">{{$billing->firstName}}  {{$billing->lastName}}</strong><br>
								{{$billing->address}}<br>
								{{$billing->city}} - {{$billing->zipCode}}<br>
								{{$billing->state}}<br>
								{{$billing->mobileNo}}<br>
							</p>
							@endforeach
						</li>
						<li>
							<div class="title-step">Shipping Address</div>
							@foreach($shippingData as $shipping)
							<p><strong id="shippingGetId" title="{{$shipping->id}}">{{$shipping->firstName}}  {{$shipping->lastName}}</strong><br>
								{{$shipping->address}}<br>
								{{$shipping->city}} - {{$shipping->zipCode}}<br>
								{{$shipping->state}}<br>
								{{$shipping->mobileNo}}<br>
							</p>
							@endforeach
						</li>
						{{-- <li>
							<div class="title-step">Shipping Method<a href="#">CHANGE</a></div>
							<p>Flat Rate - Fixed $15.00</p>
						</li>
						<li>
							<div class="title-step">Payment Method<a href="#">CHANGE</a></div>
							<p>Check / Money order</p>
						</li> --}}
					</ul>
				</li>
			</ul>

			<div class="line-bottom" onload="addValue()"></div>
		</div><!--- .container-->	
	</div><!--- .woocommerce-->

	<div class="alo-brands">
		<div class="container">
			<div class="main">
				<div class="row">
					<div class="col-lg-12">
						<div id="footer-brand">
							<ul class="magicbrand">
								<li> <a href="#"> <img class="brand img-responsive" src="http://placehold.it/190x80/ffffff" alt="brands_01" title="brands_01" /> </a></li>
								<li> <a href="#"> <img class="brand img-responsive" src="http://placehold.it/190x80/ffffff" alt="brands_02" title="brands_02" /> </a></li>
								<li> <a href="#"> <img class="brand img-responsive" src="http://placehold.it/190x80/ffffff" alt="brands_03" title="brands_03" /> </a></li>
								<li> <a href="#"> <img class="brand img-responsive" src="http://placehold.it/190x80/ffffff" alt="brands_04" title="brands_04" /> </a></li>
								<li> <a href="#"> <img class="brand img-responsive" src="http://placehold.it/190x80/ffffff" alt="brands_05" title="brands_05" /> </a></li>
								<li> <a href="#"> <img class="brand img-responsive" src="http://placehold.it/190x80/ffffff" alt="brands_06" title="brands_06" /> </a></li>
							</ul>
						</div><!-- #footer-brand -->									
					</div>
				</div>
			</div>
		</div><!-- .container-->
	</div><!-- .alo-brands -->	
</div><!--- .main-container -->
@endsection
@section('script')
<script type="text/javascript">
	addValue();
	var $ = jQuery.noConflict();
	function addValue() {
		var billing = jQuery('#billingGetId').attr('title');
		jQuery('#billingId').val(billing);
		var shipping = jQuery('#shippingGetId').attr('title');
		jQuery('#shippingId').val(shipping);
	}
</script>
@endsection