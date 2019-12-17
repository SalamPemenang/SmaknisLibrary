<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\Penulis;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::All();
        return view('operator.datapendukung.penulis.index', compact('penulis'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Harap Isi form Ini.'
        ];
        $this->validate($request, [
            'penulis_nama' => 'required'
        ], $message);

        $id = $request->get('penulis_id');
        if ($id) {
            $penulis = Penulis::findOrFail($id);
        } else {
            $penulis = new Penulis;
        }
        $penulis->penulis_nama = $request->penulis_nama;
        $penulis->save();
        return redirect()->route('penulis')->with(['pesan' => 'Sukses!!!']);
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('operator.datapendukung.penulis.edit', compact('penulis'));
    }

    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();
        return redirect()->back()->with(['pesan' => 'Data berhasil dihapus!']);
    }
}
