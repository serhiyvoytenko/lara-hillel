<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(): Renderable
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function show(Product $product, Request $request): Renderable
    {
        return view('products.show', compact('product'));
    }
}
