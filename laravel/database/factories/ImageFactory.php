<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'thumbnail' => $this->faker->image,
            'large_image' => $this->faker->image,
            'medium_image' => $this->faker->image,
            'video' => $this->faker->image,
        ];
    }
}
