<?php

namespace Tests\Feature\Controllers\Api\V1;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\RolesSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected Collection $product;
    protected Category $category;
    protected User $user;
    protected User $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory(1)->create()->first();
        $this->product = Product::factory(10)->create();
        $this->seed(RolesSeeder::class);
        $this->user = User::factory(1)->create()->first();
        $this->admin = User::factory(1)->create()->first();
        $this->admin->role_id = Role::whereName(config('constants.db.roles.admin'))->first()->id;
        $this->admin->save();

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_if_public_api_v1(): void
    {
        $response = $this->get('/api/v1/public/products');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_index_if_auth_api_v1(): void
    {
        $response = $this->actingAs($this->user)->get('/api/v1/products');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_index_if_no_auth_api_v1(): void
    {
        $response = $this->get('/api/v1/products');

        $response->assertStatus(302)->assertSeeText('Redirecting to http://lara-hillel.local/login');
    }

    public function test_show_if_public_api_v1(): void
    {
        $product = $this->product->first();
        $response = $this->get('/api/v1/public/products/' . $product->id);

        $response->assertStatus(200)->assertJsonCount(1);
    }

    public function test_show_if_no_auth_api_v1(): void
    {
        $response = $this->get('/api/v1/products/' . $this->product->first()->id);

        $response->assertStatus(302)->assertSeeText('Redirecting to http://lara-hillel.local/login');
    }

    public function test_index_if_admin_api_v1(): void
    {
        $response = $this->actingAs($this->admin)->get('/api/v1/admin/products');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_show_if_admin_api_v1(): void
    {
        $response = $this->actingAs($this->admin)->get('/api/v1/admin/products/' . $this->product->first()->id);

        $response->assertStatus(200)->assertJsonCount(1);
    }
}
