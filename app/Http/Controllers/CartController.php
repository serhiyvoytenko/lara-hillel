<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(): Renderable
    {
        $cart = Cart::instance('shopping');

        return view('cart/index', compact('cart'));
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

    public function remove(Request $request): RedirectResponse
    {
        Cart::instance('shopping')->remove($request->input('rowId'));

        return redirect()->back();
    }

    public function countUpdate(Request $request, Product $product): RedirectResponse
    {
        if ($request->input('product_count') > $product->count){
            return redirect()->back()->with('warning', 'Available only ' . $product->count . ' ' . $product->title . '.');
        }
        Cart::instance('shopping')->update($request->input('rowId'), $request->input('product_count'));

        return redirect()->back();
    }
}
