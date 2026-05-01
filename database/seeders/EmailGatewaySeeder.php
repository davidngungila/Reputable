<?php

namespace Database\Seeders;

use App\Models\EmailGateway;
use Illuminate\Database\Seeder;

class EmailGatewaySeeder extends Seeder
{
    public function run(): void
    {
        EmailGateway::updateOrCreate(
            ['name' => 'Primary SMTP'],
            [
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'username' => 'reputabletours@gmail.com',
                'password' => 'app_password_here', // This should be updated with actual app password
                'encryption' => 'tls',
                'from_address' => 'info@reputabletours.com',
                'from_name' => 'Reputable Tours',
                'is_active' => true,
            ]
        );

        $this->command->info('Email gateway configured successfully.');
        $this->command->info('Please update the password with your actual Gmail app password.');
        $this->command->info('Or configure SendGrid/Mailgun API keys in your .env file:');
        $this->command->info('  - SENDGRID_API_KEY=your_sendgrid_api_key');
        $this->command->info('  - MAILGUN_API_KEY=your_mailgun_api_key');
        $this->command->info('  - MAILGUN_DOMAIN=your_mailgun_domain');
    }
}
