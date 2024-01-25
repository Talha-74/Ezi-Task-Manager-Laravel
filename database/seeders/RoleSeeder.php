<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin role and attach all permissions
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->permissions()->attach(Permission::pluck('id'));

        // Create Manager role and attach specific permissions
        $managerRole = Role::create(['name' => 'Manager']);
        $managerRole->permissions()->attach(Permission::whereIn('name', ['View tasks', 'Edit tasks', 'Delete tasks'])->pluck('id'));

        // Create User role and attach specific permissions
        $userRole = Role::create(['name' => 'User']);
        $userRole->permissions()->attach(Permission::where('name', 'View tasks')->pluck('id'));
    }
}
