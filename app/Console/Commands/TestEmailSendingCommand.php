<?php

namespace App\Console\Commands;

use App\Models\Tour;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class TestEmailSendingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email-sending {to=raphaeleliac@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending for booking and inquiry notifications';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $testEmail = $this->argument('to');
        
        $this->info("🧪 Testing Email Sending for Booking and Inquiry Forms");
        $this->info("📧 Test email: {$testEmail}");
        
        // Configure Hostinger SMTP settings
        Config::set('mail.default', 'smtp');
        Config::set('mail.mailers.smtp.transport', 'smtp');
        Config::set('mail.mailers.smtp.host', 'smtp.hostinger.com');
        Config::set('mail.mailers.smtp.port', 465);
        Config::set('mail.mailers.smtp.encryption', 'ssl');
        Config::set('mail.mailers.smtp.username', 'info@reputabletours.com');
        Config::set('mail.mailers.smtp.password', 'Rt@0326!');
        Config::set('mail.mailers.smtp.timeout', 30);
        Config::set('mail.mailers.smtp.auth_mode', 'login');
        Config::set('mail.from.address', 'info@reputabletours.com');
        Config::set('mail.from.name', 'Reputable Tours');
        
        // Test 1: Booking Notification Email
        $this->info("\n🔄 Test 1: Booking Notification Email");
        $this->testBookingEmail($testEmail);
        
        // Test 2: Inquiry Notification Email
        $this->info("\n🔄 Test 2: Inquiry Notification Email");
        $this->testInquiryEmail($testEmail);
        
        $this->info("\n🎉 Email testing completed!");
        $this->info("📧 Check inboxes for:");
        $this->info("   - raphaeleliac@gmail.com (admin notifications)");
        $this->info("   - info@reputabletours.com (admin notifications)");
        $this->info("   - {$testEmail} (customer notifications)");
        
        return 0;
    }
    
    private function testBookingEmail($testEmail)
    {
        try {
            $tour = Tour::find(2);
            if (!$tour) {
                $tour = Tour::first();
            }
            
            $subject = "🎫 Test Booking Notification - BK-TEST12345";
            
            $htmlContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Booking Notification</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; background-color: #f0f4f8; font-family: "Poppins", sans-serif; color: #333; line-height: 1.6; }
        .email-container { max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0; }
        .header { background: #006400; padding: 30px 25px; text-align: center; color: white; }
        .header .title { font-size: 26px; font-weight: 700; margin-bottom: 5px; }
        .header .sub-title { font-size: 14px; opacity: 0.9; }
        .content { padding: 30px 25px; }
        .greeting { font-size: 18px; font-weight: 600; color: #2d3748; margin-bottom: 15px; }
        
        .card { background-color: #f7fafc; border: 1px solid #edf2f7; border-radius: 8px; padding: 20px; margin-bottom: 25px; border-left: 5px solid #006400; }
        .card-header { display: flex; align-items: center; margin-bottom: 15px; }
        .card-header .icon { font-size: 24px; margin-right: 12px; color: #4CAF50; }
        .card-header h4 { margin: 0; font-size: 16px; font-weight: 600; color: #2d3748; }

        .detail-item { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; }
        .detail-label { color: #6b7280; font-weight: 500; }
        .detail-value { color: #1f2937; font-weight: 600; }
        
        .signature { margin-top: 40px; font-size: 14px; color: #4a5568; }
        .footer { background-color: #006400; color: white; text-align: center; padding: 15px; font-size: 12px; letter-spacing: 0.5px; opacity: 0.8; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="title">Reputable Tours</div>
            <div class="sub-title">P.O.Box 7744, Arusha, Tanzania - Your Gateway to Tanzanian Adventures</div>
        </div>
        <div class="content">
            <p class="greeting">Habari Admin,</p>
            <p style="font-size: 14px; color: #4a5568;">Umeipokea taarifa mpya ya kuweka nafasi ya safari. Hii ni majaribio ya mfumo wa barua pepe.</p>

            <div class="card">
                <div class="card-header">
                    <span class="icon">🎫</span>
                    <h4>Test Booking - BK-TEST12345</h4>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <h3 style="color: #006400; margin-bottom: 10px;">Maelezo ya Mteja</h3>
                    <div class="detail-item">
                        <span class="detail-label">Jina:</span>
                        <span class="detail-value">Test Customer</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Barua pepe:</span>
                        <span class="detail-value">' . $testEmail . '</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Simu:</span>
                        <span class="detail-value">+255123456789</span>
                    </div>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <h3 style="color: #006400; margin-bottom: 10px;">Maelezo ya Safari</h3>
                    <div class="detail-item">
                        <span class="detail-label">Safari:</span>
                        <span class="detail-value">' . ($tour ? $tour->name : 'Test Tour') . '</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Tarehe ya Kuanza:</span>
                        <span class="detail-value">' . now()->addDays(7)->format('M d, Y') . '</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Wageni:</span>
                        <span class="detail-value">2 wazima, 1 mtoto</span>
                    </div>
                </div>
            </div>

            <p style="font-size: 14px; color: #4a5568;">Hii ni barua pepe ya majaribio kutoka kwa mfumo wa kuweka nafasi.</p>

            <div class="signature">
                <p>Asante,<br><strong>Timu ya Reputable Tours</strong></p>
                <p style="font-weight: 600; color: #006400;">Let\'s Explore Together! 🌍</p>
            </div>
        </div>
        <div class="footer">
            Reputable Tours Booking System V1.1.0.2026 - Test Email | Sent on ' . now()->format('M d, Y \a\t g:i A') . '
        </div>
    </div>
</body>
</html>';
            
            // Send to admin emails
            $adminEmails = ['raphaeleliac@gmail.com', 'info@reputabletours.com'];
            foreach ($adminEmails as $adminEmail) {
                Mail::send([], [], function ($message) use ($adminEmail, $subject, $htmlContent) {
                    $message->to($adminEmail)
                            ->subject($subject)
                            ->from('info@reputabletours.com', 'Reputable Tours')
                            ->replyTo('info@reputabletours.com', 'Reputable Tours')
                            ->html($htmlContent);
                });
                
                $this->info("✅ Booking email sent to: {$adminEmail}");
            }
            
            // Send to customer
            $customerSubject = "🎉 Your Booking Confirmation - Reputable Tours";
            $customerHtml = str_replace('Habari Admin', 'Habari Test Customer', $htmlContent);
            $customerHtml = str_replace('Umeipokea taarifa mpya ya kuweka nafasi ya safari', 'Asante kwa kuweka nafasi yako!', $customerHtml);
            
            Mail::send([], [], function ($message) use ($testEmail, $customerSubject, $customerHtml) {
                $message->to($testEmail)
                        ->subject($customerSubject)
                        ->from('info@reputabletours.com', 'Reputable Tours')
                        ->replyTo('info@reputabletours.com', 'Reputable Tours')
                        ->html($customerHtml);
            });
            
            $this->info("✅ Booking email sent to customer: {$testEmail}");
            
        } catch (\Exception $e) {
            $this->error("❌ Booking email test failed: " . $e->getMessage());
        }
    }
    
    private function testInquiryEmail($testEmail)
    {
        try {
            $subject = "📧 Test Inquiry Notification - INQ-TEST67890";
            
            $htmlContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Inquiry Notification</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; background-color: #f0f4f8; font-family: "Poppins", sans-serif; color: #333; line-height: 1.6; }
        .email-container { max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0; }
        .header { background: #006400; padding: 30px 25px; text-align: center; color: white; }
        .header .title { font-size: 26px; font-weight: 700; margin-bottom: 5px; }
        .header .sub-title { font-size: 14px; opacity: 0.9; }
        .content { padding: 30px 25px; }
        .greeting { font-size: 18px; font-weight: 600; color: #2d3748; margin-bottom: 15px; }
        
        .card { background-color: #f7fafc; border: 1px solid #edf2f7; border-radius: 8px; padding: 20px; margin-bottom: 25px; border-left: 5px solid #006400; }
        .card-header { display: flex; align-items: center; margin-bottom: 15px; }
        .card-header .icon { font-size: 24px; margin-right: 12px; color: #4CAF50; }
        .card-header h4 { margin: 0; font-size: 16px; font-weight: 600; color: #2d3748; }

        .detail-item { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; }
        .detail-label { color: #6b7280; font-weight: 500; }
        .detail-value { color: #1f2937; font-weight: 600; }
        
        .signature { margin-top: 40px; font-size: 14px; color: #4a5568; }
        .footer { background-color: #006400; color: white; text-align: center; padding: 15px; font-size: 12px; letter-spacing: 0.5px; opacity: 0.8; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="title">Reputable Tours</div>
            <div class="sub-title">P.O.Box 7744, Arusha, Tanzania - Your Gateway to Tanzanian Adventures</div>
        </div>
        <div class="content">
            <p class="greeting">Habari Admin,</p>
            <p style="font-size: 14px; color: #4a5568;">Umeipokea ombi mpya la mteja. Hii ni majaribio ya mfumo wa barua pepe.</p>

            <div class="card">
                <div class="card-header">
                    <span class="icon">📧</span>
                    <h4>Test Inquiry - INQ-TEST67890</h4>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <h3 style="color: #006400; margin-bottom: 10px;">Maelezo ya Mteja</h3>
                    <div class="detail-item">
                        <span class="detail-label">Jina:</span>
                        <span class="detail-value">Test Inquirer</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Barua pepe:</span>
                        <span class="detail-value">' . $testEmail . '</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Simu:</span>
                        <span class="detail-value">+255123456789</span>
                    </div>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <h3 style="color: #006400; margin-bottom: 10px;">Ujumbe wa Mteja</h3>
                    <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #006400;">
                        <p style="font-size: 14px; color: #4a5568; margin: 0;">Hii ni ombi la majaribio kutoka kwa mfumo wa ombi. Nina nia ya kujua zaidi kuhusu safari zenu.</p>
                    </div>
                </div>
            </div>

            <p style="font-size: 14px; color: #4a5568;">Hii ni barua pepe ya majaribio kutoka kwa mfumo wa ombi.</p>

            <div class="signature">
                <p>Asante,<br><strong>Timu ya Reputable Tours</strong></p>
                <p style="font-weight: 600; color: #006400;">Let\'s Explore Together! 🌍</p>
            </div>
        </div>
        <div class="footer">
            Reputable Tours Inquiry System V1.1.0.2026 - Test Email | Sent on ' . now()->format('M d, Y \a\t g:i A') . '
        </div>
    </div>
</body>
</html>';
            
            // Send to admin emails
            $adminEmails = ['raphaeleliac@gmail.com', 'info@reputabletours.com'];
            foreach ($adminEmails as $adminEmail) {
                Mail::send([], [], function ($message) use ($adminEmail, $subject, $htmlContent) {
                    $message->to($adminEmail)
                            ->subject($subject)
                            ->from('info@reputabletours.com', 'Reputable Tours')
                            ->replyTo('info@reputabletours.com', 'Reputable Tours')
                            ->html($htmlContent);
                });
                
                $this->info("✅ Inquiry email sent to: {$adminEmail}");
            }
            
            // Send to customer
            $customerSubject = "✅ Your Inquiry Received - Reputable Tours";
            $customerHtml = str_replace('Habari Admin', 'Habari Test Customer', $htmlContent);
            $customerHtml = str_replace('Umeipokea ombi mpya la mteja', 'Asante kwa ombi lako!', $customerHtml);
            
            Mail::send([], [], function ($message) use ($testEmail, $customerSubject, $customerHtml) {
                $message->to($testEmail)
                        ->subject($customerSubject)
                        ->from('info@reputabletours.com', 'Reputable Tours')
                        ->replyTo('info@reputabletours.com', 'Reputable Tours')
                        ->html($customerHtml);
            });
            
            $this->info("✅ Inquiry email sent to customer: {$testEmail}");
            
        } catch (\Exception $e) {
            $this->error("❌ Inquiry email test failed: " . $e->getMessage());
        }
    }
}
