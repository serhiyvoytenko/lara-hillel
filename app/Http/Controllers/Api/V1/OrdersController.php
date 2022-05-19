<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OrderCollection;
use App\Http\Resources\V1\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(): OrderCollection
    {
        return new OrderCollection(Order::paginate(10));
    }

    public function show(Order $order): OrderResource
    {
        return new OrderResource(Order::findOrFail($order->id));
    }
}
