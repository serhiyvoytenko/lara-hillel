<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->realText,
            'short_description' => $this->faker->realText(50),
            'sku' => $this->faker->unique()->numberBetween(1000,100000000),
            'category_id' =>Category::inRandomOrder()->first(),//
            'price' => $this->faker->randomFloat(2,1,100000),
            'discount' => $this->faker->randomFloat(2,1,20),
            'count' => $this->faker->randomFloat(0, 1,100000),
            'image_id' => Image::inRandomOrder()->first(),
        ];
    }
}
