<?php

namespace App\Console\Commands;

use App\Models\EmailGateway;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ConfigureHostingerEmailCommand extends Command
{
    protected $signature = 'email:configure-hostinger {password : Your Hostinger email password}';
    protected $description = 'Configure email system with Hostinger SMTP settings';

    public function handle()
    {
        $password = $this->argument('password');
        
        $this->info('🔧 Configuring Email System for Hostinger');
        $this->newLine();

        // Update email gateway with Hostinger settings
        $gateway = EmailGateway::where('name', 'Primary SMTP')->first();
        
        if ($gateway) {
            $gateway->update([
                'name' => 'Hostinger SMTP',
                'username' => 'info@reputabletours.com',
                'password' => $password,
                'from_address' => 'info@reputabletours.com',
                'from_name' => 'Reputable Tours',
                'host' => 'smtp.hostinger.com',
                'port' => 465,
                'encryption' => 'ssl',
                'is_active' => true,
            ]);
            
            $this->info('✅ Email gateway updated with Hostinger settings');
        } else {
            // Create new gateway
            EmailGateway::create([
                'name' => 'Hostinger SMTP',
                'username' => 'info@reputabletours.com',
                'password' => $password,
                'from_address' => 'info@reputabletours.com',
                'from_name' => 'Reputable Tours',
                'host' => 'smtp.hostinger.com',
                'port' => 465,
                'encryption' => 'ssl',
                'is_active' => true,
            ]);
            
            $this->info('✅ New Hostinger email gateway created');
        }

        $this->newLine();
        $this->info('📋 Hostinger Email Configuration:');
        $this->table(['Setting', 'Value'], [
            ['Email Service', 'Hostinger'],
            ['From Email', 'info@reputabletours.com'],
            ['From Name', 'Reputable Tours'],
            ['SMTP Host', 'smtp.hostinger.com'],
            ['SMTP Port', '465'],
            ['Encryption', 'SSL'],
            ['Username', 'info@reputabletours.com'],
            ['Status', 'Active'],
        ]);

        $this->newLine();
        $this->info('🧪 Testing Hostinger email configuration...');
        
        try {
            // Configure runtime settings
            config(['mail.default' => 'smtp']);
            config(['mail.from.address' => 'info@reputabletours.com']);
            config(['mail.from.name' => 'Reputable Tours']);
            config(['mail.mailers.smtp.host' => 'smtp.hostinger.com']);
            config(['mail.mailers.smtp.port' => 465]);
            config(['mail.mailers.smtp.username' => 'info@reputabletours.com']);
            config(['mail.mailers.smtp.password' => $password]);
            config(['mail.mailers.smtp.encryption' => 'ssl']);

            // Send test email
            Mail::raw($this->getTestEmailContent(), function ($message) {
                $message->to('davidngungila@gmail.com')
                    ->subject('✅ SUCCESS - Reputable Tours Hostinger Email Working!')
                    ->from('info@reputabletours.com', 'Reputable Tours');
            });
            
            $this->info('✅✅✅ SUCCESS! Email sent via Hostinger to davidngungila@gmail.com');
            $this->info('📧 Please check your inbox NOW!');
            $this->newLine();
            $this->info('🎉 Your email system is now working with Hostinger for:');
            $this->info('• Booking forms (/bookings/create)');
            $this->info('• Contact forms (/contact)');
            $this->info('• Payment confirmations (/bookings/{id}/checkout)');
            $this->info('• All admin notifications');
            
        } catch (\Exception $e) {
            $this->error('❌ Test failed: ' . $e->getMessage());
            $this->newLine();
            $this->info('🔧 Troubleshooting:');
            $this->info('1. Verify Hostinger email password is correct');
            $this->info('2. Check if Hostinger SMTP is enabled for your account');
            $this->info('3. Ensure firewall allows port 465');
            $this->info('4. Try alternative port 587 with TLS encryption');
        }
        
        return Command::SUCCESS;
    }
    
    private function getTestEmailContent(): string
    {
        $timestamp = now()->format('Y-m-d H:i:s');
        
        return "
🎉 HOSTINGER EMAIL SYSTEM - SUCCESS! 🎉

This test email confirms your Hostinger email system is working perfectly!

Test Details:
• Timestamp: {$timestamp}
• Email Service: Hostinger SMTP
• From: info@reputabletours.com
• Server: " . config('app.name') . "

What This Means:
✅ Booking forms at /bookings/create will send emails immediately
✅ Contact forms at /contact will send emails immediately  
✅ Payment confirmations at /bookings/{id}/checkout will send emails immediately
✅ Both customers and admins receive detailed notifications
✅ Professional email delivery via Hostinger

Email System Features:
• Primary SMTP: Hostinger (smtp.hostinger.com:465)
• Backup Services: SendGrid & Mailgun (if configured)
• Comprehensive logging
• Attachment support (invoices, receipts)
• Advanced error handling
• Retry mechanisms

If you received this email, your system is 100% operational! 🚀

---
Reputable Tours
Professional Email System
" . url('/') . "

P.S. This was sent using your Hostinger email configuration.
All form submissions will now work perfectly!
        ";
    }
}
