<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Transaction;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PaypalClient;
use Throwable;
use Illuminate\Contracts\Support\Renderable;


class PaypalPaymentController extends Controller
{
    protected PaypalClient $paypalClient;

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function __construct()
    {
        $this->paypalClient = new PaypalClient();
        $this->paypalClient->setApiCredentials(config('paypal'));
        $this->paypalClient->setAccessToken($this->paypalClient->getAccessToken());
    }

    /**
     * @throws Throwable
     */
    public function create(CreateOrderRequest $request, OrderRepositoryInterface $repository): JsonResponse
    {
        $total = Cart::instance('shopping')->total(2, '.', '');

        $paypalOrder = $this->paypalClient->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $total
                    ]
                ]
            ]
        ]);
        $request = $request->validated();
        $request['vendor_order_id'] = $paypalOrder['id'];

        $order = $repository->create($request);

        return response()->json($order);
    }

    /**
     * @throws Throwable
     */
    public function capture(string $orderId, OrderRepositoryInterface $repository): JsonResponse
    {
        DB::beginTransaction();
        try {
            $result = $this->paypalClient->capturePaymentOrder($orderId);
            if ($result['status'] === 'COMPLETED') {
                $transaction = new Transaction();
                $transaction->vendor_payment_id = $result['id'];
                $transaction->payment_system = 'PAYPAL';
                $transaction->user_id = auth()->id();
                $transaction->status = $result['status'];
                $transaction->save();

                $repository->setTransaction($result['id'], $transaction);
                Cart::instance('shopping')->destroy();
            }

            DB::commit();

            return response()->json($result);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

}
