<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Teste',
            'email' => 'admin@teste.com',
            'password' => Hash::make('senha123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Gerente Teste',
            'email' => 'gerente@teste.com',
            'password' => Hash::make('senha123'),
            'role' => 'gerente',
        ]);

        User::create([
            'name' => 'Usuario Teste',
            'email' => 'usuario@teste.com',
            'password' => Hash::make('senha123'),
            'role' => 'usuario',
        ]);
    }
}