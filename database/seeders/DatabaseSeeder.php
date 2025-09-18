<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Super Admin
        User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'super_admin',
            'permissions' => null
        ]);

        // Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'permissions' => null
        ]);

        // Normal user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'editor',
            'permissions' => null
        ]);
    }
}
