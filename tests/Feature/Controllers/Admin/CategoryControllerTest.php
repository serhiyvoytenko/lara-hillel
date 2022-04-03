<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected User $user;
    protected Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory(1)->create()->first();
        $this->seed(RolesSeeder::class);
        $this->seed(AdminUserSeeder::class);
        $this->user = User::first();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index(): void
    {
        $response = $this->actingAs($this->user)->get(route('admin.category.index'));

        $response->assertStatus(200)->assertSee($this->category->title);
    }

    public function test_create(): void
    {
        $response = $this->actingAs($this->user)->get(route('admin.category.create'));

        $response->assertStatus(200)->assertSee('Create category');
    }

    public function test_store_if_valid_data(): void
    {
        $response = $this->actingAs($this->user)->post(route('admin.category.store'), [
            'title' => 'test_title_random',
            'description' => $this->faker()->realTextBetween(5, 250),
        ]);
        $this->assertDatabaseHas('categories', ['title' => 'test_title_random']);
        $this->assertEquals(2, Category::count());
        $response->assertStatus(302)->assertRedirect(route('admin.category.index'));
    }

    public function test_store_if_invalid_data(): void
    {
        $response = $this->actingAs($this->user)->post(route('admin.category.store'),[]);
        $this->assertEquals(1, Category::count());
        $response->assertSessionHasErrors(['title' => 'The title field is required.']);
        $response->assertSessionHasErrors(['description' => 'The description field is required.']);
        $response->assertStatus(302);
    }

    public function test_edit(): void
    {
        $response = $this->actingAs($this->user)->get(url('admin/category/' . $this->category->id . '/edit'));
        $response->assertStatus(200);
        $response->assertSee([
            $this->category->title,
            $this->category->description,
        ]);
    }

    public function test_update(): void
    {
        $this->assertTrue(true);
    }

    public function test_destroy(): void
    {
        $this->assertTrue(true);
    }
}
