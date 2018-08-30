<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

// Modelos:
use App\Product;
use App\Cart;


/**
 * Class ShopController
 * @package App\Http\Controllers
 */
class ShopController extends Controller
{

    /**
     * Display the specified view
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view_shop_cart(Request $request)
    {
        // Nueva instancia de carro para agregar un nuevo registro:
        $cart_add = new Cart();

        // Obteniendo colleciones de cada tabla, con las columnas relevantes:
        $cart = Cart::all();
        $products = Product::all();

        // ------------
        // POST
        // ------------

        // Si el user agregó producto al carro...
        if ($request->isMethod('post') && isset($request->agregar)) {

            // Generando nuevo registro Cart:
            $cart_add->user_id = Auth::user()->id;
            $cart_add->p_id = $request->selected_product_id;

            // Nota: el [0] es para obtener el string del array devuelto:
            $cart_add->p_name = $products
                ->where('id', $cart_add->p_id)
                ->pluck('name')[0];
            $cart_add->p_details = $products
                ->where('id', $cart_add->p_id)
                ->pluck('detail')[0];
            $cart_add->p_price = $products
                ->where('id', $cart_add->p_id)
                ->pluck('value')[0];
            $cart_add->p_quantity = $request->quantity;
            $cart_add->p_final_price = $cart_add->p_price * $cart_add->p_quantity;

            // Guardando registro:
            $cart_add->save();

            return redirect()->route('shopcart');
        }

        // Si el user decide quitar un producto...
        elseif ($request->isMethod('post') && isset($request->quitar)) {

            // Obteniendo id del producto en carro:
            $cart_product = Cart::find($request->id_cart);

            // Borrando registro:
            $cart_product->delete();

            return redirect()->route('shopcart');
        }
        // ------------
        // GET
        // ------------
        else {
            // Obteniendo total de productos por user:
            $total = $this->getTotal();

            // Obtener solo productos del carro del usuario actual:
            $cart = $cart->where('user_id', Auth::user()->id);

            return view('shop.show',
                compact('products', 'cart', 'total'));
        }
    }


    /**
     * Get total purchases from the current user.
     *
     * @return int
     */
    private function getTotal()
    {
        $total = 0;

        $cart = Cart::select('p_final_price')
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($cart->count() > 0) {
            foreach ($cart as $product)
                $total += $product->p_final_price;
        }

        return $total;
    }
}
