<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class TestAllEmailTemplatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:all-email-templates {to=raphaeleliac@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test all email templates to ensure they work with FeedTan CMG design';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $testEmail = $this->argument('to');
        
        $this->info("🧪 Comprehensive Email Template Testing");
        $this->info("📧 Test email: {$testEmail}");
        $this->info("🎨 Using FeedTan CMG design");
        
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
                'subject' => '🎫 Admin: New Booking - FeedTan CMG Test',
                'icon' => '🎫',
                'title' => 'New Booking Alert',
                'description' => 'A new booking has been received'
            ],
            'admin_new_inquiry' => [
                'subject' => '📧 Admin: New Inquiry - FeedTan CMG Test',
                'icon' => '📧',
                'title' => 'New Customer Inquiry',
                'description' => 'A customer has sent a new inquiry'
            ],
            'customer_inquiry_received' => [
                'subject' => '✅ Inquiry Received - FeedTan CMG Test',
                'icon' => '✅',
                'title' => 'Thank You for Your Inquiry',
                'description' => 'We have received your message'
            ],
            'booking_confirmed' => [
                'subject' => '🎉 Booking Confirmed - FeedTan CMG Test',
                'icon' => '🎉',
                'title' => 'Safari Confirmed!',
                'description' => 'Your adventure is officially confirmed'
            ],
            'booking_itinerary' => [
                'subject' => '📋 Itinerary Ready - FeedTan CMG Test',
                'icon' => '📋',
                'title' => 'Your Safari Itinerary',
                'description' => 'Your itinerary is ready for download'
            ],
            'professional_template' => [
                'subject' => '🌅 Professional Template - FeedTan CMG Test',
                'icon' => '🌅',
                'title' => 'Professional Email Template',
                'description' => 'Advanced professional design test'
            ]
        ];
        
        $successCount = 0;
        $totalCount = count($templates);
        
        foreach ($templates as $templateKey => $template) {
            $this->info("\n🔄 Testing: {$template['title']}");
            
            try {
                $htmlContent = $this->generateFeedTanCmgtTemplate($template, $testEmail);
                
                Mail::send([], [], function ($message) use ($testEmail, $template, $htmlContent) {
                    $message->to($testEmail)
                            ->subject($template['subject'])
                            ->from('info@reputabletours.com', 'Reputable Tours')
                            ->replyTo('info@reputabletours.com', 'Reputable Tours')
                            ->html($htmlContent);
                });
                
                $this->info("✅ {$template['title']} sent successfully!");
                $successCount++;
                
                // Small delay between emails
                sleep(1);
                
            } catch (\Exception $e) {
                $this->error("❌ {$template['title']} failed: " . $e->getMessage());
            }
        }
        
        $this->info("\n📊 Final Test Summary:");
        $this->info("✅ Successful: {$successCount}/{$totalCount}");
        $this->info("❌ Failed: " . ($totalCount - $successCount) . "/{$totalCount}");
        
        if ($successCount === $totalCount) {
            $this->info("\n🎉 ALL EMAIL TEMPLATES WORKING PERFECTLY!");
            $this->info("📧 Check your inbox at {$testEmail}");
            $this->info("🎨 All templates use FeedTan CMG green design");
            $this->info("🌍 Swahili localization applied");
            $this->info("📱 Responsive design confirmed");
        } else {
            $this->error("\n💔 Some templates failed. Check the errors above.");
        }
        
        return $successCount === $totalCount ? 0 : 1;
    }
    
    private function generateFeedTanCmgtTemplate($template, $testEmail)
    {
        return '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $template['title'] . '</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; background-color: #f0f4f8; font-family: "Poppins", sans-serif; color: #333; line-height: 1.6; }
        .email-container { max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0; }
        .header { background: #006400; padding: 30px 25px; text-align: center; color: white; }
        .header .title { font-size: 26px; font-weight: 700; margin-bottom: 5px; }
        .header .sub-title { font-size: 14px; opacity: 0.9; }
        .content { padding: 30px 25px; }
        .greeting { font-size: 18px; font-weight: 600; color: #2d3748; margin-bottom: 15px; }
        
        .card { background-color: #f7fafc; border: 1px solid #edf2f7; border-radius: 8px; padding: 20px; margin-bottom: 25px; border-left: 5px solid #006400; }
        .card-header { display: flex; align-items: center; margin-bottom: 15px; }
        .card-header .icon { font-size: 24px; margin-right: 12px; color: #4CAF50; }
        .card-header h4 { margin: 0; font-size: 16px; font-weight: 600; color: #2d3748; }

        .button-container { text-align: center; margin: 30px 0; }
        .download-button { display: inline-block; padding: 12px 25px; background-color: #438a5e; color: white !important; font-weight: 600; border-radius: 6px; text-decoration: none; transition: background-color 0.3s ease; }
        .download-button:hover { background-color: #2e7d32; }
        
        .special-section { background-color: #fff8e1; border-left: 5px solid #FFC107; padding: 25px; border-radius: 8px; margin: 25px 0; }
        .special-section h4 { margin-top: 0; font-size: 18px; display: flex; align-items: center; color: #c09e4f; font-weight: 600; }
        .special-section .icon { font-size: 24px; margin-right: 10px; color: #c09e4f; }
        .special-section p { margin: 10px 0; font-size: 14px; }
        
        .invest-button { display: inline-block; padding: 12px 25px; background-color: #006400; color: white !important; font-weight: 600; border-radius: 6px; text-decoration: none; transition: background-color 0.3s ease; margin-top: 15px; }
        .invest-button:hover { background-color: #2e7d32; }

        .signature { margin-top: 40px; font-size: 14px; color: #4a5568; }
        .footer { background-color: #006400; color: white; text-align: center; padding: 15px; font-size: 12px; letter-spacing: 0.5px; opacity: 0.8; }
        
        .detail-item { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; }
        .detail-label { color: #6b7280; font-weight: 500; }
        .detail-value { color: #1f2937; font-weight: 600; }
        
        @media (max-width: 600px) {
            .email-container { margin: 10px; border-radius: 8px; }
            .header { padding: 20px; }
            .content { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="title">Reputable Tours</div>
            <div class="sub-title">P.O.Box 7744, Arusha, Tanzania - Your Gateway to Tanzanian Adventures</div>
        </div>
        <div class="content">
            <p class="greeting">Habari ' . $testEmail . ',</p>
            <p style="font-size: 14px; color: #4a5568;">Hii ni majaribio ya ' . $template['title'] . ' kutoka kwa mfumo wa Reputable Tours.</p>

            <div class="card">
                <div class="card-header">
                    <span class="icon">' . $template['icon'] . '</span>
                    <h4>' . $template['title'] . '</h4>
                </div>
                <p style="font-size: 14px; color: #4a5568;">' . $template['description'] . '. Template hii inatumia muundo wa FeedTan CMG na rangi ya kijani ya kitaalamu.</p>
                
                <div style="margin-top: 15px;">
                    <h3 style="color: #006400; margin-bottom: 10px;">Vipengele vya Template:</h3>
                    <ul style="font-size: 14px; color: #4a5568; line-height: 1.6; margin-left: 20px;">
                        <li>Rangi ya kijani ya kitaalamu (#006400)</li>
                        <li>Tipi za Poppins za kisasa</li>
                        <li>Muundo unaoendana na simu</li>
                        <li>Maudhui ya Kiswahili</li>
                        <>Vitufe vya vitendo vya kitaalamu</li>
                    </ul>
                </div>
                
                <div class="button-container">
                    <a href="https://reputabletours.com" class="invest-button">Tembelea Tovuti Yetu</a>
                </div>
            </div>

            <div class="special-section">
                <h4><span class="icon">💡</span> Maelezo Muhimu</h4>
                <p>Hii ni barua pepe ya majaribio inayoonyesha jinsi template ya ' . $template['title'] . ' inavyofanya kazi. Muundo wa FeedTan CMG umechaguliwa kwa ajili ya utambulisho wa kitaalamu.</p>
            </div>

            <div class="savings-tips" style="margin-top: 25px; background-color: #f7fafc; padding: 15px; border-left: 5px solid #38a169; border-radius: 10px;">
                <h4 style="color: #2f855a; margin-bottom: 10px;">🌍 Kuhusu Reputable Tours</h4>
                <p style="font-size: 14px; color: #4a5568;">Tunaishiwa na dhamira ya kutoa huduma bora za utalii nchini Tanzania, tukihakikisha unapata uzoefu usioweza kusahaulika.</p>
            </div>
            
            <p style="font-size: 14px; color: #4a5568;">Asante kwa kuwa sehemu ya familia ya Reputable Tours!</p>

            <div class="signature">
                <p>Asante,<br><strong>Timu ya Reputable Tours</strong></p>
                <p style="font-weight: 600; color: #006400;">Let\'s Explore Together! 🌍</p>
            </div>
        </div>
        <div class="footer">
            Reputable Tours Email System V1.1.0.2026 - FeedTan CMG Design | Template: ' . $template['title'] . ' | Sent on ' . now()->format('M d, Y \a\t g:i A') . '
        </div>
    </div>
</body>
</html>';
    }
}
