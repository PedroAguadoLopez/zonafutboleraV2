<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Usuario Uno',
            'email' => 'usuario1@zonafutbolera.es',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Usuario Dos',
            'email' => 'usuario2@zonafutbolera.es',
            'password' => Hash::make('password123'),
        ]);
    }
}