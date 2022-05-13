<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
//        dd($request);
        $products = Product::paginate(10);

        return response()->json(['data' => $products]);
    }
}

