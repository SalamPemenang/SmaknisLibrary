<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	@include('layouts.assets-head')
</head>
<body>
	<div class="wrapper">
		<!-- header start -->
		<header>
			<div class="header-area transparent-bar">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-5 col-5">
							<div class="sticky-logo">
								<a href="index.html"><img src="assets/img/logo/2.png" alt="" /></a>
							</div>
							<div class="logo-small-device">
								<a href="index.html"><img alt="" src="assets/img/logo/logo.png"></a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8 d-none d-md-block">
							<div class="logo-menu-wrapper text-center">
								<div class="logo">
									<a href="index.html"><img src="assets/img/logo/logo.png" alt="" /></a>
								</div>
								<div class="main-menu">
									<nav>
										<ul>
											<li>
												<a href="{{url('/')}}" class="ti-home"> Halaman utama</a>
											</li>
											<li>
												<a href="" class="ti-info">Tentang kami</a>
											</li>
											<li><a href="#">pages <i class="ion-ios-arrow-down"></i></a>
                                                    <ul>
                                                        <li><a href="about-us.html">about us</a></li>
                                                        <li><a href="cart.html">cart page</a></li>
                                                        <li><a href="checkout.html">checkout</a></li>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                        <li><a href="login-register.html">login</a></li>
                                                        <li><a href="contact.html">contact</a></li>
                                                    </ul>
                                                </li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-7 col-7">
							<div class="header-site-icon">
							</div>
						</div>
						<div class="mobile-menu-area col-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul class="menu-overflow">
										<li><a href="{{url('/')}}" class="ti-home"> Halaman utama</a></li>
										<li><a href="" class="ti-info"> Tentang kami</a></li>
										<li><a href="{{route('Masuk')}}" class="ti-shift-right"> Masuk</a></li>
									</ul>
								</nav>                          
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="header-height"></div>
		@yield('content')


		<footer class="hm-4-padding">
			<div class="container-fluid">
				<div class="footer-bottom border-top-1 ptb-15">
					<div class="row">
						<div class="col-md-6 col-12">
							<div class="copyright-payment">
								<div class="copyright">
									<p>Template & Powered by SMAKNIS IT TIM</p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="footer-payment-method">
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	@include('layouts.assets-foot')
	@yield('js')
</body>
</html>
