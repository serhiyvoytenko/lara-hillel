<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use RuntimeException;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @throws Exception
     */
    public function create(array $request): Model|bool
    {
        $user = Auth::user();
        $totalSum = Cart::instance('shopping')->total(2, '.', '');

        if ($user?->getAttribute('balance') < $totalSum) {
            throw new RuntimeException("Add money to balance please", 200);
        }

        $status = OrderStatus::defaultStatus()->first();
        $request = array_merge($request, [
            'status_id' => $status->getAttribute('id'),
            'total' => $totalSum
        ]);

        $order = $user?->orders()->create($request);

        $this->addProductsToOrder($order);

        return $order;
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

            $in_stock = $product->model->in_stock - $product->qty;

            if (!$product->model->update(['in_stock' => $in_stock])) {
                throw new RuntimeException("Something went wrong with product id={$product->id} while updating process", 200);
            }
        });
    }

}
