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
        User::create([
            'name' => 'Admin Sistem',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@mail.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
