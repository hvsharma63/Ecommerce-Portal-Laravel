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
				<li> <strong>About Us</strong></li>
			</ul>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content-text">
					<h2 style="color: #955251;">About Abani</h2>
					<p>Abani was originally conceived as a means for expatriates to receive U.S. catalogs and mail overseas. This simple idea flourished, and quickly grew into a pioneering global company that opened U.S. retail channels to international shoppers.</p>
					<p>Since 2 years, consumers around the globe have trusted MyUS to provide a simple, reliable way to shop online and ship their purchases worldwide. We deliver a streamlined and cost-effective shipping process and complete online account management to over 5500 members in 20 countries and territories, including <b>Saudi Arabia</b>, <b>United States</b>, <b>India</b>, <b>Iraq</b>, <b>Malaysia</b>, <b> Germany</b> and <b>Switzerland</b>.</p>
					<p>Only Abani has the <b>resources</b>, <b>expertise</b>, <b>customer dedication</b> and <b>global experience</b> to make shopping and shipping consistently fast and affordable. Abani locations include its corporate distribution and operations facility too.</p>
					<div class="text-center">
						<h1 style="font-size: 36px;color: #955251;">Ready to Shop & Ship?</h1>
						<p>All you need is a membership to instantly get your Abani address.</p>
						<a class="btn btn-default btn-lg" href={{URL('/index')}} role="button" style="margin-bottom: 3%;">Continue to homepage</a>
					</div>
				</div>
			</div>
		</div>
	</div><!--- .container-->


	<div class="block-static block_team block_single">
		<div class="container">
			<h2 style="color: #955251;">Meet the team</h2>
			<p>Professional & Outstanding ideas  of our passionate team makes us unique in every sense.</p>
			<div class="team_member_list">
				<ul class="row">
					<li class="col-md-6">
						<div class="team_member_item">
							<a class="member-thumb" href="#"><img src="http://placehold.it/270x270" alt=""></a>
							<p class="member-name">Harshit Mehta</p>
							<p class="sub-name">COO-Founder</p>
						</div>
					</li>
					<li class="col-md-6">
						<div class="team_member_item">
							<a class="member-thumb" href="#"><img src="http://placehold.it/270x270" alt=""></a>
							<p class="member-name">Keval Takodara</p>
							<p class="sub-name">COO-Founder</p>
						</div>
					</li>
				</ul>
			</div>
		</div><!--- .container-->
	</div><!-- .block_team -->


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