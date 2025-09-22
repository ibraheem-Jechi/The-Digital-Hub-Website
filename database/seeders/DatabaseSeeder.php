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
        // Check if Bob already exists
        if (!User::where('email', 'bob@gmail.com')->exists()) {
            User::factory()->create([
                'name' => 'Bob',
                'email' => 'bob@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'super_admin',
                'permissions' => null
            ]);
        }

        // Check if Admin already exists
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'permissions' => null
            ]);
        }

        // Check if Test User already exists
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'role' => 'editor',
                'permissions' => null
            ]);
        }

        // Check if Abdelhadi already exists
        if (!User::where('email', 'abdelhadi@example.com')->exists()) {
            User::create([
                'name' => 'Abdelhadi',
                'email' => 'abdelhadi@example.com',
                'password' => bcrypt('admin123'), // bcrypt hashed password
                'role' => 'editor',
                'permissions' => null
            ]);
        }
    }
}
