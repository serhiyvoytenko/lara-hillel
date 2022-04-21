<?php

namespace App\Jobs;

use App\Models\Order;
use App\Notifications\OrderSentToDeliveryServiceNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrderSentToDeliveryServiceNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected Order $order)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(OrderSentToDeliveryServiceNotification $orderSentToDeliveryServiceNotification): void
    {
        $this->order->notify($orderSentToDeliveryServiceNotification);
    }
}
