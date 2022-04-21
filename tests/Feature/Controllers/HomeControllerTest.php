<?php

namespace Tests\Feature\Controllers;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\RolesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesSeeder::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_when_user_does_not_auth(): void
    {
        $response = $this->get('/');
        $response_home = $this->get('/home');

        $response->assertStatus(200);
        $response_home->assertStatus(302)->assertRedirect('login');
    }

    public function test_with_auth_user(): void
    {
        User::factory(1)->create();
        $response = $this->actingAs(User::get()->first())->get('home');

        $response->assertStatus(200);
        $response->assertSee('Home page');
    }

}
