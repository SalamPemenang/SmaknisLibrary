<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Model\DataPendukung\Anggota;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.index');
	}

    public function dasbor(){
        if(!Session::get('login-admin')){
            return redirect()->back();
        }

        $posel = Session::get('posel');
        $data = Anggota::where('posel', $posel)->get()->first();

        if($data->status_anggota == 0){
            return redirect()->route('verifikasi')->with('alert-failed', 'akun ini belum di verifikasi');
        }
        if($data->status_anggota == 1){
            return view('admin.dasbor-admin');
        }

    }
}
