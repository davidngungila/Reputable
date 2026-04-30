<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class TestEmailHostingerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email-hostinger {to=davidngungila@gmail.com} {count=1} {password=Rt@0326!}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending using Hostinger SMTP configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        $count = $this->argument('count');
        $password = $this->argument('password');
        
        $this->info("Sending {$count} test email(s) to: {$toEmail}");
        $this->info("Using Hostinger SMTP configuration");
        $this->info("Email: info@reputabletours.com");
        
        // Test both SSL (465) and TLS (587) configurations
        $configurations = [
            'ssl' => [
                'name' => 'Hostinger SSL (465)',
                'host' => 'smtp.hostinger.com',
                'port' => 465,
                'encryption' => 'ssl',
            ],
            'tls' => [
                'name' => 'Hostinger TLS (587)',
                'host' => 'smtp.hostinger.com',
                'port' => 587,
                'encryption' => 'tls',
            ],
        ];

        $totalSuccess = 0;

        foreach ($configurations as $key => $config) {
            $this->info("\n🔄 Testing: {$config['name']}");
            
            // Configure Hostinger SMTP settings
            Config::set('mail.default', 'smtp');
            Config::set('mail.mailers.smtp.transport', 'smtp');
            Config::set('mail.mailers.smtp.host', $config['host']);
            Config::set('mail.mailers.smtp.port', $config['port']);
            Config::set('mail.mailers.smtp.encryption', $config['encryption']);
            Config::set('mail.mailers.smtp.username', 'info@reputabletours.com');
            Config::set('mail.mailers.smtp.password', $password);
            Config::set('mail.mailers.smtp.timeout', 30);
            Config::set('mail.mailers.smtp.auth_mode', 'login');
            Config::set('mail.from.address', 'info@reputabletours.com');
            Config::set('mail.from.name', 'Reputable Tours');

            for ($i = 1; $i <= $count; $i++) {
                try {
                    $subject = "Test Email #{$i} - {$config['name']} - " . date('Y-m-d H:i:s');
                    $body = "<h2>Test Email #{$i} from Reputable Tours</h2>";
                    $body .= "<p>This is test email #{$i} sent using <strong>{$config['name']}</strong>.</p>";
                    $body .= "<p><strong>Configuration Details:</strong></p>";
                    $body .= "<ul>";
                    $body .= "<li>Host: {$config['host']}</li>";
                    $body .= "<li>Port: {$config['port']}</li>";
                    $body .= "<li>Encryption: {$config['encryption']}</li>";
                    $body .= "<li>Username: info@reputabletours.com</li>";
                    $body .= "<li>Sent at: " . date('Y-m-d H:i:s') . "</li>";
                    $body .= "<li>Test number: {$i} of {$count}</li>";
                    $body .= "</ul>";
                    $body .= "<p><strong>✅ If you receive this email, the {$config['name']} configuration is working correctly!</strong></p>";
                    $body .= "<p>Best regards,<br>Reputable Tours Team</p>";

                    Mail::send([], [], function ($message) use ($toEmail, $subject, $body) {
                        $message->to($toEmail)
                                ->subject($subject)
                                ->from('info@reputabletours.com', 'Reputable Tours')
                                ->replyTo('info@reputabletours.com', 'Reputable Tours')
                                ->html($body);
                    });
                    
                    $this->info("✅ {$config['name']} Email #{$i} sent successfully!");
                    $this->line("   To: {$toEmail}");
                    $this->line("   Subject: {$subject}");
                    $totalSuccess++;
                    Log::info("Test email sent via {$config['name']} to {$toEmail}");
                    
                    // Small delay between emails
                    if ($i < $count) {
                        sleep(2);
                    }
                    
                } catch (\Exception $e) {
                    $this->error("❌ {$config['name']} Email #{$i} failed: " . $e->getMessage());
                    Log::error("Test email failed via {$config['name']}: " . $e->getMessage());
                }
            }
        }

        $this->info("\n📊 Final Test Summary:");
        $this->info("✅ Total successful: {$totalSuccess}/" . ($count * count($configurations)));
        $this->info("❌ Total failed: " . (($count * count($configurations)) - $totalSuccess) . "/" . ($count * count($configurations)));
        
        if ($totalSuccess > 0) {
            $this->info("\n🎉 SUCCESS! Hostinger SMTP works!");
            $this->info("📧 Check your inbox at {$toEmail}");
            $this->info("💡 Update your .env file with the working configuration:");
            $this->info("   MAIL_MAILER=smtp");
            $this->info("   MAIL_HOST=smtp.hostinger.com");
            $this->info("   MAIL_PORT=465 (or 587 for TLS)");
            $this->info("   MAIL_USERNAME=info@reputabletours.com");
            $this->info("   MAIL_PASSWORD=Rt@0326!");
            $this->info("   MAIL_ENCRYPTION=ssl (or tls)");
            $this->info("   MAIL_FROM_ADDRESS=info@reputabletours.com");
            $this->info("   MAIL_FROM_NAME=\"Reputable Tours\"");
        } else {
            $this->error("\n💔 Both configurations failed. Check:");
            $this->info("   1. Email password is correct");
            $this->info("   2. No firewall blocking SMTP ports");
            $this->info("   3. Hostinger account allows SMTP access");
        }

        return $totalSuccess > 0 ? 0 : 1;
    }
}
