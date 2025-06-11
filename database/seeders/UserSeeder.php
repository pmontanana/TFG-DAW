<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario administrador
        User::create([
            'name' => 'Admin',
            'email' => 'admin@cafeteria.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);

        // Crear usuario normal de prueba
        User::create([
            'name' => 'Pablo Mon',
            'email' => 'pmon@cafeteria.com',
            'password' => Hash::make('12345678'),
            'role' => 'user'
        ]);
    }
}
