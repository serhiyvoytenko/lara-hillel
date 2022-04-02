<?php

namespace Tests\Feature\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create(): void
    {
        $this->assertTrue(true);
    }

    public function test_store(): void
    {
        $this->assertTrue(true);
    }

    public function test_edit(): void
    {
        $this->assertTrue(true);
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
