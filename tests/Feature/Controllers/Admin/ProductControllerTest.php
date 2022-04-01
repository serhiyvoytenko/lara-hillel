<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesSeeder::class);
        $this->seed(AdminUserSeeder::class);
        Category::factory(1)->create();
        User::factory(1)->create();

        $this->user = $this->getUser();
    }

    private function getUser($role = 'admin'): User
    {
        $role = Role::$role()->first();
        return User::where('role_id', $role->id)->first();
    }

    /**
     *
     * @return void
     */
    public function test_index_if_no_auth(): void
    {
        $response = $this->get(route('admin.product.index'));
        $response->assertStatus(302);
    }

    public function test_index_if_auth_with_role_customer(): void
    {
        $customer = $this->getUser('customer');
        $response = $this->actingAs($customer)->get(route('admin.product.index'));
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
    }

    public function test_index_if_auth_with_role_admin(): void
    {
        $response = $this->actingAs($this->user)->get(route('admin.product.index'));
        $response->assertStatus(200);
        $response->assertSee('Products');
    }

    public function test_create_if_auth_with_role_admin(): void
    {
        $response = $this->actingAs($this->user)->get(route('admin.product.create'));
        $response->assertStatus(200);
        $response->assertSee('Create product');
    }

    public function test_store_if_sent_invalid_data(): void
    {
        $response = $this->actingAs($this->user)->post(route('admin.product.store', []));

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_store_if_sent_valid_form(): void
    {
        $data = [
            'title' => $this->faker->realTextBetween(5, 10),
            'description' => $this->faker->realTextBetween(10, 150),
            'short_description' => $this->faker->realTextBetween(10, 50),
            'sku' => 55555,
            'category' => Category::inRandomOrder()->first()->title,
            'price' => 9999,
            'discount' => $this->faker->randomFloat(0, 1, 20),
            'count' => $this->faker->randomFloat(0, 1, 100000),
            'thumbnail' => UploadedFile::fake()->create('test.png'),
        ];

        $response = $this->actingAs($this->user)->post(route('admin.product.store'), $data);
        $this->assertEquals(55555, Product::first()->sku);
        $this->assertEquals(9999, Product::first()->price);
        $response->assertStatus(302)->assertRedirect(route('admin.product.index'));
    }

    public function test_edit(): void
    {
        self::assertTrue(true); //TODO implement test
    }

    public function test_update(): void
    {
        self::assertTrue(true); //TODO implement test

    }

    public function test_destroy(): void
    {
        self::assertTrue(true); //TODO implement test
    }
}
