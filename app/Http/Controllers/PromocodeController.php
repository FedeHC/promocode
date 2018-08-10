<?php

namespace App\Http\Controllers;

use Gabievi\Promocodes\Promocodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Controller;

class PromocodeController extends Controller
{
    public function view_agregar(Request $request)
    {

        if ($request ->isMethod('post')) {
            $pcode  = new Promocodes();
            $pcode->createDisposable($amount = 1, $reward = null, $data = [], $expires_in = null);
            $code = DB::table('promocodes')->orderBy('id', 'desc')->first()->code;
            return view('pcode.add', compact( "code"));
        }else{
            return view('pcode.add');
        }



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
