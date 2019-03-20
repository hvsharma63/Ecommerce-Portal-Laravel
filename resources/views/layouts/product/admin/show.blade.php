@extends('layouts.admin.app')
@section('title')
    <title>Product List</title>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Product List</h4>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card-box">
			<div class="row">
				<div class="col-12">
					<div class="m-b-30">
						<a href="{{ route('product.create') }}" style="float: right;margin-bottom: 20px;"><button class="btn btn-success waves-effect waves-light"><i class="fa fa-plus"></i> Add Products</button></a>
						{{-- <h4 class="m-t-0 header-title"><b>Category List</b></h4> --}}
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
			<table id="productTable" class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Id</th>
						<th>Image</th>
						<th>Name</th>
						<th>Category</th>
						<th>Color</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Status</th>
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

<script type="text/javascript">
	var table= $('#productTable').DataTable({
		"processing": true,
		"serverSide": true,
		"cache":false,
		"ajax":{
			"url": "{{ route('product.all') }}",
			"dataType": "json",
			"type": "POST",
			"data":{ _token: "{{csrf_token()}}"}
		},
		"columns": [
		{ "data": "id" },
		{ "data": "image" },
		{ "data": "name" },
		{ "data": "categoryName" },
		{ "data": "colorName" },
		{ "data": "price" },
		{ "data": "stock" },
		{ "data": "active" },
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
				url: '{{ route('product.destroy') }}',
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
	function activeInactive(recordId) {
		$.ajax({
			url: '{{ route('product.activeInactive') }}',
			type: 'POST',
			data: {recordId : recordId,_token: "{{csrf_token()}}" },
			dataType: 'json'
		})
		.done(function(response){
			var activeInactive = document.getElementById("activeInactive");
			if(activeInactive.checked == true){
				$("#checkbox").prop("checked", false);
			}else{
				$("#checkbox").prop("checked", true);	
			}
			$.toast({
				heading: 'Well done!',
				showHideTransition: 'slide',
				text: response.message,
				position: 'top-right',
				icon: response.icon,
				hideAfter: 7000,
				stack: 1
			});
		})
		.fail(function(){
			alert("Something went wrong. Try again.");
		});
	}
</script>
@endsection
