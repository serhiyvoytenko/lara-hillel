<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use Illuminate\Contracts\Support\Renderable;

class OrdersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreOrderRequest $request
     * @return Renderable
     */
    public function __invoke(StoreOrderRequest $request): Renderable
    {
        dd($request->all(), \Cart::instance('shopping')->content()->all());
        return view('thanks')->with('message', 'Thank you for purchase! We will contact you.');
    }
}
