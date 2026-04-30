<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestEmailServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email-service {to=davidngungila@gmail.com} {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending using existing EmailService';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        $count = $this->argument('count');
        
        $this->info("Sending {$count} test email(s) to: {$toEmail}");
        $this->info("Using existing EmailService configuration");
        
        $emailService = new EmailService();
        
        // Test connection first
        $this->info("\n🔍 Testing email connection...");
        $connectionTest = $emailService->testConnection();
        
        if ($connectionTest['success']) {
            $this->info("✅ Connection test successful");
        } else {
            $this->error("❌ Connection test failed: " . $connectionTest['error']);
        }
        
        // Show current configuration
        $this->info("\n📋 Current EmailService configuration:");
        $this->info("   - Host: " . ($emailService->config['host'] ?? 'Not set'));
        $this->info("   - Port: " . ($emailService->config['port'] ?? 'Not set'));
        $this->info("   - Username: " . ($emailService->config['username'] ?? 'Not set'));
        $this->info("   - Encryption: " . ($emailService->config['encryption'] ?? 'Not set'));
        $this->info("   - From Address: " . ($emailService->config['from_address'] ?? 'Not set'));
        $this->info("   - From Name: " . ($emailService->config['from_name'] ?? 'Not set'));
        
        $successCount = 0;
        
        for ($i = 1; $i <= $count; $i++) {
            try {
                $subject = "Test Email #{$i} via EmailService - " . date('Y-m-d H:i:s');
                $body = "<h2>Test Email #{$i} from Reputable Tours</h2>";
                $body .= "<p>This is test email #{$i} sent using the existing EmailService.</p>";
                $body .= "<p><strong>Details:</strong></p>";
                $body .= "<ul>";
                $body .= "<li>Sent at: " . date('Y-m-d H:i:s') . "</li>";
                $body .= "<li>Test number: {$i} of {$count}</li>";
                $body .= "<li>Using: EmailService class</li>";
                $body .= "<li>To: {$toEmail}</li>";
                $body .= "</ul>";
                $body .= "<p><strong>If you receive this email, the EmailService configuration is working correctly!</strong></p>";
                $body .= "<p>Best regards,<br>Reputable Tours Team</p>";

                $sent = $emailService->send($toEmail, $subject, $body);
                
                if ($sent) {
                    $this->info("✅ Email #{$i} sent successfully!");
                    $this->line("   To: {$toEmail}");
                    $this->line("   Subject: {$subject}");
                    $successCount++;
                    Log::info("Test email #{$i} sent successfully via EmailService to {$toEmail}");
                } else {
                    $this->error("❌ Failed to send email #{$i}");
                    $lastError = $emailService->getLastError();
                    if ($lastError) {
                        $this->error("   Error: {$lastError}");
                    }
                    Log::error("Test email #{$i} failed via EmailService: " . $lastError);
                }
                
                // Small delay between emails
                if ($i < $count) {
                    sleep(2);
                }
                
            } catch (\Exception $e) {
                $this->error("❌ Exception sending email #{$i}: " . $e->getMessage());
                Log::error("Exception sending test email #{$i}: " . $e->getMessage());
            }
        }

        $this->info("\n📧 Test Summary:");
        $this->info("✅ Successful: {$successCount}/{$count}");
        $this->info("❌ Failed: " . ($count - $successCount) . "/{$count}");
        
        if ($successCount > 0) {
            $this->info("\n🎉 EmailService works! Check your inbox at {$toEmail}");
        } else {
            $this->error("\n💔 EmailService failed. Check configuration in database.");
            $this->info("\n💡 Tip: You may need to configure email settings in the admin panel or database.");
        }

        return $successCount > 0 ? 0 : 1;
    }
}
