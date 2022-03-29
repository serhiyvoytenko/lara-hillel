<?php

namespace Tests\Unit\Services;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileStorageServiceTest extends TestCase
{
    use RefreshDatabase;

    protected mixed $category, $product, $images = [];

    public function setVariable(): void
    {
        $this->category = Category::factory(1)->create()->first();
        $this->product = Product::factory(1, ['category_id' => $this->category->id])->create()->first();
        $this->images = [
            UploadedFile::fake()->image('test.png'),
            UploadedFile::fake()->image('test1.png'),
        ];

    }

    public function test_upload_file_if_exists(): void
    {
        $this->setVariable();
        $this->assertEquals(0, $this->product->images()->count());
    }
}
