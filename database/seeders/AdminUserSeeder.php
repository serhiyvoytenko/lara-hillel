<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $admin_role = Role::where('name', 'Admin')->first();

        User::firstOrCreate([
           'name' => 'Serhii',
           'surname' => 'Admin',
           'birthdate' => '1990-02-02',
           'phone' => '+380972342343',
           'email' => 'serguei.mail@gmail.com',
           'password' => \Hash::make('test12345'),
           'role_id' => $admin_role?->id,
        ]);

    }
}
