@extends('layouts.public-layouts')
@section('title')
Daftar
@stop
@section('content')
<div class="login-register-area ptb-130 hm-3-padding">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-7 ml-auto mr-auto">
				<div class="login-register-wrapper">
					<div class="tab-content">
						<div id="lg1" class="tab-pane active">
							<div class="login-form-container">
								<div class="login-form">
									<form action="{{route('post-daftar')}}" method="post">
										@csrf

										@error('anggota_nama')
										<span class="invalid-feedback text-danger">{{ $message }}</span>
										@enderror
										<input style="display: none;" type="text" 
										 placeholder="Masukan Nama" 
										class="form-control @error('anggota_nama') is-invalid @enderror" >

										<label for="nama">Nama</label>
										@error('anggota_nama')
										<span class="invalid-feedback text-danger">{{ $message }}</span>
										@enderror
										<input 	id="nama" type="text" 
										name="anggota_nama" placeholder="Masukan Nama" 
										class="form-control @error('anggota_nama') is-invalid @enderror" >

										<label for="Posel">Pos-el</label>
										@error('posel')
										<span class="invalid-feedback text-danger">{{ $message }}</span>
										@enderror
										<input 	id="Posel" type="email" 
										name="posel" placeholder="Masukan Posel/Email" 
										class="form-control @error('anggota_nama') is-invalid @enderror">

										<label for="telepon">Telepon</label>
										@error('telepon')
										<span class="invalid-feedback text-danger">{{ $message }}</span>
										@enderror
										<input type="text" name="telepon" placeholder="Masukan Telepon" 
										class="form-control @error('anggota_nama') is-invalid @enderror">

										<label>Level</label>
										@error('anggota_tipe_id')
										<span class="invalid-feedback text-danger">{{ $message }}</span>
										@enderror
										<select name="anggota_tipe_id" class="form-control @error('anggota_nama') is-invalid @enderror">
											<option selected disabled>---Pilih Level---</option>
											@foreach($AnggotaTipe as $AP)
											<option value="{{$AP->anggota_tipe_id}}">{{$AP->anggota_tipe_nama}}</option>
											@endforeach
										</select>
										<br>
										<br>

										<label>Jurusan</label>
										@error('jurusan_id')
										<span class="invalid-feedback text-danger">{{ $message }}</span>
										@enderror
										<select 
										class="form-control @error('jurusan') is-invalid @enderror"
										onchange="getKelas()" id="jurusan" name="jurusan_id" >
										<option selected disabled>---Pilih jurusan---</option>
										@foreach($jurusan as $j)
										<option value="{{$j->jurusan_id}}">{{$j->jurusan_nama}}</option>
										@endforeach
									</select>
									<br>
									<br>


									<label>Kelas</label>
									@error('kelas_id')
									<span class="invalid-feedback text-danger">{{ $message }}</span>
									@enderror
									<select name="kelas_id" id="kelas" class="form-control @error('anggota_nama') is-invalid @enderror">
										<option value="" selected disabled>---Pilih kelas---</option>
									</select>
									<br>
									<br>


									<label for="Kata Sandi">Kata Sandi</label>
									@error('katasandi')
									<span class="invalid-feedback text-danger">{{ $message }}</span>
									@enderror
									<input 	id="Kata Sandi" type="password" 
									name="katasandi" placeholder="Masukan Kata sandi" 
									class="form-control @error('anggota_nama') is-invalid @enderror">

									<label for="konfirmasi_katasandi">Konfirmasi Kata Sandi</label>
									@error('konfirmasi_katasandi')
									<span class="invalid-feedback text-danger">{{ $message }}</span>
									@enderror
									<input 	id="konfirmasi_katasandi" type="password" 
									name="konfirmasi_katasandi" placeholder="Masukan Kata Sandi Di Atas" 
									class="form-control @error('anggota_nama') is-invalid @enderror">

									<div class="button-box">
										<button type="submit" class="btn-style cr-btn"><span>Register</span></button>
									</div>
								</form>
								<br>
								<a href="{{route('Masuk')}}">Sudah punya akun?</a>
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

@section('js')

<script type="text/javascript">
	
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

@stop