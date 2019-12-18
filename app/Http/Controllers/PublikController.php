<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DataMaster\Biblio;
use DB;
use Image;
use Excel;
use Storage;

class PublikController extends Controller
{
    public function promosi()
    {
    	$promosi = DB::table('biblio')
    				->join('penulis', 'penulis.penulis_id', '=', 'biblio.penulis_id')
    				->join('penerbit', 'penerbit.penerbit_id', '=', 'biblio.penerbit_id')
    				->select('biblio.*', 'penulis_nama', 'penerbit_nama')
    				->Where('promosi', '=', '1')
    				->get();
		return view('welcome', compact('promosi')); 
    }
    public function detailBuku($id)
    {
    	return view('detail-buku');
    }
    public function searchBuku()
    {
    	$cari = $request->get('term');
		$hasil = DB::table('biblio')
				->join('penulis', 'penulis.penulis_id', '=', 'biblio.penulis_id')
				->join('penerbit', 'penerbit.penerbit_id', '=', 'biblio.penerbit_id')
				->join('klasifikasi', 'klasifikasi.klasifikasi_id', '=', 'biblio.klasifikasi_id')
				->where([
					['judul', 'LIKE', '%'.$cari.'%'],
					['penulis_nama', 'LIKE', '%'.$cari.'%'],
					['isbn', 'LIKE', '%'.$cari.'%'],
					['penerbit_nama', 'LIKE', '%'.$cari.'%'],
					['penerbit_tahun', 'LIKE', '%'.$cari.'%'],
					['penerbit_tempat', 'LIKE', '%'.$cari.'%'],
					['klasifikasi_nama', 'LIKE', '%'.$cari.'%'],
					['eksemplar', 'LIKE', '%'.$cari.'%'],
				])
				->get();
		$data = array();
		foreach ($hasil as $key => $p) 
		{
			$data[] = array(
				'value' => $p->judul, 'id' => $p->biblio_id, 'label' => $p->judul
			);
		}
		if (count($data)) 
		{
			return $data;
		} else {
			return ['value' => 'Data tidak ada', 'id' => ''];
		}
    }
}
