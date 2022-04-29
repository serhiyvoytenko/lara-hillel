<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
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
            'title' => $this->faker->unique()->realTextBetween(5,15),
            'description' => $this->faker->realText(200),
            'short_description' => $this->faker->realText(40),
            'sku' => $this->faker->unique()->numberBetween(1000, 100000000),
            'category_id' => Category::inRandomOrder()->first(),//
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'discount' => $this->faker->randomFloat(2, 1, 20),
            'count' => $this->faker->randomFloat(0, 1, 100000),
            'thumbnail' => $this->faker->imageUrl(),
        ];
    }
}
