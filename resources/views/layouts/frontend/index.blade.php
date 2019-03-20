@extends('layouts.frontend.app')
@section('content')
<div class="main-container col1-layout content-color color">
	<div class="alo-block-slide">
		<div class="container-none flex-index flex-dark-style">
			<div class="flexslider">
				<div id="slider-index" class="slides">
					<div class="item"> 
						<a  href="#"> <img src="{{URL('resources/assets/front_images/banner/1.jpg')}}" alt="magicslider"> </a>
						<div class="bx-caption play start">
							<div class="container">
								<div class="text-slide">
									<p class="fa fa-apple caption6">
										<span class="hidden">hidden</span>
									</p>
									<h3 class="caption1">iPhone 6</h3>
									<h3 class="caption2">iPhone 6 at its largest.</h3>
									<h2 class="caption3">And thinnest.</h2>
									<p class="icon-anchor icons caption5">
										<span class="hidden">hidden</span>
									</p>
									<h2 class="caption4"><a href="#" class="btn-shop">Learn more</a></h2>
								</div>
							</div>
						</div>
					</div>
					<div class="item"> 
						<a  href="#"> <img src="{{URL('resources/assets/front_images/banner/2.png')}}" alt="magicslider"> </a>
						<div class="bx-caption ">
							<div class="container">
								<div class="text-slide">
									<h3 class="caption1">Beats Audio</h3>
									<h3 class="caption2">Acquire Beats Music & </h3>
									<h2 class="caption3">Beats Electronics</h2>
									<p class="icon-anchor icons caption5"><span class="hidden">hidden</span></p>
									<h2 class="caption4"><a href="#" class="btn-shop">Learn more</a></h2>
								</div>
							</div>
						</div>
					</div>
					<div class="item"> 
						<a  href="#"> <img src="{{URL('resources/assets/front_images/template1/slide_v2_2.jpg')}}" alt="magicslider"> </a>
						<div class="bx-caption ">
							<div class="container">
								<div class="text-slide">
									<p class="fa fa-apple caption6">
										<span class="hidden">hidden</span>
									</p>
									<h3 class="caption1">iPhone 6</h3>
									<h3 class="caption2">iPhone 6 at its largest.</h3>
									<h2 class="caption3">And thinnest.</h2>
									<p class="icon-anchor icons caption5">
										<span class="hidden">hidden</span>
									</p>
									<h2 class="caption4"><a href="#" class="btn-shop">Learn more</a></h2>
								</div>
							</div>
						</div>
					</div>
				</div><!--#slider-index-->
			</div>
		</div>
	</div>
	<div class="alo-block-static clearfix">
		<div class="container-none">
			<div class="block-banner block-banner-home">
				<div class="container-content">
					<div class="banner-col banner-col-1">
						<div class="banner-col banner-col-1-1">
							<a href="#"><img class="img-responsive" alt="Sample banner" src="{{URL('resources/assets/front_images/template1/V2_01.jpg')}}" /></a>
							<div class="text-middle banner-center"><p class="text-middle1">Beats by Dr. Dre Studio Wireless</p><p class="text-middle1">Over-Ear Headphones</p></div>
						</div>
						<div class="banner-col banner-col-1-2">
							<img class="img-responsive" alt="Sample banner" src="{{URL('resources/assets/front_images/template1/V2_02.jpg')}}" />
							<div class="text-middle banner-center"><a class="button-custom button-custom-now btn-lg" href="#">shop now</a></div>
						</div>
						<div class="banner-col banner-col-1-3">
							<a href="#"><img class="img-responsive" alt="Sample banner" src="{{URL('resources/assets/front_images/template1/V2_03.jpg')}}" /></a>
							<div class="text-middle banner-center">
								<h2>iPod touch</h2>
								<p class="text-middle3">Powerful apps included.</p>
								<p class="text-middle3">Get right to work. And play.</p>
							</div>
						</div>
					</div>
					<div class="banner-col banner-col-2">
						<div class="banner-col banner-col-2-1">
							<a href="#"><img class="img-responsive" alt="Sample banner" src="{{URL('resources/assets/front_images/template1/V2_04.jpg')}}" /></a>
							<div class="text-middle banner-center">
								<h2><strong>iPod</strong> Stuffle</h2>
								<p class="text-middle3">There&rsquo;s an apple iPod Stuffle</p>
								<p class="text-middle3">for everyone.</p>
							</div>
						</div>
						<div class="banner-col banner-col-2-2">
							<img class="img-responsive" alt="Sample banner" src="{{URL('resources/assets/front_images/template1/V2_05.jpg')}}" />
							<div class="text-middle banner-center">
								<h2>iMac Retina 5K</h2>
								<p class="text-middle5">14.7 mililion pixel. and the</p>
								<p class="text-middle5">power to do beautiful things with</p>
								<p class="text-middle5">theme.</p> 
								<a class="button-custom button-custom-now btn-lg" href="#">shop now</a>
							</div>
						</div>
					</div>
					<div class="banner-col banner-col-3">
						<div class="banner-col banner-col-3-1">
							<img class="img-responsive" alt="Sample banner" src="{{URL('resources/assets/front_images/template1/V2_06.jpg')}}" />
							<div class="text-middle banner-center">
								<h2>iPhone 6</h2>
								<p class="text-middle6">iPhone at its lagest.</p>
								<p class="text-middle6">and thinnest.</p> 
								<a class="button-custom button-custom-now btn-lg" href="#">shop now</a>
							</div>
						</div>
						<div class="banner-col banner-col-3-2">
							<img class="img-responsive" alt="Sample banner" src="{{URL('resources/assets/front_images/template1/V2_07.jpg')}}" />
							<div class="text-middle banner-center">
								<h2>Apple EarPods.</h2>
								<p class="text-middle7">Completely re-imagined</p>
								<p class="text-middle7">from the sound up.</p> 
								<a class="button-custom button-custom-now btn-lg" href="#">shop now</a>
							</div>
						</div>
						<div class="banner-col banner-col-3-3">
							<a href="#"><img class="img-responsive" alt="Sample banner" src="{{URL('resources/assets/front_images/template1/V2_08.jpg')}}" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="main">
			<div class="row">
				<div class="col-main col-lg-12">
					<div class="block block-subscribe popup" style="display:none;">
						<div id="popup-newsletter"  src="{{URL('resources/assets/front_images/popup-newletter.jpg')}}" width="810" height="500">
							<form action="#/" method="post" id="popup-newsletter-validate-detail">
								<div class="block-content">
									<img src="{{URL('resources/assets/front_images/template1/logo-newletter.png')}}" alt=""/>
									<div class="form-subscribe-header block-title"> <label for="newsletter">Subscribe</label></div>
									<p>For all the latest news, products, collection...</p>
									<p>Subscribe now to get 20% off</p>
									<div class="newsletter-new clearfix">
										<div class="input-box"> <input type="text" name="email" id="pnewsletter" title="Sign up for our newsletter" class="input-text required-entry validate-email" placeholder="Your email adress ..."/></div>
										<div class="actions"> 
											<button type="submit" title="Subscribe" class="button">
												<span><i class="fa fa-play"></i></span>
											</button>
										</div>
									</div>
									<div class="subscribe-bottom"> <input type="checkbox" />Don’t show this popup again</div>
								</div>
							</form>
						</div>
					</div>
					<div class="std">
						<div class="block-custom block-custom1">
							<div class="featured-product-tab">
								<div class= "magicproduct">
									<div class="block-title-tabs">
										<ul class="magictabs">
											<li class="item" data-type ="mc-bestseller"><span class ="title">Bestseller</span></li>
											<li class="item active" data-type ="mc-featured"><span class ="title">Featured Products</span></li>
											<li class="item" data-type ="mc-newproduct"><span class ="title">New Products</span></li>
										</ul>
									</div>
									<div class="content-products">
										<div class="mage-magictabs mc-featured active">
											<ul class="flexisel-content products-grid featured bx-slider-active zoomOut play">
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-left">
																	<span class="labelnew">New</span>
																</span>
																<a href="#" title="Apple Watch Edition" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Apple Watch Edition" /> 
																	<span class="product-img-back">
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Apple Watch Edition" />
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Apple Watch Edition">Apple Watch Edition</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$790.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<a href="#" title="Men Phone 5-3G" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Men Phone 5-3G" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Men Phone 5-3G" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Men Phone 5-3G">Men Phone 5-3G</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$620.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span> 
																<a href="#" title="Samsung Galaxy S5 16Gb" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Samsung Galaxy S5 16Gb" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Samsung Galaxy S5 16Gb" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Samsung Galaxy S5 16Gb">Samsung Galaxy S5 16Gb</a></h2>
															<div class="price-box">
																<p class="old-price">
																	<span class="price-label">Regular Price:</span> 
																	<span class="price"> $756.00 </span>
																</p>
																<p class="special-price"> 
																	<span class="price-label">Special Price</span>
																	<span class="price"> $602.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<a href="#" title="27-inch iMac" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="27-inch iMac" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="27-inch iMac" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="27-inch iMac">27-inch iMac</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$1,110.00</span> 
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-left">
																	<span class="labelnew">New</span>
																</span> 
																<a href="#" title="sale watches" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="sale watches" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="sale watches" />
																	</span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="sale watches">sale watches</a></h2>
															<div class="price-box">
																<span class="regular-price" > 
																	<span class="price">$369.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-left"><span class="labelnew">New</span></span> 
																<a href="#" title="Product Accessories" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Product Accessories" /> 
																	<span class="product-img-back"> <img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Product Accessories" /> </span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Product Accessories">Product Accessories</a></h2>
															<div class="price-box">
																<span class="regular-price" > <span class="price">$579.00</span> </span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span>
																<a href="#" title="Fermentum suscipit" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Fermentum suscipit" /> 
																	<span class="product-img-back">
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Fermentum suscipit" /> 
																	</span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Fermentum suscipit">Fermentum suscipit</a></h2>
															<div class="price-box">
																<p class="old-price">
																	<span class="price-label">Regular Price:</span>
																	<span class="price"> $237.00 </span>
																</p>
																<p class="special-price">
																	<span class="price-label">Special Price</span> 
																	<span class="price"> $124.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span>
																<a href="#" title="Big Smartphone" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Big Smartphone" /> 
																	<span class="product-img-back"> <img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Big Smartphone" /> </span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Big Smartphone">Big Smartphone</a></h2>
															<div class="price-box">
																<p class="old-price"> 
																	<span class="price-label">Regular Price:</span>
																	<span class="price"> $456.00 </span>
																</p>
																<p class="special-price"> 
																	<span class="price-label">Special Price</span>
																	<span class="price"> $134.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div><!-- .mc-featured -->
										<div class="mage-magictabs mc-bestseller">
											<ul class="flexisel-content products-grid featured bx-slider-active zoomOut play">
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-left">
																	<span class="labelnew">New</span>
																</span> 
																<a href="#" title="sale watches" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="sale watches" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="sale watches" />
																	</span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="sale watches">sale watches</a></h2>
															<div class="price-box">
																<span class="regular-price" > 
																	<span class="price">$369.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-left">
																	<span class="labelnew">New</span>
																</span>
																<a href="#" title="Apple Watch Edition" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Apple Watch Edition" /> 
																	<span class="product-img-back">
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Apple Watch Edition" />
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Apple Watch Edition">Apple Watch Edition</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$790.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<a href="#" title="Men Phone 5-3G" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Men Phone 5-3G" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Men Phone 5-3G" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Men Phone 5-3G">Men Phone 5-3G</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$620.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span> 
																<a href="#" title="Samsung Galaxy S5 16Gb" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Samsung Galaxy S5 16Gb" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Samsung Galaxy S5 16Gb" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Samsung Galaxy S5 16Gb">Samsung Galaxy S5 16Gb</a></h2>
															<div class="price-box">
																<p class="old-price">
																	<span class="price-label">Regular Price:</span> 
																	<span class="price"> $756.00 </span>
																</p>
																<p class="special-price"> 
																	<span class="price-label">Special Price</span>
																	<span class="price"> $602.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<a href="#" title="27-inch iMac" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="27-inch iMac" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="27-inch iMac" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="27-inch iMac">27-inch iMac</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$1,110.00</span> 
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-left"><span class="labelnew">New</span></span> 
																<a href="#" title="Product Accessories" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Product Accessories" /> 
																	<span class="product-img-back"> <img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Product Accessories" /> </span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Product Accessories">Product Accessories</a></h2>
															<div class="price-box">
																<span class="regular-price" > <span class="price">$579.00</span> </span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span>
																<a href="#" title="Fermentum suscipit" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Fermentum suscipit" /> 
																	<span class="product-img-back">
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Fermentum suscipit" /> 
																	</span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Fermentum suscipit">Fermentum suscipit</a></h2>
															<div class="price-box">
																<p class="old-price">
																	<span class="price-label">Regular Price:</span>
																	<span class="price"> $237.00 </span>
																</p>
																<p class="special-price">
																	<span class="price-label">Special Price</span> 
																	<span class="price"> $124.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span>
																<a href="#" title="Big Smartphone" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Big Smartphone" /> 
																	<span class="product-img-back"> <img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Big Smartphone" /> </span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Big Smartphone">Big Smartphone</a></h2>
															<div class="price-box">
																<p class="old-price"> 
																	<span class="price-label">Regular Price:</span>
																	<span class="price"> $456.00 </span>
																</p>
																<p class="special-price"> 
																	<span class="price-label">Special Price</span>
																	<span class="price"> $134.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div><!-- .mc-bestseller -->
										<div class="mage-magictabs mc-newproduct">
											<ul class="flexisel-content products-grid featured bx-slider-active zoomOut play">
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span>
																<a href="#" title="Big Smartphone" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Big Smartphone" /> 
																	<span class="product-img-back"> <img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Big Smartphone" /> </span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-Search icon-stroke icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Big Smartphone">Big Smartphone</a></h2>
															<div class="price-box">
																<p class="old-price"> 
																	<span class="price-label">Regular Price:</span>
																	<span class="price"> $456.00 </span>
																</p>
																<p class="special-price"> 
																	<span class="price-label">Special Price</span>
																	<span class="price"> $134.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-left">
																	<span class="labelnew">New</span>
																</span> 
																<a href="#" title="sale watches" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="sale watches" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="sale watches" />
																	</span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="sale watches">sale watches</a></h2>
															<div class="price-box">
																<span class="regular-price" > 
																	<span class="price">$369.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-left">
																	<span class="labelnew">New</span>
																</span>
																<a href="#" title="Apple Watch Edition" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Apple Watch Edition" /> 
																	<span class="product-img-back">
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Apple Watch Edition" />
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Apple Watch Edition">Apple Watch Edition</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$790.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<a href="#" title="Men Phone 5-3G" class="product-image">
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Men Phone 5-3G" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Men Phone 5-3G" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Men Phone 5-3G">Men Phone 5-3G</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$620.00</span>
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span> 
																<a href="#" title="Samsung Galaxy S5 16Gb" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Samsung Galaxy S5 16Gb" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Samsung Galaxy S5 16Gb" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Samsung Galaxy S5 16Gb">Samsung Galaxy S5 16Gb</a></h2>
															<div class="price-box">
																<p class="old-price">
																	<span class="price-label">Regular Price:</span> 
																	<span class="price"> $756.00 </span>
																</p>
																<p class="special-price"> 
																	<span class="price-label">Special Price</span>
																	<span class="price"> $602.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<a href="#" title="27-inch iMac" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="27-inch iMac" />
																	<span class="product-img-back"> 
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="27-inch iMac" /> 
																	</span>
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span> 
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="27-inch iMac">27-inch iMac</a></h2>
															<div class="price-box"> 
																<span class="regular-price" > 
																	<span class="price">$1,110.00</span> 
																</span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover">
																<span class="sticker top-left"><span class="labelnew">New</span></span> 
																<a href="#" title="Product Accessories" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Product Accessories" /> 
																	<span class="product-img-back"> <img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Product Accessories" /> </span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions">
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left"><a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> <a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Product Accessories">Product Accessories</a></h2>
															<div class="price-box">
																<span class="regular-price" > <span class="price">$579.00</span> </span>
															</div>
														</div>
													</div>
												</li>
												<li class="item item-animate">
													<div class="per-product">
														<div class="images-container">
															<div class="product-hover"> 
																<span class="sticker top-right">
																	<span class="labelsale">Sale</span>
																</span>
																<a href="#" title="Fermentum suscipit" class="product-image"> 
																	<img class="img-responsive" src="http://placehold.it/278x355" width="278" height="355" alt="Fermentum suscipit" /> 
																	<span class="product-img-back">
																		<img class="img-responsive" src="http://placehold.it/278x355?text=hover" width="278" height="355" alt="Fermentum suscipit" /> 
																	</span> 
																</a>
															</div>
															<div class="actions-no hover-box">
																<div class="actions"> 
																	<button type="button" title="Add to Cart" class="button btn-cart pull-left">
																		<span><i class="icon-handbag icons"></i><span>Add to Cart</span></span>
																	</button>
																	<ul class="add-to-links pull-left">
																		<li class="pull-left">
																			<a href="#" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a>
																		</li>
																		<li class="pull-left">
																			<span class="separator">|</span>
																			<a href="#" title="Add to Compare" class="link-compare"><i class="icon-Files icon-stroke icons"></i>Add to Compare</a>
																		</li>
																		<li class="link-view pull-left"> 
																			<a title="Quick View" href="#" class="link-quickview"><i class="icon-magnifier icons"></i>Quick View</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="products-textlink clearfix">
															<h2 class="product-name"> <a href="#" title="Fermentum suscipit">Fermentum suscipit</a></h2>
															<div class="price-box">
																<p class="old-price">
																	<span class="price-label">Regular Price:</span>
																	<span class="price"> $237.00 </span>
																</p>
																<p class="special-price">
																	<span class="price-label">Special Price</span> 
																	<span class="price"> $124.00 </span>
																</p>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div><!-- .mc-newproduct -->
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="block-static block_testimonials">
		<div class="testimonials">
			<div class="container">
				<div>
					<div id="testimonial">
						<div class="block-title-tabs"></div>
						<ul class="testimonial">
							<li>
								<div class="testimonial_text">
									<p class="fa-over"><i class="fa fa-quote-right"></i></p> 
									<span class="sub-text"> Coming together is a beginning, keeping together is progress, working together is success. </span>
									<p class="title-name">our clients say</p>
									<p class="name">Creative Designer</p>
								</div>
							</li>
							<li>
								<div class="testimonial_text">
									<p class="fa-over"><i class="fa fa-quote-right"></i></p> 
									<span class="sub-text"> “ nouthemes.com exists to help you get the most out of your software - ecommerce store.” </span>
									<p class="title-name">NOUTHEMES</p>
									<p class="name">Creative Designer</p>
								</div>
							</li>
						</ul>
					</div>
					<div class="actions"></div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection