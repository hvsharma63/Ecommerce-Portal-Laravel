@extends('layouts.frontend.app')
@section('title')
<title>Cart List</title>
@endsection
@section('content')
@php									
	$product = cartList();
@endphp

<div class="main-container col1-layout content-color color">
	<div class="breadcrumbs">
		<div class="container">
			<ul>
				<li class="home"> <a href="{{url('\index')}}" title="Go to Home Page">Home</a></li>
				<li> <strong>My cart</strong></li>
			</ul>
		</div>
	</div><!--- .breadcrumbs-->

	<div class="container">
		<div class="content-top no-border">
			<h2>My Cart</h2>
			@if(!empty($product))
			<div class="wish-list-notice"><i class="icon-check"></i>Product with Variants has been added to your wishlist. <a href="{{ url('/productList') }}">Click here</a> to continue shopping.</div>
			@endif
		</div>

		<div class="table-responsive-wrapper">
			<table class="table-order table-wishlist" id="cartProducts">
				<thead>
					<tr>
						<td>Remove</td>
						<td>Product Detail</td>
						<td>Add to cart</td>
						<td>Sub-Total</td>
					</tr>
				</thead>
				<tbody>
					@if(!empty($product))
					@foreach($product as $productlist)
					<tr class="{{$productlist['productId']}}">
						<td><button type="button" class="button-remove" onclick="removeProduct({{$productlist['productId']}})"><i class="icon-close"></i></button></td>
						<td>
							<table class="table-order-product-item">
								<tr>
									<td><img src="{{ url('/resources/assets/products/'.$productlist['productId'].'/'.$productlist['productThumb']) }}" height="100px" width="100px" /></td>
									<td><p align="left">{{$productlist['productName']}}</p>	</td>
								</tr>
							</table>
						</td>
						<td class="wish-list-control">
							{{$productlist['productPrice']}}
							<div class="number-input">
								<button type="button" class="minus" title="{{$productlist['productId']}}" onkeypress="return onlyNum(event)">-</button>
								<input type="text" class="qty" value="{{$productlist['productQty']}}" name="qty" id="qty" >
								<button type="button" class="plus" title="{{$productlist['productId']}}" onkeypress="return onlyNum(event)">+</button>
							</div>
							<!-- <button type="button" class="btn-step">ADD TO CART</button> -->
							<!-- <div class="edit_control"><button type="button" class="btn-edit"><i class="icon-note"></i> Edit</button></div> -->
						</td>
						<td id="divSub{{$productlist['productId']}}">
							<p align="center" id="divSubChange{{$productlist['productId']}}">{{$productlist['productSubTotal']}}</p>
						</td>
					</tr>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="4">
						<div class="wish-list-notice" style="font-size: 25px;color: #955251;"><i class="icon-close" style="font-size: 25px;"></i>No Product has been added to Cart. <a href="{{ url('/productList') }}">Click here</a> to continue shopping.</div></td>
					</tr>
					@endif
				</tbody>
			</table>
			@if(!empty($product))			
			<table class="table-order table-order-review-bottom" id="cartTotal">
				<tbody>
					<tr>
						<td class="first large" width="83%">Total Payment</td>
							<td width="20%" class="text-center" id="divTot"><span id="divTotChange">${{$productlist['productTotal']}}</span></td>
					</tr>
				</tbody>
				<tfoot>
					<td colspan="2">
						<div class="right">
							<input type="button" value="Back" class="btn-step">
							<a href="{{URL('/viewCart/checkout')}}" class="btn-step btn-highligh">Checkout</a>
						</div>
					</td>
				</tfoot>
			</table>
			@endif
		</div><!--- .table-responsive-wrapper-->
	</div><!--- .container-->
</div><!--- .main-container -->
@endsection
@section('script')
<script type="text/javascript">

	jQuery('body').on('click','.minus',function(){
		var productId=jQuery(this).attr('title')
		var qty= jQuery(this).next().val();
		if(qty>=1)
			cartListing(productId,qty);
	});
	jQuery('body').on('click','.plus',function(){
		var productId=jQuery(this).attr('title')
		var qty= jQuery(this).prev().val();
		cartListing(productId,qty);
	});
	function cartListing(productId,qty) {
		var request = jQuery.ajax({
			url: '{{ route('productFront.getProduct') }}',
			type: 'POST',
			data: {qty:qty,productId:productId,_token: "{{csrf_token()}}" },
		});
		request.done(function(response){
			jQuery('#cart-sidebar').html(response);
			jQuery("#divSub"+productId).load(location.href + " #divSubChange"+productId);
			jQuery("#divTot").load(location.href + " #divTotChange");
			jQuery.toast({
				heading: 'Well done!',
				showHideTransition: 'slide',
				text: 'Product quantity changed to cart',
				position: 'bottom-left',
				loaderBg: '#5ba035',
				icon: 'success',
				hideAfter: 5000,
				stack: 3
			});
			totalHide();
		});
		request.fail(function(){
			alert("Something went wrong. Try again.");
		});
	}

</script>
@endsection