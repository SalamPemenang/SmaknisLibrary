@extends('layouts.operator.master')

@section('judul')
	Detail Biblio - Operator
@stop

@section('konten')
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Detail Biblio</h2>
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
				<form action="#" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
					@csrf

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="judul">Judul*</label>
						<input type="text" name="judul" class="form-control" value="{{ $biblio->judul }}" disabled>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="edisi">Edisi*</label>
								<input type="text" name="edisi" class="form-control" value="{{ $biblio->edisi }}" disabled>
							</div>
							<div class="col-md-6">
								<label for="penerbit_tempat">Tempat Terbit Buku*</label>
								<input type="text" name="penerbit_tempat" class="form-control" value="{{ $biblio->penerbit_tempat }}" disabled>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="search_penulis">Penulis*</label>
						@foreach($penulis as $value => $data)
							@if($biblio->penulis_id == $data->penulis_id)
								<input type="text" name="penulis_id" class="form-control" value="{{ $data->penulis_nama }}" disabled>
							@endif
						@endforeach
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="isbn">ISBN*</label>
						<input type="text" name="isbn" class="form-control" value="{{ $biblio->isbn }}" disabled>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="penerbit_search">Penerbit*</label>
						@foreach($penerbit as $value => $data)
							@if($biblio->penerbit_id == $data->penerbit_id)
								<input type="text" name="penerbit_id" class="form-control" value="{{ $data->penerbit_nama }}" disabled>
							@endif
						@endforeach
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="harga_buku">Harga Buku*</label>
								<input type="text" name="harga_buku" class="form-control harga" value="{{ $biblio->harga_buku }}" disabled>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="penerbit_tahun">Tahun Terbit Buku*</label>
								<input type="text" name="penerbit_tahun" class="form-control" value="{{ $biblio->penerbit_tahun }}" disabled>
							</div>
						</div>
					</div>

					<div class="col-md-12 form-group">
						<label for="deskripsi">Deskripsi*</label>
						<textarea class="form-control" rows="10" id="deskripsi" disabled>{{ $biblio->deskripsi }}</textarea>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="tipekoleksi_id">Tipe Koleksi*</label>
								@foreach($tipekoleksi as $value => $data)
									@if($biblio->tipekoleksi_id == $data->tipekoleksi_id)
										<input type="text" name="tipekoleksi_id" class="form-control" value="{{ $data->tipekoleksi_nama }}" disabled>
									@endif
								@endforeach
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="klasifikasi_id">Klasifikasi*</label>
								@foreach($klasifikasi as $value => $data)
									@if($biblio->klasifikasi_id == $data->klasifikasi_id)
										<input type="text" name="klasifikasi_id" class="form-control" value="{{ $data->klasifikasi_nama }}" disabled>
									@endif
								@endforeach
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12 form-group">
								<label for="panggil">Panggil Rak Buku*</label>
								<input type="text" name="panggil" class="form-control" value="{{ $biblio->panggil }}" disabled>
							</div>
							<div class="col-md-6 col-sm-4 col-xs-12 form-group">
								<label for="eksemplar">Eksemplar*</label>
								<input type="text" name="tingkatan" class="form-control" value="{{ $biblio->eksemplar }}" disabled>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>Gambar Buku*</label>
						<?php $data = $biblio->gambar; ?>
						@if($data == true)
							<img src="/image/datamaster/biblio/{{ $biblio->gambar }}" class="img-thumbnail">
						@else
							<input type="text" name="lampiran" class="form-control" disabled value="File Lampiran buku tidak tersedia.">
						@endif
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>Lampiran Buku*</label>
						<?php $data = $biblio->lampiran; ?>
						@if($data == true)
						<?php $path = Storage::url('file/datamaster/biblio/'.$biblio->lampiran); ?>
						<embed src="{{ $path }}" type="application/pdf" width="100%" height="410px" ></embed>
						@else 
						<input type="text" name="lampiran" class="form-control" disabled value="File Lampiran buku tidak tersedia.">
						@endif
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>Status Buku*</label>
						@foreach($statusitem as $value => $data)
							@if($biblio->status_item_id == $data->status_item_id)
								<input type="text" name="status_item_id" class="form-control" value="{{ $data->status_item_nama }}" disabled>
							@endif
						@endforeach
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>Sumber Buku*</label>
						@foreach($sumberitem as $value => $data)
							@if($biblio->sumber_item_id == $data->sumber_item_id)
								<input type="text" name="sumber_item_id" class="form-control" value="{{ $data->sumber_item_nama }}" disabled>
							@endif
						@endforeach
					</div>

					<div class="col-md-12 col-sm-6 col-xs-12 form-group">
						<label>
							<input type="checkbox" name="publik" value="1" {{ $biblio->publik ? 'checked' : '' }} disabled> Publik
						</label>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>
							<input type="checkbox" name="promosi" value="1" {{ $biblio->promosi ? 'checked' : '' }} disabled> Promosi
						</label>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-7">
								&nbsp;
							</div>
							<div class="col-md-5">
								<a href="{{ route('operator.biblio') }}" class="btn btn-danger">Kembali</a>
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
{{-- Format Mata Uang --}}
<script type="text/javascript">
	$(document).ready(function() {

                // Format mata uang.
                $( '.harga' ).mask('000.000.000', {reverse: true});

            });
</script>
@endpush