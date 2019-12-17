<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPendukungController extends Controller
{
     public function index()
    {
        $show = false;
        $edit = false;
        return view('operator.datapendukung.index', compact('show', 'edit'));
    }
}
