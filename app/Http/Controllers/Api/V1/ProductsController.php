<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request): ProductCollection
    {
        return new ProductCollection(Product::paginate(5));
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource(Product::findOrFail($product->id));
    }
}

