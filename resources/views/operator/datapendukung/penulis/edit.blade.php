<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ubah Data Penulis</title>
    <link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
    {{-- Form Tabel Penulis --}}
        <div class="column">
            <div class="card">
                <h4>Penulis</h4>
                <form action="{{ route('penulis.tambah') }}" method="POST">
                    @csrf   
                    <input type="hidden" name="penulis_id" value="{{ $penulis->penulis_id }}">
                    <label for="penulis_nama">Nama Penulis:</label>
                    <input type="text" name="penulis_nama" class="@error('penulis_nama') is-invalid @enderror" value="{{ $penulis->penulis_nama }}"> <br/>
                    @error('penulis_nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br/>
                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
    {{-- Batas Akhir Form Tabel Penulis --}}
</body>
</html>