@extends('layouts.operator.master')

@section('judul', 'Pengembalian Buku')

@section('konten')

<div class="row mt-5">
    <div class="col-md-8 mt-4">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="display-4s text-center">Pengembalian Buku</h4>
            </div>
            <div class="x_content">
                <form action="{{route('operator.sirkulasi.pengembalian.proses')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Masukkan Nama Anggota</label><br>
                        <input type="text" class="form-control" id="searchA" name="search" name="anggota_id">
                    </div><br>
                    <div class="form-group">
                        <label>Masukkan Buku Yang Akan Di Kembalikan</label><br>
                        <input type="text" class="form-control" id="searchBiblio" name="search">
                    </div><br>
                    <div class="form-group">
                        <label>Di Kembalikan Pada Tanggal</label><br>
                        <input type="date" name="kembali_pinjam" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label>Status</label><br>
                        
                        <select name="status_sirkulasi_id" id="status" class="form-control">
                            @foreach($status as $s)
                            <option value="{{$s->status_sirkulasi_id}}">{{$s->status_sirkulasi_nama}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop 

@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
            url: "{{url('sirkulasi/search/biblio/back')}}",
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

<!-- <script type="text/javascript">
$('#searchBiblio').on('keyup', function(){
    $value=$(this).val();
    $.ajax({
        type: 'get',
        url: '{{URL::to('sirkulasi/search/biblio/back')}}',
        data: {'search':$value},
        success:function(data){
            $('#biblio').html(data);
        }
    });
})
</script> -->

@endpush


