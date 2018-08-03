<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function view_agregar()
    {
        return view('pcode.add');
    }

    public function view_chequear()
    {
        return view('pcode.check');
    }

    public function view_db()
    {
        return view('/pcodes');
    }
}
