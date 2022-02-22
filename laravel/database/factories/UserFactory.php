<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $role = Role::get()->where('name', '=', config('constants.db.roles.customer'))->first();

        return [
            'role_id' => $role->id,
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'birthdate' => $this->faker->dateTimeBetween('-70 years', '-16 years'),
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => \Hash::make($this->faker->password(8, 10)), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
