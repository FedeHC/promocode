<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;



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
        $datos = DB::table('promocodes')->pluck('code');
        return view('pcodes', ['la_base_de_datos' => $datos]);

    }
}
