@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Category List</h4>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card-box table-responsive">
			<div class="row">
				<div class="col-12">
					<div class="m-b-30">
						<a href="{{ route('category.create') }}" style="float: right;margin-bottom: 20px;"><button class="btn btn-success waves-effect waves-light">Add Category <i class="mdi mdi-plus-circle-outline"></i></button></a>
						{{-- <h4 class="m-t-0 header-title"><b>Category List</b></h4> --}}
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
			<table id="datatable" class="table table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Image</th>
						<th>Name</th>
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
	var table= $('#datatable').DataTable({
		"processing": true,
		"serverSide": true,
		"cache":false,
		"ajax":{
			"url": "{{ route('category.all') }}",
			"dataType": "json",
			"type": "POST",
			"data":{ _token: "{{csrf_token()}}"}
		},
		"columns": [
		{ "data": "id" },
		{ "data": "image" },
		{ "data": "name" },
		{ "data": "created_at" },
		{ "data": "action" }
		]	 

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
				url: '{{ url('admin/category/destroy/id') }}',
				type: 'GET',
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
</script>
@endsection
