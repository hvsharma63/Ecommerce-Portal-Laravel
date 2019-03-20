@extends('layouts.frontend.app')
@section('title')
<title>Shipping</title>
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

	<div class="woocommerce">
		<div class="container">
			<div class="content-top">
				<h2>Checkout</h2>
				<p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p>
			</div><!--- .content-top-->
			<div class="checkout-step-process">
				<ul>
					<li>
						<div class="step-process-item"><i data-href="checkout-step1.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Checkout method</span></div>
					</li>
					<li>
						<div class="step-process-item"><i data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">Address</span></div>
					</li>
					<li>
						<div class="step-process-item active"><i class="step-icon-truck step-icon"></i><span class="text">Shipping</span></div>
					</li>
					<li>
						<div class="step-process-item"><i data-href="checkout-step4.html"  class="redirectjs  step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
					</li>
					<li>
						<div class="step-process-item"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
					</li>
				</ul>
			</div><!--- .checkout-step-process --->
			<div style="clear: both;"></div>
			<form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout" action="{{@route('order.shippingStore')}}" enctype="multipart/form-data" id="addForm" 
			>
				<input type="hidden" name="billingId" value="{{$billingId}}">
				{{@csrf_field()}}
				<ul class="step-list-info">
					@foreach($shippingData as $shipping)
					<li class="answer">
						<div class="title-step">Shipping Address<a href="#formView"  onclick="changeAdd({{$shipping->id}})">CHANGE</a></div>
						<p><strong>{{$shipping->firstName}}  {{$shipping->lastName}}</strong><br>
							{{$shipping->address}}<br>
							{{$shipping->city}} - {{$shipping->postcode}}<br>
							{{$shipping->state}}<br>
							{{$shipping->mobileNo}}<br>
						</p>
						<input type="radio" name="shippingId" id="{{$shipping->id}}" value="{{$shipping->id}}">
						<label for="{{$shipping->id}}">This Address</label>
					</li>
					@endforeach
					<li>
						<input type="radio" name="shippingId" value="newAddress" id="r1" required><label for="r1">New Address</label>
					</li>
				</ul>
			<div style="clear: both;"></div>

				<ul class="row">
					<li class="col-md-10">
						<div class="checkout-info-text addressForm" id="formView">
							<h3>shipping Address</h3>
						</div>

						<div class="woocommerce-shipping-fields addressForm">
							<ul class="row">
								<li class="col-md-6">
									<p class="form-row validate-required" id="shipping_first_name_field">
										<label for="shipping_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="firstName" id="firstName" placeholder="" value="">
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row validate-required" id="shipping_last_name_field">
										<label for="shipping_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="lastName" id="lastName" placeholder="">
									</p>
								</li>
								<li class="col-md-12  col-left-12">
									<p class="form-row  validate-required validate-email" id="shipping_email_field">
										<label for="shipping_email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="email" id="email" placeholder="" value="">
									</p>
								</li>
								<li class="col-md-12  col-left-12">
									<p class="form-row  validate-required validate-email" id="shipping_email_field">
										<label for="shipping_email" class="">Address <abbr class="required" title="required">*</abbr></label>
										<textarea  name="address" id="address" placeholder="" rows="3" style="width: 100%;border: 1px solid #dddee0;"></textarea>
										@if ($errors->has('address'))
										<span class="help-block label label-warning">
											<strong>{{ $errors->first('address') }}</strong>
										</span>
										@endif
									</p>
								</li>
								
								<li class="col-md-6">
									<p class="form-row address-field validate-zipCode woocommerce-validated" id="shipping_zipCode_field">
										<label for="shipping_zipCode" class="">Zip code <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="zipCode" id="zipCode" onkeyup="zipCodeData(this.value)">
										@if ($errors->has('zipCode'))
										<span class="help-block label label-warning">
											<strong>{{ $errors->first('zipCode') }}</strong>
										</span>
										@endif
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row validate-required validate-phone woocommerce-validated" id="shipping_phone_field">
										<label for="shipping_phone" class="">Phone number <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="mobileNo" id="mobileNo" placeholder="" value="">
										@if ($errors->has('mobileNo'))
										<span class="help-block label label-warning">
											<strong>{{ $errors->first('mobileNo') }}</strong>
										</span>
										@endif
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row form-row-wide address-field validate-required" id="shipping_city_field">
										<label for="shipping_city" class="">City <abbr class="required" title="required">*</abbr></label>
										<select class="form-control" name="city" id="city">
											<option selected>Enter zipcode to get city</option>
										</select>
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row address-field validate-state" id="shipping_state_field">
										<label for="shipping_state" class="">State/Province</label>
										<select class="form-control" name="state" id="state">
											<option selected>Enter zipcode to get state</option>
										</select>
									</p>
								</li>
							</ul>
						</div><!--- .woocommerce-shipping-fields--->	

						<div class="checkout-col-footer">
							<input type="submit" value="Continue" class="btn-step">
							<div class="note">(<span>*</span>) Required fields</div>
						</div><!--- .checkout-col-footer--->	
					</li>
				</ul>
			</form><!--- form.checkout--->
		</div><!--- .container--->
	</div><!--- .woocommerce--->
</div><!--- .main-container -->
@endsection
@section('script')
<script type="text/javascript">
	var $ = jQuery.noConflict();
	var i,option,select;
	selectCity = document.getElementById( 'city' );
	selectState = document.getElementById( 'state' );
	$('body').find('.addressForm').hide();
	$(document).on('change', '[type="radio"]', function() {
		var showFormVal = $(this).val();
		if(showFormVal=='newAddress')
		{	
			// $('#addForm')[0].reset();
			// $(this).val('newAddress');
			$("#city option").remove();
			$("#state option").remove();
			option = document.createElement( 'option' );
			option.text="Enter zipcode to get city"
			selectCity.add( option ); 
			option = document.createElement( 'option' );
			option.text="Enter zipcode to get state"
			selectState.add( option ); 
			$('.addressForm').show();
			// $('#addressForm').css('display','inline');
		}else{
			$('.addressForm').hide();
			// $('#addForm')[0].reset();
			// $('#addressForm').css('display','none');
		}

	});
    
    function zipCodeData(zipcode,city='')
    {
    	/* Username for postal code ============  breach , marc , code   ============== */
    	$.getJSON("http://api.geonames.org/postalCodeLookupJSON?postalcode="+zipcode+"&country=IN&username=breach",  
    		function(data) {
    			var dataArray = data.postalcodes;
    			$("#city option").remove();
    			$("#state option").remove();
    			$(".heapOptions li").remove();
    			option = document.createElement( 'option' );
    			option.text="Choose any one"
    			selectCity.add( option ); 
    			for (i = 0; i < dataArray.length; i++) { 
    				option = document.createElement( 'option' );
    				var cityName=dataArray[i]['placeName']+','+ dataArray[i]['adminName2'];
    				if (city!='')
    				{
    					if (city==cityName)
    					{
    						bSelected=true;
    						option.selected = bSelected;
    					}
    				}
    				option.value = option.text = cityName;	
    				selectCity.add( option );
    			}
    			option = document.createElement( 'option' );
    			option.value = option.text = dataArray[0]['adminName1'];	
    			selectState.add( option );
    		});
	}

	function changeAdd(id) {
		// console.log(id);
		$('#'+id).prop('checked', true)
		var request = jQuery.ajax({
			url: '{{ url('/shippingData') }}',
			type: 'POST',
			data: {shippingId:id,_token: "{{csrf_token()}}" },
			dataType: 'json'
		});
		request.done(function(response){
			var i;
			dataArray=response.shippingData;
			for(i=0;i<dataArray.length;i++)
			{
				console.log(dataArray);
				zipCodeData(dataArray[i]['zipCode'],dataArray[i]['city']);
				$('.addressForm').show();

				// $('#addressForm').css('display','inline');
				$('#firstName').val(dataArray[i]['firstName']);
				$('#lastName').val(dataArray[i]['lastName'])
				$('#email').val(dataArray[i]['email']);
				$('#address').html(dataArray[i]['address']);
				$('#mobileNo').val(dataArray[i]['mobileNo']);
				$('#zipCode').val(dataArray[i]['zipCode']);
			}
		});
		request.fail(function(){
			alert("Something went wrong. Try again.");
		});
	}
</script>
@endsection