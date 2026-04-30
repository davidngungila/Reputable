<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class TestSimpleEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:simple-email {to=davidngungila@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test simple FeedTan CMG email template';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        
        $this->info("🎨 Testing simple FeedTan CMG email template");
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
        
        try {
            $subject = "🎨 FeedTan CMG Design Test - " . date('Y-m-d H:i:s');
            
            $htmlBody = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedTan CMG Design Test</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; background-color: #f0f4f8; font-family: "Poppins", sans-serif; color: #333; line-height: 1.6; }
        .email-container { max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0; }
        .header { background: #006400; padding: 30px 25px; text-align: center; color: white; }
        .header .title { font-size: 26px; font-weight: 700; margin-bottom: 5px; }
        .header .sub-title { font-size: 14px; opacity: 0.9; }
        .content { padding: 30px 25px; }
        .greeting { font-size: 18px; font-weight: 600; color: #2d3748; margin-bottom: 15px; }
        
        .card { background-color: #f7fafc; border: 1px solid #edf2f7; border-radius: 8px; padding: 20px; margin-bottom: 25px; }
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
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="title">Reputable Tours</div>
            <div class="sub-title">P.O.Box 7744, Arusha, Tanzania - Your Gateway to Tanzanian Adventures</div>
        </div>
        <div class="content">
            <p class="greeting">Habari David,</p>
            <p style="font-size: 14px; color: #4a5568;">Tunatumai ujumbe huu unakufikia ukiwa na afya njema. Hii ni majaribio ya mfano mpya wa barua pepe ukitumia muundo wa FeedTan CMG.</p>

            <div class="card">
                <div class="card-header">
                    <span class="icon">🎨</span>
                    <h4>Mfano Mpya wa Muundo wa Barua Pepe</h4>
                </div>
                <p style="font-size: 14px; color: #4a5568;">Tumefanikiwa kusasisha muundo wa barua pepe zetu kuwa na rangi ya kijani (#006400) na miundo ya kitaalamu inayolingana na FeedTan CMG.</p>
                <p style="font-size: 14px; color: #4a5568;">Muundo huu unajumuisha:</p>
                <ul style="font-size: 14px; color: #4a5568; line-height: 1.6; margin-left: 20px;">
                    <li>Rangi ya kijani ya kitaalamu</li>
                    <li>Tipi za Poppins</li>
                    <li>Miundo inayofaa kwa simu</li>
                    <li>Vitufe vya vitendo vya kitaalamu</li>
                </ul>
            </div>

            <div class="savings-tips" style="margin-top: 25px; background-color: #f7fafc; padding: 15px; border-left: 5px solid #38a169; border-radius: 10px;">
                <h4 style="color: #2f855a; margin-bottom: 10px;">🎉 Ujumbe wa Mafanikio!</h4>
                <p style="font-size: 14px; color: #4a5568;">Mfano wa barua pepe umefanikiwa kutumwa kwa mafanikio! Muundo wa FeedTan CMG unaonekana vizuri na unafanya kazi kama ilivyopangwa.</p>
                <p style="font-size: 13px; color: #2f855a; font-style: italic; margin-top: 10px;">
                    "Mawasiliano mazuri ni muhimu kwa biashara yoyote." 📧
                </p>
            </div>
            
            <p style="font-size: 14px; color: #4a5568;">Asante kwa kuipitia barua pepe hii ya majaribio.</p>

            <div class="signature">
                <p>Wapendwa,<br><strong>Timu ya Reputable Tours</strong></p>
                <p style="font-weight: 600; color: #006400;">Let\'s Grow Together! 🌍</p>
            </div>
        </div>
        <div class="footer">
            Reputable Tours Email System V1.1.0.2026 - FeedTan CMG Design
        </div>
    </div>
</body>
</html>';
            
            Mail::send([], [], function ($message) use ($toEmail, $subject, $htmlBody) {
                $message->to($toEmail)
                        ->subject($subject)
                        ->from('info@reputabletours.com', 'Reputable Tours')
                        ->replyTo('info@reputabletours.com', 'Reputable Tours')
                        ->html($htmlBody);
            });
            
            $this->info("✅ FeedTan CMG design email sent successfully!");
            $this->info("📧 Check your inbox at {$toEmail}");
            $this->info("🎨 Look for the green theme with professional layout");
            
            return 0;
            
        } catch (\Exception $e) {
            $this->error("❌ Failed to send email: " . $e->getMessage());
            return 1;
        }
    }
}
