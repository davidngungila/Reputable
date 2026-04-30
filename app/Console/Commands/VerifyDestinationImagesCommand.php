<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class VerifyDestinationImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:destination-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify all destination circuit pages have been updated with Cloudinary images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🔍 Verifying Destination Image Updates");
        $this->info("📸 Checking all circuit pages for Cloudinary images");
        
        $circuits = [
            'northern-circuit',
            'southern-circuit', 
            'eastern-circuit',
            'western-circuit',
            'ocean-islands',
            'mafia-island',
            'zanzibar-island'
        ];
        
        $successCount = 0;
        $totalCount = count($circuits);
        
        foreach ($circuits as $circuit) {
            $this->info("\n🔄 Verifying: {$circuit}");
            
            try {
                $viewPath = resource_path("views/circuits/{$circuit}.blade.php");
                
                if (!file_exists($viewPath)) {
                    $this->error("   ❌ View file not found");
                    continue;
                }
                
                $content = file_get_contents($viewPath);
                
                // Check for Cloudinary images
                $hasCloudinaryImages = strpos($content, 'res.cloudinary.com') !== false;
                $hasPlaceholderImages = strpos($content, 'unsplash.com') !== false;
                
                if ($hasCloudinaryImages && !$hasPlaceholderImages) {
                    $this->info("   ✅ Updated with Cloudinary images");
                    $successCount++;
                } elseif ($hasPlaceholderImages) {
                    $this->warn("   ⚠️  Still contains placeholder images");
                } else {
                    $this->warn("   ⚠️  Image status unclear");
                }
                
                // Count Cloudinary images
                preg_match_all('/https:\/\/res\.cloudinary\.com\/dqflffa1o\/image\/upload\/[^"\']*/', $content, $matches);
                $imageCount = count($matches[0]);
                $this->info("   📊 Found {$imageCount} Cloudinary images");
                
            } catch (\Exception $e) {
                $this->error("   ❌ Error verifying {$circuit}: " . $e->getMessage());
            }
        }
        
        $this->info("\n📊 Verification Results:");
        $this->info("✅ Successfully updated: {$successCount}/{$totalCount}");
        $this->info("❌ Issues found: " . ($totalCount - $successCount) . "/{$totalCount}");
        
        if ($successCount === $totalCount) {
            $this->info("\n🎉 ALL DESTINATION PAGES UPDATED!");
            $this->info("📸 All circuits now use professional Cloudinary images");
            $this->info("🖼️ No more placeholder images found");
            $this->info("🌐 Enhanced visual appeal across all destination pages");
            $this->info("");
            $this->info("📱 Ready for visitors to explore:");
            $this->info("   http://127.0.0.1:8003/destinations/Northern-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Southern-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Eastern-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Western-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Ocean-Islands");
            $this->info("   http://127.0.0.1:8003/destinations/Mafia-Island");
            $this->info("   http://127.0.0.1:8003/destinations/Zanzibar-Island");
        } else {
            $this->error("\n💔 Some destination pages still have issues.");
            $this->info("🔧 Check the warnings above for details.");
        }
        
        return $successCount === $totalCount ? 0 : 1;
    }
}
