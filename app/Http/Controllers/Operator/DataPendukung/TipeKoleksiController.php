<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\TipeKoleksi;

class TipeKoleksiController extends Controller
{
    public function index()
    {
        $tipekoleksi = TipeKoleksi::All();
        return view('operator.datapendukung.tipekoleksi.index', compact('tipekoleksi'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Harap Isi form Ini.'
        ];
        $this->validate($request, [
            'tipekoleksi_nama' => 'required'
        ], $message);

        $id = $request->get('tipekoleksi_id');
        if ($id) {
            $tipekoleksi = TipeKoleksi::findOrFail($id);
        } else {
            $tipekoleksi = new TipeKoleksi;
        }
        $tipekoleksi->tipekoleksi_nama = $request->tipekoleksi_nama;
        $tipekoleksi->save();
        return redirect()->route('tipekoleksi')->with(['pesan' => 'Sukses!']);
    }

    public function edit($id)
    {
        $tipekoleksi = TipeKoleksi::findOrFail($id);
        return view('operator.datapendukung.tipekoleksi.edit', compact('tipekoleksi'));
    }

    public function destroy($id)
    {
        $tipekoleksi = TipeKoleksi::findOrFail($id);
        $tipekoleksi->delete();
        return redirect()->back()->with(['pesan' => 'Data berhasil dihapus!']);
    }
}
