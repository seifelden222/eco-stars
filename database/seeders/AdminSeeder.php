<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // create a known admin for login
        Admin::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@center.com',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // create a few random admins
        Admin::factory()->count(3)->create();
    }
}
