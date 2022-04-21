<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(): Renderable
    {
        $orders = Order::where('user_id', Auth::id())->paginate(10);

        return view('account.view-orders', compact('orders'));
    }

    public function show(Order $order): Renderable
    {
        $orderStatuses = OrderStatus::get();
        return view('account.show-order', compact('order', 'orderStatuses'));
    }

    public function cancel(Order $order): RedirectResponse
    {
        $order->status_id = OrderStatus::where('status',config('constants.db.statuses.canceled'))->first()->id;
        $order->save();
        return redirect()->back();
    }

    public function view()
    {
        dd(phpinfo());
    }
}
