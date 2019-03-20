@extends('layouts.frontend.app')
@section('title')
<title>Products</title>
@endsection
@section('content')
{{-- <body>
	<div class="wrapper">
		<div class="page"> --}}
			{{-- @php
				print_r(cartList());
				// die();
			@endphp --}}
			<div class="main-container col2-left-layout">
				<div class="breadcrumbs">
					<div class="container">
						<ul>
							<li class="home"> <a href="{{url('\index')}}" title="Go to Home Page">Home</a></li>
							<li class="category4"> <strong>Laptop List</strong></li>
						</ul>
					</div>
				</div><!--- .breadcrumbs-->
				<div class="container" onload="getData();">
					<div class="main">
						<div class="row">
							<div class="col-left sidebar col-lg-3 col-md-3 left-color color">
								<div class="block block-layered-nav block-layered-nav--no-filters">
									<div class="block-title"> <strong><span>Shop By</span></strong></div>
									<div class="block-content toggle-content">
										<p class="block-subtitle block-subtitle--filter">Filter</p>
										<dl id="narrow-by-list">
											<dt class="even">By Price</dt>
											<dd class="even">
												<div class="slider-ui-wrap">
													<div id="price-range" class="slider-ui" slider-min="0" slider-max="100000" slider-min-start="0" slider-max-start="100000"></div>
												</div>
												<div class="price-range-form">
													<input type="text" class="range_value range_value_min" target="#price-range" id="minValue" onkeypress="return onlyNum(event)"/> - <input type="text" class="range_value range_value_max" target="#price-range" id="maxValue" onkeypress="return onlyNum(event)"/>
													<input type="button" class="btn-submit" value="OK" onclick="getData()" />
												</div> 
											</dd>
											<dt class="odd">By Brands</dt>
											<dd class="odd">
												<ul>
													@foreach($categories as $category)
													<li class="level0 level-top">
														<div class="checkbox">
															<label><input type="checkbox" class="chckCategory" value="{{$category->id}}" onclick="getData()"><a  class="level-top"><span>{{$category->name}}</span></a></label>
														</div>
													</li>
													@endforeach
												</ul>
											</dd>
											<dt class="even">By Colors</dt>
											<dd class="even">
												<ol class="configurable-swatch-list">
													@foreach($colors as $color)	
													<li> 
														<div class="checkbox">
															<label><input type="checkbox" class="chckColor" value="{{$color->id}}" onclick="getData()"><a class="level-top"><span>{{$color->colorName}} ({{$color->colorCount}})</span></a></label>
														</div>
													</li>
													@endforeach
												</ol>
											</dd>
										</dl>
									</div>
								</div><!--- .block-layered-nav-->
							</div><!--- .sidebar-->
							<div class="col-main col-lg-9 col-md-9 content-color color">
								<div class="page-title category-title">
									<h1>Laptop</h1>
								</div>
								<p class="category-image"><img src="http://placehold.it/875x360" alt="Men" title="Men"></p>
								<div class="category-products">
									<div class="toolbar">
										<div class="sorter">
											<p class="view-mode"> 
												<label>View as:</label> 
												<a href="javascript:void(0)" id="grid" title="Grid" class="redirectjs grid" onclick="getData(this.id)"> <i class="icon-grid icons"></i> </a> 
												<a href="javascript:void(0)" id="list" title="List" class="list active" onclick="getData(this.id)"> <i class="icon-list icons"></i> </a>
											</p>
											<div class="sort-by">
												<label>Sort By</label> 
												<select id="sortData" onchange="getData()">
													<option value="position" selected="selected" > Position</option>
													<option value="name"> Name</option>
													<option value="price"> Price</option>
												</select>
												<a href="#" title="Set Descending Direction"><img src="assets/images/i_asc_arrow.gif" alt="Set Descending Direction" class="v-middle"></a>
											</div>
											<div class="limiter">
												<label>Show</label> 
												<select>
													<option value="9" selected="selected"> 9</option>
													<option value="12"> 12</option>
													<option value="15"> 15</option>
												</select>
											</div>
											<div class="pager">
												<div class="pages">
													<strong>Page:</strong>
													<ol>
													{{-- {{$products->links()}} --}}
														{{-- <li class="current">1</li>
														<li><a href="#">2</a></li>
														<li class="bor-none"> <a class="next i-next" href="#" title="Next"> <i class="fa fa-angle-right">&nbsp;</i> </a></li> --}}
													</ol>
												</div>
											</div>
										</div>
									</div><!--- .toolbar-->
									<div id="productList" >

									</div>
								</div><!--- .category-products-->
							</div><!--- .col-main-->
						</div><!--- .row-->
					</div><!--- .main-->
				</div><!--- .container-->

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
			</div>
@endsection
@section('script')
<script type="text/javascript">
	var view='';
	getData(value='list');
	function getData(value='NULL') {
		if(value!='NULL')
		{
			view = value;
			jQuery('#'+view).attr('class','active');
			if(view=="grid")
			{
				jQuery('#'+view).attr('class','active');
				jQuery('#list').attr('class','');
			}else{
				jQuery('#'+view).attr('class','active');
				jQuery('#grid').attr('class','');
			}
		}
		var $jq = jQuery.noConflict();
		var getSort= $jq('#sortData').children(":selected").val();

		if(getSort=='position')
			getSort='id';
		var minValue = $jq('#minValue').val();
		var maxValue = $jq('#maxValue').val();

		var getCategory = [];
		$jq('.chckCategory:checked').map(function(){
			getCategory.push(this.value);
		}).get();

		var getColor = [];
		$jq('.chckColor:checked').map(function(){
			getColor.push(this.value);
		}).get();

		var request = jQuery.ajax({
			url: '{{ route('productFront.filterData') }}',
			type: 'POST',
			data: {getCategory:getCategory,getColor:getColor,getSort:getSort,minValue:minValue,maxValue:maxValue,view:view,_token: "{{csrf_token()}}" },
			dataType: 'html'
		});
		request.done(function(response){
			jQuery('#productList').html(response);
		});
		request.fail(function(){
			alert("Something went wrong. Try again.");
		});
	}

	function cartListing(productId) {
		jQuery('#LoadingModal').modal({backdrop: 'static', keyboard: false})   	
		var request = 
		jQuery.ajax({
			url: '{{ route('productFront.getProduct') }}',
			type: 'POST',
			data: {qty:1,productId:productId,_token: "{{csrf_token()}}" },
		});
		request.done(function(response){
			jQuery('#cart-sidebar').html(response);
			jQuery.toast({
				heading: 'Well done!',
				showHideTransition: 'slide',
				text: 'Product added to cart',
				position: 'bottom-left',
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