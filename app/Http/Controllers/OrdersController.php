<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\TestRepository;
use Illuminate\Contracts\Support\Renderable;
use PHPUnit\Exception;

class OrdersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreOrderRequest $request
     * @return Renderable
     */
    public function __invoke(StoreOrderRequest $request, OrderRepositoryInterface  $orderRepository): Renderable
    {
//        dd($request->validated());
        try {
            $orderRepository->create($request->validated());
            return view('thanks')->with('message', 'Thank you for purchase! We will contact you.');
        } catch (Exception $exception) {
            return view('error')->with('error', $exception);
        }
    }
}
