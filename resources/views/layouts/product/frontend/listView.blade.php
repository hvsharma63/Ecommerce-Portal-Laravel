<ol class="products-list" id="products-list">
	@foreach($products as $product)
	<li class="item odd">
		<div class="row">
			<div class="col-mobile-12 col-xs-5 col-md-4 col-sm-4 col-lg-4">
				<div class="products-list-container">
					<div class="images-container">
						<div class="product-hover">
							<span class="sticker top-left"><span class="labelnew">New</span></span> 
							<a href="#" title="" class="product-image">
								<img id="product-collection-image-8" class="img-responsive" src="{{URL('resources/assets/products/'.$product->id.'/'.$product->thumbnail)}}" width="278" height="355" alt=""> 
								{{-- <span class="product-img-back"> 
									<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt=""> 
								</span> --}}
							</a>
							<div class="product-hover-box">
								<a class="detail_links" href="#"></a>
								<div class="link-view"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="product-shop col-mobile-12 col-xs-7 col-md-8 col-sm-8 col-lg-8">
				<div class="f-fix">
					<div class="product-primary products-textlink clearfix">
						<h2 class="product-name"><a href="{{ route('productDetail',['id'=>$product->id]) }}" title="Configurable Product">{{$product->name}}</a></h2>
						<div > <span class="regular-price"> <h3 class="price">Ram <span class="separator">:</span>{{$product->ram}}</h3> </span></div>
						<div > <span class="regular-price"> <h3 class="price">Battery <span class="separator">:</span>{{$product->battery}}</h3> </span></div>
						<div > <span class="regular-price"> <h3 class="price">Processor<span class="separator">:</span>{{$product->processor}}</h3> </span></div>
						<div> <h3 class="regular-price"> <span class="price">Rs. {{$product->price}}</span> </h3></div>
					</div>
					<div class="desc std">
						<p>Aliquam condimentum pharetra metus sed posuere. Ut euismod nisl sit amet enim consectetur volutpat. Nulla vitae magna dictum, adipiscing mauris eu, gravida tellus. Nulla tempor, felis feugiat fermentum suscipit.</p>
					</div>
					<div class="product-secondary actions-no actions-list clearfix">
						<p class="action">
							<button type="button" title="Add to Cart" class="button btn-cart pull-left" onclick="cartListing({{$product->id}})" ><span><i class="icon-handbag icons"></i><span>Add to Cart</span></span></button>
						</p>
					</div>
				</div>
			</div>
		</div>
	</li>
	@endforeach
</ol><!--- .products-list-->
