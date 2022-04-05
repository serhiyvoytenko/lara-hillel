<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart/index');
    }

    public function add(Product $product, Request $request): RedirectResponse
    {
        $cart = Cart::instance('shopping')->add(
            $product->id,
            $product->title,
            $request->input('product_count'),
            $product->price
        );

        $cart->associate(Product::class);

        return redirect()->back()->with('success', 'The product was success added into the cart.');
    }

    public function remove()
    {

    }

    public function countUpdate()
    {

    }
}
