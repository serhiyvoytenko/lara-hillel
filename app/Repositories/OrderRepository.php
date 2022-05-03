<?php

namespace App\Repositories;

use App\Models\OrderStatus;
use App\Models\Transaction;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Throwable;
use App\Models\Order;


class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @throws Throwable
     */
    public function create(array $request): Order|bool
    {
        $result = DB::transaction(function () use ($request) {
            $user = auth()->user();
            $total = Cart::instance('cart')->total(2, '.', '');

            $status = OrderStatus::defaultStatus()->first();

            $request = array_merge($request, [
                'status_id' => $status->id,
                'total' => $total
            ]);
            $order = $user?->orders()->create($request);

            $this->addProductsToOrder($order);

            return $order;
        });

        return $result;
    }

    public function setTransaction(string $transaction_order_id, Transaction $transaction): void
    {
        $order = Order::where('vendor_order_id', $transaction_order_id)->first();

        if ($order) {
            $order->transaction_id = $transaction->id;
            $order->save();
        }
    }

    protected function addProductsToOrder(Model $order): void
    {
        Cart::instance('shopping')->content()->each(function ($product) use ($order) {
            $order->products()->attach(
                $product->model,
                [
                    'quantity' => $product->qty,
                    'single_price' => $product->price
                ]
            );

            $in_stock = $product->model->count - $product->qty;

            if (!$product->model->update(['count' => $in_stock])) {
                throw new RuntimeException("Something went wrong with product id={$product->id} while updating process", 200);
            }
        });
    }
}
