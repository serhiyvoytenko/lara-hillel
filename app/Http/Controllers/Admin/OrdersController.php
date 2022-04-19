<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(): Renderable
    {
        return view('admin.view-orders', ['orders' => Order::paginate(10)]);
    }

    public function show(Order $order): Renderable
    {
        $orderStatuses = OrderStatus::get();
        return view('admin.show-order', compact('order', 'orderStatuses'));
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $order->status_id = $request->input('status');
        $order->save();
        return redirect()->back();
    }
}
