<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Gabievi Promocodes:
use Gabievi\Promocodes\Facades\Promocodes;
use Gabievi\Promocodes\Exceptions\InvalidPromocodeException;


class PromocodeController extends Controller
{
    public function view_agregar(Request $request)
    {
        // ------------
        // POST
        // ------------
        if ($request->isMethod('post')) {

            // Creando descuentos según lo elegido desde formulario:
            if ($_POST['discount'] == "20disc")
                $discount = "20";
            elseif ($_POST['discount'] == "30disc")
                $discount = "30";
            else
                $discount = "40";

            // Creando código y obteniéndolo luego desde tabla 'promocodes':
            Promocodes::create($amount = 1, $reward = $discount, $data = [], $expires_in = 30);
            $code = DB::table('promocodes')->orderBy('id', 'desc')->first()->code;


            return view('pcode.add', compact("code"));
        }
        // ------------
        // GET
        // ------------
        else {
            return view('pcode.add');
        }
    }


    public function view_chequear(Request $request)
    {
        // ------------
        // POST
        // ------------
        if ($request->isMethod('post')) {

            // Obteniendo código desde formulario:
            $code = $request->code;

            // Chequeando si es válido, inválido o inexistente:
            try {
                $pcode = Promocodes::check($code);
                if ($pcode != false)
                    $mensaje = "This code is valid!";
                else
                    $mensaje = "This code is no longer valid";

            } catch (InvalidPromocodeException $e) {
                $mensaje = "This code does not exist";
            }

            // Retornando vista con parámetros:
            return view('pcode.check', compact("code", "mensaje"));
        }
        // ------------
        // GET
        // ------------
        else {
            return view('pcode.check');
        }
    }


    public function view_db()
    {
        // Obteniendo array con las columnas más importantes de promocodes:
        $datos = DB::table('promocodes')->select('id', 'code', 'expires_at')->get();

        return view('pcodes', ['la_base_de_datos' => $datos]);
    }

}
