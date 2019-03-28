@extends('layouts.admin.app')
@section('title')
    <title>Dashboard</title>
@endsection
@section('content')
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<h4 class="page-title float-left">Dashboard</h4>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- end row -->


			<div class="row">

				<div class="col-lg-3 col-md-6">
					<div class="card-box widget-box-two widget-two-custom">
						<i class="mdi mdi-currency-usd widget-two-icon"></i>
						<div class="wigdet-two-content">
							<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Revenue</p>
							<h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">{{$totalAmount}}</span></h2>
						</div>
					</div>
				</div><!-- end col -->

				<div class="col-lg-3 col-md-6">
					<div class="card-box widget-box-two widget-two-custom">
						<i class="mdi mdi-account-multiple widget-two-icon"></i>
						<div class="wigdet-two-content">
							<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Unique Visitors</p>
							<h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">{{$users}}</span></h2>
						</div>
					</div>
				</div><!-- end col -->

				<div class="col-lg-3 col-md-6">
					<div class="card-box widget-box-two widget-two-custom">
						<i class="mdi mdi-crown widget-two-icon"></i>
						<div class="wigdet-two-content">
							<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">No of Transactions</p>
							<h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">{{$orders}}</span></h2>
						</div>
					</div>
				</div><!-- end col -->

				<div class="col-lg-3 col-md-6">
					<div class="card-box widget-box-two widget-two-custom">
						<i class="mdi mdi-auto-fix widget-two-icon"></i>
						<div class="wigdet-two-content">
							<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">No of Products</p>
							<h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">{{$products}}</span></h2>
						</div>
					</div>
				</div><!-- end col -->

			</div>
			<!-- end row -->
@endsection