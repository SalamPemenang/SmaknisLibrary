@extends('layouts.public-layouts')
@section('title')
verifikasi
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
								<strong style="color: red;">Catatan : </strong><span>Setelah memasukan posel/email anda akan menerima pesan kode verifikasi.</span>
                                <br>
                                <br>
								<div class="login-form">
									<form action="{{route('kirim-kode-verifi')}}" method="post">
										@csrf
										<label>pos-el</label>
										<input type="text" name="posel" placeholder="Masukan Pos-el/e-mail">
										<div class="button-box">
											<button type="submit" class="btn-style cr-btn"><span>verifikasi</span></button>
										</div>
									</form>
									<br>
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