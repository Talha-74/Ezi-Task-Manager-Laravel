<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'View tasks']);
        Permission::create(['name' => 'Add tasks']);
        Permission::create(['name' => 'Edit tasks']);
        Permission::create(['name' => 'Delete tasks']);
    }
}
