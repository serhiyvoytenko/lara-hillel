<?php

namespace Tests\Unit\Services;

use App\Services\FileStorageService;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Str;
use Tests\TestCase;

class FileStorageServiceTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @throws FileNotFoundException
     */

    public function test_upload_file_if_exists(): void
    {
        $path = FileStorageService::upload(UploadedFile::fake()->create('test.jpg'));

        $this->assertTrue(Storage::fileExists($path));
    }

    /**
     * @throws FileNotFoundException
     */
    public function test_upload_is_string(): void
    {
        $this->assertIsString(FileStorageService::upload(Str::random()));
        $this->assertNotEmpty(FileStorageService::upload(Str::random()));
    }

    /**
     * @throws FileNotFoundException
     */
    public function test_upload_is_string_empty(): void
    {
        $this->assertEmpty(FileStorageService::upload(''));
    }

    /**
     * @throws FileNotFoundException
     */
    public function test_upload_if_file_does_not_exist(): void
    {
        $result = FileStorageService::upload('test_text');
        $this->assertFalse(Storage::fileExists($result));
    }

    /**
     * @return void
     * @throws FileNotFoundException
     */
    public function test_remove_if_file_exists(): void
    {
        $file_uploaded = FileStorageService::upload(UploadedFile::fake()->create('test.png'));
        $this->assertTrue(Storage::fileExists($file_uploaded));
        FileStorageService::remove($file_uploaded);
        $this->assertFalse(Storage::fileExists($file_uploaded));
    }
}
