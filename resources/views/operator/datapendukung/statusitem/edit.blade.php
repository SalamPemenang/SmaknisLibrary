<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ubah Data Status Item</title>
    <link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
    {{-- Form Tabel Status Item --}}
        <div class="column">
            <div class="card">
                <h4>Status Item</h4>
                <form action="{{ route('statusitem.tambah') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status_item_id" value="{{ $statusitem->status_item_id }}">
                    <label for="status_item_nama">Status Item :</label>
                    <input type="text" name="status_item_nama" class="@error('status_item_nama') is-invalid @enderror" value="{{ $statusitem->status_item_nama }}"> <br/>
                    @error('status_item_nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br/>
                    <button type="submit">Simpan</button>
                </form>         
            </div>          
        </div>
    {{-- Batas Akhir Form Tabel Status Item --}}
</body>
</html>