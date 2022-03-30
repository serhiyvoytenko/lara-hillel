<?php

namespace Tests\Unit\Services;

use App\Services\FileStorageService;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
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

    public function test_upload_file_if_file_not_found(): void
    {

    }
}
