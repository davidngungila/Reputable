<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Lau Administrator',
            'username' => 'lauparadise',
            'email' => 'info@reputabletours.com',
            'password' => Hash::make('Rt@2026site'),
            'email_verified_at' => now(),
        ]);
    }
}
