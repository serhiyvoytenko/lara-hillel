<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(OrderStatusesSeeder::class);
        Category::factory(10)->create();
        $this->call(AdminUserSeeder::class);
        User::factory(10)->create();
        Image::factory(10)->create();
        Product::factory(300)->create();
    }
}
