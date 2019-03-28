<ul class="products-grid row products-grid--max-3-col last odd">
	@foreach ($products as $product)
	<li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item">
		<div class="category-products-grid">
			<div class="images-container">
				<div class="product-hover"> 
					<span class="sticker top-left"><span class="labelnew">New</span></span> 
					<a href="#" title="Configurable Product" class="product-image"> 
						<img id="product-collection-image-8" class="img-responsive" src="{{ url('/resources/assets/products/'.$product->id.'/'.$product->thumbnail) }}" alt="" height="355" width="278"> 
						<span class="product-img-back"> <img class="img-responsive" src="{{ url('/resources/assets/products/'.$product->id.'/'.$product->thumbnail) }}" alt="" height="355" width="278"> </span> 
					</a>
				</div>
				<div class="actions-no hover-box">
					<div class="actions">
						<button type="button" title="Add to Cart" class="button btn-cart" onclick="cartListing({{$product->id}})"><span><i class="icon-handbag icons"></i><span>Add to Cart</span></span></button>
					</div>
				</div>
			</div>
			<div class="product-info products-textlink clearfix">
				<h2 class="product-name"><a href="{{ route('productDetail',['id'=>$product->id]) }}" title="Configurable Product">{{$product->name}}</a></h2>
				<div > <span class="regular-price"> <h3 class="price">Ram <span class="separator">:</span>{{$product->ram}}<span class="separator">|</span>Battery <span class="separator">:</span>{{$product->battery}} mAh</h3> </span></div>
				<div > <span class="regular-price"> <h3 class="price">Processor<span class="separator">:</span>{{$product->processor}}</h3> </span></div>
				<div> <h3 class="regular-price"> <span class="price">$ {{$product->price}}</span> </h3></div>
			</div>
		</div>
	</li>	
	@endforeach
</ul><!--- .products-grid-->