<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataMaster\Anggota;
use App\Model\DataPendukung\Kelas;
use App\resume;

class ResumeController extends Controller
{
    public function index() {
    	$resume = Resume::all();
    	return view('pengguna.resume.index', compact('resume'));
    }

    public function tambah() {
        $anggota_id = Anggota::all();
        $kelas_id = Kelas::all();
    	return view('pengguna.resume.tambah', compact('anggota_id', 'kelas_id'));
    }

    public function tbhproses(Request $request) {
    	$validasi = $request->validate([
    		'anggota_id' => 'required',
    		'kelas_id' => 'required',
    		'deskripsi' => 'required'
    	]);

    	$resume = Resume::create($validasi);
    	return redirect('pengguna.resume.index')->with('success', 'Data berhasi ditambahkan');
    }
}
