@extends('layouts.public-layouts')
@section('title')
konfirmasi kode
@stop
@section('content')
<!-- Main Section -->
<div class="login-register-area ptb-130 hm-3-padding">
    <div class="container-fluid">
        @if(\Session::has('alert-failed'))
        <div class="alert alert-failed">
            <div>{{Session::get('alert-failed')}}</div>
        </div>
        @endif
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
                                <strong style="color: red;">Catatan : </strong><span>Masukan kode verifikasi yang telah anda terima.</span>
                                <br>
                                <br>
                                <div class="login-form">
                                    <form action="{{url('/lupa-sandi/kirim-kode')}}" method="post">
                                        @csrf
                                        <label>kata sandi baru</label>
                                        <input type="password" name="katasandi" placeholder="Masukan kata sandi baru">
                                        <label>ulangi Kata sandi baru</label>
                                        <input type="password" name="ulangikatasandi" placeholder="ulangi kata sandi baru">
                                        <label>Kode</label>  
                                        <strong style="color: red; font-size: 20px;">*</strong>
                                        <span>Masukan Kode verifikasi dengan benar</span>
                                        <input type="text" name="kode_konfirmasi" value="{{old('posel')}}" placeholder="Masukan kode verifikasi">
                                        <div class="button-box">
                                            <button type="submit" class="btn-style cr-btn"><span>kirim kode</span></button>
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