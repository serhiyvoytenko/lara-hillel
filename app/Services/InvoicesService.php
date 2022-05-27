<?php

namespace App\Services;

use App\Models\Order;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Storage;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Facades\Invoice as InvoiceFacade;


class InvoicesService implements Contracts\InvoicesServiceInterface
{

    /**
     * @throws BindingResolutionException
     * @throws Exception
     */
    public function generate(Order $order): Invoice
    {
        $customer = new Buyer(
            [
                'name' => $order->user()->first()->fullName,
                'custom_fields' => [
                    'email' => $order->user()->first()->email,
                    'phone' => $order->user()->first()->phone,
                    'country' => $order->country,
                    'city' => $order->city,
                    'address' => $order->address,
                ],
            ]
        );

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];

        $notes = implode('<br>', $notes);

        $items = [];

        foreach ($order->products as $product) {
            $items[] = (new InvoiceItem())
                ->title($product->title)
                ->pricePerUnit($product->price)
                ->quantity($product->pivot->quantity);
        }

        return Invoice::make()
            ->logo('https://content.rozetka.com.ua/widget_logotype/full/original/262025937.svg')
            ->buyer($customer)
            ->addItems($items)
            ->notes($notes)
            ->filename(time())
            ->taxRate(5);
    }
}
