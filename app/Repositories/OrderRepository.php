<?php

namespace App\Repositories;

use App\Models\OrderStatus;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Throwable;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @throws Throwable
     */
    public function create(array $request): Model|bool
    {
        $user = Auth::user();
        $totalSum = Cart::instance('shopping')->total(2, '.', '');

        if ($user?->getAttribute('balance') < $totalSum) {
            throw new RuntimeException("Add money to balance please", 200);
        }

        $newBalance = $user?->getAttribute('balance') - $totalSum;
        $status = OrderStatus::defaultStatus()->first();
        $request = array_merge($request, [
            'status_id' => $status->getAttribute('id'),
            'total' => $totalSum
        ]);

        try {

            DB::beginTransaction();

            $order = $user?->orders()->create($request);
            $user?->update(['balance' => $newBalance]);
            $this->addProductsToOrder($order);

            DB::commit();

            Cart::instance('shopping')->destroy();
            return $order;

        } catch (Throwable $e) {

            DB::rollBack();
            logs()->warning($e->getMessage());

            return false;
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
