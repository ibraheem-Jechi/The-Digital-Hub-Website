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
        User::firstOrCreate(
            ['email' => 'bob@gmail.com'], // Check by email
            [
                'name' => 'Bob',
                'password' => bcrypt('password'),
                'role' => 'super_admin',
                'permissions' => null
            ]
        );

        // Admin
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'permissions' => null
            ]
        );

        // Normal user
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'role' => 'editor',
                'permissions' => null
            ]
        );
    }
}
