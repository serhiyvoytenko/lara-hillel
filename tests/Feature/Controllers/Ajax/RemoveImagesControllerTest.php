<?php

namespace Tests\Feature\Controllers\Ajax;

use App\Models\Image;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemoveImagesControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected Image $image;
    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesSeeder::class);
        $this->seed(AdminUserSeeder::class);
        $this->user = User::first();
        $this->image = Image::create(
            [
                'path' => $this->faker()->realTextBetween(5, 20),
                'imageable_id' => $this->faker->randomDigitNotNull(),
                'imageable_type' => $this->faker()->realTextBetween(5, 20),
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_invoke_if_image_id_exists()
    {
        $response = $this->actingAs($this->user)->delete(url('ajax/images/' . $this->image->id));

        $this->assertDatabaseMissing('images', ['id' => $this->image->id]);
        $response->assertJson(['messages' => 'Image was deleted successfully.']);
    }

    public function test_invoke_if_image_id_does_not_exists()
    {
        $response = $this->actingAs($this->user)
            ->delete(url('ajax/images/' . $this->faker->randomDigitNot($this->image->id)));
        $response->assertStatus(200)
            ->assertJson(['messages' => 'Image not found']);
    }
}
