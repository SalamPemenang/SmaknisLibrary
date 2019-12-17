<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Tipe Koleksi</title>
    <link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
    {{-- Form Tabel Tipe Koleksi --}}
        <div class="column">
            <div class="card"> 
                <h4>Tipe Koleksi</h4>
                <form action="{{ route('tipekoleksi.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipekoleksi_id" value="{{ $tipekoleksi->tipekoleksi_id }}">
                    <label for="tipekoleksi_nama">Tipe Koleksi:</label>
                    <input type="text" name="tipekoleksi_nama" class="@error('tipekoleksi_nama') is-invalid @enderror" value="{{ $tipekoleksi->tipekoleksi_nama }}"> <br/>
                    @error('tipekoleksi_nama')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <br/>
                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
    {{-- Batas Akhir Form Tabel Tipe Koleksi --}}
</body>
</html>