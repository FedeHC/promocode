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

        // GET:
        else
            return view('pcode.add');
    }


    public function view_chequear(Request $request)
    {
        // POST:
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

            return view('pcode.check', compact("code", "mensaje"));
        }

        // GET:
        else
            return view('pcode.check');
    }


    public function view_db()
    {
        // Obteniendo todos los registros de columnas más importantes:
        $datos = DB::table('promocodes')->select('id', 'code', 'expires_at')->get();

        return view('pcodes', ['la_base_de_datos' => $datos]);
    }


    public function view_shop_cart(Request $request)
    {
        // --------------------------------------------------------------------
        // GRAN PARTE DEL CODIGO ES A MODO DE PRUEBA
        // SE VA A MODIFICAR CUANDO EXISTA LA TABLA DE PRODUCTOS.
        // --------------------------------------------------------------------

        $carrito_compras = array();
        if ($request->session()->exists('carrito_compras'))
            $carrito_compras = $request->session()->get('carrito_compras');
        else
            $request->session()->put('carrito_compras', $carrito_compras);

        // POST:
        if ($request->isMethod('post')) {

            // Si el user agregó un producto al carro de compras::
            if (isset($request->agregar)) {

                // Obtenemos/generamos datos:
                $id = count($carrito_compras);
                $nombre = strstr($request->products, ":", true);
                $descripcion = "The most " . strtolower($nombre) . " you can buy!";
                $precio_unitario = substr(strstr($request->products, ":"), 1);
                $cantidad = $request->quantity;
                $precio_final = round($cantidad * $precio_unitario);

                // Creando array asociativo para cada producto, donde guardamos
                // las variables creadas anteriormente:
                $array_producto = array('nombre' => $nombre,
                    'descripcion' => $descripcion,
                    'precio_unitario' => $precio_unitario,
                    'cantidad' => $cantidad,
                    'precio_final' => $precio_final,
                    'id' => $id);

                // Guardando finalmente array de producto en array principal:
                array_push($carrito_compras, $array_producto);

                // Guardando carrito de compras en sesión:
                $request->session()->put('carrito_compras', $carrito_compras);

                // Recorremos carrito de compras para obtener total:
                $total = 0;
                foreach ($carrito_compras as $producto)
                    $total += $producto['precio_final'];

                return view('shop.cart', compact('carrito_compras', 'total'));
            }

            // Si el user decide quitar un producto:
            else {
                $posicion = $request->posicion;
                unset($carrito_compras[$posicion]);

                // Guardando carrito de compras en sesión:
                $request->session()->put('carrito_compras', $carrito_compras);

                // Recorremos carrito de compras para obtener total:
                $total = 0;
                foreach ($carrito_compras as $producto)
                    $total += $producto['precio_final'];

                return view('shop.cart', compact('carrito_compras', 'total'));
            }
        }

        // GET:
        else {
            // Recorremos carrito de compras para obtener total:
            $total = 0;
            foreach ($carrito_compras as $producto)
                $total += $producto['precio_final'];

            return view('shop.cart', compact('carrito_compras', 'total'));
        }
    }
}
