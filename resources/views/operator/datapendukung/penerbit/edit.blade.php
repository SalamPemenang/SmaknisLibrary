<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ubah Data Penerbit</title>
    <link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
    {{-- Form Tabel Penerbit --}}
        <div class="column">
            <div class="card">
                <h4>Penerbit</h4>
                <form action="{{ route('penerbit.tambah') }}" method="POST">
                @csrf
                <input type="hidden" name="penerbit_id" value="{{ $penerbit->penerbit_id }}">
                <label for="penerbit_nama">Nama Penerbit: </label>
                <input type="text" name="penerbit_nama" class="@error('penerbit_nama') is-invalid @enderror" value="{{ $penerbit->penerbit_nama }}"> <br/>
                @error('penerbit_nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br/>
                <button type="submit">Simpan</button>
            </form>
            </div>
        </div>
    {{-- Batas Akhir Form Tabel Penerbit --}}
</body>
</html>