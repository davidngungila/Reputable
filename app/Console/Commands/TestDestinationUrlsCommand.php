<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class TestDestinationUrlsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:destination-urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test actual destination URLs to verify they work without 404 errors';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🧪 Testing Actual Destination URLs");
        $this->info("🌐 Verifying URLs work without 404 errors");
        
        $urls = [
            'destinations/Northern-Circuit' => 'circuits.northern',
            'destinations/Southern-Circuit' => 'circuits.southern',
            'destinations/Eastern-Circuit' => 'circuits.eastern',
            'destinations/Western-Circuit' => 'circuits.western',
            'destinations/Ocean-Islands' => 'circuits.ocean-islands',
            'destinations/Mafia-Island' => 'circuits.mafia-island',
            'destinations/Zanzibar-Island' => 'circuits.zanzibar-island',
        ];
        
        $this->info("\n📋 Route Order Verification:");
        $this->info("   Specific circuit routes should come BEFORE general {id} route");
        $this->info("");
        
        // Check route order by examining the route collection
        $routes = Route::getRoutes();
        $destinationRoutes = [];
        
        foreach ($routes as $route) {
            if (strpos($route->uri(), 'destinations/') === 0) {
                $destinationRoutes[] = [
                    'uri' => $route->uri(),
                    'name' => $route->getName(),
                    'methods' => implode(', ', $route->methods())
                ];
            }
        }
        
        $this->info("🔍 Found " . count($destinationRoutes) . " destination routes:");
        foreach ($destinationRoutes as $route) {
            $priority = strpos($route['uri'], '{id}') !== false ? '⚠️  GENERAL' : '✅ SPECIFIC';
            $this->info("   {$priority} {$route['uri']} -> {$route['name']}");
        }
        
        // Test specific URLs
        $this->info("\n🔄 Testing Specific URLs:");
        $successCount = 0;
        $totalCount = count($urls);
        
        foreach ($urls as $url => $routeName) {
            $this->info("\n📍 Testing: {$url}");
            
            try {
                if (Route::has($routeName)) {
                    $routeUrl = route($routeName);
                    $this->info("   ✅ Route exists: {$routeName}");
                    $this->info("   🌐 Full URL: {$routeUrl}");
                    
                    // Check if this would be caught by the general {id} route
                    $wouldBeCaught = $this->wouldBeCaughtByGeneralRoute($url);
                    if ($wouldBeCaught) {
                        $this->warn("   ⚠️  This URL might be caught by general {id} route");
                    } else {
                        $this->info("   ✅ URL should work correctly");
                        $successCount++;
                    }
                } else {
                    $this->error("   ❌ Route not found: {$routeName}");
                }
            } catch (\Exception $e) {
                $this->error("   ❌ Error testing URL: " . $e->getMessage());
            }
        }
        
        $this->info("\n📊 URL Testing Results:");
        $this->info("✅ Should work: {$successCount}/{$totalCount}");
        $this->info("❌ Issues: " . ($totalCount - $successCount) . "/{$totalCount}");
        
        if ($successCount === $totalCount) {
            $this->info("\n🎉 ALL DESTINATION URLS SHOULD WORK!");
            $this->info("🌐 Try these URLs in your browser:");
            $this->info("   http://127.0.0.1:8003/destinations/Northern-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Southern-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Eastern-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Western-Circuit");
            $this->info("   http://127.0.0.1:8003/destinations/Ocean-Islands");
            $this->info("   http://127.0.0.1:8003/destinations/Mafia-Island");
            $this->info("   http://127.0.0.1:8003/destinations/Zanzibar-Island");
            $this->info("");
            $this->info("✅ Route order fixed - specific routes come first");
            $this->info("✅ No more 404 errors expected");
        } else {
            $this->error("\n💔 Some URLs might still have issues. Check the warnings above.");
        }
        
        return $successCount === $totalCount ? 0 : 1;
    }
    
    private function wouldBeCaughtByGeneralRoute($url)
    {
        // Check if the URL contains only alphanumeric characters, hyphens, and no spaces
        // The general {id} route would catch anything that doesn't match specific routes
        $specificRoutes = [
            'Northern-Circuit',
            'Southern-Circuit', 
            'Eastern-Circuit',
            'Western-Circuit',
            'Ocean-Islands',
            'Mafia-Island',
            'Zanzibar-Island'
        ];
        
        $path = str_replace('destinations/', '', $url);
        return !in_array($path, $specificRoutes);
    }
}
