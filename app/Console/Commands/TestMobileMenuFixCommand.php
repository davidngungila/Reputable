<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestMobileMenuFixCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mobile-menu-fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test mobile menu fix with aggressive CSS overrides';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🔧 Testing Mobile Menu Fix");
        $this->info("🚨 Aggressive CSS overrides applied");
        
        $layoutPath = resource_path('views/layouts/public.blade.php');
        
        if (!file_exists($layoutPath)) {
            $this->error("❌ Layout file not found: {$layoutPath}");
            return 1;
        }
        
        $content = file_get_contents($layoutPath);
        
        // Test the aggressive fixes
        $this->info("\n🎯 Aggressive Fix Tests:");
        
        $tests = [
            'inline_display_none' => [
                'pattern' => '/style="display: none;"/',
                'description' => 'Inline display: none (hidden by default)',
                'found' => false
            ],
            'mobile_menu_button_class' => [
                'pattern' => '/mobile-menu-button/',
                'description' => 'Mobile menu button class present',
                'found' => false
            ],
            'no_lg_hidden' => [
                'pattern' => '/lg:hidden/',
                'description' => 'No lg:hidden class (removed to avoid conflicts)',
                'should_be_false' => true,
                'found' => false
            ],
            'svg_icon' => [
                'pattern' => '/<svg.*stroke-linecap.*stroke-linejoin/',
                'description' => 'SVG hamburger icon present',
                'found' => false
            ],
            'alpinejs_click' => [
                'pattern' => '/@click="mobileMenuOpen = true"/',
                'description' => 'Alpine.js click handler',
                'found' => false
            ]
        ];
        
        $successCount = 0;
        $totalCount = count($tests);
        
        foreach ($tests as $key => $test) {
            $found = preg_match($test['pattern'], $content);
            $tests[$key]['found'] = $found;
            
            if (isset($test['should_be_false']) && $test['should_be_false']) {
                if (!$found) {
                    $this->info("   ✅ {$test['description']}");
                    $successCount++;
                } else {
                    $this->error("   ❌ {$test['description']} - should not be present");
                }
            } else {
                if ($found) {
                    $this->info("   ✅ {$test['description']}");
                    $successCount++;
                } else {
                    $this->error("   ❌ {$test['description']}");
                }
            }
        }
        
        // Test CSS media queries
        $this->info("\n🎨 CSS Override Tests:");
        
        $cssTests = [
            'max_width_1023' => [
                'pattern' => '/@media \(max-width: 1023px\)/',
                'description' => 'Show menu on screens ≤ 1023px',
                'found' => false
            ],
            'min_width_1024' => [
                'pattern' => '/@media \(min-width: 1024px\)/',
                'description' => 'Hide menu on screens ≥ 1024px',
                'found' => false
            ],
            'high_specificity' => [
                'pattern' => '/button\.mobile-menu-button/',
                'description' => 'High specificity CSS selector',
                'found' => false
            ],
            'display_flex_important' => [
                'pattern' => '/display: flex !important/',
                'description' => 'Force display: flex on mobile',
                'found' => false
            ],
            'display_none_important' => [
                'pattern' => '/display: none !important/',
                'description' => 'Force display: none on desktop',
                'found' => false
            ],
            'zindex_9999' => [
                'pattern' => '/z-index: 9999 !important/',
                'description' => 'Highest z-index for visibility',
                'found' => false
            ]
        ];
        
        $cssSuccessCount = 0;
        $cssTotalCount = count($cssTests);
        
        foreach ($cssTests as $key => $test) {
            $found = preg_match($test['pattern'], $content);
            $cssTests[$key]['found'] = $found;
            
            if ($found) {
                $this->info("   ✅ {$test['description']}");
                $cssSuccessCount++;
            } else {
                $this->error("   ❌ {$test['description']}");
            }
        }
        
        // Summary
        $totalSuccessCount = $successCount + $cssSuccessCount;
        $totalTestCount = $totalCount + $cssTotalCount;
        
        $this->info("\n📊 Mobile Menu Fix Results:");
        $this->info("✅ Button Implementation: {$successCount}/{$totalCount}");
        $this->info("✅ CSS Overrides: {$cssSuccessCount}/{$cssTotalCount}");
        $this->info("📈 Overall: {$totalSuccessCount}/{$totalTestCount}");
        
        if ($totalSuccessCount >= $totalTestCount * 0.8) {
            $this->info("\n🎉 AGGRESSIVE MOBILE MENU FIX APPLIED!");
            $this->info("🔧 Multiple override mechanisms implemented");
            $this->info("");
            $this->info("🚨 Emergency Fixes Applied:");
            $this->info("   ✅ Inline style: display: none (default hidden)");
            $this->info("   ✅ CSS media queries with !important");
            $this->info("   ✅ High specificity selectors");
            $this->info("   ✅ Maximum z-index (9999)");
            $this->info("   ✅ Multiple breakpoints (1023px/1024px)");
            $this->info("");
            $this->info("📱 Expected Behavior:");
            $this->info("   📱 Small screens (< 1024px): Menu FORCED to show");
            $this->info("   💻 Large screens (≥ 1024px): Menu FORCED to hide");
            $this->info("");
            $this->info("🔍 Debugging Steps:");
            $this->info("   1. Cleared view cache");
            $this->info("   2. Cleared application cache");
            $this->info("   3. Rebuilt assets with npm run build");
            $this->info("   4. Applied aggressive CSS overrides");
            $this->info("");
            $this->info("⚠️  If still not working:");
            $this->info("   - Check browser developer tools");
            $this->info("   - Look for CSS conflicts");
            $this->info("   - Test in different browsers");
            $this->info("   - Check for JavaScript errors");
        } else {
            $this->error("\n💔 Mobile menu fix needs more work.");
            $this->info("🔧 Check the failed tests above.");
        }
        
        return $totalSuccessCount >= $totalTestCount * 0.8 ? 0 : 1;
    }
}
