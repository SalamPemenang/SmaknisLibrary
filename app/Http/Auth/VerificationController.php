<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\Anggota;

class VerificationController extends Controller
{
   public function showverifikasi(){
    return view('layouts.email.verifikasi');
   }
   public function kirimverifikasi(Request $request){
        $kode = rand(1,1000000);

        try{
            Mail::send('layouts.email.email', ['kode' => $kode], function ($message) use ($request)
            {
                $message->subject('Verifikasi Kode');
                $message->from('SmaknisPerpusApp@smaknis.com', 'Smaknis');
                $message->to($request->posel);
            });

            if(!Anggota::where('posel', $request->posel)->first()){
                return redirect()->back()->with('alert-failed', 'Posel/email tidak terdaftar');
            }else{
                $a = Anggota::where('posel', $request->posel)->first();
                    $af = Anggota::find($a->anggota_id);
                    $af->kode_konfirmasi = $kode;
                    $af->save();
            }
            Session::put('posel', $request->posel);
            return redirect()->route('konfirmasi-show-kode-verifi')
                                ->with('alert-success','Kode telah di Kirim ke Posel/Email anda segera cek dan masukan kode');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
   }
   public function konfirmasishowverifikasi(){
    return view('layouts.email.konfirmasi_verifikasi');
   }
   public function konfirmasiverifikasi(Request $req){

    $posel = Session::get('posel');
    $data = Anggota::where('posel', $posel)->first();
    if($req->kode_konfirmasi == $data->kode_konfirmasi){

        $verifi = Anggota::find($data->anggota_id);
        $verifi->status_anggota = 1;
        $verifi->kode_konfirmasi = null;
        $verifi->save();
        Session::flush();
        return redirect()->route('Masuk')->with('alert-success', 'akun telah di verifikasi ');
    }   
        return redirect()->back();
   }
}
