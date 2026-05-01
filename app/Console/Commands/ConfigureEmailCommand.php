<?php

namespace App\Console\Commands;

use App\Models\EmailGateway;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class ConfigureEmailCommand extends Command
{
    protected $signature = 'email:configure';
    protected $description = 'Configure email system with Reputable Tours credentials';

    public function handle()
    {
        $this->info('🔧 Configuring Email System for Reputable Tours');
        $this->newLine();

        // Update email gateway
        $gateway = EmailGateway::where('name', 'Primary SMTP')->first();
        
        if ($gateway) {
            $gateway->update([
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
                'from_address' => 'info@reputabletours.com',
                'from_name' => 'Reputable Tours',
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'encryption' => 'tls',
                'is_active' => true,
            ]);
            
            $this->info('✅ Email gateway updated in database');
        } else {
            // Create new gateway if it doesn't exist
            EmailGateway::create([
                'name' => 'Primary SMTP',
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
                'from_address' => 'info@reputabletours.com',
                'from_name' => 'Reputable Tours',
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'encryption' => 'tls',
                'is_active' => true,
            ]);
            
            $this->info('✅ New email gateway created in database');
        }

        // Update runtime configuration
        Config::set('mail.default', 'smtp');
        Config::set('mail.from.address', 'info@reputabletours.com');
        Config::set('mail.from.name', 'Reputable Tours');
        Config::set('mail.mailers.smtp.host', 'smtp.gmail.com');
        Config::set('mail.mailers.smtp.port', 587);
        Config::set('mail.mailers.smtp.username', 'info@reputabletours.com');
        Config::set('mail.mailers.smtp.password', 'Rt@0326!');
        Config::set('mail.mailers.smtp.encryption', 'tls');

        $this->newLine();
        $this->info('📋 Email Configuration Updated:');
        $this->table(['Setting', 'Value'], [
            ['From Email', 'info@reputabletours.com'],
            ['From Name', 'Reputable Tours'],
            ['SMTP Host', 'smtp.gmail.com'],
            ['SMTP Port', '587'],
            ['Username', 'info@reputabletours.com'],
            ['Encryption', 'TLS'],
            ['Status', 'Active'],
        ]);

        $this->newLine();
        $this->info('🧪 Testing email configuration...');
        
        try {
            \Illuminate\Support\Facades\Mail::raw('This is a test email from Reputable Tours', function ($message) {
                $message->to('davidngungila@gmail.com')
                    ->subject('✅ Reputable Tours - Email Configuration Test')
                    ->from('info@reputabletours.com', 'Reputable Tours');
            });
            
            $this->info('✅ Test email sent to davidngungila@gmail.com');
            $this->info('📧 Please check your inbox (and spam folder)');
            
        } catch (\Exception $e) {
            $this->error('❌ Test email failed: ' . $e->getMessage());
            $this->newLine();
            $this->info('🔧 Troubleshooting:');
            $this->info('1. Make sure Gmail allows less secure apps or use App Password');
            $this->info('2. Check if the password is correct: Rt@0326!');
            $this->info('3. Ensure firewall isn\'t blocking port 587');
        }

        $this->newLine();
        $this->info('🎯 Email system is now configured for:');
        $this->info('• Booking forms (/bookings/create)');
        $this->info('• Contact forms (/contact)');
        $this->info('• Payment confirmations (/bookings/{id}/checkout)');
        $this->info('• Admin notifications to multiple addresses');
        
        return Command::SUCCESS;
    }
}
