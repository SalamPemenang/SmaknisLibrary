<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Login Page - Ace Admin</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="/assets/css/Masuk-bootstrap.min.css" />
	<link rel="stylesheet" href="/assets/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="/assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="/assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="/assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="login-layout">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1>
								<br>
							</h1>
							<h4 class="blue" id="id-company-text" style="font-family: lucida calligraphy; font-size: 30px;">
								Smaknis Perpus
							</h4>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<center>
												Masukan Akun Anda
											</center>
										</h4>

										<div class="space-6"></div>
										<center>
											@if(\Session::has('alert-failed'))
											<div class="alert alert-failed">
												<div>{{Session::get('alert-failed')}}</div>
											</div>
											@endif
											@if(\Session::has('alert-success'))
											<div class="alert alert-success">
												<div>{{Session::get('alert-success')}}</div>
											</div>
											@endif
										</center>
										<form action="{{route('post-masuk')}}" method="post">
											@csrf
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="posel" class="form-control" placeholder="Username" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" name="katasandi" class="form-control" placeholder="Kata sandi" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>

												<div class="space"></div>

												<div class="clearfix">
													<label class="inline">
														<input type="checkbox" class="ace" />
														<span class="lbl"> Remember Me</span>
													</label>

													<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Masuk</span>
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>
									</div><!-- /.widget-main -->

									<div class="toolbar clearfix">
										<div>
											<a href="#" data-target="#forgot-box" class="forgot-password-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Lupa kata sandi ?
											</a>
										</div>

										<div>
											<a href="#" data-target="#signup-box" class="user-signup-link">
												Belum punya akun ?
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->

							<div id="forgot-box" class="forgot-box widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header red lighter bigger">
											<i class="ace-icon fa fa-key"></i>
											Ganti Kata sandi
										</h4>

										<div class="space-6"></div>
										<p>
											Masukan email anda 
										</p>

										<form>
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="email" class="form-control" placeholder="Email" />
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>

												<div class="clearfix">
													<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
														<i class="ace-icon fa fa-lightbulb-o"></i>
														<span class="bigger-110">Kirim !</span>
													</button>
												</div>
											</fieldset>
										</form>
									</div><!-- /.widget-main -->

									<div class="toolbar center">
										<a href="#" data-target="#login-box" class="back-to-login-link">
											Back to login
											<i class="ace-icon fa fa-arrow-right"></i>
										</a>
									</div>
								</div><!-- /.widget-body -->
							</div><!-- /.forgot-box -->

							<div id="signup-box" class="signup-box widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header green lighter bigger">
											<center>
												<i class="ace-icon fa fa-users blue"></i>
												Buat Akun Baru
											</center>
										</h4>

										<div class="space-6"></div>
										<p> Masukan identitas anda: </p>

										<form action="{{route('post-daftar')}}" method="post">
											<fieldset>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input 	id="nama" type="text" 
														name="anggota_nama" placeholder="Masukan Nama" 
														class="form-control @error('anggota_nama') is-invalid @enderror" >
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input 	id="Posel" type="email" 
														name="posel" placeholder="Masukan Posel/Email" 
														class="form-control @error('anggota_nama') is-invalid @enderror">
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<select name="anggota_tipe_id" class="form-control @error('anggota_nama') is-invalid @enderror">
															<option selected disabled>---Pilih Level---</option>
															@foreach($AnggotaTipe as $AP)
															<option value="{{$AP->anggota_tipe_id}}">{{$AP->anggota_tipe_nama}}</option>
															@endforeach
														</select>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<select
														class="form-control @error('jurusan') is-invalid @enderror"
														onchange="getKelas()" id="jurusan" name="jurusan_id" >
														<option selected disabled>---Pilih jurusan---</option>
														@foreach($jurusan as $j)
														<option value="{{$j->jurusan_id}}">{{$j->jurusan_nama}}</option>
														@endforeach
													</select>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<select name="kelas_id" id="kelas" class="form-control @error('anggota_nama') is-invalid @enderror">
														<option value="" selected disabled>---Pilih kelas---</option>
													</select>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input 	id="Kata Sandi" type="password" 
													name="katasandi" placeholder="Masukan Kata sandi" 
													class="form-control @error('anggota_nama') is-invalid @enderror">
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input 	id="konfirmasi_katasandi" type="password" 
													name="konfirmasi_katasandi" placeholder="Masukan Kata Sandi Di Atas" 
													class="form-control @error('anggota_nama') is-invalid @enderror">
												</span>
											</label>

											<div class="space-24"></div>

											<div class="clearfix">
												<button type="reset" class="width-30 pull-left btn btn-sm">
													<i class="ace-icon fa fa-refresh"></i>
													<span class="bigger-110">Reset</span>
												</button>

												<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
													<span class="bigger-110">Daftar</span>

													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</fieldset>
									</form>
								</div>

								<div class="toolbar center">
									<a href="#" data-target="#login-box" class="back-to-login-link">
										<i class="ace-icon fa fa-arrow-left"></i>
										Back to login
									</a>
								</div>
							</div><!-- /.widget-body -->
						</div><!-- /.signup-box -->
					</div><!-- /.position-relative -->

					<div class="navbar-fixed-top align-right">
						<br />
						&nbsp;
						<a id="btn-login-dark" href="#">Dark</a>
						&nbsp;
						<span class="blue">/</span>
						&nbsp;
						<a id="btn-login-blur" href="#">Blur</a>
						&nbsp;
						<span class="blue">/</span>
						&nbsp;
						<a id="btn-login-light" href="#">Light</a>
						&nbsp; &nbsp; &nbsp;
					</div>
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="/assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		$(document).on('click', '.toolbar a[data-target]', function(e) {
			e.preventDefault();
			var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			});
	});



			//you don't need this, just used for changing background
			jQuery(function($) {
				$('#btn-login-dark').on('click', function(e) {
					$('body').attr('class', 'login-layout');
					$('#id-text2').attr('class', 'white');
					$('#id-company-text').attr('class', 'blue');

					e.preventDefault();
				});
				$('#btn-login-light').on('click', function(e) {
					$('body').attr('class', 'login-layout light-login');
					$('#id-text2').attr('class', 'grey');
					$('#id-company-text').attr('class', 'blue');

					e.preventDefault();
				});
				$('#btn-login-blur').on('click', function(e) {
					$('body').attr('class', 'login-layout blur-login');
					$('#id-text2').attr('class', 'white');
					$('#id-company-text').attr('class', 'light-blue');

					e.preventDefault();
				});

			});

			$( document ).ready(function() {

			});

			function getKelas(){
				var jurusan_id = $("#jurusan").val();
				$.ajax({
					url:'/jurusan',
					type:'get',
					data:{
						jurusan_id:jurusan_id,
					},
					success:function(response){
						let option = '<option value="" selected disabled>---Pilih Kelas---</option>';

						$.each(jQuery.parseJSON(response), function(index, kelas){
							option += '<option value="'+ kelas.kelas_id +'">'+ kelas.kelas_nama +'</option>';
						});

						$('#kelas').html(option);
					}
				});
			}
		</script>
	</body>
	</html>
