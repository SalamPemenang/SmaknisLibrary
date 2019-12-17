<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\Penerbit;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::All();
        return view('operator.datapendukung.penerbit.index', compact('penerbit'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Harap Isi form Ini.'
        ];
        $this->validate($request, [
            'penerbit_nama' => 'required'
        ], $message);

        $id = $request->get('penerbit_id');
        if ($id) {
            $penerbit = Penerbit::findOrFail($id);
        } else {
            $penerbit = new Penerbit;
        }
        $penerbit->penerbit_nama = $request->penerbit_nama;
        $penerbit->save();
        return redirect()->route('penerbit')->with(['pesan' => 'Sukses!!!']);
    }

    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('operator.datapendukung.penerbit.edit', compact('penerbit'));
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        return redirect()->back()->with(['pesan' => 'Data berhasil dihapus!']);
    }
}
