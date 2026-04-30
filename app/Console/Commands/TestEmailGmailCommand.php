<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestEmailGmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email-gmail {to=davidngungila@gmail.com} {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending with Gmail SMTP configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        $count = $this->argument('count');
        
        $this->info("Sending {$count} test email(s) to: {$toEmail}");
        $this->info("Using credentials: info@reputabletours.com");
        $this->info("SMTP: smtp.gmail.com:587 (TLS)");
        
        // Configure Gmail SMTP settings
        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.transport' => 'smtp',
            'mail.mailers.smtp.host' => 'smtp.gmail.com',
            'mail.mailers.smtp.port' => 587,
            'mail.mailers.smtp.encryption' => 'tls',
            'mail.mailers.smtp.username' => 'info@reputabletours.com',
            'mail.mailers.smtp.password' => 'Rt@0326!',
            'mail.mailers.smtp.timeout' => 30,
            'mail.mailers.smtp.auth_mode' => 'login',
            'mail.from.address' => 'info@reputabletours.com',
            'mail.from.name' => 'Reputable Tours',
        ]);

        for ($i = 1; $i <= $count; $i++) {
            try {
                $subject = "Test Email #{$i} from Reputable Tours - " . date('Y-m-d H:i:s');
                $body = "This is test email #{$i} sent from Reputable Tours website.\n\n";
                $body .= "Sent at: " . date('Y-m-d H:i:s') . "\n";
                $body .= "Test number: {$i} of {$count}\n";
                $body .= "From: info@reputabletours.com\n";
                $body .= "To: {$toEmail}\n";
                $body .= "SMTP: smtp.gmail.com:587 (TLS)\n\n";
                $body .= "If you receive this email, the email configuration is working correctly!\n\n";
                $body .= "Best regards,\nReputable Tours Team";

                Mail::raw($body, function ($message) use ($toEmail, $subject) {
                    $message->to($toEmail)
                            ->subject($subject)
                            ->from('info@reputabletours.com', 'Reputable Tours')
                            ->replyTo('info@reputabletours.com', 'Reputable Tours');
                });
                
                $this->info("✅ Email #{$i} sent successfully!");
                $this->line("   To: {$toEmail}");
                $this->line("   Subject: {$subject}");
                
                Log::info("Test email #{$i} sent successfully to {$toEmail}");
                
                // Small delay between emails
                if ($i < $count) {
                    sleep(2);
                }
                
            } catch (\Exception $e) {
                $this->error("❌ Failed to send email #{$i}: " . $e->getMessage());
                Log::error("Test email #{$i} failed: " . $e->getMessage());
            }
        }

        $this->info("\n📧 Test completed. Check your inbox at {$toEmail}");
        $this->info("📊 Sent {$count} email(s) successfully");
        return 0;
    }
}
