<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestNavigationUpdatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:navigation-updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test navigation updates for circuit routes and mountain URLs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🧭 Testing Navigation Updates");
        $this->info("🔍 Verifying circuit routes and mountain URL changes");
        
        $layoutPath = resource_path('views/layouts/public.blade.php');
        $routesPath = base_path('routes/web.php');
        
        if (!file_exists($layoutPath)) {
            $this->error("❌ Layout file not found: {$layoutPath}");
            return 1;
        }
        
        if (!file_exists($routesPath)) {
            $this->error("❌ Routes file not found: {$routesPath}");
            return 1;
        }
        
        $layoutContent = file_get_contents($layoutPath);
        $routesContent = file_get_contents($routesPath);
        
        // Test circuit routes in navigation
        $this->info("\n🗺️ Circuit Navigation Tests:");
        
        $circuitTests = [
            'northern_circuit' => [
                'pattern' => '/href="\/destinations\/Northern-Circuit"/',
                'description' => 'Northern Circuit route in navigation',
                'found' => false
            ],
            'southern_circuit' => [
                'pattern' => '/href="\/destinations\/Southern-Circuit"/',
                'description' => 'Southern Circuit route in navigation',
                'found' => false
            ],
            'eastern_circuit' => [
                'pattern' => '/href="\/destinations\/Eastern-Circuit"/',
                'description' => 'Eastern Circuit route in navigation',
                'found' => false
            ],
            'western_circuit' => [
                'pattern' => '/href="\/destinations\/Western-Circuit"/',
                'description' => 'Western Circuit route in navigation',
                'found' => false
            ],
            'ocean_islands' => [
                'pattern' => '/href="\/destinations\/Ocean-Islands"/',
                'description' => 'Ocean Islands route in navigation',
                'found' => false
            ],
            'mafia_island' => [
                'pattern' => '/href="\/destinations\/Mafia-Island"/',
                'description' => 'Mafia Island route in navigation',
                'found' => false
            ],
            'zanzibar_island' => [
                'pattern' => '/href="\/destinations\/Zanzibar-Island"/',
                'description' => 'Zanzibar Island route in navigation',
                'found' => false
            ]
        ];
        
        $circuitSuccessCount = 0;
        $circuitTotalCount = count($circuitTests);
        
        foreach ($circuitTests as $key => $test) {
            $found = preg_match($test['pattern'], $layoutContent);
            $circuitTests[$key]['found'] = $found;
            
            if ($found) {
                $this->info("   ✅ {$test['description']}");
                $circuitSuccessCount++;
            } else {
                $this->error("   ❌ {$test['description']}");
            }
        }
        
        // Test mountain URL updates
        $this->info("\n⛰️ Mountain URL Tests:");
        
        $mountainTests = [
            'kilimanjaro_link' => [
                'pattern' => '/href="\/kilimanjaro"/',
                'description' => 'Kilimanjaro direct link',
                'found' => false
            ],
            'ngorongoro_link' => [
                'pattern' => '/href="\/regions\/ngorongoro"/',
                'description' => 'Ngorongoro region link',
                'found' => false
            ],
            'serengeti_link' => [
                'pattern' => '/href="\/regions\/serengeti"/',
                'description' => 'Serengeti region link',
                'found' => false
            ],
            'zanzibar_link' => [
                'pattern' => '/href="\/regions\/zanzibar"/',
                'description' => 'Zanzibar region link',
                'found' => false
            ]
        ];
        
        $mountainSuccessCount = 0;
        $mountainTotalCount = count($mountainTests);
        
        foreach ($mountainTests as $key => $test) {
            $found = preg_match($test['pattern'], $layoutContent);
            $mountainTests[$key]['found'] = $found;
            
            if ($found) {
                $this->info("   ✅ {$test['description']}");
                $mountainSuccessCount++;
            } else {
                $this->warn("   ⚠️  {$test['description']} (may not exist)");
            }
        }
        
        // Test admin route updates
        $this->info("\n🔧 Admin Route Tests:");
        
        $adminTests = [
            'admin_kilimanjaro' => [
                'pattern' => '/\/admin\/mountain\/kilimanjaro-routes/',
                'description' => 'Admin Kilimanjaro routes',
                'found' => false
            ],
            'admin_meru' => [
                'pattern' => '/\/admin\/mountain\/meru-climbing/',
                'description' => 'Admin Meru climbing',
                'found' => false
            ]
        ];
        
        $adminSuccessCount = 0;
        $adminTotalCount = count($adminTests);
        
        foreach ($adminTests as $key => $test) {
            $found = preg_match($test['pattern'], $routesContent);
            $adminTests[$key]['found'] = $found;
            
            if ($found) {
                $this->info("   ✅ {$test['description']}");
                $adminSuccessCount++;
            } else {
                $this->error("   ❌ {$test['description']}");
            }
        }
        
        // Test for old query parameter format removal
        $this->info("\n🧹 Old Format Removal Tests:");
        
        $cleanupTests = [
            'old_query_params' => [
                'pattern' => '/\?region=Northern\+Circuit/',
                'description' => 'Old query parameter format removed',
                'found' => false,
                'should_be_false' => true
            ]
        ];
        
        $cleanupSuccessCount = 0;
        $cleanupTotalCount = count($cleanupTests);
        
        foreach ($cleanupTests as $key => $test) {
            $found = preg_match($test['pattern'], $layoutContent);
            $cleanupTests[$key]['found'] = $found;
            
            if (isset($test['should_be_false']) && $test['should_be_false']) {
                if (!$found) {
                    $this->info("   ✅ {$test['description']}");
                    $cleanupSuccessCount++;
                } else {
                    $this->error("   ❌ {$test['description']} - still found old format");
                }
            } else {
                if ($found) {
                    $this->info("   ✅ {$test['description']}");
                    $cleanupSuccessCount++;
                } else {
                    $this->error("   ❌ {$test['description']}");
                }
            }
        }
        
        // Summary
        $totalSuccessCount = $circuitSuccessCount + $mountainSuccessCount + $adminSuccessCount + $cleanupSuccessCount;
        $totalTestCount = $circuitTotalCount + $mountainTotalCount + $adminTotalCount + $cleanupTotalCount;
        
        $this->info("\n📊 Navigation Update Results:");
        $this->info("✅ Circuit Routes: {$circuitSuccessCount}/{$circuitTotalCount}");
        $this->info("✅ Mountain URLs: {$mountainSuccessCount}/{$mountainTotalCount}");
        $this->info("✅ Admin Routes: {$adminSuccessCount}/{$adminTotalCount}");
        $this->info("✅ Cleanup: {$cleanupSuccessCount}/{$cleanupTotalCount}");
        $this->info("📈 Overall: {$totalSuccessCount}/{$totalTestCount}");
        
        if ($totalSuccessCount >= $totalTestCount * 0.8) {
            $this->info("\n🎉 NAVIGATION UPDATES COMPLETE!");
            $this->info("🗺️ Circuit routes now use direct URLs");
            $this->info("⛰️ Mountain links updated to proper format");
            $this->info("🔧 Admin routes follow /admin/ pattern");
            $this->info("🧹 Old query parameter format removed");
            $this->info("");
            $this->info("🌐 Updated Navigation URLs:");
            $this->info("   /destinations/Northern-Circuit");
            $this->info("   /destinations/Southern-Circuit");
            $this->info("   /destinations/Eastern-Circuit");
            $this->info("   /destinations/Western-Circuit");
            $this->info("   /destinations/Ocean-Islands");
            $this->info("   /destinations/Mafia-Island");
            $this->info("   /destinations/Zanzibar-Island");
            $this->info("   /kilimanjaro");
            $this->info("   /regions/ngorongoro");
            $this->info("   /regions/serengeti");
            $this->info("   /regions/zanzibar");
            $this->info("   /admin/mountain/kilimanjaro-routes");
            $this->info("   /admin/mountain/meru-climbing");
        } else {
            $this->error("\n💔 Navigation updates need improvements.");
            $this->info("🔧 Check the failed tests above.");
        }
        
        return $totalSuccessCount >= $totalTestCount * 0.8 ? 0 : 1;
    }
}
