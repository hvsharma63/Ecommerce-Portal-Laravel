@extends('layouts.frontend.app')
@section('title')
<title>About Us</title>
@endsection
@section('content')
<div class="main-container col1-layout content-color color">
	<div class="breadcrumbs">
		<div class="container">
			<ul>
				<li class="home"> <a href="{{URL('/index')}}" title="Go to Home Page">Home</a></li>
				<li> <strong>Contact Us</strong></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<ul class="row text-center">
  			<li class="col-md-4">
				<div class="contact-list-item"><a href="tel:+84912345678"><i class="icon-call-in"></i><br><span class="text">+84 912 345 678</span></a></div>
			</li>
			<li class="col-md-4">
				<div class="contact-list-item"><i class="icon-pointer"></i><br><span class="text">Any Street, RosiTower Brooklyn, USA</span></div>
			</li>
			<li class="col-md-4">
				<div class="contact-list-item"><a href="mailto:Contact@AbaniStore.com"><i class="icon-envelope-open"></i><br><span class="text">Contact@AbaniStore.com</span></a></div>
			</li>
		</ul>
		<form class="contact-form form-wrapper" id="contactForm" method="POST" action="">
			{{csrf_field()}}
			<ul class="row">
				<li class="col-md-6">
					<div class="form-controls"><input type="text" placeholder="Name*" class="form-control" name="name"></div>
					<div class="form-controls"><input type="email" placeholder="Email*" class="form-control" name="email"></div>
					<div class="form-controls"><input type="text" placeholder="Subject" class="form-control" name="subject"></div>
				</li>
				<li class="col-md-6">
					<div class="form-controls"><textarea placeholder="Message" class="form-control" name="message"></textarea></div>
				</li>
			</ul>
			<div class="text-center"><input type="submit" value="Send Message" class="inp-submit"></div>
		</form>
	</div>	
</div><!--- .main-container -->
@endsection
@section('script')
<script type="text/javascript">
	jQuery("#contactForm").on('submit', (function (e) {
		e.preventDefault();
		// $('#LoadingModal').modal({backdrop: 'static', keyboard: false})   
		var request = jQuery.ajax({
			url: '{{ route('contact.add') }}',
			type: 'POST',
			contentType: false,
			cache: false,
			processData: false,
			data: new FormData(this),
			dataType: 'json',
		});
		request.done(function(response){
			jQuery.toast({
				heading: 'Well done!',
				showHideTransition: 'slide',
				text: 'Thanks for contacting. We will reply soon.',
				position: 'bottom-left',
				loaderBg: '#5ba035',
				icon: 'success',
				hideAfter: 5000,
				stack: 3
			});
			$('#contactForm')[0].reset();
		});
		request.fail(function(){
			alert("Something went wrong. Try again.");
		});
	}));
</script>
@endsection