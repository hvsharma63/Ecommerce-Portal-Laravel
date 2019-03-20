@extends('layouts.frontend.app')
@section('title')
<title>Order History</title>
@endsection
@section('content')

<div class="main-container col1-layout content-color color">
	<div class="breadcrumbs">
		<div class="container">
			<ul>
				<li class="home"> <a href="{{URL('/index')}}" title="Go to Home Page">Home</a></li>
				<li> <strong>Order History</strong></li>
			</ul>
		</div>
	</div>
	<div class="woocommerce">
		<div class="container">
			<div class="content-top">
				<h2>Order History</h2>
			</div>				
			<ul class="row" style="border: 2px #955251 solid;">
				<li class="col-md-12">
					<table class="table-order table-order-review">
						<thead>
							<tr>
								<td width="68">Order Id</td>
								<td width="14">Name</td>
								<td width="14">Total Amount</td>
								<td width="14">Payment Status</td>
								<td width="14">Date</td>
								<td width="14">View Product</td>
							</tr>
						</thead>
						<tbody>
							@if(!empty($order))
							@foreach($order as $orderList)
							<tr>
								<td class="name">{{$orderList['id']}}</td>
								<td>{{$orderList['name']}}</td>
								<td>${{$orderList['totalAmount']}}</td>
								@if($orderList['paymentStatus']==0)
								<td class="text-warning">{{'Pending'}}</td>
								@elseif($orderList['paymentStatus']==1)
								<td class="text-success">{{'Confirmed'}}</td>
								@elseif($orderList['paymentStatus']==2)
								<td class="text-info">{{'Delivered'}}</td>
								@elseif($orderList['paymentStatus']==3)
								<td class="text-danger">{{'Cancelled'}}</td>
								@endif
								<td>{{date('j M Y ',strtotime($orderList['created_at']))}}</td>
								<td class="price"><button type="button" onclick="productDetail({{$orderList['id']}})" class="btn waves-effect waves-light" style="color: #000;background-color: #955251ab;">View</button></td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="5">
									<div class="wish-list-notice" style="font-size: 25px;color: #955251;"><i class="icon-close" style="font-size: 25px;"></i>No Orders has been added. <a href="{{ url('/productList') }}">Click here</a> to continue shopping.</div>
								</td>
							</tr>
							@endif
						</tbody>
					</table>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="block block-subscribe popup" style="display:none;">
	<div id="popup-newsletter" class="col-md-12 table-responsive"> 
		<h2 class="text-center" style="font-size: -webkit-xxx-large;color: #955251;">Product Detailing</h2>
		<div class="block-content" style="border: 2px #955251 solid;">
			<table class="table table-order table-order-review" id="tbodyProducts">
				<thead>
					<tr>
						<td width="68">Sr no.</td>
						<td width="14">Name</td>
						<td width="14">Quantity</td>
						<td width="14">Price</td>
						<td width="14">Sub Total</td>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	function productDetail(orderId) {
		var request = jQuery.ajax({
			url: '{{ route('order.orderProducts') }}',
			type: 'POST',
			data: {orderId:orderId,_token: "{{csrf_token()}}" },
			dataType:'json',
		});
		request.done(function(response){
			jQuery('#tbodyProducts tbody').html('');
			jQuery('#tbodyProducts tbody').append(response.data);
			// jQuery('#tbodyProducts').append(response.data);
			popup();
		});
		request.fail(function(){
			alert("Something went wrong. Try again.");
		});
	}

	function popup(){
		var overlay = "#353535";									
		var popup   = $('#popup-newsletter');
		var popupWrapper = popup.parent()
		// var imageUrl = "resources/assets/front_images/popup-newletter.jpg";
		var imageUrl = "";
		var pwidth  = 810;
		var pheight = 500;
		if (popup.attr("imageurl")) imageUrl = popup.attr("imageurl");
		if (popup.attr("pwidth")) pwidth = popup.attr("pwidth");
		if (popup.attr("pheight")) pheight = popup.attr("pheight");
		popup.append("<div class='close-btn'></div>")							
		popup.css({
			// 'background-image' : 'url(' + imageUrl + ')',
			"width":"100%",
			"max-width": pwidth + "px",
			"min-height": pheight + "px",
			"background-color":'white',
		})
		$("body").addClass("modal-active");
		popupWrapper.fadeIn(400);
		popupWrapper.bind("click",function(event){
			var selector = $(event.target);
			if (selector.hasClass("popup") || selector.hasClass("close-btn")){
				popupWrapper.fadeOut(400);
				$("body").removeClass("modal-active");
				// magic_product();
			}
			
		});
		// Center for popup
		popup_center();
		$(window).resize(function(){
			popup_center();
		})
	}
	
	// Center for popup
	function popup_center(){
		var popup = $('#popup-newsletter');
		var pH = popup.height();
		var wH = $(window).height()
		if (pH < wH){
			var mT = ((wH - pH) / 2) - 35;
			popup.css({
				"margin-top" : mT + "px",
			})
		}else{
			popup.css({
				"margin-top" : "none",
			})
		}
	}
</script>
@endsection