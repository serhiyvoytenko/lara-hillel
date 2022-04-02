<?php

namespace App\Services\Models;

use App\Services\FileStorageService;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;

class ImageStorage implements Contracts\ImageStorageInterface
{

    /**
     * @throws FileNotFoundException
     * @throws RuntimeException
     */
    public static function attach(Model $model, string $method, array $images = []): void
    {
        if (!method_exists($model, $method)) {
            $nameClass = $model::class;
            throw new RuntimeException("{$nameClass} does not have {$method}");
        }

        if (!empty($images)) {
            foreach ($images as $image) {
                $filePath = FileStorageService::upload($image);
                $model->$method()->create(['path' => $filePath]);
            }
        }
    }
}
