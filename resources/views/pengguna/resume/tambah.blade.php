@extends('layouts.user-layouts')

@section('title', 'Tambah Resume')

@section('content')
<div class="container">
<div class="card uper">
	<div class="card-header">
		Form Tambah Data
	</div>
	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $errors)
				<li>{{ $errors }}</li>
				@endforeach
			</ul>
		<div><br/>
		@endif
	<form method="post" action="{{ route('resume.tambah.proses') }}">
		@csrf
		<div class="form-group">
			<label>Angota Id</label>
			<select name="anggota_id" id="anggota_id" class="form-control">
				@foreach($anggota_id as $ai)
				<option value="{{$ai->anggota_id}}">{{$ai->anggota_nama}}</option>
				@endforeach
			</select>
			{{-- <input type="text" name="anggota_id" class="form-control"> --}}
		</div>
		<div class="form-group">
			<label>Kelas Id</label>
			<select name="kelas_id" id="kelas_id" class="form-control">
				@foreach($kelas_id as $ki)
				<option value="{{$ki->kelas_id}}">{{$ki->kelas_nama}}</option>
				@endforeach
			</select>
			{{-- <input type="text" name="kelas_id" class="form-control"> --}}
		</div>
		<div class="form-group">
			<label>Deskripsi</label>
			<textarea name="deskripsi" class="form-control"></textarea>
			<button type="submit" class="btn btn-primary">Tambahkan</button>
		</div>
	</form>
	</div>
</div>
</div>
@stop