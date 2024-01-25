<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => '1'
        ]);
        $admin->roles()->attach(Role::where('name', 'Admin')->first());
        // Create manager
        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager1@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => '2'
        ]);
        $manager->roles()->attach(Role::where('name', 'Manager')->first());
        // Create admin
        $user = User::create([
            'name' => 'User',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => '3'
        ]);
        $user->roles()->attach(Role::where('name', 'User')->first());
    }
}
