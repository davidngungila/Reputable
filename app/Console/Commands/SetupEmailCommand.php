<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SetupEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:email {test?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup email configuration with provided credentials';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Setting up email configuration...");
        $this->info("Email: info@reputabletours.com");
        $this->info("Password: Rt@0326!");
        
        // Create EmailService with provided credentials
        $emailService = new EmailService();
        
        // Update configuration with provided credentials
        $emailService->updateConfig([
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'username' => 'info@reputabletours.com',
            'password' => 'Rt@0326!',
            'encryption' => 'tls',
            'from_address' => 'info@reputabletours.com',
            'from_name' => 'Reputable Tours',
        ]);
        
        $this->info("\n📋 Updated EmailService configuration:");
        $this->info("   - Host: " . $emailService->config['host']);
        $this->info("   - Port: " . $emailService->config['port']);
        $this->info("   - Username: " . $emailService->config['username']);
        $this->info("   - Encryption: " . $emailService->config['encryption']);
        $this->info("   - From Address: " . $emailService->config['from_address']);
        $this->info("   - From Name: " . $emailService->config['from_name']);
        
        // Test connection
        $this->info("\n🔍 Testing connection...");
        $connectionTest = $emailService->testConnection();
        
        if ($connectionTest['success']) {
            $this->info("✅ Connection test successful");
        } else {
            $this->error("❌ Connection test failed: " . $connectionTest['error']);
        }
        
        // Test email if requested
        $testEmail = $this->argument('test');
        if ($testEmail) {
            $this->info("\n📧 Sending test email to {$testEmail}...");
            
            $subject = "Test Email - EmailService Setup - " . date('Y-m-d H:i:s');
            $body = "<h2>Test Email from Reputable Tours</h2>";
            $body .= "<p>This is a test email sent using the EmailService with your provided credentials.</p>";
            $body .= "<p><strong>Configuration:</strong></p>";
            $body .= "<ul>";
            $body .= "<li>Host: " . $emailService->config['host'] . "</li>";
            $body .= "<li>Port: " . $emailService->config['port'] . "</li>";
            $body .= "<li>Username: " . $emailService->config['username'] . "</li>";
            $body .= "<li>Encryption: " . $emailService->config['encryption'] . "</li>";
            $body .= "<li>Sent at: " . date('Y-m-d H:i:s') . "</li>";
            $body .= "</ul>";
            $body .= "<p><strong>If you receive this email, the setup is working correctly!</strong></p>";
            $body .= "<p>Best regards,<br>Reputable Tours Team</p>";
            
            $sent = $emailService->send($testEmail, $subject, $body);
            
            if ($sent) {
                $this->info("✅ Test email sent successfully to {$testEmail}!");
                Log::info("Setup test email sent successfully to {$testEmail}");
            } else {
                $this->error("❌ Failed to send test email to {$testEmail}");
                $lastError = $emailService->getLastError();
                if ($lastError) {
                    $this->error("   Error: {$lastError}");
                }
                Log::error("Setup test email failed: " . $lastError);
            }
        }
        
        $this->info("\n✅ Email configuration setup completed!");
        $this->info("💡 You can now use: php artisan test:email-service davidngungila@gmail.com");
        
        return 0;
    }
}
