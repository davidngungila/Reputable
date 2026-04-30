<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UpdateEmailLocationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:email-location';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update location in all email templates from Arusha to NSSF Commercial Complex, Moshi';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🔄 Updating location in all email templates");
        $this->info("📍 From: P.O.Box 7744, Arusha, Tanzania");
        $this->info("📍 To: NSSF Commercial Complex, Moshi");
        
        $emailTemplatesPath = resource_path('views/emails');
        $templatesUpdated = 0;
        
        // Find all .blade.php files in the emails directory
        $files = File::allFiles($emailTemplatesPath);
        
        foreach ($files as $file) {
            if ($file->getExtension() === 'php') {
                $filePath = $file->getPathname();
                $content = File::get($filePath);
                
                // Check if the old location exists in the file
                if (strpos($content, 'P.O.Box 7744, Arusha, Tanzania') !== false) {
                    // Create backup
                    $backupPath = $filePath . '.location.backup';
                    File::copy($filePath, $backupPath);
                    
                    // Update the location
                    $newContent = str_replace(
                        'P.O.Box 7744, Arusha, Tanzania - Your Gateway to Tanzanian Adventures',
                        'NSSF Commercial Complex, Moshi - Your Gateway to Tanzanian Adventures',
                        $content
                    );
                    
                    $newContent = str_replace(
                        'P.O.Box 7744, Arusha, Tanzania',
                        'NSSF Commercial Complex, Moshi',
                        $newContent
                    );
                    
                    File::put($filePath, $newContent);
                    
                    $relativePath = str_replace(resource_path(), '', $filePath);
                    $this->info("✅ Updated: " . ltrim($relativePath, '/\\'));
                    $templatesUpdated++;
                }
            }
        }
        
        $this->info("\n🎉 Location update completed!");
        $this->info("📊 Summary:");
        $this->info("   📁 Templates updated: {$templatesUpdated}");
        $this->info("   📍 New location: NSSF Commercial Complex, Moshi");
        $this->info("   💾 Backups created with .location.backup extension");
        
        if ($templatesUpdated > 0) {
            $this->info("\n🧪 Test the updated templates with:");
            $this->info("   php artisan test:simple-email raphaeleliac@gmail.com");
        } else {
            $this->warn("\n⚠️ No templates found with the old location");
        }
        
        return 0;
    }
}
