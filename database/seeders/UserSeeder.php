<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat User Supervisor
        User::updateOrCreate(
            ['email' => 'Supervisor@gmail.com'], // Cek berdasarkan email
            [
                'name' => 'Supervisor',
                'password' => Hash::make('Supervisor123'),
                'role' => 'supervisor',
            ]
        );

        User::updateOrCreate(
            ['email' => 'Admin@gmail.com'], // Cek berdasarkan email agar tidak duplikat
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin123'),
                'role' => 'admin',
            ]
        );
    }
}
