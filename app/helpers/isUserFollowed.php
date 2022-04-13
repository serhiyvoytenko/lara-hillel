<?php

use App\Models\Product;

if (!function_exists('isUserFollowed')) {
    function isUserFollowed(Product $product): bool
    {
        return (bool)Auth::user()?->wishes()->find($product->id);
    }
}
