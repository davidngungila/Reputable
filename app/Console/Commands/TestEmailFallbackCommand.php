<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestEmailFallbackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email-fallback {to=davidngungila@gmail.com} {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending using multiple fallback methods';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        $count = $this->argument('count');
        
        $this->info("Sending {$count} test email(s) to: {$toEmail}");
        $this->info("Testing multiple fallback methods...");
        
        $methods = [
            'php_mail' => 'PHP mail() function',
            'wordpress' => 'WordPress-style SMTP',
            'sendmail' => 'Sendmail',
            'mailgun' => 'Mailgun API',
        ];
        
        $successCount = 0;
        
        foreach ($methods as $method => $description) {
            $this->info("\n🔄 Testing: {$description}");
            
            for ($i = 1; $i <= $count; $i++) {
                try {
                    $subject = "Test Email #{$i} - {$method} - " . date('Y-m-d H:i:s');
                    $body = "This is test email #{$i} sent using: {$description}\n\n";
                    $body .= "Method: {$method}\n";
                    $body .= "Sent at: " . date('Y-m-d H:i:s') . "\n";
                    $body .= "Test number: {$i} of {$count}\n";
                    $body .= "To: {$toEmail}\n\n";
                    $body .= "If you receive this email, this method works!\n\n";
                    $body .= "Best regards,\nReputable Tours Team";

                    $sent = false;
                    
                    switch ($method) {
                        case 'php_mail':
                            $sent = $this->sendViaPHPMail($toEmail, $subject, $body);
                            break;
                        case 'wordpress':
                            $sent = $this->sendViaWordPressSMTP($toEmail, $subject, $body);
                            break;
                        case 'sendmail':
                            $sent = $this->sendViaSendmail($toEmail, $subject, $body);
                            break;
                        case 'mailgun':
                            $sent = $this->sendViaMailgun($toEmail, $subject, $body);
                            break;
                    }
                    
                    if ($sent) {
                        $this->info("✅ {$method} Email #{$i} sent successfully!");
                        $successCount++;
                        Log::info("Email sent via {$method} to {$toEmail}");
                    } else {
                        $this->error("❌ {$method} Email #{$i} failed");
                    }
                    
                    // Small delay
                    sleep(1);
                    
                } catch (\Exception $e) {
                    $this->error("❌ {$method} Email #{$i} exception: " . $e->getMessage());
                    Log::error("Exception sending {$method} email: " . $e->getMessage());
                }
            }
        }

        $this->info("\n📊 Test Summary:");
        $this->info("✅ Total successful: {$successCount}/" . ($count * count($methods)));
        
        if ($successCount > 0) {
            $this->info("\n🎉 At least one method works! Check your inbox at {$toEmail}");
        } else {
            $this->error("\n💔 No method worked. You may need to:");
            $this->info("   1. Check if local mail server is running");
            $this->info("   2. Use Gmail App Password instead of regular password");
            $this->info("   3. Configure proper SMTP settings in admin panel");
            $this->info("   4. Use external email service like SendGrid/Mailgun");
        }

        return $successCount > 0 ? 0 : 1;
    }
    
    private function sendViaPHPMail($to, $subject, $body): bool
    {
        $headers = "From: Reputable Tours <info@reputabletours.com>\r\n";
        $headers .= "Reply-To: info@reputabletours.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        return mail($to, $subject, $body, $headers);
    }
    
    private function sendViaWordPressSMTP($to, $subject, $body): bool
    {
        // Try WordPress-style SMTP configuration
        $headers = "From: Reputable Tours <info@reputabletours.com>\r\n";
        $headers .= "Reply-To: info@reputabletours.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        // Try with ini_set for SMTP
        ini_set('SMTP', 'smtp.gmail.com');
        ini_set('smtp_port', '587');
        ini_set('sendmail_from', 'info@reputabletours.com');
        
        return mail($to, $subject, $body, $headers);
    }
    
    private function sendViaSendmail($to, $subject, $body): bool
    {
        // Try using sendmail directly
        $command = "echo '" . addslashes($body) . "' | mail -s '" . addslashes($subject) . "' -r info@reputabletours.com " . escapeshellarg($to);
        
        $output = [];
        $return_var = 0;
        exec($command, $output, $return_var);
        
        return $return_var === 0;
    }
    
    private function sendViaMailgun($to, $subject, $body): bool
    {
        // This would require Mailgun API key - just a placeholder
        $this->info("   (Mailgun requires API key configuration)");
        return false;
    }
}
