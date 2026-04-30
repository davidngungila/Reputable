<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class TestUpdatedEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:updated-emails {to=davidngungila@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test all updated email templates with FeedTan CMG design';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        
        $this->info("🎨 Testing updated email templates with FeedTan CMG green design");
        $this->info("📧 Sending to: {$toEmail}");
        
        // Configure Hostinger SMTP settings
        Config::set('mail.default', 'smtp');
        Config::set('mail.mailers.smtp.transport', 'smtp');
        Config::set('mail.mailers.smtp.host', 'smtp.hostinger.com');
        Config::set('mail.mailers.smtp.port', 465);
        Config::set('mail.mailers.smtp.encryption', 'ssl');
        Config::set('mail.mailers.smtp.username', 'info@reputabletours.com');
        Config::set('mail.mailers.smtp.password', 'Rt@0326!');
        Config::set('mail.mailers.smtp.timeout', 30);
        Config::set('mail.mailers.smtp.auth_mode', 'login');
        Config::set('mail.from.address', 'info@reputabletours.com');
        Config::set('mail.from.name', 'Reputable Tours');
        
        $templates = [
            'admin_new_booking' => [
                'view' => 'emails.admin.new-booking',
                'subject' => '🎫 Admin: New Booking - FeedTan CMG Design Test',
                'data' => [
                    'title' => 'New Booking - Admin Notification',
                    'heading' => 'New Booking Received',
                    'subheading' => 'A customer has made a new booking',
                    'booking' => (object)[
                        'id' => 12345,
                        'customer_name' => 'Test Customer',
                        'customer_email' => 'test@example.com',
                        'customer_phone' => '+255 123 456 789',
                        'start_date' => (object)['format' => 'June 15, 2024'],
                        'adults' => 2,
                        'children' => 1,
                        'special_requests' => 'Vegetarian meals required',
                        'tour' => (object)[
                            'name' => 'Serengeti Safari Experience',
                            'duration_days' => 7,
                            'base_price' => 2500.00
                        ],
                        'deposit_amount' => 750.00,
                        'balance_amount' => 1750.00,
                        'total_price' => 2500.00,
                        'created_at' => (object)['format' => 'Apr 30, 2026 at 6:30 PM']
                    ],
                    'admin_url' => 'https://reputabletours.com/admin/bookings/12345',
                    'support_email' => 'info@reputabletours.com',
                    'logo_url' => 'https://reputabletours.com/logo.png'
                ]
            ],
            'admin_new_inquiry' => [
                'view' => 'emails.admin.new-inquiry',
                'subject' => '📧 Admin: New Inquiry - FeedTan CMG Design Test',
                'data' => [
                    'title' => 'New Inquiry - Admin Notification',
                    'heading' => 'New Customer Inquiry',
                    'subheading' => 'A customer has sent a new inquiry',
                    'inquiry' => (object)[
                        'id' => 67890,
                        'name' => 'David Ngungila',
                        'email' => 'davidngungila@gmail.com',
                        'phone' => '+255 123 456 789',
                        'nationality' => 'Tanzania',
                        'tour_interest' => 'Kilimanjaro Climb',
                        'travel_date' => 'July 2024',
                        'duration' => '7 days',
                        'group_size' => '4 people',
                        'message' => 'I am interested in climbing Kilimanjaro. Please provide more information about the Machame route.',
                        'created_at' => (object)['format' => 'Apr 30, 2026 at 6:30 PM']
                    ],
                    'admin_url' => 'https://reputabletours.com/admin/inquiries/67890',
                    'support_email' => 'info@reputabletours.com',
                    'logo_url' => 'https://reputabletours.com/logo.png'
                ]
            ],
            'customer_inquiry_received' => [
                'view' => 'emails.customer.inquiry-received',
                'subject' => '✅ Inquiry Received - FeedTan CMG Design Test',
                'data' => [
                    'title' => 'Inquiry Received',
                    'heading' => 'Thank You for Your Inquiry',
                    'subheading' => 'We have received your message and will respond soon',
                    'inquiry' => (object)[
                        'id' => 67890,
                        'name' => 'David Ngungila',
                        'email' => 'davidngungila@gmail.com',
                        'tour_interest' => 'Kilimanjaro Climb',
                        'travel_date' => 'July 2024'
                    ],
                    'logo_url' => 'https://reputabletours.com/logo.png'
                ]
            ]
        ];
        
        $successCount = 0;
        
        foreach ($templates as $key => $template) {
            $this->info("\n🔄 Testing: {$key}");
            
            try {
                $htmlContent = View::make($template['view'], $template['data'])->render();
                
                Mail::send([], [], function ($message) use ($toEmail, $template, $htmlContent) {
                    $message->to($toEmail)
                            ->subject($template['subject'])
                            ->from('info@reputabletours.com', 'Reputable Tours')
                            ->replyTo('info@reputabletours.com', 'Reputable Tours')
                            ->html($htmlContent);
                });
                
                $this->info("✅ {$key} sent successfully!");
                $successCount++;
                
                // Small delay between emails
                sleep(2);
                
            } catch (\Exception $e) {
                $this->error("❌ {$key} failed: " . $e->getMessage());
            }
        }
        
        $this->info("\n📊 Test Summary:");
        $this->info("✅ Successful: {$successCount}/" . count($templates));
        $this->info("❌ Failed: " . (count($templates) - $successCount) . "/" . count($templates));
        
        if ($successCount > 0) {
            $this->info("\n🎉 FeedTan CMG design templates tested successfully!");
            $this->info("📧 Check your inbox at {$toEmail}");
            $this->info("🎨 Look for the green theme with professional layout");
        } else {
            $this->error("\n💔 All template tests failed");
        }
        
        return $successCount > 0 ? 0 : 1;
    }
}
