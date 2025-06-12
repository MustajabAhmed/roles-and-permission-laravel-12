<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Define permissions
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(['create posts', 'edit posts', 'delete posts']);
        $userRole->givePermissionTo('create posts');

        // Create Admin user
        $admin = new User();
        $admin->name = 'Admin User';
        $admin->email = 'admin@gmail.com';
        $admin->password = '123123123';
        $admin->email_verified_at = now();
        $admin->save();
        $admin->syncRoles(['admin']);

        // Create simple User
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->password = '123123123';
        $user->email_verified_at = now();
        $user->save();
        $user->syncRoles(['user']);
    }
}
