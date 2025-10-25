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
        $dosenRole = Role::firstOrCreate(['name' => 'dosen']);
        $mahasiswaRole = Role::firstOrCreate(['name' => 'mahasiswa']);

        // Buat Super Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'nomor_induk' => '000000',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        // Buat user Pieter
        $pieter = User::firstOrCreate(
            ['email' => 'pieter@example.com'],
            [
                'name' => 'Pieter',
                'nomor_induk' => '123456',
                'password' => Hash::make('password'),
            ]
        );
        $pieter->assignRole($adminRole);

        // Buat user Nikita
        $nikita = User::firstOrCreate(
            ['email' => 'nikita@example.com'],
            [
                'name' => 'Nikita',
                'nomor_induk' => '654321',
                'password' => Hash::make('password'),
            ]
        );
        $nikita->assignRole($adminRole);

        // Buat user Arthur
        $arthur = User::firstOrCreate(
            ['email' => 'arthur@example.com'],
            [
                'name' => 'Arthur',
                'nomor_induk' => '112233',
                'password' => Hash::make('password'),
            ]
        );
        $arthur->assignRole($adminRole);

        // Buat user Dosen
        $dosen = User::firstOrCreate(
            ['email' => 'dosen@example.com'],
            [
                'name' => 'Dosen',
                'nomor_induk' => '998877',
                'password' => Hash::make('password'),
            ]
        );
        $dosen->assignRole($dosenRole);

        // Buat user Mahasiswa
        $mahasiswa = User::firstOrCreate(
            ['email' => 'mahasiswa@example.com'],
            [
                'name' => 'Mahasiswa',
                'nomor_induk' => '776655',
                'password' => Hash::make('password'),
            ]
        );
        $mahasiswa->assignRole($mahasiswaRole);
    }
}
