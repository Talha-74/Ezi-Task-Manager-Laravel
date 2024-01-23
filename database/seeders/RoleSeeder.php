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
    Role::create(['name' => 'Admin'])->permissions()->sync(Permission::all());
    Role::create(['name' => 'Manager'])->permissions()->sync(Permission::where('name', 'Edit tasks')->get());
    Role::create(['name' => 'User'])->permissions()->sync(Permission::where('name', 'View tasks')->get());
    }
}
