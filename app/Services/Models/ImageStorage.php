<?php

namespace App\Services\Models;

use App\Services\FileStorageService;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;

class ImageStorage implements Contracts\ImageStorageInterface
{

    /**
     * @throws FileNotFoundException
     */
    public static function attach(Model $model, string $method, array $images = []): void
    {
        foreach ($images as $image){
            $filePath = FileStorageService::upload($image);
            $model->$method()->create(['path' => $filePath]);
        }
    }
}
