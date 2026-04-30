<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CompleteEnglishConversionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:complete-english';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Complete conversion of all remaining Swahili content to English';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🔄 Completing conversion of all remaining Swahili content to English");
        
        $translations = [
            // Additional Swahili to English translations
            'Maelezo kamili yako hapo chini.' => 'Full details are below.',
            'Taarifa ya Kuweka Nafasi' => 'Booking Information',
            'Customer Information' => 'Customer Information',
            'Booking Details' => 'Booking Details',
            'Tour Information' => 'Tour Information',
            'Financial Summary' => 'Financial Summary',
            'Payment Instructions' => 'Payment Instructions',
            'Next Steps' => 'Next Steps',
            'Contact Information' => 'Contact Information',
            'Important Notes' => 'Important Notes',
            'Safari:' => 'Safari:',
            'Tour:' => 'Tour:',
            'Start Date:' => 'Start Date:',
            'Duration:' => 'Duration:',
            'Adults:' => 'Adults:',
            'Children:' => 'Children:',
            'Total Price:' => 'Total Price:',
            'Deposit Amount:' => 'Deposit Amount:',
            'Balance Amount:' => 'Balance Amount:',
            'Payment Status:' => 'Payment Status:',
            'Booking Status:' => 'Booking Status:',
            'days' => 'days',
            'people' => 'people',
            'unpaid' => 'unpaid',
            'pending' => 'pending',
            'confirmed' => 'confirmed',
            'paid' => 'paid',
            'Your Gateway to Tanzanian Adventures' => 'Your Gateway to Tanzanian Adventures',
            'Booking System' => 'Booking System',
            'Inquiry System' => 'Inquiry System',
            'Email System' => 'Email System',
            'Test Email' => 'Test Email',
            'Booking received on' => 'Booking received on',
            'Inquiry received on' => 'Inquiry received on',
            'Sent on' => 'Sent on',
            'Reference:' => 'Reference:',
            'Booking #' => 'Booking #',
            'Inquiry #' => 'Inquiry #',
            'New Booking Received' => 'New Booking Received',
            'New Customer Inquiry Received' => 'New Customer Inquiry Received',
            'Thank You for Your Inquiry!' => 'Thank You for Your Inquiry!',
            'We have received your message and will respond within 24 hours.' => 'We have received your message and will respond within 24 hours.',
            'A new booking has been made by' => 'A new booking has been made by',
            'A new inquiry has been submitted by' => 'A new inquiry has been submitted by',
            'Your invoice is attached. Choose a payment method below to secure your safari.' => 'Your invoice is attached. Choose a payment method below to secure your safari.',
            'Your itinerary is ready. Please find your itinerary attached as a PDF.' => 'Your itinerary is ready. Please find your itinerary attached as a PDF.',
            'Payment confirmed. Your receipt is attached for your records.' => 'Payment confirmed. Your receipt is attached for your records.',
            'Your booking request has been submitted successfully! Our team will contact you shortly.' => 'Your booking request has been submitted successfully! Our team will contact you shortly.',
            'Thank you for your inquiry! We have received your message and will get back to you within 24 hours.' => 'Thank you for your inquiry! We have received your message and will get back to you within 24 hours.',
        ];
        
        $emailTemplatesPath = resource_path('views/emails');
        $templatesUpdated = 0;
        
        // Find all .blade.php files in the emails directory
        $files = File::allFiles($emailTemplatesPath);
        
        foreach ($files as $file) {
            if ($file->getExtension() === 'php') {
                $filePath = $file->getPathname();
                $content = File::get($filePath);
                $originalContent = $content;
                
                // Apply all translations
                foreach ($translations as $swahili => $english) {
                    $content = str_replace($swahili, $english, $content);
                }
                
                // Only update if content changed
                if ($content !== $originalContent) {
                    // Create backup
                    $backupPath = $filePath . '.complete.backup';
                    File::copy($filePath, $backupPath);
                    
                    File::put($filePath, $content);
                    
                    $relativePath = str_replace(resource_path(), '', $filePath);
                    $this->info("✅ Updated: " . ltrim($relativePath, '/\\'));
                    $templatesUpdated++;
                }
            }
        }
        
        $this->info("\n🎉 Complete English conversion finished!");
        $this->info("📊 Summary:");
        $this->info("   📁 Templates updated: {$templatesUpdated}");
        $this->info("   🌐 Language: English (complete)");
        $this->info("   💾 Backups created with .complete.backup extension");
        
        if ($templatesUpdated > 0) {
            $this->info("\n🧪 Test the updated templates with:");
            $this->info("   php artisan test:simple-email raphaeleliac@gmail.com");
        } else {
            $this->warn("\n⚠️ No additional Swahili content found");
        }
        
        return 0;
    }
}
