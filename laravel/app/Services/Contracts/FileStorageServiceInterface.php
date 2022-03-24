<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface FileStorageServiceInterface
{
    public static function upload(String|UploadedFile $file): string;
    public static function remove(String $file): bool;
}
