<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email {to=davidngungila@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending with specified credentials';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        
        $this->info("Attempting to send test email to: {$toEmail}");
        $this->info("Using credentials: info@reputabletours.com");
        
        try {
            // Configure mail settings dynamically
            config([
                'mail.mailers.smtp.transport' => 'smtp',
                'mail.mailers.smtp.host' => 'smtp.gmail.com',
                'mail.mailers.smtp.port' => 587,
                'mail.mailers.smtp.encryption' => 'tls',
                'mail.mailers.smtp.username' => 'info@reputabletours.com',
                'mail.mailers.smtp.password' => 'Rt@0326!',
                'mail.mailers.smtp.timeout' => null,
                'mail.mailers.smtp.auth_mode' => null,
                'mail.from.address' => 'info@reputabletours.com',
                'mail.from.name' => 'Reputable Tours',
            ]);

            // Create test email
            $subject = 'Test Email from Reputable Tours - ' . date('Y-m-d H:i:s');
            $body = "This is a test email sent from Reputable Tours website.\n\n";
            $body .= "Sent at: " . date('Y-m-d H:i:s') . "\n";
            $body .= "From: info@reputabletours.com\n";
            $body .= "To: {$toEmail}\n\n";
            $body .= "If you receive this email, the email configuration is working correctly!\n\n";
            $body .= "Best regards,\nReputable Tours Team";

            // Send email using raw mail
            $headers = "From: Reputable Tours <info@reputabletours.com>\r\n";
            $headers .= "Reply-To: info@reputabletours.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            // Try using PHP mail first
            $mailSent = mail($toEmail, $subject, $body, $headers);
            
            if ($mailSent) {
                $this->info("✅ Email sent successfully using PHP mail function!");
                $this->info("To: {$toEmail}");
                $this->info("Subject: {$subject}");
                Log::info("Test email sent successfully to {$toEmail}");
            } else {
                $this->error("❌ PHP mail function failed. Trying Laravel Mail...");
                
                // Try Laravel Mail as fallback
                Mail::raw($body, function ($message) use ($toEmail, $subject) {
                    $message->to($toEmail)
                            ->subject($subject)
                            ->from('info@reputabletours.com', 'Reputable Tours');
                });
                
                $this->info("✅ Email sent successfully using Laravel Mail!");
                Log::info("Test email sent via Laravel Mail to {$toEmail}");
            }

        } catch (\Exception $e) {
            $this->error("❌ Failed to send email: " . $e->getMessage());
            $this->error("Error details: " . $e->getTraceAsString());
            Log::error("Test email failed: " . $e->getMessage());
            
            // Try alternative SMTP configuration
            $this->info("\n🔄 Trying alternative SMTP configuration...");
            try {
                config([
                    'mail.mailers.smtp.host' => 'mail.reputabletours.com',
                    'mail.mailers.smtp.port' => 465,
                    'mail.mailers.smtp.encryption' => 'ssl',
                ]);

                Mail::raw($body, function ($message) use ($toEmail, $subject) {
                    $message->to($toEmail)
                            ->subject($subject . " (Alternative SMTP)")
                            ->from('info@reputabletours.com', 'Reputable Tours');
                });
                
                $this->info("✅ Email sent successfully using alternative SMTP!");
                Log::info("Test email sent via alternative SMTP to {$toEmail}");
                
            } catch (\Exception $e2) {
                $this->error("❌ Alternative SMTP also failed: " . $e2->getMessage());
                Log::error("Alternative SMTP failed: " . $e2->getMessage());
            }
        }

        $this->info("\n📧 Test completed. Check your inbox at {$toEmail}");
        return 0;
    }
}
