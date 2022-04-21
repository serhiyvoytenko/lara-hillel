<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add(Request $request, Product $product): RedirectResponse
    {
        $product->rateOnce($request->input('star'));
        return redirect()->back();
    }
}
