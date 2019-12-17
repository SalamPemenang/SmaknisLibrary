<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Anggota;
use Hash;

class ForgotPasswordController extends Controller
{
    public function showForm(){
        if(!Session::get('konfirmasi_kode_lupasandi')){
            return redirect()->back();
        }
        return view('layouts.email.konfirmasi_kode_lupasandi');
    }
    public function sandibaru(Request $req){

        $kode = $req->kode_konfirmasi;

        $match_kode = Anggota::where('kode_konfirmasi', $kode)->first();

        if(!$match_kode){
            return redirect()->back()->with('alert-failed', 'kode yang anda masukan salah');
        }else{

            if($req->katasandi == $req->ulangikatasandi){

                $data = Anggota::where('kode_konfirmasi', $kode)->first();
                $s = Anggota::findOrFail($data->anggota_id);
                $s->katasandi = Hash::make($req->katasandi);
                $s->save();

                $af = Anggota::find($match_kode->anggota_id);
                $af->kode_konfirmasi = null;
                $af->save();

                 return redirect()->route('Masuk')->with('alert-success', 'kata sandi telah diganti silahkan masuk dengan kata sandi baru');
            }else {
                 return redirect()->back()->with('alert-failed', 'kata sandi tidak sama');
            } 
        }
    }
}
