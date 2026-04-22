<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // create or update a known admin for login (avoid duplicate on reseed)
        Admin::updateOrCreate(
            ['email' => 'admin@center.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'is_active' => true,
            ]
        );

        // create a few random admins
        Admin::factory()->count(3)->create();
    }
}
