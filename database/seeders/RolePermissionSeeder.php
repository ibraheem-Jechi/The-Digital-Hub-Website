<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Create permissions
        Permission::firstOrCreate(['name' => 'view post']);
        Permission::firstOrCreate(['name' => 'create post']);
        Permission::firstOrCreate(['name' => 'edit post']);
        Permission::firstOrCreate(['name' => 'delete post']);


        // 2️⃣ Create roles
        $admin  = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $user   = Role::firstOrCreate(['name' => 'user']);

        // 3️⃣ Assign permissions to roles
        $admin->givePermissionTo(Permission::all());

        $editor->givePermissionTo([
            'view post',
            'create post',
            'edit post'
            
        ]);

    }
}