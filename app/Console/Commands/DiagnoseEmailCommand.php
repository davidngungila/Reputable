<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class DiagnoseEmailCommand extends Command
{
    protected $signature = 'email:diagnose';
    protected $description = 'Diagnose email configuration issues';

    public function handle()
    {
        $this->info('🔍 EMAIL SYSTEM DIAGNOSIS');
        $this->newLine();

        // Check current configuration
        $this->info('📋 Current Email Configuration:');
        $this->table(['Setting', 'Value'], [
            ['Default Mailer', config('mail.default')],
            ['From Address', config('mail.from.address')],
            ['From Name', config('mail.from.name')],
            ['SMTP Host', config('mail.mailers.smtp.host')],
            ['SMTP Port', config('mail.mailers.smtp.port')],
            ['SMTP Username', config('mail.mailers.smtp.username')],
            ['SMTP Encryption', config('mail.mailers.smtp.encryption')],
        ]);

        $this->newLine();

        // Check if in log mode
        if (config('mail.default') === 'log') {
            $this->error('❌ PROBLEM: Mail is set to "log" mode');
            $this->info('📧 Emails are being written to storage/logs/laravel.log instead of being sent');
            $this->newLine();
            $this->info('🔧 TO FIX THIS:');
            $this->info('1. Open your .env file');
            $this->info('2. Change: MAIL_MAILER=log to MAIL_MAILER=smtp');
            $this->info('3. Add proper SMTP credentials');
            $this->newLine();
        }

        // Check SMTP credentials
        if (!config('mail.mailers.smtp.username') || !config('mail.mailers.smtp.password')) {
            $this->error('❌ PROBLEM: SMTP credentials not configured');
            $this->newLine();
            $this->info('🔧 TO FIX THIS - Add to your .env file:');
            $this->info('MAIL_MAILER=smtp');
            $this->info('MAIL_HOST=smtp.gmail.com');
            $this->info('MAIL_PORT=587');
            $this->info('MAIL_USERNAME=your-email@gmail.com');
            $this->info('MAIL_PASSWORD=your-app-password');
            $this->info('MAIL_ENCRYPTION=tls');
            $this->info('MAIL_FROM_ADDRESS=info@reputabletours.com');
            $this->info('MAIL_FROM_NAME="Reputable Tours"');
            $this->newLine();
            $this->info('📱 For Gmail:');
            $this->info('1. Enable 2-factor authentication');
            $this->info('2. Go to Google Account settings');
            $this->info('3. Security → App passwords');
            $this->info('4. Generate new app password');
            $this->info('5. Use that password in MAIL_PASSWORD');
            $this->newLine();
        }

        // Test connection
        $this->info('🧪 Testing email configuration...');
        
        try {
            // Try to send a test email
            Mail::raw('This is a test email from Reputable Tours', function ($message) {
                $message->to('davidngungila@gmail.com')
                    ->subject('🧪 Email Configuration Test')
                    ->from(config('mail.from.address'), config('mail.from.name'));
            });
            
            $this->info('✅ Email configuration test: PASSED');
            $this->info('📧 Test email sent to davidngungila@gmail.com');
            
        } catch (\Exception $e) {
            $this->error('❌ Email configuration test: FAILED');
            $this->error('Error: ' . $e->getMessage());
            $this->newLine();
            $this->info('🔧 Common fixes:');
            $this->info('• Check SMTP credentials in .env');
            $this->info('• For Gmail: Use App Password (not regular password)');
            $this->info('• Check firewall/antivirus blocking port 587');
            $this->info('• Try different SMTP service (SendGrid, Mailgun)');
        }

        $this->newLine();
        $this->info('📊 QUICK TEST OPTIONS:');
        $this->info('1. Configure SMTP in .env and run: php artisan email:send-test');
        $this->info('2. Use backup services: Add SENDGRID_API_KEY to .env');
        $this->info('3. Check logs: Get-Content storage/logs/laravel.log -Tail 20');
        
        return Command::SUCCESS;
    }
}
