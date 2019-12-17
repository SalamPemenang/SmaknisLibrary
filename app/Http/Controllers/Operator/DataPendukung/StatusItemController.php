<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\StatusItem;

class StatusItemController extends Controller
{
    public function index()
    {
        $statusitem = StatusItem::all();
        return view('operator.datapendukung.statusitem.index', compact('statusitem'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Harap Isi form Ini.'
        ];
        $this->validate($request, [
            'status_item_nama' => 'required'
        ], $message);

        $id = $request->get('status_item_id');
        if ($id) {
            $statusitem = StatusItem::findOrFail($id);
        } else {
            $statusitem = new StatusItem;
        }
        $statusitem->status_item_nama = $request->status_item_nama;
        $statusitem->save();
        return redirect()->route('statusitem')->with(['pesan' => 'Sukses!!!']);
    }

    public function edit($id)
    {
        $statusitem = StatusItem::findOrFail($id);
        return view('operator.datapendukung.statusitem.edit', compact('statusitem'));
    }

    public function destroy($id)
    {
        $statusitem = StatusItem::findOrFail($id);
        $statusitem->delete();
        return redirect()->back()->with(['pesan' => 'Data berhasil dihapus!']);
    }
}
