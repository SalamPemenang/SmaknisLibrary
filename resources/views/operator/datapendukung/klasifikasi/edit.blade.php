<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ubah Data Klasifikasi</title>
    <link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
    {{-- Form Tabel Klasifikasi --}}
        <div class="column">
            <div class="card">
                <h4>Klasifikasi</h4>
                <form action="{{ route('klasifikasi.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="klasifikasi_id" value="{{ $klasifikasi->klasifikasi_id }}">
                    <label for="klasifikasi_nama">Klasifikasi:</label>
                    <input type="text" name="klasifikasi_nama" class="@error('klasifikasi_nama') is-invalid @enderror" value="{{ $klasifikasi->klasifikasi_nama }}"> <br/>
                    @error('klasifikasi_nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br/>
                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
    {{-- Batas Akhir Form Tabel Klasifikasi --}}
</body>
</html>