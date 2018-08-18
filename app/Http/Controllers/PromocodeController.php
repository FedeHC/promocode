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


            // Retornando vista con parámetros:
            return view('pcode.add', compact("code"));
        } // GET:
        else {
            // Retornando vista:
            return view('pcode.add');
        }
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

            // Retornando vista con parámetros:
            return view('pcode.check', compact("code", "mensaje"));
        } // GET:
        else {
            // Retornando vista:
            return view('pcode.check');
        }
    }


    public function view_db()
    {
        // Obteniendo todos los registros de columnas más importantes:
        $datos = DB::table('promocodes')->select('id', 'code', 'expires_at')->get();

        // Retornando vista con parámetros:
        return view('pcodes', ['la_base_de_datos' => $datos]);
    }


    public function view_shop_cart(Request $request)
    {
        // ------------------------------------------------------------------------
        // LA MAYOR PARTE DE ESTE CODIGO FUE CREADO A MODO DE PRUEBA,
        // LO QUE SIGNIFICA QUE VA A MODIFICAR CUANDO EXISTA LA TABLA DE PRODUCTOS.
        // ------------------------------------------------------------------------

        // Creando array temporal del carro:
        $carro_compras = array();


        // Si existe en sesión el array de carro de compras:
        if ($request->session()->exists('carro_compras'))
            $carro_compras = $request->session()->get('carro_compras');
        else
            $request->session()->put('carro_compras', $carro_compras);


        // Si existe en sesión el contador de elementos borrados:
        if ($request->session()->exists('cant_borrados'))
            $cant_borrados = $request->session()->get('cant_borrados');
        else
            $request->session()->put('cant_borrados', 0);


        // Creando array de productos:
        $todos_productos = array(
            array('Cool T-Shirt', '25'),
            array('Awesome Jeans', '50'),
            array('Incredible Shoes', '60'),
            array('Fabulous Lenses', '20'),
            array('Nice Sweater', '35')
        );


        // POST
        // Si el user agregó un producto al carro:
        if ($request->isMethod('post') && isset($request->agregar)) {

            // id = cant. productos existentes + cant. productos borrados + 1.
            // (es un método simple para lograr que el id no se repita al borrar
            // productos y volver a agregar nuevos):
            $id = count($carro_compras) + 1 + $cant_borrados;

            // Obtenemos/generamos los datos necesarios.
            // Nota: recordar que los ':' sirven para separar producto y precio.
            $nombre = strstr($request->products, ":", true);
            $descripcion = "The most " . strtolower($nombre) . " you can buy!";
            $precio_unitario = substr(strstr($request->products, ":"), 1);
            $cantidad = $request->quantity;
            $precio_final = round($cantidad * $precio_unitario);


            // Creando array asociativo para cada producto con los datos anteriores.
            // El órden es importante para que salga bien en la vista:
            $array_producto = array('id' => $id,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio_unitario' => $precio_unitario,
                'cantidad' => $cantidad,
                'precio_final' => $precio_final);


            // Guardando array de producto en array carro de compras:
            array_push($carro_compras, $array_producto);


            // Guardando carro de compras en sesión:
            $request->session()->put('carro_compras', $carro_compras);


            // Recorremos carro de compras para obtener total:
            $total = 0;
            foreach ($carro_compras as $producto)
                $total += $producto['precio_final'];


            // Retornando vista con parámetros:
            return view('shop.cart', compact('todos_productos', 'carro_compras', 'total'));
        }


        // Si en cambio el user decide quitar un producto:
        elseif ($request->isMethod('post') && isset($request->quitar)) {

            // Obteniendo posición, borrarla e incrementar contador:
            $posicion = $request->posicion - 1;
            unset($carro_compras[$posicion]);
            $cant_borrados++;


            // Guardando carro de compras en sesión:
            $request->session()->put('carro_compras', $carro_compras);


            // Guardando cant_borrados en sesión:
            $request->session()->put('cant_borrados', $cant_borrados);


            // Recorremos carro de compras para obtener total:
            $total = 0;
            foreach ($carro_compras as $producto)
                $total += $producto['precio_final'];


            // Retornando vista con parámetros:
            return view('shop.cart', compact('todos_productos', 'carro_compras', 'total'));
        }


        // GET:
        else {
            // Recorremos carro de compras para obtener total:
            $total = 0;
            foreach ($carro_compras as $producto)
                $total += $producto['precio_final'];


            // Retornando vista con parámetros:
            return view('shop.cart', compact('todos_productos', 'carro_compras', 'total'));
        }
    }
}
