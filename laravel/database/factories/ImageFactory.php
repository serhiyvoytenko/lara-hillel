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
            'path' => $this->faker->image,
            'imageable_id' => $this->faker->numberBetween(1,20),
            'imageable_type' => $this->faker->text(30),
        ];
    }
}
