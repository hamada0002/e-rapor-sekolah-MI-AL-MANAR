<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Guru User',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        User::create([
            'name' => 'Orang Tua User',
            'email' => 'orangtua@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'orang_tua',
        ]);
    }
}
