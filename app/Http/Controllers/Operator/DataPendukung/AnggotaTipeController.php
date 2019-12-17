<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\AnggotaTipe;;

class AnggotaTipeController extends Controller
{
    public function index()
    {
        $anggotatipe = AnggotaTipe::All();
        return view('operator.datapendukung.anggotatipe.index', compact('anggotatipe'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Harap isi form ini.'
        ];
        $this->validate($request, [
            'anggota_tipe_nama' => 'required'
        ], $message);

        $id = $request->get('anggota_tipe_id');
        
        if ($id) {
            $anggotatipe = AnggotaTipe::findOrFail($id);
        } else {
            $anggotatipe = new AnggotaTipe;
        }
        $anggotatipe->anggota_tipe_nama = $request->anggota_tipe_nama;
        $anggotatipe->save();
        return redirect()->route('anggotatipe')->with(['pesan' => 'Sukses!!!']);
    }

    public function edit($id)
    {
        $anggotatipe = AnggotaTipe::findOrFail($id);
        $show = false;
        $edit = true;

        return view('operator.datapendukung.anggotatipe.edit', compact('anggotatipe', 'show', 'edit'));
    }

    public function destroy($id)
    {
        $anggotatipe = AnggotaTipe::findOrFail($id);
        $anggotatipe->delete();
        return redirect()->back()->with(['pesan' => 'Berhasil dihapus!']);
    }
}
