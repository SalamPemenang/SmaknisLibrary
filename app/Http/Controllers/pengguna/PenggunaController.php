<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Model\DataPendukung\Anggota;

class PenggunaController extends Controller
{
    public function dasbor(){
    	if(!Session::get('login-pengguna')){
    		return redirect()->back();
    	}

    	$posel = Session::get('posel');
    	$data = Anggota::where('posel', $posel)->get()->first();

    	if($data->status_anggota == 0){
    		return redirect()->route('verifikasi')->with('alert-failed', 'akun ini belum di verifikasi');
    	}
    	if($data->status_anggota == 1){
    		return view('pengguna.dasbor-pengguna');
    	}
    }
}
