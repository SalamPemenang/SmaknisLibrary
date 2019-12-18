<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.index');
	}

    public function dasbor(){
        if(!Session::get('login-admin')){
            return redirect()->back();
        }
        return view('admin.dasbor-admin');
    }
}
