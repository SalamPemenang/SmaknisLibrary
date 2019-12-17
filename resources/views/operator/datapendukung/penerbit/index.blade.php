<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Penerbit</title>
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

    {{-- Tabel Penerbit --}}
        <table class="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penerbit</th>
                    <th>Pembuatan</th>
                    <th>Perubahan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <?php $no=1; ?>
            @foreach($penerbit as $penerbits)
            <tbody>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $penerbits->penerbit_nama }}</td>
                    <td>{{ date('d F Y'), strtotime($penerbits->pembuatan) }}</td>
                    <td>{{ date('d F Y'), strtotime($penerbits->perubahan) }}</td>
                    <td>
                        <a href="{{ route('penerbit.edit', $penerbits->penerbit_id) }}">
                            <button>Ubah</button></a> ||
                        <form action="{{ route('penerbit.hapus', $penerbits->penerbit_id) }}" method="POST">
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
    {{-- Batas Akhir Tabel Penerbit --}}
</body>
</html>