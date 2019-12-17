<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Tipe Koleksi</title>
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

    {{-- Tabel Tipe Koleksi --}}
        <table class="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tipe Koleksi</th>
                    <th>Pembuatan</th>
                    <th>Perubahan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <?php $no=1; ?>
            @foreach($tipekoleksi as $tipekoleksis)
            <tbody>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $tipekoleksis->tipekoleksi_nama }}</td>
                    <td>Pembuatan</td>
                    <td>Perubahan</td>
                    <td>
                        <a href="{{ route('tipekoleksi.edit', $tipekoleksis->tipekoleksi_id) }}">
                            <button>Ubah</button>
                        </a> ||
                        <form action="{{ route('tipekoleksi.hapus', $tipekoleksis->tipekoleksi_id) }}" method="POST">
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
    {{-- Batas Akhir Tabel Tipe Koleksi --}}
</body>
</html>