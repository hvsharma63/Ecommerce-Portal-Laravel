<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-1 template-all">
	<head>
		@include('layouts.frontend.common.header')
	</head>
	<body>
	{{-- <body> --}}
		<div class="wrapper">
			<noscript>
				<div class="global-site-notice noscript">
					<div class="notice-inner">
						<p> <strong>JavaScript seems to be disabled in your browser.</strong><br /> You must have JavaScript enabled in your browser to utilize the functionality of this website.</p>
					</div>
				</div> 
			</noscript>
			<div class="page">
				@include('layouts.frontend.common.topbar')
				@yield('content')
				@include('layouts.frontend.common.footer')
			</div>
		</div>
		@include('layouts.frontend.common.commonJs')
		@yield('script')
		</body>
		</html>