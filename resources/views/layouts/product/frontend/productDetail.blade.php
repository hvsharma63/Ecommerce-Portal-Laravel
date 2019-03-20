@extends('layouts.frontend.app')
@section('title')
<title>Product Details</title>
@endsection
@section('content')

{{-- {{dd($products)}} --}}
@foreach($products as $product)
<div class="main-container col2-left-layout ">
	<div class="breadcrumbs">
		<div class="container">
			<ul>
				<li class="home"> <a href="{{url('\index')}}" title="Go to Home Page">Home</a></li>
				<li class="category4"> <a href="{{url('productList')}}" title="Laptop List">List</a></li>
				<li class="category4"> <strong>Laptop Detail</strong></li>
			</ul>
		</div>
	</div><!--- .breadcrumbs-->
				
	<div class="container">
		<div class="main">
			<div class="row">
				<div class="col-main col-lg-12">
					<div class="product-view">
						<div class="product-essential">
							<div class="row">
								<div class="product-img-box clearfix col-md-5 col-sm-5 col-xs-12">
									<div class="product-img-content">
										<div class="product-image product-image-zoom">
											<div class="product-image-gallery"> <span class="sticker top-left"><span class="labelnew">New</span></span><span class="sticker top-right"><span class="labelsale">Sale</span></span> <img id="image-main"
												class="gallery-image visible img-responsive"
												src="{{URL('resources/assets/products/'.$product->id.'/'.$product->thumbnail)}}"
												alt="Short Sleeve Dress"
												title="Short Sleeve Dress" />
											</div>
										</div><!--- .product-image-->
										<div class="more-views">
											<h2>More Views</h2>
											<ul class="product-image-thumbs">
												@php
												$i=0;
												@endphp
												@foreach ($productImages as $image)
												<li> <a class="thumb-link" href="#" title="" data-image-index="{{$i}}"> <img class="img-responsive" src="{{URL('resources/assets/products/'.$product->id.'/'.$image->image)}}"
													alt="" /> </a>
												</li>
												@php
												$i++;
												@endphp
												@endforeach
											</ul>
										</div><!--- .more-views -->
									</div><!--- .product-img-content-->
								</div><!--- .product-img-box-->
								<div class="product-shop col-md-7 col-sm-7 col-xs-12">
									<div class="product-shop-content">
										<div class="product-name">
											<h1>{{$product->name}}</h1>
										</div>
										<div class="product-type-data">
											<div class="price-box">
												<p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> {{$product->price}} </span></p>
											</div>
											<p class="availability in-stock">Availability: <span>{{$product->stock}} in  stock</span></p>
											<div class="products-sku"> <span class="text-sku">Product Code:{{$product->upc}}</span> </div>
										</div>
										<div class="short-description">
											<h2>Ram:{{$product->ram}}</h2>
											<h2>Battery:{{$product->battery}}</h2>
											<h2>Processor:{{$product->processor}}</h2>
											<p>Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis ...</p>
										</div>
										<div class="add-to-box">
											<div class="product-qty">
												<label for="qty">Qty:</label>
												<div class="custom-qty"> <input type="text" name="qty" id="qty" maxlength="2" value="1" title="Qty" class="input-text qty" onkeypress="return onlyNum(event)" /> <button  type="button" class="increase items" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"> <i class="fa fa-plus"></i> </button> <button  type="button" class="reduced items" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--;return false;"> <i class="fa fa-minus"></i> </button></div>
											</div>
											<div class="add-to-cart"> <button type="button" title="Add to Cart" class="button btn-cart" onclick="cartListing({{$product->id}})"> <span> <span class="view-cart icon-handbag icons">Add to Cart</span> </span> </button></div>
										</div>
										<div class="addit">
											<div class="alo-social-links clearfix">
											</div>
										</div>
									</div><!--- .product-shop-content-->
								</div><!--- .product-shop-->
							</div>
						</div><!--- .product-essential-->
					</div><!--- .product-view-->
				</div><!--- .col-main-->
			</div><!--- .row-->
		</div><!--- .main-->
	</div><!--- .container-->
</div>
@endforeach
@endsection
@section('script')
<script type="text/javascript">
	function cartListing(productId) {
		var qty = jQuery('#qty').val();
		console.log(productId);
		var request = jQuery.ajax({
			url: '{{ route('productFront.getProduct') }}',
			type: 'POST',
			data: {qty:qty,productId:productId,_token: "{{csrf_token()}}" },
		});
		request.done(function(response){
			jQuery('#cart-sidebar').html(response);

			jQuery.toast({
				heading: 'Well done!',
				showHideTransition: 'slide',
				text: 'Product added to cart successfully',
				position: 'bottom-right',
				loaderBg: '#5ba035',
				icon: 'success',
				hideAfter: 5000,
				stack: 3
			});
		});
		request.fail(function(){
			alert("Something went wrong. Try again.");
		});
	}
</script>
@endsection