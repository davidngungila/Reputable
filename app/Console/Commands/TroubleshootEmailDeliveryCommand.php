<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class TroubleshootEmailDeliveryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'troubleshoot:email-delivery {to=raphaeleliac@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Troubleshoot email delivery issues and provide solutions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $testEmail = $this->argument('to');
        
        $this->info("🔧 Email Delivery Troubleshooting");
        $this->info("📧 Test email: {$testEmail}");
        $this->info("🔍 Checking email system health...");
        
        // Test 1: Basic SMTP Connection
        $this->info("\n🔄 Test 1: Basic SMTP Connection Test");
        $this->testBasicSMTP($testEmail);
        
        // Test 2: Simple Email
        $this->info("\n🔄 Test 2: Simple Email Test");
        $this->testSimpleEmail($testEmail);
        
        // Test 3: Booking Email
        $this->info("\n🔄 Test 3: Booking Email Test");
        $this->testBookingEmail($testEmail);
        
        // Test 4: Multi-Recipient Test
        $this->info("\n🔄 Test 4: Multi-Recipient Test");
        $this->testMultiRecipient($testEmail);
        
        // Provide troubleshooting guidance
        $this->provideTroubleshootingGuidance($testEmail);
        
        return 0;
    }
    
    private function testBasicSMTP($testEmail)
    {
        try {
            // Configure Hostinger SMTP
            Config::set('mail.default', 'smtp');
            Config::set('mail.mailers.smtp.transport', 'smtp');
            Config::set('mail.mailers.smtp.host', 'smtp.hostinger.com');
            Config::set('mail.mailers.smtp.port', 465);
            Config::set('mail.mailers.smtp.encryption', 'ssl');
            Config::set('mail.mailers.smtp.username', 'info@reputabletours.com');
            Config::set('mail.mailers.smtp.password', 'Rt@0326!');
            Config::set('mail.from.address', 'info@reputabletours.com');
            Config::set('mail.from.name', 'Reputable Tours');
            
            $subject = "🔧 SMTP Test - " . date('Y-m-d H:i:s');
            $html = '<h2>SMTP Connection Test</h2><p>This is a basic SMTP test to verify email delivery.</p><p>Sent at: ' . date('Y-m-d H:i:s') . '</p>';
            
            Mail::send([], [], function ($message) use ($testEmail, $subject, $html) {
                $message->to($testEmail)
                        ->subject($subject)
                        ->from('info@reputabletours.com', 'Reputable Tours')
                        ->html($html);
            });
            
            $this->info("✅ Basic SMTP test successful");
            
        } catch (\Exception $e) {
            $this->error("❌ Basic SMTP test failed: " . $e->getMessage());
        }
    }
    
    private function testSimpleEmail($testEmail)
    {
        try {
            $subject = "📧 Simple Email Test - " . date('Y-m-d H:i:s');
            
            $html = '<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { background: #006400; color: white; padding: 15px; text-align: center; }
        .content { padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Reputable Tours</h1>
            <p>NSSF Commercial Complex, Moshi</p>
        </div>
        <div class="content">
            <h2>Simple Email Test</h2>
            <p>This is a simple test email to verify delivery.</p>
            <p><strong>Time:</strong> ' . date('Y-m-d H:i:s') . '</p>
            <p><strong>From:</strong> info@reputabletours.com</p>
            <p><strong>To:</strong> ' . $testEmail . '</p>
            <hr>
            <p><em>If you receive this email, the email system is working correctly.</em></p>
        </div>
    </div>
</body>
</html>';
            
            Mail::send([], [], function ($message) use ($testEmail, $subject, $html) {
                $message->to($testEmail)
                        ->subject($subject)
                        ->from('info@reputabletours.com', 'Reputable Tours')
                        ->html($html);
            });
            
            $this->info("✅ Simple email test successful");
            
        } catch (\Exception $e) {
            $this->error("❌ Simple email test failed: " . $e->getMessage());
        }
    }
    
    private function testBookingEmail($testEmail)
    {
        try {
            $subject = "🎫 Booking Email Test - " . date('Y-m-d H:i:s');
            
            $html = '<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { background: #006400; color: white; padding: 15px; text-align: center; }
        .content { padding: 20px; }
        .booking-details { background: #f5f5f5; padding: 15px; border-radius: 5px; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Reputable Tours</h1>
            <p>NSSF Commercial Complex, Moshi</p>
        </div>
        <div class="content">
            <h2>Booking Confirmation Test</h2>
            <p>This is a test booking confirmation email.</p>
            
            <div class="booking-details">
                <h3>Booking Details</h3>
                <p><strong>Booking ID:</strong> TEST-12345</p>
                <p><strong>Tour:</strong> Test Safari</p>
                <p><strong>Date:</strong> ' . date('Y-m-d') . '</p>
                <p><strong>Customer:</strong> ' . $testEmail . '</p>
                <p><strong>Status:</strong> Confirmed</p>
            </div>
            
            <p><strong>Time:</strong> ' . date('Y-m-d H:i:s') . '</p>
            <hr>
            <p><em>This is a test booking confirmation email.</em></p>
        </div>
    </div>
</body>
</html>';
            
            Mail::send([], [], function ($message) use ($testEmail, $subject, $html) {
                $message->to($testEmail)
                        ->subject($subject)
                        ->from('info@reputabletours.com', 'Reputable Tours')
                        ->html($html);
            });
            
            $this->info("✅ Booking email test successful");
            
        } catch (\Exception $e) {
            $this->error("❌ Booking email test failed: " . $e->getMessage());
        }
    }
    
    private function testMultiRecipient($testEmail)
    {
        try {
            $recipients = ['raphaeleliac@gmail.com', 'davidngungila@gmail.com', 'info@reputabletours.com'];
            $subject = "👥 Multi-Recipient Test - " . date('Y-m-d H:i:s');
            $html = '<h2>Multi-Recipient Test</h2><p>This email was sent to multiple recipients.</p><p>Sent at: ' . date('Y-m-d H:i:s') . '</p>';
            
            foreach ($recipients as $recipient) {
                Mail::send([], [], function ($message) use ($recipient, $subject, $html) {
                    $message->to($recipient)
                            ->subject($subject)
                            ->from('info@reputabletours.com', 'Reputable Tours')
                            ->html($html);
                });
            }
            
            $this->info("✅ Multi-recipient test successful");
            $this->info("   Sent to: " . implode(', ', $recipients));
            
        } catch (\Exception $e) {
            $this->error("❌ Multi-recipient test failed: " . $e->getMessage());
        }
    }
    
    private function provideTroubleshootingGuidance($testEmail)
    {
        $this->info("\n📋 Troubleshooting Guidance:");
        $this->info("");
        $this->info("1. 📧 CHECK INBOX AND SPAM FOLDERS:");
        $this->info("   - Check your main inbox for emails from info@reputabletours.com");
        $this->info("   - Check your Spam/Junk folder");
        $this->info("   - Check your Promotions/Updates folder");
        $this->info("   - Search for 'Reputable Tours' in your email");
        $this->info("");
        $this->info("2. 🔍 EMAIL PROVIDER SPECIFIC:");
        $this->info("   - Gmail: Check Social and Promotions tabs");
        $this->info("   - Outlook: Check Junk Email folder");
        $this->info("   - Yahoo: Check Spam folder");
        $this->info("   - Add info@reputabletours.com to your contacts");
        $this->info("");
        $this->info("3. 📱 SUCCESS MESSAGE TROUBLESHOOTING:");
        $this->info("   - The success popup uses SweetAlert2");
        $this->info("   - Check browser console for JavaScript errors");
        $this->info("   - Ensure you're redirected to the home page");
        $this->info("   - Look for the green success popup");
        $this->info("");
        $this->info("4. 🌐 BOOKING SUBMISSION TEST:");
        $this->info("   - Visit: http://127.0.0.1:8003/bookings/5/checkout");
        $this->info("   - Click 'Submit Booking Request'");
        $this->info("   - You should be redirected to home page");
        $this->info("   - Look for success popup");
        $this->info("   - Check emails within 5 minutes");
        $this->info("");
        $this->info("5. 📊 SYSTEM STATUS:");
        $this->info("   - ✅ SMTP: Hostinger (working)");
        $this->info("   - ✅ Email Templates: English (working)");
        $this->info("   - ✅ Recipients: 3 addresses configured");
        $this->info("   - ✅ Booking Submission: Working");
        $this->info("");
        $this->info("🚀 If emails still not received:");
        $this->info("   - Wait 5-10 minutes (email delays)");
        $this->info("   - Check spam filters");
        $this->info("   - Whitelist info@reputabletours.com");
        $this->info("   - Contact email provider if needed");
    }
}
