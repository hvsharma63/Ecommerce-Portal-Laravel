@extends('layouts.admin.app')
@section('title')
    <title>Order List</title>
@endsection
@section('link')
	<link href="{{URL('resources/assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{URL('resources/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Order List</h4>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card-box">
			<table id="productTable" class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Total Quantity</th>
						<th>Total Amount</th>
						<th>Payment Status</th>
						<th>Created Date</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script src="{{ URL('resources/assets/plugins/bootstrap-select/js/bootstrap-select.js')}}" type="text/javascript"></script>
        <script src="{{ URL('resources/assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">
	var table= $('#productTable').DataTable({
		"processing": true,
		"serverSide": true,
		"cache":false,
		"ajax":{
			"url": "{{ route('order.all') }}",
			"type": "POST",
			"data":{ _token: "{{csrf_token()}}"},
			"dataType": "json",
		},
		"columns": [
		{ "data": "id" },
		{ "data": "name" },
		{ "data": "totalQty" },
		{ "data": "totalAmount" },
		{ "data": "paymentStatus" },
		{ "data": "created_at" },
		{ "data": "action" }
		],
		"fnDrawCallback":function () {
			$('[data-plugin="switchery"]').each(function (idx, obj) {
				new Switchery($(this)[0], $(this).data());
			});
			
		}
	});
	@if (Session::has('success'))
	$.toast({
		heading: 'Well done!',
        showHideTransition: 'slide',
		text: '{{Session::get('success')}}',
		position: 'top-right',
		loaderBg: '#5ba035',
		icon: 'success',
		hideAfter: 7000,
		stack: 1
	});
	@endif

	function SwalDelete(deleteRecord) {
		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger m-l-10',
			buttonsStyling: false
		}).then(function () {
			$.ajax({
				url: '{{ route('order.destroy') }}',
				type: 'POST',
				data: {deleteRecord : deleteRecord,_token: "{{csrf_token()}}" },
				dataType: 'json'
			})
			.done(function(response){
				swal(
				'Deleted!',
				'Your file has been deleted.',
				'success'
				)
				table.ajax.reload(null,false);
			})
			.fail(function(){
				swal('Oops...', 'Something went wrong with !', 'error');
			});
			
		}, function (dismiss) {
			if (dismiss === 'cancel') {
				swal(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
					)
			}
		});
	}
	function statusChange(orderId,status)
	{
		swal({
			title: 'Are you sure?',
			text: "You want to change the status!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, change it!',
			cancelButtonText: 'No, cancel!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger m-l-10',
			buttonsStyling: false
		}).then(function () {
			$.ajax({
				url: '{{ route('order.statusChange') }}',
				type: 'POST',
				data: {orderId : orderId,status:status,_token: "{{csrf_token()}}" },
				dataType: 'json'
			})
			.done(function(response){
				swal(
					'Changed!',
					'Order Status changed.',
					'success'
					)
			})
			.fail(function(){
				swal('Oops...', 'Something went wrong with !', 'error');
			});
		}, function (dismiss) {
			if (dismiss === 'cancel') {
				swal(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
					)
			}
			table.ajax.reload(null,false);
		});
		
	}
</script>
@endsection
