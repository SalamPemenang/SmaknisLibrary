@extends('layouts.public-layouts')
@section('title')
Masuk
@stop
@section('content')
<div class="login-register-area ptb-130 hm-3-padding">
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-7 ml-auto mr-auto">
				<div class="login-register-wrapper">
					<div class="tab-content">
						<div id="lg1" class="tab-pane active">
							<div class="login-form-container">
								<div class="login-form">
									<form action="{{route('post-masuk')}}" method="post">
										@csrf
										<label>pos-el</label>
										<input type="text" name="posel" placeholder="Masukan Pos-el/e-mail">
										<label>Kata sandi</label>
										<input type="password" name="katasandi" placeholder="Masukan kata sandi">
										<div class="button-box">
											<div class="login-toggle-btn">
												<a href="{{url('/email')}}">Lupa kata sandi?</a>
											</div>
											<button type="submit" class="btn-style cr-btn"><span>Login</span></button>
										</div>
									</form>
									<br>
									<a href="{{route('Daftar')}}">Belum punya akun?</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop