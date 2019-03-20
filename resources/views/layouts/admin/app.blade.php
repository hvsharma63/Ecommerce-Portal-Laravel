<!DOCTYPE html>
<html>
	<head>
		@include('layouts.admin.common.header')
		@yield('link')
	</head>
	<body>
		@include('layouts.admin.common.topbar')
		@include('layouts.admin.common.sidebar')
		<div class="content-page">
			<div class="content">
				<div class="container-fluid">
					@yield('content')
				</div>	
			</div>
		</div>
	@include('layouts.admin.common.footer')
	</body>
	@include('layouts.admin.common.commonJs')
	@yield('script')
</html>