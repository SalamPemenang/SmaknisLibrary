<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Data Sumber Item</title>
    <link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
    {{-- Form Tabel Sumber Item --}}
        <div class="column">
            <div class="card">
                <h4>Sumber Item</h4>
                <form action="{{ route('sumberitem.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="sumber_item_id" value="{{ $sumberitem->sumber_item_id }}">
                    <label for="sumber_item_nama">Sumber Item:</label>
                    <input type="text" name="sumber_item_nama" class="@error('sumber_item_nama') is-invalid @enderror" value="{{ $sumberitem->sumber_item_nama }}"> <br/>
                    @error('sumber_item_nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br/>
                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
    {{-- Batas Akhir Form Tabel Sumber Item --}}
</body>
</html>