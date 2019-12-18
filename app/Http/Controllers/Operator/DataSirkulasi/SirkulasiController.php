<?php

namespace App\Http\Controllers\Operator\DataSirkulasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataSirkulasi\Sirkulasi;
use App\StatusSirkulasi;
use App\Model\DataMaster\Anggota;
use App\Model\DataPendukung\AnggotaTipe;
use App\Model\DataMaster\Biblio;
use App\Model\DataPendukung\Aturan;
use DB;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class SirkulasiController extends Controller
{
    // Menu 
    
    public function index()
    {
        return view('operator.datasirkulasi.index');
    }
    
    // Peminjaman
    
    public function peminjaman()
    {
        $anggota = Anggota::all();
        $status = StatusSirkulasi::where('status_sirkulasi_nama', '=', 'Peminjaman')->get();
        $biblio = Biblio::where('status_item_id', 1)
        ->orderBy('judul', 'asc')
        ->take(10)
        ->get();
        return view('operator.datasirkulasi.peminjaman', ['anggota' => $anggota, 'biblio' => $biblio, 'status' => $status]);
    }
    
    public function peminjamanProses(Request $request)
    {
        $sirkulasi = new Sirkulasi;
        $sirkulasi->anggota_id = $request->get('anggota_id');
        $sirkulasi->biblio_id = $request->biblio_id;
        $mytime = Carbon::now();
        $mytime->toDateString();
        $sirkulasi->mulai_pinjam = $mytime;
        $aID = $sirkulasi->anggota_id;
        $anggota = Anggota::find($aID);
        $aturan = DB::table('aturan')->where('anggota_tipe_id', '=', $anggota->anggota_tipe_id)->get()->first();
        $sirkulasi->aturan_id = $aturan->aturan_id;
        $sirkulasi->mulai_pinjam = $request->mulai_pinjam;
        $tgl = date('d', strtotime($sirkulasi->mulai_pinjam));
        $tgl2 = date('m', strtotime($sirkulasi->mulai_pinjam));
        if($tgl == 30){
            $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
            $tgl2 = date('m') + 1;
        }elseif($tgl == 31){
            $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 31;
            $tgl2 = date('m') + 1;           
        }elseif($tgl == 26){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
                $tgl2 = date('m') + 1;
            }
        }elseif($tgl == 27){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
                $tgl2 = date('m') + 1;
            }
        }elseif($tgl == 28){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
                $tgl2 = date('m') + 1;
            }
        }elseif($tgl == 29){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
                $tgl2 = date('m') + 1;
            }
        }
        $b = $tgl  + $aturan->periode;
        $c = $tgl2;
        $sirkulasi->kembali_pinjam = date('Y-'.+$c. '-'.+$b);
        $sirkulasi->status_sirkulasi_id = $request->status_sirkulasi_id;
        $sirkulasi->save();

        $id = $sirkulasi->biblio_id;
        $biblio = Biblio::find($id);
        $b = DB::table('status_item')->where('status_item_nama', '=', 'tidak tersedia')->get()->first();
        $biblio->status_item_id = $b->status_item_id;
        $biblio->save();
        return redirect()->route('operator.sirkulasi.riwayat.peminjaman');
    }
    
    // Search With Ajax

    public function searchAnggota(Request $request)
    {
        $search = $request->get('term');
        $anggota = DB::table('anggota')->where('anggota_nama','LIKE','%'.$search."%")->get();
        $data=array();
        foreach ($anggota as $a) {
                $data[]=array('value'=>$a->anggota_id,'id'=>$a->anggota_id, 'label'=>$a->anggota_nama);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
    
    public function searchBiblio(Request $request)
    {
        $search = $request->get('term');
        $b = DB::table('status_item')->where('status_item_nama', '=', 'Tersedia')->get()->first();
        $tabel = DB::table('biblio')->where('status_item_id', '=', $b->status_item_id);
        $biblio = DB::table($tabel)->where('judul', 'LIKE', '%'.$request->search."%")->get();
        $data=array();
        foreach ($biblio as $a) {
             $data[]=array('value'=>$a->biblio_id, 'id'=>$a->biblio_id, 'label'=>$a->judul);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];

    }
    
    public function searchBiblioBack(Request $request)
    {
        $search = $request->get('term');
        $b = DB::table('status_item')->where('status_item_nama', '=', 'Tidak Tersedia')->get()->first();
        $tabel = DB::table('biblio')->where('status_item_id', '=', $b->status_item_id);
        $biblio = DB::table($tabel)->where('judul', 'LIKE', '%'.$request->search."%")->get();
        $data=array();
        foreach ($biblio as $a) {
             $data[]=array('value'=>$a->biblio_id, 'id'=>$a->biblio_id, 'label'=>$a->judul);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];

    }
   
    // Perpanjangan
    public function perpanjangan($id)
    {
        $perpanjangan = DB::table('sirkulasi')
        ->join('anggota', 'sirkulasi.anggota_id', '=', 'anggota.anggota_id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->join('status_sirkulasi', 'sirkulasi.status_sirkulasi_id', '=', 'status_sirkulasi.status_sirkulasi_id')
        ->select('sirkulasi.*', 'anggota.anggota_nama', 'biblio.judul', 'biblio.eksemplar', 'status_sirkulasi.status_sirkulasi_nama')
        ->where('sirkulasi_id', '=', $id)
        ->get()->first();
        
        return view('operator.datasirkulasi.perpanjangan.create', compact('perpanjangan'));
    }
    
    public function perpanjanganProses(Request $request, $id)
    {
        $sirkulasi = Sirkulasi::findOrFail($id);
        $sirkulasi->anggota_id = $request->anggota_id;
        $sirkulasi->biblio_id = $request->biblio_id;
        $mytime = Carbon::now();
        $mytime->toDateString();
        $sirkulasi->mulai_pinjam = $mytime;
        $sirkulasi->aturan_id = $request->aturan_id;
        $sirkulasi->mulai_pinjam = $request->mulai_pinjam;
        $sirkulasi->perpanjangan = $request->perpanjangan;
        $tgl2 = date('m', strtotime($sirkulasi->perpanjangan));
        $tgl3 = date('d', strtotime($sirkulasi->perpanjangan));
        $b = $tgl3;
        $c = $tgl2;
        $sirkulasi->kembali_pinjam = date('Y-'.+$c. '-'.+$b);
        $sirkulasi->status_sirkulasi_id = $request->status_sirkulasi_id;
        $sirkulasi->save();
        return redirect()->route('operator.sirkulasi.riwayat.peminjaman');
    }
    
    // Pengembalian
    
    public function pengembalian()
    {
        $anggota = Anggota::all();
        $status = StatusSirkulasi::where('status_sirkulasi_nama', '=', 'Pengembalian')->get();
        $biblio = Biblio::where('status_item_id', 1)
        ->orderBy('judul', 'asc')
        ->take(10)
        ->get();
        return view('operator.datasirkulasi.pengembalian', ['anggota' => $anggota, 'biblio' => $biblio, 'status' => $status]);
    }
    
    public function pengembalianProses(Request $request)
    {
        $sirkulasi = new Sirkulasi;
        $sirkulasi->anggota_id = $request->anggota_id;
        $sirkulasi->biblio_id = $request->biblio_id;
        $mytime = Carbon::now();
        $mytime->toDateString();
        $sirkulasi->kembali_pinjam = $mytime;
        $sirkulasi->kembali_pinjam = $request->kembali_pinjam;
        $aID = $sirkulasi->anggota_id;
        $anggota = Anggota::find($aID);
        $aturan = DB::table('aturan')->where('anggota_tipe_id', '=', $anggota->anggota_tipe_id)->get()->first();
        $sirkulasi->aturan_id = $aturan->aturan_id;
        
        $tgl = date('d', strtotime($sirkulasi->kembali_pinjam));
        $tgl2 = date('y', strtotime($sirkulasi->kembali_pinjam));
        if($tgl == 1){
            $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 29;
            $tgl2 = date('m') - 1;
        }elseif($tgl == 2){
            $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
            $tgl2 = date('m') - 1;
        }elseif($tgl == 3){
            $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
            $tgl2 = date('m') - 1;
        }elseif($tgl == 4){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
                $tgl2 = date('m') - 1;
            }
        }elseif($tgl == 5){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
                $tgl2 = date('m') - 1;
            }
        }elseif($tgl == 6){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
                $tgl2 = date('m') - 1;
            }
        }elseif($tgl == 7){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
                $tgl2 = date('m') - 1;
            }
        }
        $b = $tgl  - $aturan->periode;
        $c = $tgl2;
        $sirkulasi->mulai_pinjam = date('Y-'.+$c. '-'.+$b);
        $sirkulasi->status_sirkulasi_id = $request->status_sirkulasi_id;
        $sirkulasi->save();
        $id = $sirkulasi->biblio_id;
        $biblio = Biblio::find($id);
        $b = DB::table('status_item')->where('status_item_nama', '=', 'Tersedia')->get()->first();
        $biblio->status_item_id = $b->status_item_id;
        $biblio->save();
        return redirect()->back();
    }
    
    // Riwayat 

    // Peminjaman
    public function riwayatPeminjaman()
    {
        $status = DB::table('status_sirkulasi')->where('status_sirkulasi_nama', '=', 'Peminjaman')->get()->first();
        
        $peminjaman = DB::table('sirkulasi')
        ->join('anggota', 'sirkulasi.anggota_id', '=', 'anggota.anggota_id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->select('sirkulasi.*', 'sirkulasi.sirkulasi_id', 'anggota.anggota_nama', 'biblio.judul', 'biblio.eksemplar')
        ->where('status_sirkulasi_id', '=', $status->status_sirkulasi_id)
        ->orderBy('sirkulasi.sirkulasi_id', 'desc')
        ->paginate(5);
        
        $wk = DB::table('sirkulasi')->first();
        
        $sirkulasi = DB::table('sirkulasi')->where('sirkulasi_id', '=', $wk->sirkulasi_id)->get();
        
        $now = Carbon::now()->format('Y'.'m'.'d'); 
        $now2 = strtotime($now);
        
        foreach($sirkulasi as $s){
            $a = $s->kembali_pinjam;
            $a2 = strtotime($a);
        }
        
        return Datatables::of($peminjaman)
                            ->addColumn('Denda', 'operator.datasirkulasi.riwayat.denda', compact('now2', 'a2', 'peminjaman'))
                            ->addColumn('Perpanjangan', 'operator.datasirkulasi.riwayat.perpanjangan')
                            ->make(true);
                            
    }

    public function searchPeminjaman(Request $request)
    {
        $cari = $request->cari;

        $status = DB::table('status_sirkulasi')->where('status_sirkulasi_nama', '=', 'Peminjaman')->first();

        // $oke = DB::table('sirkulasi')->
        // where('status_sirkulasi_id', '=', $status->status_sirkulasi_id);

        $peminjaman = DB::table('sirkulasi')
        ->join('anggota', 'sirkulasi.anggota_id', '=', 'anggota.anggota_id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->select('sirkulasi.*', 'anggota.anggota_nama', 'biblio.judul', 'biblio.eksemplar')
        ->where('anggota_nama', 'LIKE', "%".$cari."%", "AND" , 'status_sirkulasi_id', '=', $status->status_sirkulasi_id)->paginate(5);
        
        $wk = DB::table('sirkulasi')->first();
        
        $sirkulasi = DB::table('sirkulasi')->where('sirkulasi_id', '=', $wk->sirkulasi_id)->get();
        
        $now = Carbon::now()->format('Y'.'m'.'d'); 
        $now2 = strtotime($now);
        
        foreach($sirkulasi as $s){
            $a = $s->kembali_pinjam;
            $a2 = strtotime($a);
        }

        return view('operator.datasirkulasi.riwayat.peminjaman', compact('peminjaman', 'now2', 'a2'));
    }
    // Pengembalian
    public function riwayatPengembalian()
    {
        $status = DB::table('status_sirkulasi')->where('status_sirkulasi_nama', '=', 'Pengembalian')->get()->first();
        $pengembalian = DB::table('sirkulasi')
        ->join('anggota', 'sirkulasi.anggota_id', '=', 'anggota.anggota_id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->join('aturan', 'sirkulasi.aturan_id', '=', 'aturan.aturan_id')
        ->select('sirkulasi.*', 'anggota.anggota_nama', 'biblio.judul', 'biblio.eksemplar', 'aturan.denda')
        ->where('status_sirkulasi_id', '=', $status->status_sirkulasi_id)
        ->orderBy('sirkulasi.sirkulasi_id', 'desc')
        ->get();
        return view('operator.datasirkulasi.riwayat.pengembalian', compact('pengembalian'));
    }
    
}
