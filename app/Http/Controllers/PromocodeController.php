<?php

namespace App\Http\Controllers;

use Gabievi\Promocodes\Facades\Promocodes;
use Gabievi\Promocodes\Exceptions\InvalidPromocodeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PromocodeController extends Controller
{
    public function view_agregar(Request $request)
    {
        // POST:
        if ($request->isMethod('post')) {
            $descuento = "20";
            if ($_POST['descuento'] == "20desc" ) {
                $descuento = "20";
            }
            elseif ($_POST['descuento'] == "30desc") {
                $descuento = "30";
            }
            else
            {
                $descuento = "40";
            }

            Promocodes::create($amount = 1, $reward = $descuento, $data = [], $expires_in = 30);
            $code = DB::table('promocodes')->orderBy('id', 'desc')->first()->code;

            return view('pcode.add', compact("code"));
        }
        // GET:
        else {
            return view('pcode.add');
        }
    }

    public function view_chequear(Request $request)
    {
        // POST:
        if ($request->isMethod('post')) {
            $code = $request->code;

            try {
                $pcode = Promocodes::check($code);
                if ($pcode != false)
                    $mensaje = "¡Este código es válido!";
                else
                    $mensaje = "Este código ya no tiene validez";

            } catch (InvalidPromocodeException $e) {
                $mensaje = "Este código no existe";
            }

            return view('pcode.check', compact("code", "mensaje"));
        }
        // GET:
        else {
            return view('pcode.check');
        }
    }

    public function view_db()
    {
        $datos = DB::table('promocodes')->select('id', 'code', 'expires_at')->get();

        return view('pcodes', ['la_base_de_datos' => $datos]);
    }
}
