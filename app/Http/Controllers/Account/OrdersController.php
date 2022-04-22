<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Services\Contracts\InvoicesServiceInterface;
use Auth;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use LaravelDaily\Invoices\Invoice;

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

    /**
     * @throws Exception
     */
    public function downloadInvoice(Order $order, InvoicesServiceInterface $invoicesService): Response
    {
        return $invoicesService->generate($order)->download();
    }

    public function viewInlineInvoice(Order $order, InvoicesServiceInterface $invoicesService): Response
    {
        return $invoicesService->generate($order)->stream();
    }
}
