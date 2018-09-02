<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

// Gabievi Promocodes:
use Gabievi\Promocodes\Facades\Promocodes;
use Gabievi\Promocodes\Exceptions\InvalidPromocodeException;


class PromocodeController extends Controller
{
    public function view_agregar(Request $request)
    {
        // POST
        if ($request->isMethod('post')) {

            // Obteniendo descuento desde el <select> del formulario:
            if (isset($request->discount))
                $discount = $request->discount;

            // Lo fijamos en cero si no se logra obtener:
            else
                $discount = "0";

            // Creando código y obteniéndolo luego desde tabla 'promocodes':
            Promocodes::create($amount = 1, $reward = $discount, $data = [], $expires_in = 30);
            $code = DB::table('promocodes')->orderBy('id', 'desc')->first()->code;

            return view('pcode.add', compact("code"));
        }

        // GET
        else {
            return view('pcode.add');
        }
    }


    public function view_chequear(Request $request)
    {
        // POST
        if ($request->isMethod('post')) {

            // Obteniendo código desde formulario:
            $code = $request->promocode;

            // Chequeando si es válido, inválido o inexistente:
            try {
                $pcode = Promocodes::check($code);
                if ($pcode)
                    $status = true;
                else
                    $status = false;

            } catch (InvalidPromocodeException $e) {
                $status = "invalid";
            }

            // Retornando vista con parámetros:
            return view('pcode.check', compact("code", "status"));
        }

        // GET
        else {
            return view('pcode.check');
        }
    }


    public function view_db()
    {
        // Obteniendo todos registros de la tabla 'promocodes' con join a
        // una columna de la tabla 'promocode_id':
        $promocodes = DB::table('promocodes')
            ->leftJoin('promocode_user','promocodes.id','=','promocode_user.promocode_id')
            ->select('promocodes.*', 'promocode_user.promocode_id')
            ->get();

        // Tomando fecha actual:
        $hoy = new DateTime("now");

        return view('pcodes', compact('promocodes', 'hoy'));
    }
}
