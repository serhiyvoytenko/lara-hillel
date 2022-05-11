<?php

namespace App\Observers;

use App\Jobs\OrderCreateNotificationJob;
use App\Jobs\OrderDeliveredNotificationJob;
use App\Jobs\OrderSentToDeliveryServiceNotificationJob;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Role;
use App\Notifications\OrderSentToDeliveryServiceNotification;

class OrderObserver
{
    public function created(Order $order): void
    {
        $admin = Role::admin()->first()?->users()->first();
//        OrderCreateNotificationJob::dispatch($order->user, $order)->onQueue('email');
//        OrderCreateNotificationJob::dispatchSync($order->user, $order);
//        OrderCreateNotificationJob::dispatch($admin, $order)->onQueue('email');
    }

    public function updated(Order $order): void
    {
        if ($order->orderStatus->status === config('constants.db.statuses.paid') &&
            OrderStatus::where('id', $order->getOriginal('status_id'))
                ->first()->status === config('constants.db.statuses.in_process')) {
                OrderSentToDeliveryServiceNotificationJob::dispatch($order)->onQueue('email');
        }

        if ($order->orderStatus->status === config('constants.db.statuses.completed') &&
            OrderStatus::where('id', $order->getOriginal('status_id'))
                ->first()->status === config('constants.db.statuses.paid')){
            OrderDeliveredNotificationJob::dispatch($order)->onQueue('email');
        }
    }
}
