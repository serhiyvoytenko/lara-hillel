<?php

namespace App\Services;

use App\Models\Order;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
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
                'name' => 'John Doe',
                'custom_fields' => [
                    'email' => 'test@example.com',
                ],
            ]
        );

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        return Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);
    }
}
