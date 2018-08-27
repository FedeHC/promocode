<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Gabievi Promocodes:
use Gabievi\Promocodes\Facades\Promocodes;
use Gabievi\Promocodes\Exceptions\InvalidPromocodeException;

use App\Product;


class PromocodeController extends Controller
{
    public function view_agregar(Request $request)
    {
        // [POST]
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
        }

        // [GET]
        else {
            // Retornando vista:
            return view('pcode.add');
        }
    }


    public function view_chequear(Request $request)
    {
        // [POST]
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

        // [GET]
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
        // Variable local del carro de compras:
        $carro_compras = array();

        // Si hay carro de compras en sesión, traerlo y guardarlo en variable local:
        if ($request->session()->exists('carro_compras'))
            $carro_compras = $request->session()->get('carro_compras');

        // Obteniendo array de productos desde DB:
        $todos_productos = DB::table('products')->select('id', 'name', 'value', 'detail')->get();


        // [POST]

        // Si el user agregó un producto al carro...

        if ($request->isMethod('post') && isset($request->agregar)) {

            // Obteniendo id desde el <select> de la vista:
            $id = $request->products;

            // Obteniendo/generando los datos restantes:
            // (Nota: le resto 1 al id porque el array debe arrancar desde cero)
            $nombre = $todos_productos[$id - 1]->name;
            $descripcion = $todos_productos[$id - 1]->detail;
            $precio_unitario = $todos_productos[$id - 1]->value;
            $cantidad = $request->quantity;
            $precio_final = round($cantidad * $precio_unitario);

            // Array de productos:
            $array_producto = array('nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio_unitario' => $precio_unitario,
                'cantidad' => $cantidad,
                'precio_final' => $precio_final);

            // Guardando carro de compras:
            array_push($carro_compras, $array_producto);
            $request->session()->put('carro_compras', $carro_compras);

            // Sacando total desde el carro de compras:
            $total = 0;
            foreach ($carro_compras as $producto)
                $total += $producto['precio_final'];

            return view('shop.show', compact('todos_productos', 'carro_compras', 'total'));
        }


        // Si en cambio el user decide quitar un producto...

        elseif ($request->isMethod('post') && isset($request->quitar)) {

            // Obteniendo posición y borrando producto en carro de compras:
            $pos = $request->posicion - 1;
            array_splice($carro_compras, $pos, 1);

            // Guardando carro de compras:
            $request->session()->put('carro_compras', $carro_compras);

            // Sacando total desde el carro de compras:
            $total = 0;
            foreach ($carro_compras as $producto)
                $total += $producto['precio_final'];

            return view('shop.show', compact('todos_productos', 'carro_compras', 'total'));
        }

        // [GET]

        else {
            // Sacando total desde el carro de compras:
            $total = 0;
            foreach ($carro_compras as $producto)
                $total += $producto['precio_final'];

            return view('shop.show', compact('todos_productos', 'carro_compras', 'total'));
        }
    }


    public function view_products(Request $request){

        $prod_table = DB::table('products')->select('id', 'name', 'value')->get();

        return view('products.products', ['lista_productos' => $prod_table]);
    }


    public function store_product(Request $request)
    {
        // Validate the request...

        $productito = new Product;

        $productito->name = $request->product_name;
        $productito->value = $request->product_value;
        $productito->detail = $request->product_detail;

        $productito->save();

        $prod_table = DB::table('products')->select('id', 'name', 'value')->get();

        return view('products.products', ['lista_productos' => $prod_table]);
    }
}
