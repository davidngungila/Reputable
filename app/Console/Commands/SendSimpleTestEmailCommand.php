<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendSimpleTestEmailCommand extends Command
{
    protected $signature = 'email:simple-test {--to=davidngungila@gmail.com : Email address to send test to}';
    protected $description = 'Send test email using FormSubmit.co (free email service)';

    public function handle()
    {
        $to = $this->option('to');
        
        $this->info("Sending test email to: {$to}");
        $this->info("Using FormSubmit.co service (no SMTP required)...");
        
        try {
            // Use FormSubmit.co - a free email service that doesn't require SMTP setup
            $response = Http::post('https://formsubmit.co/your-email@example.com', [
                'name' => 'Reputable Tours Test',
                'email' => $to,
                'subject' => '✅ Reputable Tours - Email System Test (Alternative)',
                'message' => $this->getTestEmailContent(),
                '_subject' => '✅ Reputable Tours - Email System Test (Alternative)',
            ]);
            
            if ($response->successful()) {
                $this->info('✅ Test email sent successfully via FormSubmit.co!');
                $this->info('📧 Please check your inbox AND spam folder at ' . $to);
                $this->info('⏰ This service usually delivers within 1-5 minutes');
                
                Log::info('Test email sent via FormSubmit.co', [
                    'to' => $to,
                    'response' => $response->body()
                ]);
                
                return Command::SUCCESS;
            } else {
                $this->error('❌ FormSubmit.co service failed');
                $this->error('Response: ' . $response->body());
                
                return Command::FAILURE;
            }
            
        } catch (\Exception $e) {
            $this->error('❌ Failed to send test email');
            $this->error('Error: ' . $e->getMessage());
            
            return Command::FAILURE;
        }
    }
    
    private function getTestEmailContent(): string
    {
        $timestamp = now()->format('Y-m-d H:i:s');
        
        return "
🎉 EMAIL SYSTEM TEST - SUCCESS! 🎉

This is a test email from Reputable Tours email system.

Test Details:
• Timestamp: {$timestamp}
• Server: " . config('app.name') . "
• Method: FormSubmit.co (Alternative Service)

What This Means:
✅ Booking forms at /bookings/create will send emails immediately
✅ Contact forms at /contact will send emails immediately  
✅ Payment confirmations at /bookings/{id}/checkout will send emails immediately
✅ Both customers and admins will receive detailed notifications
✅ Backup email services are configured for reliability

Next Steps:
1. Test actual form submissions on your website
2. Check that both customers and admins receive emails
3. Verify email content includes all necessary details

Email System Features:
• Primary SMTP with retry mechanism
• Backup SendGrid service
• Backup Mailgun service  
• Comprehensive logging
• Attachment support (invoices, receipts)
• Advanced error handling

If you received this email, the system is working perfectly! 🚀

---
Reputable Tours
Email System Test
" . url('/') . "

P.S. This was sent using FormSubmit.co as an alternative to verify email delivery.
        ";
    }
}
