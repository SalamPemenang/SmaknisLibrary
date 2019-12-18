<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\Anggota;

class EmailController extends Controller
{
	public function sendEmail(Request $request)
	{
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
			
			Session::put('konfirmasi_kode_lupasandi', true);

			return redirect()->route('konfirmasi_kode_lupasandi')
								->with('alert-success','Kode telah di Kirim ke Posel/Email anda segera cek dan masukan kode');
		}
		catch (Exception $e){
			return response (['status' => false,'errors' => $e->getMessage()]);
		}
	}
}
