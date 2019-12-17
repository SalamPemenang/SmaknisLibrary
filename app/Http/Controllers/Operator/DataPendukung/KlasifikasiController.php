<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\Klasifikasi;

class KlasifikasiController extends Controller
{
    public function index()
    {
        $klasifikasi = Klasifikasi::All();
        return view('operator.datapendukung.klasifikasi.index', compact('klasifikasi'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Harap Isi form Ini.'
        ];
        $this->validate($request, [
            'klasifikasi_nama' => 'required'
        ], $message);

        $id = $request->get('klasifikasi_id');
        if ($id) {
            $klasifikasi = Klasifikasi::findOrFail($id);
        } else {
            $klasifikasi = new Klasifikasi;
        }
        $klasifikasi->klasifikasi_nama = $request->klasifikasi_nama;
        $klasifikasi->save();
        return redirect()->route('klasifikasi')->with(['sukses' => 'Sukses!!!']);
    }

    public function edit($id)
    {
        $edit = true;
        $klasifikasi = Klasifikasi::findOrFail($id);
        return view('operator.datapendukung.klasifikasi.edit', compact('edit', 'klasifikasi'));
    }

    public function destroy($id)
    {
        $klasifikasi = Klasifikasi::findOrFail($id);
        $klasifikasi->delete();
        return redirect()->back();
    }
}
