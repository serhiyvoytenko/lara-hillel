<?php

namespace App\Observers;

use App\Models\Image;
use App\Services\FileStorageService;

class ImageObserver
{

    /**
     * Handle the Image "deleted" event.
     *
     * @param Image $image
     * @return void
     */
    public function deleted(Image $image): void
    {
        FileStorageService::remove($image->path);
    }

}
