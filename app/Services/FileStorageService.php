<?php

namespace App\Services;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Services\Contracts\FileStorageServiceInterface;
use Storage;

class FileStorageService implements FileStorageServiceInterface
{

    /**
     * @throws FileNotFoundException
     */
    public static function upload(string|UploadedFile $file): string
    {
        if (empty($file)) {
            return '';
        }

        if (is_string($file)) {
            return str_replace('public/storage', '', $file);
        }

        if ($is_string = is_string($file)) {
            $fileData = explode('.', $file);
        }

        $filePath = 'public/' . implode('/', str_split(Str::random(8), 2))
            . '/'
            . Str::random()
            . '.'
            . (!$is_string ? $file->getClientOriginalExtension() : $fileData[1]);

        Storage::put($filePath, File::get($file), 'public');

        return $filePath;
    }

    public static function remove(string $file): bool
    {
        return Storage::delete($file);
    }
}
