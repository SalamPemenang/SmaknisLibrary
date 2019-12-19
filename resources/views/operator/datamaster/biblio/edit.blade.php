@extends('layouts.operator.master')

@section('judul')
Edit Biblio - Operator
@stop

@section('konten')
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Edit Biblio</h2>
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
				<form action="{{ route('operator.biblio.ubah', $biblio->biblio_id) }}" method="POST" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="biblio_id" value="{{ $biblio->biblio_id }}">
					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="judul">Judul*</label>
						<input type="text" name="judul" class="form-control" autocomplete="off" value="{{ $biblio->judul }}">
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="edisi">Edisi*</label>
								<input type="text" name="edisi" class="form-control" autocomplete="off" value="{{ $biblio->edisi }}">
							</div>
							<div class="col-md-6">
								<label for="penerbit_tempat">Tempat Terbit Buku*</label>
								<input type="text" name="penerbit_tempat" class="form-control" autocomplete="off" value="{{ $biblio->penerbit_tempat }}">
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="search_penulis">Penulis*</label>
						<select name="penulis_id" id="penulis_cari" class="form-control">
							@foreach($penulis as $value => $data)
								@if($biblio->penulis_id == $data->penulis_id)
									<option value="{{ $data->penulis_id }}" selected="">{{ $data->penulis_nama }}</option>
								@else
									<option value="{{ $data->penulis_id }}">{{ $data->penulis_nama }}</option>}
								@endif
							@endforeach
						</select>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="isbn">ISBN*</label>
						<input type="text" name="isbn" class="form-control" autocomplete="off" value="{{ $biblio->isbn }}">
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="penerbit_search">Penerbit*</label>
						<select name="penerbit_id" class="form-control">
							@foreach($penerbit as $value => $data)
								@if($biblio->penerbit_id == $data->penerbit_id)
									<option value="{{ $data->penerbit_id }}" selected="">{{ $data->penerbit_nama }}</option>
								@else
									<option value="{{ $data->penerbit_id }}">{{ $data->penerbit_nama }}</option>}
								@endif
							@endforeach
						</select>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="harga_buku">Harga Buku*</label>
								<input type="text" name="harga_buku" class="form-control" autocomplete="off" value="{{ $biblio->harga_buku }}">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="penerbit_tahun">Tahun Terbit Buku*</label>
								<input type="text" name="penerbit_tahun" class="form-control" id="penerbit_tahun" autocomplete="off" value="{{ $biblio->penerbit_tahun }}">
							</div>
						</div>
					</div>

					<div class="col-md-12 form-group">
						<label for="deskripsi">Deskripsi*</label>
						<textarea name="deskripsi" class="form-control" id="deskripsi">{{ $biblio->deskripsi }}</textarea>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="tipekoleksi_id">Tipe Koleksi*</label>
								<select name="tipekoleksi_id" class="form-control">
									@foreach($tipekoleksi as $value => $data)
										@if($biblio->tipekoleksi_id == $data->tipekoleksi_id)
											<option value="{{ $data->tipekoleksi_id }}" selected="">{{ $data->tipekoleksi_nama }}</option>
										@else
											<option value="{{ $data->tipekoleksi_id }}">{{ $data->tipekoleksi_nama }}</option>}
										@endif
									@endforeach
								</select>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group">
								<label for="klasifikasi_id">Klasifikasi*</label>
								<select name="klasifikasi_id" class="form-control">
									@foreach($klasifikasi as $value => $data)
										@if($biblio->klasifikasi_id == $data->klasifikasi_id)
											<option value="{{ $data->klasifikasi_id }}" selected="">{{ $data->klasifikasi_nama }}</option>
										@else
											<option value="{{ $data->klasifikasi_id }}">{{ $data->klasifikasi_nama }}</option>}
										@endif
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-6 col-sm-4 col-xs-12 form-group">
								<label for="panggil">Panggil Rak Buku*</label>
								<input type="text" name="panggil" class="form-control" value="{{ $biblio->panggil }}" disabled>
							</div>
							<div class="col-md-6 col-sm-4 col-xs-12 form-group">
								<label for="tingkat">Eksemplar*</label>
								<input type="text" name="eksemplar" class="form-control" id="tingkatan" value="{{ $biblio->eksemplar }}" disabled>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="gambar">Gambar Buku*</label>
						<?php $data = $biblio->gambar; ?>
						@if($data == true)
							<img src="/image/datamaster/biblio/{{ $biblio->gambar }}" class="img-thumbnail">
						@else	
							<input type="file" name="gambar" class="form-control">
							<span class="text-danger">Maaf File Tidak Ada!</span>
						@endif
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label for="lampiran">Lampiran Buku*</label>
						<?php $lampiran = $biblio->lampiran; ?>
						<?php $path = Storage::url('file/datamaster/biblio/'.$biblio->lampiran); ?>
						@if($lampiran == true)
							<embed src="{{ $path }}" type="application/pdf" width="100%" height="410px"></embed>
						@else mw
							<input type="file" name="lampiran" class="form-control">
							<span class="text-danger">Maaf File Tidak Ada!</span>
						@endif
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>Status Buku*</label>
						<select name="status_item_id" class="form-control">
							@foreach($statusitem as $value => $data)
								@if($biblio->status_item_id == $data->status_item_id)
									<option value="{{ $data->status_item_id }}" selected="">{{ $data->status_item_nama }}</option>
								@else
								<option value="{{ $data->status_item_id }}" selected="">{{ $data->status_item_nama }}</option>
								@endif
							@endforeach
						</select>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>Sumber Buku*</label>
						<select name="sumber_item_id" class="form-control">
							@foreach($sumberitem as $value => $data)
								@if($biblio->sumber_item_id == $data->sumber_item_id)
									<option value="{{ $data->sumber_item_id }}" selected="">{{ $data->sumber_item_nama }}</option>
								@else
									<option value="{{ $data->sumber_item_id }}">{{ $data->sumber_item_nama }}</option>
								@endif
						@endforeach
						</select>
					</div>

					<div class="col-md-12 col-sm-6 col-xs-12 form-group">
						<label>
							<input type="checkbox" name="publik" value="1" {{ $biblio->publik ? 'checked' : '' }}> Publik
						</label>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<label>
							<input type="checkbox" name="promosi" value="1" {{ $biblio->promosi ? 'checked' : '' }}> Promosi
						</label>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
						<div class="row">
							<div class="col-md-7">
								&nbsp;
							</div>
							<div class="col-md-5">
								<a href="{{ route('operator.biblio') }}" class="btn btn-danger">Kembali</a>
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
	$('#search_penulis').on('keyup', function() {
		$value = $(this).val();
		$.ajax({
			type: 'get',
			url: '{{ URL::to('biblio/search') }}',
			data: {'search':$value},
			success:function(data) 
			{
				$('#penulis_cari').html(data);
			} 
		});
	});
</script>
{{-- Cari Penerbit --}}
<script type="text/javascript">
	$('#penerbit_search').on('keyup', function() {
		$value = $(this).val();
		$.ajax({
			typr: 'get',
			url: '{{ URL::to('biblio/searchpenerbit') }}',
			data: {'searchPenerbit':$value},
			success:function(data) {
				$('#penerbit_cari').html(data);
			}
		});
	});
</script>
{{-- Format Mata Uang --}}
{{-- <script type="text/javascript">
	$(document).ready(function(){

                // Format mata uang.
                $( '.harga' ).mask('000.000.000', {reverse: true});

            })
</script> --}}
@endpush