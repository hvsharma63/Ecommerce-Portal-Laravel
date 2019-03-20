@extends('layouts.frontend.app')
@section('title')
<title>Billing</title>
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
	</div>

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
						<div class="step-process-item active"><i data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">Address</span></div>
					</li>
					<li>
						<div class="step-process-item"><i class="step-icon-truck step-icon"></i><span class="text">Shipping</span></div>
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
			<form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout" action="{{@route('order.billingStore')}}" enctype="multipart/form-data" id="addForm" 
			>
				{{@csrf_field()}}
				<ul class="step-list-info">
					@foreach($billingData as $billing)
					<li class="answer">
						<div class="title-step">Billing Address<a href="#formView"  onclick="changeAdd({{$billing->id}})">CHANGE</a></div>
						<p><strong>{{$billing->firstName}}  {{$billing->lastName}}</strong><br>
							{{$billing->address}}<br>
							{{$billing->city}} - {{$billing->postcode}}<br>
							{{$billing->state}}<br>
							{{$billing->mobileNo}}<br>
						</p>
						<input type="radio" name="billingId" id="{{$billing->id}}" value="{{$billing->id}}" required>
						<label for="{{$billing->id}}">This Address</label>
					</li>
					@endforeach
					<li>
						<input type="radio" name="billingId" value="newAddress" id="r1" required><label for="r1" required>New Address</label>
					</li>
				</ul>
				<div style="clear: both;"></div>
				<ul class="row">
					<li class="col-md-10">
						<div class="checkout-info-text addressForm" id="formView">
							<h3>Billing Address</h3>
						</div>

						<div class="woocommerce-billing-fields addressForm">
							<ul class="row">
								<li class="col-md-6">
									<p class="form-row validate-required" id="billing_first_name_field">
										<label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="firstName" id="firstName" placeholder="">
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row validate-required" id="billing_last_name_field">
										<label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="lastName" id="lastName" placeholder="">
									</p>
								</li>
								<li class="col-md-12  col-left-12">
									<p class="form-row  validate-required validate-email" id="billing_email_field">
										<label for="billing_email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="email" id="email" placeholder="" value="">
									</p>
								</li>
								<li class="col-md-12  col-left-12">
									<p class="form-row  validate-required validate-email" id="billing_email_field">
										<label for="billing_email" class="">Address <abbr class="required" title="required">*</abbr></label>
										<textarea  name="address" id="address" placeholder="" rows="3" style="width: 100%;border: 1px solid #dddee0;"></textarea>
										@if ($errors->has('address'))
										<span class="help-block label label-warning">
											<strong>{{ $errors->first('address') }}</strong>
										</span>
										@endif
									</p>
								</li>
								
								<li class="col-md-6">
									<p class="form-row address-field validate-zipCode woocommerce-validated" id="billing_zipCode_field">
										<label for="billing_zipCode" class="">Zip code <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="zipCode" id="zipCode" onkeyup="zipCodeData(this.value)">
										@if ($errors->has('zipCode'))
										<span class="help-block label label-warning">
											<strong>{{ $errors->first('zipCode') }}</strong>
										</span>
										@endif
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row validate-required validate-phone woocommerce-validated" id="billing_phone_field">
										<label for="billing_phone" class="">Phone number <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text " name="mobileNo" id="mobileNo" placeholder="" value="">
										@if ($errors->has('mobileNo'))
										<span class="help-block label label-warning">
											<strong>{{ $errors->first('mobileNo') }}</strong>
										</span>
										@endif
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row form-row-wide address-field validate-required" id="billing_city_field">
										<label for="billing_city" class="">City <abbr class="required" title="required">*</abbr></label>
										<select class="form-control" name="city" id="city">
											<option selected>Enter zipcode to get city</option>
										</select>
									</p>
								</li>
								<li class="col-md-6">
									<p class="form-row address-field validate-state" id="billing_state_field">
										<label for="billing_state" class="">State/Province</label>
										<select class="form-control" name="state" id="state">
											<option selected>Enter zipcode to get state</option>
										</select>
									</p>
								</li>
							</ul>
						</div><!--- .woocommerce-billing-fields--->	

						<div class="checkout-col-footer">
							<ul class="row">
								<li class="col-md-12 col-left-12 form-radios">
									<span class="form-radio"><input type="radio" name="shippingAddress" id="rs1" checked value="sameAdd"><label for="rs1">Ship to this address</label></span>
									<span class="form-radio"><input type="radio" name="shippingAddress" id="rs2" value="differentAdd"><label for="rs2">Ship to different address</label></span>
								</li>
							</ul>
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
	$(document).on('change', '#r1', function() {
		var showFormVal = $(this).val();
		if(showFormVal=='newAddress')
		{	
			$("#city option").remove();
			$("#state option").remove();
			option = document.createElement( 'option' );
			option.text="Enter zipcode to get city"
			selectCity.add( option ); 
			option = document.createElement( 'option' );
			option.text="Enter zipcode to get state"
			selectState.add( option ); 
			$('.addressForm').show();
		}else{
			$('.addressForm').hide();
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
		$('#'+id).prop('checked', true)
		var request = jQuery.ajax({
			url: '{{ url('/billingData') }}',
			type: 'POST',
			data: {billingId:id,_token: "{{csrf_token()}}" },
			dataType: 'json'
		});
		request.done(function(response){
			var i;
			dataArray=response.billingData;
			for(i=0;i<dataArray.length;i++)
			{
				zipCodeData(dataArray[i]['zipCode'],dataArray[i]['city']);
				$('.addressForm').show();
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