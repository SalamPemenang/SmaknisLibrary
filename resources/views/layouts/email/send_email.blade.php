@extends('layouts.public-layouts')
@section('title')
kirim kode
@stop
@section('content')
<!-- Main Section -->
<div class="login-register-area ptb-130 hm-3-padding">
    <div class="container-fluid">
        @if(\Session::has('alert-success'))
        <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-7 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <strong style="color: red;">Catatan : </strong><span>Setelah memasukan posel/email anda akan menerima pesan kode verifikasi.</span>
                                <br>
                                <br>
                                <div class="login-form">
                                    <form action="{{url('/sendEmail')}}" method="post">
                                        @csrf
                                        <label>pos-el</label>  
                                        <strong style="color: red; font-size: 20px;">*</strong>
                                        <span>Masukan Posel / Email dengan benar</span>
                                        <input type="text" name="posel" value="{{old('posel')}}" placeholder="Masukan Pos-el/e-mail">
                                        @if(\Session::has('alert-failed'))
                                        <div class="alert alert-failed">
                                            <div>{{Session::get('alert-failed')}}</div>
                                        </div>
                                        @endif
                                        <div class="button-box">
                                            <button type="submit" class="btn-style cr-btn"><span>Kirim posel</span></button>
                                        </div>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.main-section -->
@endsection