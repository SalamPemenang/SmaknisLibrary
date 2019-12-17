@extends('layouts.operator.master')
@section('judul')
Ubah Klasifikasi Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel klasifikasi --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Klasifikasi</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li>
                    <a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form action="{{ route('operator.pendukung.biblio.klasifikasi.proses') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="klasifikasi_id" value="{{ $klasifikasi->klasifikasi_id }}">
                    <label for="klasifikasi_nama">Nama Klasifikasi*</label>
                    <input type="text" name="klasifikasi_nama" class="form-control @error('klasifikasi_nama') is-invalid @enderror" value="{{ $klasifikasi->klasifikasi_nama }}">
                    @error('klasifikasi_nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    {{-- Bagian Akhir Tabel klasifikasi --}}
@stop