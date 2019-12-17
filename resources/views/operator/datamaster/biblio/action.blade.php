<form action="{{ route('operator.biblio.hapus', $biblio_id) }}" method="POST">
	@csrf
	<a href="{{ route('operator.biblio.edit', $biblio_id) }}" class="btn btn-success btn-sm">Ubah</a> ||
	<a href="{{ route('operator.biblio.detail', $biblio_id) }}" class="btn btn-warning btn-sm">Detail</a> ||
	<input type="hidden" name="biblio_id" value="{{ $biblio_id }}">
	<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>