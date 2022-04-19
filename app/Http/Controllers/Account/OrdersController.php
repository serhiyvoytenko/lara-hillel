<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(): Renderable
    {
        $orders = Order::where('user_id', Auth::id())->paginate(10);

        return view('admin.view-orders', compact('orders'));
    }

    public function show(Order $order): Renderable
    {
        return view('admin.show-order');
    }

    public function cancel(Order $order): RedirectResponse
    {
        return redirect()->back();
    }
}
