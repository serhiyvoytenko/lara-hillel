<?php

namespace App\Observers;

use App\Jobs\OrderCreateNotificationJob;
use App\Models\Order;
use App\Models\Role;

class OrderObserver
{
    public function created(Order $order)
    {
//        dd($order);
        $admin = Role::admin()->first()?->users()->first();
        OrderCreateNotificationJob::dispatch($order->user, $order)->onQueue('email');
        OrderCreateNotificationJob::dispatch($admin, $order)->onQueue('email');
    }
}
