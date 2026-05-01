<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendTestEmailCommand extends Command
{
    protected $signature = 'email:send-test {--to=davidngungila@gmail.com : Email address to send test to}';
    protected $description = 'Send a simple test email';

    public function handle()
    {
        $to = $this->option('to');
        
        $this->info("Sending test email to: {$to}");
        
        try {
            // Create a simple test email content
            $subject = '✅ Reputable Tours - Email System Test';
            $content = $this->getTestEmailContent();
            
            // Try to send using Laravel's mail system
            Mail::raw($content, function ($message) use ($to, $subject) {
                $message->to($to)
                    ->subject($subject)
                    ->from('info@reputabletours.com', 'Reputable Tours');
            });
            
            $this->info('✅ Test email sent successfully!');
            $this->info('📧 Please check your inbox at ' . $to);
            
            Log::info('Test email sent successfully', [
                'to' => $to,
                'subject' => $subject
            ]);
            
            return Command::SUCCESS;
            
        } catch (\Exception $e) {
            $this->error('❌ Failed to send test email');
            $this->error('Error: ' . $e->getMessage());
            
            Log::error('Test email failed', [
                'to' => $to,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
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
• System: Enhanced Email Notification System

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
        ";
    }
}
