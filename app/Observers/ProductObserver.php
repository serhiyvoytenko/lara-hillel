<?php

namespace App\Observers;

use App\Models\Product;
use App\Services\FileStorageService;

class ProductObserver
{
    /**
     * Handle the Product "deleted" event.
     *
     * @param Product $product
     * @return void
     */
    public function deleted(Product $product): void
    {
        if ($product->images->count() > 0){
            foreach ($product->images as $image){
                $image->delete();
            }
        }
        FileStorageService::remove($product->thumbnail);
    }
}
