<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Status item</title>
	<link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
	{{-- Pemberitahuan Status Simpan data --}}
		@if($message = Session::get('pesan'))
			<div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
				<strong>{{ $message }}</strong>
			</div>
		@endif
		@if($errors->any())
			<div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
				<strong>Maaf Anda Belum Mengisikan Data!</strong>
			</div>
		@endif
	{{-- Batas Akhir Pemberitahuan Status Simpan Data --}}
	
	{{-- Tabel Status Item --}}
		<table class="tabel">
			<thead>
				<tr>
					<th>No</th>
					<th>Status Item</th>
					<th>Pembuatan</th>
					<th>Perubahan</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<?php $no=1; ?>
			@foreach($statusitem as $statusitems)
			<tbody>
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $statusitems->status_item_nama }}</td>
					<td>{{ date('d F Y'), strtotime($statusitems->pembuatan) }}</td>
					<td>{{ date('d F Y'), strtotime($statusitems->perubahan) }}</td>
					<td>
						<a href="{{ route('statusitem.edit', $statusitems->status_item_id) }}">
							<button>Ubah</button>
						</a> ||
						<form action="{{ route('statusitem.hapus', $statusitems->status_item_id) }}" method="POST">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
							<span onclick="return confirm('hapus data ini?')">
                                 <button type="submit">Hapus</button>
							</span>
						</form>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
	{{-- Bagian Akhir Tabel Status Item --}}
</body>
</html>