<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class OrdersController extends Controller
{
    public function index(): Renderable
    {
        return view('admin.view-orders', ['orders' => Order::paginate(10)]);
    }

    public function show(Order $order): Renderable
    {
        return view('admin.show-order');
    }

    public function update(Order $order): RedirectResponse
    {
        return redirect()->back();
    }
}
