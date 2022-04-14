<?php

namespace App\Observers;

use App\Models\Product;
use App\Notifications\UpdateProductNotification;
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
        if ($product->images->count() > 0) {
            foreach ($product->images as $image) {
                $image->delete();
            }
        }
        FileStorageService::remove($product->thumbnail);
    }

    public function updated(Product $product): void
    {
        if ($product->getOriginal('count') <= 0 && $product->getAttribute('count') > 0) {
            $product->followers()->get()->each->notify(new UpdateProductNotification($product));
        }
    }
}
