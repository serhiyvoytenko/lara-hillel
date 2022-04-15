<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function setRating(Request $request, Product $product)
    {
//        dd($request->input('star'), $product);
        $product->rateOnce($request->input('star'));
        return back();
        //TODO finish method
    }
}
