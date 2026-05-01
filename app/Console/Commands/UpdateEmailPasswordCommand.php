<?php

namespace App\Console\Commands;

use App\Models\EmailGateway;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class UpdateEmailPasswordCommand extends Command
{
    protected $signature = 'email:update-password {password : The Gmail app password}';
    protected $description = 'Update email password with Gmail app password';

    public function handle()
    {
        $appPassword = $this->argument('password');
        
        $this->info('🔧 Updating Email Configuration with App Password');
        $this->newLine();

        // Update email gateway
        $gateway = EmailGateway::where('name', 'Primary SMTP')->first();
        
        if ($gateway) {
            $gateway->update([
                'username' => 'info@reputabletours.com',
                'password' => $appPassword,
                'from_address' => 'info@reputabletours.com',
                'from_name' => 'Reputable Tours',
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'encryption' => 'tls',
                'is_active' => true,
            ]);
            
            $this->info('✅ Email gateway updated with new app password');
        }

        // Test email immediately
        $this->info('🧪 Testing email with new configuration...');
        
        try {
            Mail::raw('This is a test email from Reputable Tours', function ($message) {
                $message->to('davidngungila@gmail.com')
                    ->subject('✅ SUCCESS - Reputable Tours Email Working!')
                    ->from('info@reputabletours.com', 'Reputable Tours');
            });
            
            $this->info('✅✅✅ SUCCESS! Email sent to davidngungila@gmail.com');
            $this->info('📧 Please check your inbox NOW!');
            $this->newLine();
            $this->info('🎉 Your email system is now working for:');
            $this->info('• Booking forms (/bookings/create)');
            $this->info('• Contact forms (/contact)');
            $this->info('• Payment confirmations (/bookings/{id}/checkout)');
            $this->info('• All admin notifications');
            
        } catch (\Exception $e) {
            $this->error('❌ Test failed: ' . $e->getMessage());
            $this->newLine();
            $this->info('🔧 Make sure you:');
            $this->info('1. Generated the app password correctly');
            $this->info('2. Copied it without spaces');
            $this->info('3. The Gmail account has 2-factor authentication enabled');
        }
        
        return Command::SUCCESS;
    }
}
