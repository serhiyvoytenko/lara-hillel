<?php

namespace Tests\Unit\Services\Models;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Services\Models\ImageStorage;
use RuntimeException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImageStorageTest extends TestCase
{
    use RefreshDatabase;

    protected Model $model;
    protected string $method;
    protected array $images;

    public function setVariable(): void
    {
        $this->images = [
            UploadedFile::fake()->create('image1.png'),
            UploadedFile::fake()->create('image2.png'),
        ];

        Category::factory(1)->create();
        Product::factory(1)->create();
        $this->model = Product::first();

        $this->method = 'images';
    }

    /**
     * @throws FileNotFoundException
     */
    public function test_attach_images_to_product_if_file_exists(): void
    {
        $this->setVariable();
        ImageStorage::attach($this->model, $this->method, $this->images);
        $result = Image::get();
        $this->assertCount(2, $result);
        $this->assertEquals(get_class($this->model), $result->first()->imageable_type);
        $this->assertEquals(1, $result->first()->imageable_id);
    }

    /**
     * @throws FileNotFoundException
     */
    public function test_attach_images_to_product_if_file_does_not_exist(): void
    {
        $this->setVariable();
        ImageStorage::attach($this->model, $this->method, []);
        $result = Image::get()->all();
        $this->assertEmpty($result);
    }

    /**
     * @throws FileNotFoundException
     */
    public function test_if_method_does_not_exist(): void
    {
        $this->setVariable();
        $this->method = 'test';
        $className = $this->model::class;
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("{$className} does not have {$this->method}");
        ImageStorage::attach($this->model, $this->method, $this->images);
    }

}
