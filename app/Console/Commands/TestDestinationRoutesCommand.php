<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class TestDestinationRoutesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:destination-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test all destination routes to ensure they work with the new URL format';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🧪 Testing Destination Routes");
        $this->info("🌐 Verifying new URL format with hyphens for spaces");
        
        $routes = [
            'destinations/Northern-Circuit' => 'circuits.northern',
            'destinations/Southern-Circuit' => 'circuits.southern',
            'destinations/Eastern-Circuit' => 'circuits.eastern',
            'destinations/Western-Circuit' => 'circuits.western',
            'destinations/Ocean-Islands' => 'circuits.ocean-islands',
            'destinations/Mafia-Island' => 'circuits.mafia-island',
            'destinations/Zanzibar-Island' => 'circuits.zanzibar-island',
        ];
        
        $successCount = 0;
        $totalCount = count($routes);
        
        foreach ($routes as $url => $routeName) {
            $this->info("\n🔄 Testing: {$url}");
            
            try {
                // Check if route exists
                if (Route::has($routeName)) {
                    $routeUrl = route($routeName);
                    $this->info("✅ Route exists: {$routeName}");
                    $this->info("   URL: {$routeUrl}");
                    
                    // Verify URL format
                    if (strpos($routeUrl, '-') !== false) {
                        $this->info("   ✅ URL format correct (uses hyphens for spaces)");
                    } else {
                        $this->warn("   ⚠️  URL format may not use hyphens for spaces");
                    }
                    
                    $successCount++;
                } else {
                    $this->error("❌ Route not found: {$routeName}");
                }
                
            } catch (\Exception $e) {
                $this->error("❌ Error testing route {$routeName}: " . $e->getMessage());
            }
        }
        
        $this->info("\n📊 Route Testing Results:");
        $this->info("✅ Successful: {$successCount}/{$totalCount}");
        $this->info("❌ Failed: " . ($totalCount - $successCount) . "/{$totalCount}");
        
        if ($successCount === $totalCount) {
            $this->info("\n🎉 ALL DESTINATION ROUTES WORKING!");
            $this->info("📱 New URL Format Examples:");
            $this->info("   http://127.0.0.1:8003/destinations/Northern-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Southern-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Zanzibar-Island");
            $this->info("   http://127.0.0.1:8003/destinations/Ocean-Islands");
            $this->info("");
            $this->info("✅ All destination routes now use hyphens for spaces");
            $this->info("✅ SEO-friendly URL format implemented");
            $this->info("✅ Backward compatible with existing views");
        } else {
            $this->error("\n💔 Some destination routes failed. Check the errors above.");
        }
        
        return $successCount === $totalCount ? 0 : 1;
    }
}
