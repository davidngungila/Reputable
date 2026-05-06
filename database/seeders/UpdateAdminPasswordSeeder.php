<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UpdateAdminPasswordSeeder extends Seeder
{
    public function run(): void
    {
        // Update admin user password
        $admin = User::where('email', 'info@reputabletours.com')->first();
        
        if ($admin) {
            $admin->password = Hash::make('Rt@2026site');
            $admin->save();
            
            $this->command->info('Admin password updated successfully.');
        } else {
            $this->command->error('Admin user not found.');
        }
    }
}
