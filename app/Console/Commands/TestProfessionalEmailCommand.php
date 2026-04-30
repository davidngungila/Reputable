<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class TestProfessionalEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:professional-email {to=davidngungila@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test sending advanced professional email template';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        
        $this->info("🎨 Testing advanced professional email template");
        $this->info("📧 Sending to: {$toEmail}");
        $this->info("🌅 Template features logo colors and sunset design");
        
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
        
        try {
            // Prepare email data
            $emailData = [
                'name' => 'David',
                'ctaUrl' => 'https://reputabletours.com',
                'subject' => '🌅 Advanced Professional Email Template - Reputable Tours'
            ];
            
            // Render the professional email template
            $htmlContent = View::make('emails.professional.test-email', $emailData)->render();
            
            $this->info("\n📋 Email Details:");
            $this->info("   - Template: Professional Design");
            $this->info("   - Colors: Sunset gradient (orange, yellow, red)");
            $this->info("   - Features: Logo-inspired design, responsive layout");
            $this->info("   - Sections: Header, content, features, footer");
            
            // Send the email
            Mail::send([], [], function ($message) use ($toEmail, $emailData, $htmlContent) {
                $message->to($toEmail)
                        ->subject($emailData['subject'])
                        ->from('info@reputabletours.com', 'Reputable Tours')
                        ->replyTo('info@reputabletours.com', 'Reputable Tours')
                        ->html($htmlContent);
            });
            
            $this->info("\n✅ Professional email sent successfully!");
            $this->info("📧 Check your inbox at {$toEmail}");
            $this->info("🎨 Look for the sunset gradient header matching your logo");
            
            // Also test with EmailService
            $this->info("\n🔄 Testing with EmailService...");
            
            $emailService = new EmailService();
            $emailService->updateConfig([
                'host' => 'smtp.hostinger.com',
                'port' => 465,
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
                'encryption' => 'ssl',
                'from_address' => 'info@reputabletours.com',
                'from_name' => 'Reputable Tours',
            ]);
            
            $subject2 = "🌅 EmailService Test - Professional Template";
            $htmlContent2 = View::make('emails.professional.test-email', [
                'name' => 'David',
                'ctaUrl' => 'https://reputabletours.com',
                'subject' => $subject2
            ])->render();
            
            $sent2 = $emailService->send($toEmail, $subject2, $htmlContent2);
            
            if ($sent2) {
                $this->info("✅ EmailService test also successful!");
                $this->info("📊 Total emails sent: 2");
            } else {
                $this->error("❌ EmailService test failed");
                $lastError = $emailService->getLastError();
                if ($lastError) {
                    $this->error("   Error: {$lastError}");
                }
            }
            
            $this->info("\n🎉 Professional email template test completed!");
            $this->info("💡 Template features:");
            $this->info("   - Sunset gradient header matching logo colors");
            $this->info("   - Professional typography and spacing");
            $this->info("   - Responsive design for all devices");
            $this->info("   - Interactive elements and hover effects");
            $this->info("   - Complete footer with contact information");
            
            return 0;
            
        } catch (\Exception $e) {
            $this->error("❌ Failed to send professional email: " . $e->getMessage());
            return 1;
        }
    }
}
