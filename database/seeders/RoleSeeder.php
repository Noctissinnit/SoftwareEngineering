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
        // Buat role admin jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Buat Super Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        // Buat user Pieter
        $pieter = User::firstOrCreate(
            ['email' => 'pieter@example.com'],
            [
                'name' => 'Pieter',
                'password' => Hash::make('password'),
            ]
        );
        $pieter->assignRole($adminRole);

        // Buat user Nikita
        $nikita = User::firstOrCreate(
            ['email' => 'nikita@example.com'],
            [
                'name' => 'Nikita',
                'password' => Hash::make('password'),
            ]
        );
        $nikita->assignRole($adminRole);

        // Buat user Arthur
        $arthur = User::firstOrCreate(
            ['email' => 'arthur@example.com'],
            [
                'name' => 'Arthur',
                'password' => Hash::make('password'),
            ]
        );
        $arthur->assignRole($adminRole);
    }
}
