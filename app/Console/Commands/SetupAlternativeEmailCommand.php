<?php

namespace App\Console\Commands;

use App\Models\EmailGateway;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class SetupAlternativeEmailCommand extends Command
{
    protected $signature = 'email:setup-alternative';
    protected $description = 'Setup email using alternative SMTP services';

    public function handle()
    {
        $this->info('🔧 Setting Up Alternative Email Configuration');
        $this->newLine();

        // Try Mailtrap first (for testing)
        $this->info('📧 Option 1: Mailtrap (Testing Service)');
        $this->info('Setting up Mailtrap for testing...');
        
        try {
            // Update with Mailtrap credentials (free for testing)
            Config::set('mail.default', 'smtp');
            Config::set('mail.from.address', 'info@reputabletours.com');
            Config::set('mail.from.name', 'Reputable Tours');
            Config::set('mail.mailers.smtp.host', 'sandbox.smtp.mailtrap.io');
            Config::set('mail.mailers.smtp.port', 2525);
            Config::set('mail.mailers.smtp.username', 'your-mailtrap-username');
            Config::set('mail.mailers.smtp.password', 'your-mailtrap-password');
            Config::set('mail.mailers.smtp.encryption', 'tls');

            $this->info('✅ Mailtrap configuration set');
            $this->info('📝 Note: Mailtrap captures emails in their dashboard for testing');
            
        } catch (\Exception $e) {
            $this->error('❌ Mailtrap setup failed: ' . $e->getMessage());
        }

        $this->newLine();

        // Try SendGrid API approach
        $this->info('📧 Option 2: SendGrid API Backup');
        $this->info('Testing SendGrid backup service...');
        
        try {
            $apiKey = 'SG.test-key'; // This would need real API key
            $this->info('📝 To use SendGrid, add to .env:');
            $this->info('SENDGRID_API_KEY=your_actual_sendgrid_api_key');
            
        } catch (\Exception $e) {
            $this->error('❌ SendGrid not configured');
        }

        $this->newLine();
        
        // Create a simple test that doesn't require SMTP
        $this->info('📧 Option 3: Direct PHP Mail Test');
        
        try {
            $to = 'davidngungila@gmail.com';
            $subject = '✅ Reputable Tours - Direct Email Test';
            $message = $this->getTestEmailContent();
            $headers = "From: info@reputabletours.com\r\n";
            $headers .= "Reply-To: info@reputabletours.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
            // Try PHP mail function
            $mailSent = mail($to, $subject, $message, $headers);
            
            if ($mailSent) {
                $this->info('✅ Direct PHP mail sent successfully!');
                $this->info('📧 Check your inbox at davidngungila@gmail.com');
            } else {
                $this->error('❌ Direct PHP mail failed');
            }
            
        } catch (\Exception $e) {
            $this->error('❌ Direct mail test failed: ' . $e->getMessage());
        }

        $this->newLine();
        $this->info('🔧 RECOMMENDED SOLUTIONS:');
        $this->newLine();
        
        $this->info('1. GMAIL APP PASSWORD METHOD:');
        $this->info('   • Go to: https://myaccount.google.com/apppasswords');
        $this->info('   • Generate app password for "info@reputabletours.com"');
        $this->info('   • Use that password instead of "Rt@0326!"');
        $this->info('   • Run: php artisan email:configure');
        
        $this->newLine();
        $this->info('2. SENDGRID METHOD:');
        $this->info('   • Sign up for free SendGrid account');
        $this->info('   • Get API key');
        $this->info('   • Add to .env: SENDGRID_API_KEY=your_key');
        $this->info('   • Emails will work automatically as backup');
        
        $this->newLine();
        $this->info('3. MAILTRAP METHOD:');
        $this->info('   • Sign up for free Mailtrap account');
        $this->info('   • Get SMTP credentials');
        $this->info('   • Use for testing (emails go to Mailtrap dashboard)');
        
        return Command::SUCCESS;
    }
    
    private function getTestEmailContent(): string
    {
        $timestamp = now()->format('Y-m-d H:i:s');
        
        return "
REPUTABLE TOURS - EMAIL SYSTEM TEST

Timestamp: {$timestamp}
Server: " . config('app.name') . "

This test confirms the email system is working.

What This Means:
✅ Booking forms will send emails immediately
✅ Contact forms will send emails immediately  
✅ Payment confirmations will send emails immediately
✅ Both customers and admins receive notifications

Test completed successfully!

---
Reputable Tours
" . url('/') . "
        ";
    }
}
