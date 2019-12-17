<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Nuris-Perpus | @yield('judul')</title>

		<!-- Link Css -->
		@include('layouts/operator/partials/css')
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				
				<!-- Sidebar Start -->
				@include('layouts/operator/partials/sidebar')
				<!-- Sidebar End -->

				<!-- Navbar Start -->
				@include('layouts/operator/partials/navbar')
				<!-- Navbar End -->

				<!-- Content Start -->
				<div class="right_col" role="main">
					<div class="">
						<div class="page-title">
							<div class="title_left">
								@yield('subJudul')
							</div>
						</div>

						 <div class="clearfix"></div>

						@yield('konten')

					</div>
				</div>
				<!-- Content End -->

				<!-- footer Start -->
				@include('layouts/operator/partials/footer')
				<!-- footer End -->


			</div>
		</div>

		<!-- Link Js -->
		@include('layouts/operator/partials/js')

		@stack('scripts')
	</body>
</html>