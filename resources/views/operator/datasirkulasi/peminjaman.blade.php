@extends('layouts.operator.master')

@section('judul', 'Peminjaman Buku')

@section('konten')

    <div class="col-xs-10">
        
        <div class="x_panel">
            <div class="x_title">
                <h2>Peminjaman Buku</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('operator.sirkulasi.peminjaman.proses')}}" method="post">
                    @csrf
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Masukkan Nama Anggota</label>
                                <input type="text" class="form-control" id="searchA" name="anggota_id">
                            </div>
                            <div class="col-md-6">
                                <label>Masukkan Buku Yang Akan Di Pinjam</label>
                                <input type="text" class="form-control" id="searchBiblio" name="biblio_id" value="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tanggal Pinjam Buku</label>
                                <input type="date" name="mulai_pinjam" class="form-control">
                            </div>
                            <div class="col-md-6">
                               <label>Status</label>
                        
                                <select name="status_sirkulasi_id" id="status" class="form-control">
                                @foreach($status as $s)
                                <option value="{{$s->status_sirkulasi_id}}">{{$s->status_sirkulasi_nama}}</option>
                                @endforeach
                                </select> 
                            </div>
                        </div>  
                    </div>

                    <br>
                
                    <div class="form-group">
                        <button class="btn btn-primary btn pull-right">Simpan</button>             
                    </div>

                    </div>
                </form>
            </div>
        </div>
            
    </div>

@stop

@push('scripts')

<script type="text/javascript">
 $(document).ready(function() {
    $("#searchA").autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('sirkulasi/search/anggota')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               response(data);
            },
            select: function(event, ui){
                event.preventDefault();
                $('#searchA').val(ui.item.label);
            }
        });
    },
    minLength: 1
 });
});
</script>

<script type="text/javascript">
 $(document).ready(function() {
    $("#searchBiblio").autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('sirkulasi/search/biblio')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               response(data);
            },
            select: function(event, ui){
                event.preventDefault();
                $('#searchBiblio').val(ui.item.label);
            }
        });
    },
    minLength: 1
 });
});
</script>

@endpush



