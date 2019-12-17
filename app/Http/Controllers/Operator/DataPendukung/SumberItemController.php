<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\SumberItem;

class SumberItemController extends Controller
{
    public function index()
    {
        $sumberitem = SumberItem::All();
        return view('operator.datapendukung.sumberitem.index', compact('sumberitem'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Harap Isi form Ini.'
        ];
        $this->validate($request, [
            'sumber_item_nama' => 'required'
        ], $message);

        $id = $request->get('sumber_item_id');
        if ($id) {
            $sumberitem = SumberItem::findOrFail($id);
        } else {
            $sumberitem = new SumberItem;
        }
        $sumberitem->sumber_item_nama = $request->sumber_item_nama;
        $sumberitem->save();
        return redirect()->route('sumberitem')->with(['pesan' => 'Sukses!!!']);
    }

    public function edit($id)
    {
        $sumberitem = SumberItem::findOrFail($id);
        return view('operator.datapendukung.sumberitem.edit', compact('sumberitem'));
    }

    public function destroy($id)
    {
        $sumberitem = SumberItem::findOrFail($id);
        $sumberitem->delete();
        return redirect()->back()->with(['pesan' => 'data berhasil dihapus!']);
    }
}
