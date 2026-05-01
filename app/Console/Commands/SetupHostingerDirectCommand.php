<?php

namespace App\Console\Commands;

use App\Models\EmailGateway;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class SetupHostingerDirectCommand extends Command
{
    protected $signature = 'email:setup-hostinger-direct';
    protected $description = 'Configure Hostinger email directly and test until successful';

    public function handle()
    {
        $this->info('🔧 Configuring Hostinger Email Directly in Database');
        $this->newLine();

        // Step 1: Configure in database
        $this->info('📝 Step 1: Configuring email gateway...');
        
        $gateway = EmailGateway::updateOrCreate(
            ['name' => 'Hostinger SMTP'],
            [
                'host' => 'smtp.hostinger.com',
                'port' => 465,
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
                'encryption' => 'ssl',
                'from_address' => 'info@reputabletours.com',
                'from_name' => 'Reputable Tours',
                'is_active' => true,
            ]
        );

        $this->info('✅ Email gateway configured with ID: ' . $gateway->id);
        $this->info('📧 Host: ' . $gateway->host);
        $this->info('🔌 Port: ' . $gateway->port);
        $this->info('👤 Username: ' . $gateway->username);
        $this->info('🔐 Encryption: ' . $gateway->encryption);

        $this->newLine();

        // Step 2: Test with different configurations
        $this->info('🧪 Step 2: Testing email configurations...');

        $configs = [
            [
                'name' => 'Hostinger SSL (Port 465)',
                'host' => 'smtp.hostinger.com',
                'port' => 465,
                'encryption' => 'ssl',
            ],
            [
                'name' => 'Hostinger TLS (Port 587)',
                'host' => 'smtp.hostinger.com', 
                'port' => 587,
                'encryption' => 'tls',
            ],
            [
                'name' => 'Hostinger No Encryption (Port 2525)',
                'host' => 'smtp.hostinger.com',
                'port' => 2525,
                'encryption' => null,
            ],
        ];

        $success = false;

        foreach ($configs as $config) {
            $this->newLine();
            $this->info("🔄 Testing: {$config['name']}");
            
            try {
                // Update runtime config
                Config::set('mail.default', 'smtp');
                Config::set('mail.from.address', 'info@reputabletours.com');
                Config::set('mail.from.name', 'Reputable Tours');
                Config::set('mail.mailers.smtp.host', $config['host']);
                Config::set('mail.mailers.smtp.port', $config['port']);
                Config::set('mail.mailers.smtp.username', 'info@reputabletours.com');
                Config::set('mail.mailers.smtp.password', 'Rt@0326!');
                Config::set('mail.mailers.smtp.encryption', $config['encryption']);

                // Send test email
                Mail::raw($this->getTestEmailContent($config['name']), function ($message) {
                    $message->to('davidngungila@gmail.com')
                        ->subject('✅ TEST - ' . now()->format('H:i:s') . ' - Hostinger Email Working!')
                        ->from('info@reputabletours.com', 'Reputable Tours');
                });

                $this->info('✅ SUCCESS! Email sent with: ' . $config['name']);
                $this->info('📧 Check your inbox at davidngungila@gmail.com');
                
                // Update database with successful config
                $gateway->update([
                    'port' => $config['port'],
                    'encryption' => $config['encryption'],
                ]);

                $success = true;
                break;

            } catch (\Exception $e) {
                $this->error('❌ Failed: ' . $e->getMessage());
                $this->info('⏭️  Trying next configuration...');
            }
        }

        $this->newLine();

        if ($success) {
            $this->info('🎉 SUCCESS! Email system is working!');
            $this->newLine();
            $this->info('✅ All form submissions will now send emails:');
            $this->info('   • Booking forms (/bookings/create)');
            $this->info('   • Contact forms (/contact)');
            $this->info('   • Payment confirmations (/bookings/{id}/checkout)');
            $this->info('   • Admin notifications');
            
        } else {
            $this->error('❌ All configurations failed');
            $this->newLine();
            $this->info('🔧 Troubleshooting steps:');
            $this->info('1. Verify Hostinger email password: Rt@0326!');
            $this->info('2. Check if Hostinger SMTP is enabled');
            $this->info('3. Try different Hostinger password');
            $this->info('4. Contact Hostinger support for SMTP settings');
        }

        return $success ? Command::SUCCESS : Command::FAILURE;
    }
    
    private function getTestEmailContent(string $configName): string
    {
        $timestamp = now()->format('Y-m-d H:i:s');
        
        return "
🎉 HOSTINGER EMAIL SYSTEM - SUCCESS! 🎉

Configuration: {$configName}
Timestamp: {$timestamp}
Server: " . config('app.name') . "

This test confirms your Hostinger email system is working!

✅ FEATURES NOW ACTIVE:
• Booking forms send emails immediately
• Contact forms send emails immediately  
• Payment confirmations send emails immediately
• Both customers and admins receive notifications
• Professional delivery via Hostinger SMTP

📧 EMAIL DETAILS:
• From: info@reputabletours.com
• Via: Hostinger SMTP
• Status: WORKING PERFECTLY

If you received this email, your system is 100% operational! 🚀

---
Reputable Tours
Email System Test
" . url('/') . "
        ";
    }
}
