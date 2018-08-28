<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function view_shop_cart(Request $request)
    {
        $compras = [];

        if ($request->session()->exists('compras'))
            $compras = $request->session()->get('compras');

        $todos_productos = DB::table('products')->select('id', 'name', 'value', 'detail')->get();

        // ------------
        // POST
        // ------------

        // ---------------------------------------
        // Si el user agregó producto al carro...
        // ---------------------------------------

        if ($request->isMethod('post') && isset($request->agregar)) {

            // Obteniendo id desde <select>:
            $id = $request->products;

            // Creando array de cada producto agregado:
            // (Nota: se resta 1 a id, el array debe arrancar desde cero)
            $nombre = $todos_productos[$id - 1]->name;
            $descripcion = $todos_productos[$id - 1]->detail;
            $precio_unitario = $todos_productos[$id - 1]->value;
            $cantidad = $request->quantity;
            $precio_final = round($cantidad * $precio_unitario);

            $producto = array('nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio_unitario' => $precio_unitario,
                'cantidad' => $cantidad,
                'precio_final' => $precio_final);

            // Guardando carro de compras:
            array_push($compras, $producto);
            $request->session()->put('compras', $compras);

            // Sacando total:
            $total = $this->sacar_total($compras);

            return view('shop.show',
                compact('todos_productos', 'compras', 'total'));
        }

        // ----------------------------------------
        // Si el user decide quitar un producto...
        // ----------------------------------------

        elseif ($request->isMethod('post') && isset($request->quitar)) {

            // Obteniendo posición y borrando producto:
            // (Nota: se resta 1 a posicion, el array debe arrancar desde cero)
            $pos = $request->posicion - 1;
            array_splice($compras, $pos, 1);

            // Guardando carro de compras:
            $request->session()->put('compras', $compras);

            // Sacando total:
            $total = $this->sacar_total($compras);

            return view('shop.show',
                compact('todos_productos', 'compras', 'total'));
        }
        // ------------
        // GET
        // ------------
        else {
            // Sacando total:
            $total = $this->sacar_total($compras);

            return view('shop.show',
                compact('todos_productos', 'compras', 'total'));
        }
    }


    private function sacar_total($carro_compras)
    {
        $total = 0;

        if (count($carro_compras) > 0) {
            foreach ($carro_compras as $producto)
                $total += $producto['precio_final'];
        }

        return $total;
    }
}
