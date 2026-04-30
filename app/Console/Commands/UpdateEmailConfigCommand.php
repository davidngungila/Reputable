<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class UpdateEmailConfigCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:email-config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update email configuration with working Hostinger settings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🔄 Updating email configuration with working Hostinger settings...");
        
        // Update Laravel config dynamically
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
        
        // Update EmailService configuration
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
        
        $this->info("\n✅ Email configuration updated successfully!");
        $this->info("\n📋 Current configuration:");
        $this->info("   - Mail Driver: smtp");
        $this->info("   - Host: smtp.hostinger.com");
        $this->info("   - Port: 465");
        $this->info("   - Encryption: ssl");
        $this->info("   - Username: info@reputabletours.com");
        $this->info("   - From: info@reputabletours.com");
        
        $this->info("\n💡 To make this permanent, update your .env file with:");
        $this->info("   MAIL_MAILER=smtp");
        $this->info("   MAIL_HOST=smtp.hostinger.com");
        $this->info("   MAIL_PORT=465");
        $this->info("   MAIL_USERNAME=info@reputabletours.com");
        $this->info("   MAIL_PASSWORD=Rt@0326!");
        $this->info("   MAIL_ENCRYPTION=ssl");
        $this->info("   MAIL_FROM_ADDRESS=info@reputabletours.com");
        $this->info("   MAIL_FROM_NAME=\"Reputable Tours\"");
        
        $this->info("\n🧪 Testing updated configuration...");
        
        // Test the updated configuration
        try {
            $testEmail = 'davidngungila@gmail.com';
            $subject = "Configuration Test - " . date('Y-m-d H:i:s');
            $body = "<h2>Email Configuration Updated Successfully!</h2>";
            $body .= "<p>The email configuration has been updated with Hostinger SMTP settings.</p>";
            $body .= "<p><strong>Settings:</strong></p>";
            $body .= "<ul>";
            $body .= "<li>Host: smtp.hostinger.com:465 (SSL)</li>";
            $body .= "<li>Username: info@reputabletours.com</li>";
            $body .= "<li>Updated at: " . date('Y-m-d H:i:s') . "</li>";
            $body .= "</ul>";
            $body .= "<p><strong>✅ If you receive this email, the configuration is working!</strong></p>";
            $body .= "<p>Best regards,<br>Reputable Tours Team</p>";
            
            $sent = $emailService->send($testEmail, $subject, $body);
            
            if ($sent) {
                $this->info("✅ Configuration test successful! Email sent to {$testEmail}");
            } else {
                $this->error("❌ Configuration test failed");
                $lastError = $emailService->getLastError();
                if ($lastError) {
                    $this->error("   Error: {$lastError}");
                }
            }
            
        } catch (\Exception $e) {
            $this->error("❌ Configuration test exception: " . $e->getMessage());
        }
        
        $this->info("\n🎉 Email configuration update completed!");
        $this->info("📧 Your contact forms and booking notifications should now work properly.");
        
        return 0;
    }
}
