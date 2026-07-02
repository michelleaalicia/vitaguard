<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@vitaguard.com',
            ],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'doctor@vitaguard.com',
            ],
            [
                'name' => 'Doctor',
                'password' => Hash::make('doctor123'),
                'role' => 'doctor',
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'member@vitaguard.com',
            ],
            [
                'name' => 'Member',
                'password' => Hash::make('member123'),
                'role' => 'member',
            ]
        );
    }
}