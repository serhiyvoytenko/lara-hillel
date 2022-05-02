<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaypalPaymentController extends Controller
{
    public function create(): JsonResponse
    {
        return response()->json(['1']);
    }

    public function capture(): JsonResponse
    {
        return response()->json(['1']);
    }

}
