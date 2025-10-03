<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run()
    {
     
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $userRole = Role::firstOrCreate(['name' => 'user']);

     
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole($adminRole);
    }
}
