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
        }

        // GET:
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
        }

        // GET:
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
        // --------------------------------------------------------------------
        // GRAN PARTE DE ESTE CODIGO ES A MODO DE PRUEBA
        // SE VA A MODIFICAR CUANDO EXISTA LA TABLA DE PRODUCTOS.
        // --------------------------------------------------------------------

        // Creando array temporal del carro:
        $carro_compras = array();


        // Si existe en sesión el array del mismo nombre:
        if ($request->session()->exists('carro_compras'))
            $carro_compras = $request->session()->get('carro_compras');


        // De lo contrario creamos uno nuevo:
        else {
            $request->session()->put('carro_compras', $carro_compras);
            $request->session()->save();
        }

        
        // Creando array de productos:
        $todos_productos = array(
            array('Cool T-Shirt','25'),
            array('Awesome Jeans','50'),
            array('Incredible Shoes','60'),
            array('Fabulous Lenses','20'),
            array('Nice Sweater','35')
        );

        
        // POST:
        if ($request->isMethod('post')) {

            // Si el user agregó un producto al carro:
            if (isset($request->agregar)) {

                // Obtenemos/generamos los datos necesarios.
                // Nota: recordar que los ':' sirven de separador entre
                // producto y precio
                $nombre = strstr($request->products, ":", true);
                $descripcion = "The most " . strtolower($nombre) . " you can buy!";
                $precio_unitario = substr(strstr($request->products, ":"), 1);
                $cantidad = $request->quantity;
                $precio_final = round($cantidad * $precio_unitario);
                $id = count($carro_compras);


                // Creando array asociativo para cada producto con los datos anteriores:
                $array_producto = array('nombre' => $nombre,
                    'descripcion' => $descripcion,
                    'precio_unitario' => $precio_unitario,
                    'cantidad' => $cantidad,
                    'precio_final' => $precio_final,
                    'id' => $id);


                // Guardando array de producto en array carro de compras:
                array_push($carro_compras, $array_producto);


                // Guardando carro de compras en sesión:
                $request->session()->put('carro_compras', $carro_compras);
                $request->session()->save();

                
                // Recorremos carro de compras para obtener total:
                $total = 0;
                foreach ($carro_compras as $producto)
                    $total += $producto['precio_final'];


                // Retornando vista con parámetros:
                return view('shop.cart', compact('todos_productos','carro_compras', 'total'));
            }

            // Si el user decide quitar un producto:
            else {
                // Obteniendo posición y luego borrarla:
                $posicion = $request->posicion;
                unset($carro_compras[$posicion]);


                // Guardando carro de compras en sesión:
                $request->session()->put('carro_compras', $carro_compras);
                $request->session()->save();


                // Recorremos carro de compras para obtener total:
                $total = 0;
                foreach ($carro_compras as $producto)
                    $total += $producto['precio_final'];


                // Retornando vista con parámetros:
                return view('shop.cart', compact('todos_productos','carro_compras', 'total'));
            }
        }

        // GET:
        else {
            // Recorremos carro de compras para obtener total:
            $total = 0;
            foreach ($carro_compras as $producto)
                $total += $producto['precio_final'];


            // Retornando vista con parámetros:
            return view('shop.cart', compact('todos_productos','carro_compras', 'total'));
        }
    }
    public function view_products(Request $request){

        $prod_table = DB::table('products')->select('id', 'name', 'precio')->get();

        return view('products.products', ['lista_productos' => $prod_table]);
    }

    public function store_product(Request $request)
    {
        // Validate the request...

        $productito = new Product;

        $productito->name = $request->product_name;
        $productito->precio = $request->product_value;

        $productito->save();

        $prod_table = DB::table('products')->select('id', 'name', 'precio')->get();
        return view('products.products', ['lista_productos' => $prod_table]);

    }
}
