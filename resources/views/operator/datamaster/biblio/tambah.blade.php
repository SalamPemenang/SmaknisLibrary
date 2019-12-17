@extends('layouts.operator.master')

@section('judul')
Tambah Biblio - Operator
@stop

@section('konten')
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<a href="{{ route('operator.biblio') }}" class="btn btn-warning">Kembali</a>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<h2 class="navbar-right">Tambah Data Biblio</h2>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Tambah Biblio</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				{{-- Form Tabel Biblio --}}
				<form action="{{ route('operator.biblio.kirim') }}" method="POST" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
					@csrf

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="judul">Judul*</label>
						<input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul Buku" autocomplete="off" value="{{ old('judul') }}">
						@error('judul')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="edisi">Edisi*</label>
								<input type="text" name="edisi" class="form-control @error('edisi') is-invalid @enderror" placeholder="Edisi Buku" autocomplete="off" value="{{ old('edisi') }}">
								@error('edisi')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-6">
								<label for="penerbit_tempat">Tempat Terbit Buku*</label>
								<input type="text" name="penerbit_tempat" class="form-control @error('penerbit_tempat') is-invalid @enderror" autocomplete="off" value="{{ old('penerbit_tempat') }}">
								@error('penerbit_tempat')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="penulis_id">Penulis*</label>
							<input type="text" name="penulis_id" class="form-control" id="penulis_id" autocomplete="off" placeholder="Cari Penulis">
							@error('penulis_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="isbn">ISBN*</label>
						<input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" id="isbn" placeholder="ISBN" autocomplete="off" value="{{ old('isbn') }}">
						@error('isbn')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="penerbit_id">Penerbit*</label>
							<input type="text" name="penerbit_id" class="form-control" id="penerbit_id" autocomplete="off" placeholder="Cari Penerbit">
							@error('penerbit_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="harga_buku">Harga Buku*</label>
								<input type="text" name="harga_buku" class="form-control harga @error('harga') is-invalid @enderror" id="harga_buku" autocomplete="off" value="{{ old('harga') }}">
								@error('harga')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="penerbit_tahun">Tahun Terbit Buku*</label>
								<input type="text" name="penerbit_tahun" class="form-control @error('penerbit_tahun') is-invalid @enderror" id="penerbit_tahun" autocomplete="off" value="{{ old('penerbit_tahun') }}">
								@error('penerbit_tahun')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="col-md-12 form-group">
						<label for="deskripsi">Deskripsi*</label>
						<textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="10" placeholder="Isi secara singkat..." id="deskripsi">{{ old('deskripsi') }}</textarea>
						@error('deskripsi')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="tipekoleksi_id">Tipe Koleksi*</label>
								<select name="tipekoleksi_id" class="form-control @error('tipekoleksi_id') is-invalid @enderror">
									<option value="">--Silahkan Pilih--</option>}
									@foreach($tipekoleksi as $tipekoleksis)
									<option value="{{ $tipekoleksis->tipekoleksi_id }}">{{ $tipekoleksis->tipekoleksi_nama }}</option>
									@endforeach
								</select>
								@error('tipekoleksi_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="klasifikasi_id">Klasifikasi*</label>
								<select name="klasifikasi_id" class="form-control @error('klasifikasi_id') is-invalid @enderror">
									<option value="">--Silahkan Pilih--</option>}
									@foreach($klasifikasi as $klasifikasis)
									<option value="{{ $klasifikasis->klasifikasi_id }}">{{ $klasifikasis->klasifikasi_nama }}</option>
									@endforeach
								</select>
								@error('klasifikasi_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12 form-group">
								<label for="panggil">Panggil Rak Buku*</label>
								<input type="text" name="panggil" class="form-control @error('panggil') is-invalid @enderror" id="panggil" autocomplete="off" value="{{ old('panggil') }}">
								@error('panggil')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-5 col-sm-4 col-xs-12 form-group">
								<label for="tingkat">Tingkatan Rak Buku*</label>
								<input type="number" name="tingkatan" class="form-control @error('tingkatan') is-invalid @enderror" id="tingkatan" autocomplete="off" value="{{ old('tingkatan') }}">
								@error('tingkatan')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-3 col-sm-4 col-xs-12 form-group">
								<label for="urutan">Urutan Buku*</label>
								<input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" id="urutan" autocomplete="off" value="{{ old('urutan') }}">
								@error('urutan')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="gambar">Gambar Buku*</label>
						<input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar">
						@error('gambar')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="lampiran">Lampiran Buku*</label>
						<input type="file" name="lampiran" class="form-control" id="lampiran">
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>Status Buku*</label>
						<select name="status_item_id" class="form-control @error('status_item_id') is-invalid @enderror">
							<option value="">--Silahkan Pilih--</option>
							@foreach($statusitem as $sim)
							<option value="{{ $sim->status_item_id }}">{{ $sim->status_item_nama }}</option>
							@endforeach
						</select>
						@error('status_item_id')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="sumber_item_id">Sumber Buku*</label>
						<input type="text" name="sumber_item_id" id="sumber_item_id" class="form-control @error('sumber_item_id') is-invalid @enderror" autocomplete="off">
						@error('sumber_item_id')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="col-md-12 col-sm-6 col-xs-12 form-group">
						<label>
							<input type="checkbox" name="publik" value="1"> Publik
						</label>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>
							<input type="checkbox" name="promosi" value="1"> Promosi
						</label>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-10">
								<input type="number" name="buku_tersedia" class="form-control @error('buku_tersedia') is-invalid @enderror" autocomplete="off" placeholder="Masukan Jumlah Buku yang Tersedia">
								@error('buku_tersedia')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary float-rleft">Simpan</button>
							</div>
						</div>
					</div>
				</form>
				{{-- Bagian Akhir Form Tabel Biblio --}}
			</div>
		</div>
	</div>
@stop

@push('scripts')
{{-- Cari penulis --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('#penulis_id').autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "{{ url('biblio/penulis/cari') }}",
					data: {
						term: request.term
					},
					dataType: "json",
					success: function(data) {
						response(data);
					},
					select: function(event, ui) {
						event.preventDefault();
						$('#penulis_id').val(ui.item.label);
					}
				});
			},
			minLength: 1
		});
	});
</script>
{{-- Cari Penerbit --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('#penerbit_id').autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "{{ url('biblio/penerbit/cari') }}",
					data: {
						term: request.term
					},
					dataType: "json",
					success: function(data) {
						response(data);
					},
					select: function(event, ui) {
						event.preventDefault();
						$('#penerbit_id').val(ui.item.label);
					}
				});
			},
			minLength: 1
		});
	});
</script>
{{-- cari sumber item --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('#sumber_item_id').autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "{{ url('biblio/sumberitem/cari') }}",
					data: {
						term: request.term
					},
					dataType: "json",
					success: function(data) {
						response(data);
					},
					select: function(event, ui) {
						event.preventDefault();
						$('#sumber_item_id').val(ui.item.label);
					}
				});
			},
			minLength: 1
		});
	});
</script>
@endpush