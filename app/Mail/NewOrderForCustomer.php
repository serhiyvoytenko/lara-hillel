<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderForCustomer extends NewOrderBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this
            ->markdown('email.order_created.customer',
                ['orderId' => $this->orderId, 'full_name' => $this->full_name]);
    }
}
