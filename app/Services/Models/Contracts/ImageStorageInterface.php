<?php

namespace App\Services\Models\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ImageStorageInterface
{
    public static function attach(Model $model, string $method, array $images = []): void;
}
