<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;

class ProductsController extends Controller
{
    public function index(): Renderable
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function show(Product $product): Renderable
    {
        dd($product);
        return view('products.show', compact('product'));
    }
}
