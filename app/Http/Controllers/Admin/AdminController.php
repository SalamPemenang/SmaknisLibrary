<?php

namespace App\Http\Controllers\Admin;

use DB;
use Image;
use Storage;
use Session;
<<<<<<< HEAD
=======
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DataPendukung\Jurusan;
use App\Model\DataPendukung\Kelas;
use App\Model\DataPendukung\AnggotaTipe;
use App\Model\DataMaster\Anggota;
use Yajra\Datatables\Datatables;
>>>>>>> Irfan

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.index');
	}


    public function daftarAnggota()
    {
        return view('admin.anggota.index');
    }



     public function anggotaTambah()
    {
        $anggotaTipe = AnggotaTipe::all();
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('admin.anggota.tambah', compact('jurusan', 'kelas', 'anggotaTipe'));
    }

     public function anggotaStore(Request $req)
    {
        $anggota = new Anggota;
        $anggota->anggota_nama = $req->anggota_nama;
        $anggota->anggota_tipe_id = $req->anggota_tipe;
        $anggota->jurusan_id = $req->jurusan_nama;
        $anggota->kelas_id = $req->kelas_nama;
        $anggota->posel = $req->posel;
        if ( $req->password === $req->password2 ) {
            $anggota->katasandi = bcrypt($req->password);
            $anggota->save();
        }

        return redirect()->route('admin.anggota');
       
 
    }

    public function dasbor(){
        if(!Session::get('login-admin')){
            return redirect()->back();
        }
        return view('admin.dasbor-admin');
    }


     public function anggotaDatatable()
    {

        $anggota = DB::table('anggota')
        ->join('anggota_tipe', 'anggota.anggota_tipe_id', '=', 'anggota_tipe.anggota_tipe_id')
        ->join('jurusan', 'anggota.jurusan_id', '=', 'jurusan.jurusan_id')
        ->join('kelas', 'anggota.kelas_id', '=', 'kelas.kelas_id')
        ->select('anggota.*',
            'anggota_tipe.anggota_tipe_nama',
            'jurusan.jurusan_nama',
            'kelas.kelas_nama'
        )
        ->get();

        return Datatables::of($anggota)
        ->addColumn('action', 'admin.anggota.action')
        ->addIndexColumn()
        ->make(true);
    }




    // Function DataPendukung Anggota

    public function anggotaPendukung()
    {
        return view('admin.anggota.datapendukung.index');
    }


    public function tipeAnggotaDataTable()
    {
        $tipe = AnggotaTipe::all();
        return Datatables::of($tipe)
        ->addColumn('action', 'admin.anggota.datapendukung.anggotatipe.action')
        ->addIndexColumn()
        ->make(true);
    }


    public function jurusanDataTable()
    {
        $jurusan = Jurusan::all();
        return Datatables::of($jurusan)
        ->addColumn('action', 'admin.anggota.datapendukung.jurusan.action')
        ->addIndexColumn()
        ->make(true);
    }



    public function kelasDatatable()
    {
        $kelas = DB::table('kelas')
        ->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.jurusan_id')
        ->select('kelas.*',
            'jurusan.jurusan_nama'
        )->get();
        return Datatables::of($kelas)
        ->addColumn('action', 'admin.anggota.datapendukung.kelas.action')
        ->addIndexColumn()
        ->make(true);
    }



    public function tambahDatapendukung()
    {
        $jurusan = Jurusan::all();
        return view('admin.anggota.datapendukung.tambah', compact('jurusan'));
    }

    public function ubahAnggotaTipe($id)
    {
        $anggotaTipe = AnggotaTipe::find($id);
        return view('admin.anggota.datapendukung.anggotatipe.edit', compact('anggotaTipe'));
    }

    public function ubahJurusan($id)
    {
        $jurusan = Jurusan::find($id);
        return view('admin.anggota.datapendukung.jurusan.edit', compact('jurusan'));
    }

    public function ubahKelas($id)
    {
        $kelas = Kelas::find($id);
        $jurusan = Jurusan::all();
        return view('admin.anggota.datapendukung.kelas.edit', compact('kelas', 'jurusan'));
    }

    public function storeDatapendukungTipe(Request $req)
    {
        $id = $req->get('anggota_tipe_id');

        if ( $id ) {
            $anggotaTipe = AnggotaTipe::find($id);
        }else {
            $anggotaTipe = new AnggotaTipe;
        }
        
        $anggotaTipe->anggota_tipe_nama = $req->anggota_tipe_nama;
        $anggotaTipe->save();

        return redirect()->route('admin.datapendukung');
    }


    public function storeDatapendukungJurusan(Request $req)
    {
        $id = $req->get('jurusan_id');

        if ( $id ) {
            $jurusan = Jurusan::find($id);
        } else {
            $jurusan = new Jurusan;
        }

        $jurusan->jurusan_nama = $req->jurusan_nama;
        $jurusan->save();

        return redirect()->route('admin.datapendukung');
    }


    public function storeDatapendukungKelas(Request $req)
    {
        $id = $req->get('kelas_id');

        if ( $id ) {
         $kelas = Kelas::find($id);
     }else {
        $kelas = new Kelas;
    }

    $kelas->kelas_nama = $req->kelas_nama;
    $kelas->jurusan_id = $req->jurusan_nama;
    $kelas->save();

    return redirect()->route('admin.datapendukung');
    }


}
