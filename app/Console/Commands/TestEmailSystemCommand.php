<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use App\Services\BackupEmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestEmailSystemCommand extends Command
{
    protected $signature = 'email:test {--to= : Email address to send test to}';
    protected $description = 'Test the email system including backup services';

    public function handle()
    {
        $testEmail = $this->option('to') ?: 'test@reputabletours.com';
        
        $this->info('Testing Email System...');
        $this->info('Target Email: ' . $testEmail);
        $this->newLine();

        // Test Primary Email Service
        $this->info('1. Testing Primary Email Service...');
        $primaryService = new EmailService();
        $primarySuccess = $primaryService->send(
            $testEmail,
            'Test Email - Primary Service',
            $this->getTestEmailContent('Primary Email Service Test'),
            null,
            null
        );

        if ($primarySuccess) {
            $this->info('✅ Primary email service: SUCCESS');
        } else {
            $this->error('❌ Primary email service: FAILED');
            $this->error('Error: ' . $primaryService->getLastError());
        }

        $this->newLine();

        // Test Backup SendGrid Service
        $this->info('2. Testing Backup SendGrid Service...');
        $backupService = new BackupEmailService();
        $sendGridSuccess = $backupService->send(
            $testEmail,
            'Test Email - SendGrid Backup',
            $this->getTestEmailContent('SendGrid Backup Service Test'),
            null,
            null
        );

        if ($sendGridSuccess) {
            $this->info('✅ SendGrid backup service: SUCCESS');
        } else {
            $this->error('❌ SendGrid backup service: FAILED');
        }

        $this->newLine();

        // Test Backup Mailgun Service
        $this->info('3. Testing Backup Mailgun Service...');
        $mailgunSuccess = $backupService->sendViaMailgun(
            $testEmail,
            'Test Email - Mailgun Backup',
            $this->getTestEmailContent('Mailgun Backup Service Test'),
            null,
            null
        );

        if ($mailgunSuccess) {
            $this->info('✅ Mailgun backup service: SUCCESS');
        } else {
            $this->error('❌ Mailgun backup service: FAILED');
        }

        $this->newLine();

        // Summary
        $this->info('=== EMAIL SYSTEM TEST SUMMARY ===');
        
        $successCount = 0;
        if ($primarySuccess) $successCount++;
        if ($sendGridSuccess) $successCount++;
        if ($mailgunSuccess) $successCount++;

        $this->info("Services Working: {$successCount}/3");
        
        if ($primarySuccess) {
            $this->info('✅ At least one email service is working');
            $this->info('📧 Form submissions will be sent successfully');
        } else {
            $this->error('❌ No email services are working');
            $this->error('⚠️  Form submissions will not be sent');
            $this->info('Please check your email configuration:');
            $this->info('- Primary SMTP settings in .env or admin panel');
            $this->info('- SendGrid API key (SENDGRID_API_KEY)');
            $this->info('- Mailgun API key and domain (MAILGUN_API_KEY, MAILGUN_DOMAIN)');
        }

        // Test with attachment
        $this->newLine();
        $this->info('4. Testing Email with Attachment...');
        $attachmentSuccess = $primaryService->send(
            $testEmail,
            'Test Email with Attachment',
            $this->getTestEmailContent('Attachment Test'),
            null,
            'test-attachment.txt'
        );

        if ($attachmentSuccess) {
            $this->info('✅ Email with attachment: SUCCESS');
        } else {
            $this->error('❌ Email with attachment: FAILED');
        }

        $this->newLine();
        $this->info('Email system test completed!');
        
        return $primarySuccess ? Command::SUCCESS : Command::FAILURE;
    }

    private function getTestEmailContent(string $testType): string
    {
        $timestamp = now()->format('Y-m-d H:i:s');
        
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Email System Test</title>
        </head>
        <body style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;'>
            <div style='max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);'>
                <h1 style='color: #2c3e50; text-align: center;'>📧 Email System Test</h1>
                
                <div style='background: #e8f5e8; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #27ae60;'>
                    <h3 style='color: #27ae60; margin-top: 0;'>Test Status: SUCCESS</h3>
                    <p><strong>Test Type:</strong> {$testType}</p>
                    <p><strong>Timestamp:</strong> {$timestamp}</p>
                    <p><strong>Server:</strong> " . config('app.name') . "</p>
                </div>
                
                <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                    <h3 style='color: #495057; margin-top: 0;'>What This Means</h3>
                    <p>This test email confirms that the email system is working correctly. When customers:</p>
                    <ul style='color: #6c757d;'>
                        <li>📝 Submit booking forms at <code>/bookings/create</code></li>
                        <li>💳 Make payments at <code>/bookings/{id}/checkout</code></li>
                        <li>📧 Send contact forms at <code>/contact</code></li>
                    </ul>
                    <p>They will receive immediate confirmation emails, and admins will be notified instantly.</p>
                </div>
                
                <div style='text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;'>
                    <p style='color: #6c757d; font-size: 14px;'>
                        This is an automated test from Reputable Tours Email System<br>
                        If you received this email, the system is working perfectly! 🎉
                    </p>
                </div>
            </div>
        </body>
        </html>";
    }
}
