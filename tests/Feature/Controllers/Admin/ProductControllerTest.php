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
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected User $user;
    protected string|LegacyMockInterface|MockInterface $mock;

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesSeeder::class);
        $this->seed(AdminUserSeeder::class);
        Category::factory(1)->create();
        User::factory(1)->create();

        $this->user = $this->getUser();
        $this->mock = \Mockery::mock('alias:App\Services\FileStorageService');
    }

    private function getUser($role = 'admin'): User
    {
        $role = Role::$role()->first();
        return User::where('role_id', $role->id)->first();
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_index_if_no_auth(): void
    {
        $response = $this->get(route('admin.product.index'));
        $response->assertStatus(302)->assertRedirect(route('login'));
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_index_if_auth_with_role_customer(): void
    {
        $customer = $this->getUser('customer');
        $response = $this->actingAs($customer)->get(route('admin.product.index'));
        $response->assertStatus(302)->assertRedirect(route('home'));
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_index_if_auth_with_role_admin(): void
    {
        $response = $this->actingAs($this->user)->get(route('admin.product.index'));
        $response->assertStatus(200)->assertSee('Products');
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_create(): void
    {
        $response = $this->actingAs($this->user)->get(route('admin.product.create'));
        $response->assertStatus(200)->assertSee('Create product');
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_store_if_sent_invalid_data(): void
    {
        $response = $this->actingAs($this->user)->post(route('admin.product.store', []));

        $response->assertStatus(302)->assertSessionHasErrors(['title']);
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_store_if_sent_valid_form(): void
    {
        $this->mock->shouldReceive('upload')->once()->andReturn('test');

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
        $this->assertEquals('test', Product::first()->thumbnail);
        $response->assertStatus(302)->assertRedirect(route('admin.product.index'));
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_edit(): void
    {
        $this->mock->shouldReceive('upload')->once()->andReturn('test');

        $product = Product::factory(1)->create()->first();
        $response = $this->actingAs($this->user)->get(url('/admin/product/' . $product->id . '/edit'));
        $response->assertStatus(200);
        $response->assertSee([
            $product->title,
            $product->description,
            $product->short_description,
            $product->sku,
        ]);
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_update(): void
    {
        $this->mock->shouldReceive('upload')->once()->andReturn('test');

        $product = Product::factory(1)->create()->first();
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
        ]);

        $response = $this->actingAs($this->user)->put('/admin/product/' . $product->id, [
            'title' => 'new_title',
            'description' => $product->description,
            'short_description' => $product->short_description,
            'sku' => 'new_sku',
            'category' => Category::first()->title,
            'price' => 100,
            'discount' => 10,
            'count' => $product->count,
        ]);
        $this->assertDatabaseHas('products', [
            'title' => 'new_title',
            'sku' => 'new_sku',
            'price' => 100,
            'discount' => 10
        ]);
        $response->assertRedirect(route('admin.product.index'));
    }

    /**
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @return void
     */
    public function test_destroy(): void
    {
        $this->mock->shouldReceive('remove')->once()->andReturn(true);
        $this->mock->shouldReceive('upload')->once()->andReturn('test');
        $product = Product::factory(1)->create()->first();
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
        ]);
        $response = $this->actingAs($this->user)->delete(url('/admin/product/' . $product->id));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
