@extends('layouts.operator.master')

@section('judul', 'Perpanjangan Buku')

@section('konten')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h3 class="display-4s">Perpanjangan Buku</h3>        

            <div class="col-md-8 mt-4">
                <form action="{{ route('operator.sirkulasi.perpanjangan.proses', $perpanjangan->sirkulasi_id) }}" method="post">
                    @csrf
                    <input type="hidden" name="sirkulasi_id" value="{{$perpanjangan->sirkulasi_id}}">
                    <div class="form-group">
                        <label>Masukkan Nama Anggota</label>
                        <select class="form-control" name="anggota_id" readonly> 
                            <option value="{{$perpanjangan->anggota_id}}">{{$perpanjangan->anggota_nama}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Masukkan Buku Yang Akan Di Pinjam</label>
                        <select class="form-control" name="biblio_id" readonly> 
                            <option value="{{$perpanjangan->biblio_id}}">{{$perpanjangan->judul}}, {{$perpanjangan->eksemplar}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam Buku</label>
                        <input type="text" name="mulai_pinjam" class="form-control" value="{{$perpanjangan->mulai_pinjam}}" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="aturan_id" class="form-control" value="{{$perpanjangan->aturan_id}}">
                    </div>
                    <div class="form-group">
                        <label>Dikembalikan tanggal</label>
                        <input type="text" name="kembali_pinjam" class="form-control" value="{{$perpanjangan->kembali_pinjam}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Perpanjang</label>
                        <input type="date" name="perpanjangan" class="form-control" value="{{$perpanjangan->perpanjangan}}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_sirkulasi_id" readonly> 
                            <option value="{{$perpanjangan->status_sirkulasi_id}}">{{$perpanjangan->status_sirkulasi_nama}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            

        </div>
    </div>
</div>

@stop