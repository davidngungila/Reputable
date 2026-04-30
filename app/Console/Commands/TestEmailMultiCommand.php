<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestEmailMultiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email-multi {to=davidngungila@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending with multiple SMTP configurations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        $this->info("Testing multiple SMTP configurations for: {$toEmail}");
        
        $configurations = [
            'gmail_tls' => [
                'name' => 'Gmail TLS (587)',
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'encryption' => 'tls',
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
            ],
            'gmail_ssl' => [
                'name' => 'Gmail SSL (465)',
                'host' => 'smtp.gmail.com',
                'port' => 465,
                'encryption' => 'ssl',
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
            ],
            'outlook' => [
                'name' => 'Outlook/Hotmail (587)',
                'host' => 'smtp-mail.outlook.com',
                'port' => 587,
                'encryption' => 'tls',
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
            ],
            'yahoo' => [
                'name' => 'Yahoo Mail (587)',
                'host' => 'smtp.mail.yahoo.com',
                'port' => 587,
                'encryption' => 'tls',
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
            ],
            'mail_reputable' => [
                'name' => 'mail.reputabletours.com (465)',
                'host' => 'mail.reputabletours.com',
                'port' => 465,
                'encryption' => 'ssl',
                'username' => 'info@reputabletours.com',
                'password' => 'Rt@0326!',
            ],
        ];

        $successCount = 0;
        $totalTests = count($configurations);

        foreach ($configurations as $key => $config) {
            $this->info("\n🔄 Testing: {$config['name']}");
            
            try {
                // Configure SMTP settings
                config([
                    'mail.default' => 'smtp',
                    'mail.mailers.smtp.transport' => 'smtp',
                    'mail.mailers.smtp.host' => $config['host'],
                    'mail.mailers.smtp.port' => $config['port'],
                    'mail.mailers.smtp.encryption' => $config['encryption'],
                    'mail.mailers.smtp.username' => $config['username'],
                    'mail.mailers.smtp.password' => $config['password'],
                    'mail.mailers.smtp.timeout' => 15,
                    'mail.mailers.smtp.auth_mode' => 'login',
                    'mail.from.address' => 'info@reputabletours.com',
                    'mail.from.name' => 'Reputable Tours',
                ]);

                $subject = "Test Email - {$config['name']} - " . date('Y-m-d H:i:s');
                $body = "This is a test email sent using: {$config['name']}\n\n";
                $body .= "Configuration:\n";
                $body .= "- Host: {$config['host']}\n";
                $body .= "- Port: {$config['port']}\n";
                $body .= "- Encryption: {$config['encryption']}\n";
                $body .= "- Username: {$config['username']}\n";
                $body .= "- Sent at: " . date('Y-m-d H:i:s') . "\n\n";
                $body .= "If you receive this email, this configuration works!\n\n";
                $body .= "Best regards,\nReputable Tours Team";

                Mail::raw($body, function ($message) use ($toEmail, $subject) {
                    $message->to($toEmail)
                            ->subject($subject)
                            ->from('info@reputabletours.com', 'Reputable Tours')
                            ->replyTo('info@reputabletours.com', 'Reputable Tours');
                });
                
                $this->info("✅ SUCCESS: {$config['name']}");
                $successCount++;
                Log::info("Email sent successfully using {$config['name']} to {$toEmail}");
                
                // Wait a bit before next test
                sleep(1);
                
            } catch (\Exception $e) {
                $this->error("❌ FAILED: {$config['name']} - " . $e->getMessage());
                Log::error("Email failed using {$config['name']}: " . $e->getMessage());
            }
        }

        $this->info("\n📊 Test Summary:");
        $this->info("✅ Successful: {$successCount}/{$totalTests}");
        $this->info("❌ Failed: " . ($totalTests - $successCount) . "/{$totalTests}");
        
        if ($successCount > 0) {
            $this->info("\n🎉 At least one configuration works! Check your inbox at {$toEmail}");
        } else {
            $this->error("\n💔 No configuration worked. Check credentials and network connectivity.");
        }

        return $successCount > 0 ? 0 : 1;
    }
}
