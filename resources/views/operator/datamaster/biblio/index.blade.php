@extends('layouts.operator.master')
@section('judul')
Biblio - Operator  
@stop

@section('konten')
{{-- Area Konten --}}
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Biblio</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="{{ route('operator.biblio.tambah') }}">Tambah Data</a>
						</li>
						<li>
							<a href="{{ route('operator.biblio.upload.excel') }}">Import Data</a>
						</li>
						<li>
							<a href="{{ route('operator.biblio.export') }}">Eksport Data</a>
						</li>
						<li>
							<a href="{{ route('operator.biblio.riwayat') }}">Riwayat Data</a>
						</li>
					</ul>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<!-- Tabel Biblio -->
			<table id="biblio" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Edisi</th>
						<th>ISBN</th>
						<th>Eksemplar</th>
						<th>Status</th>
						<th>Pembuatan</th>
						<th>Perubahan</th>
						<th>Opsi</th>
					</tr>
				</thead>
			</table>
			<!-- Bagian Akhir Tabel Biblio -->          
		</div>
	</div>
</div>
{{-- Batas Akhir Area Konten --}}
@stop
@push('scripts')
<script type="text/javascript">
	$(function(){
		$('#biblio').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.biblio.datatable') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'judul', name: 'judul', width: '100px', orderable: true},
			{data: 'edisi', name: 'edisi', width: '3px', orderable: true},
			{data: 'isbn', name: 'isbn', width: '100px', orderable: true},
			{data: 'eksemplar', name: 'eksemplar', width: '30px', orderable: true},
			{data: 'status_item_nama', name: 'status_item_id', width: '40px', orderable: true},
			{data: 'pembuatan', name: 'pembuatan', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
</script>	
@endpush