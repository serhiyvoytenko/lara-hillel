<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Contracts\Support\Renderable;
use RuntimeException;

class OrdersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreOrderRequest $request
     * @param OrderRepositoryInterface $orderRepository
     * @return Renderable
     */
    public function __invoke(StoreOrderRequest $request, OrderRepositoryInterface $orderRepository): Renderable
    {
        try {
            $orderRepository->create($request->validated());
            return view('thanks')->with('message', 'Thank you for purchase! We will contact you.');
        } catch (RuntimeException $exception) {
            return view('error')->with('error', $exception);
        }
    }
}
