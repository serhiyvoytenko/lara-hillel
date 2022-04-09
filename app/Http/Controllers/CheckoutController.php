<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Renderable|RedirectResponse|Redirector
     */
    public function __invoke(Request $request): Renderable|RedirectResponse|Redirector
    {
        $cart = Cart::instance('shopping');

        if (empty($cart->count())) {
            return redirect(route('cart'))->with('warning', 'Cart is empty, please buy products.');
        }

        return view('checkout.index', compact('cart'));
    }
}
