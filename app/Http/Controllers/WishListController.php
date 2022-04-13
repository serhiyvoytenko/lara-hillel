<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index(): Renderable
    {
        return view('wishes.wishlist', ['wishes' => Auth::user()?->wishes()->paginate(6)]);
    }

    public function add(Product $product): RedirectResponse
    {
        Auth::user()?->addProductToWish($product);
        return back()->with('success', 'Product was added to Wishlist successfully.');
    }

    public function delete(Product $product): RedirectResponse
    {
        Auth::user()?->removeProductFromWish($product);
        return back()->with('success', 'Product was removed from Wishlist successfully.');
    }
}
