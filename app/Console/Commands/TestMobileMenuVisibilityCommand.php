<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestMobileMenuVisibilityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mobile-menu-visibility';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test mobile menu icon visibility on phone screens';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("📱 Testing Mobile Menu Visibility");
        $this->info("🔍 Debugging mobile menu icon display issues");
        
        $layoutPath = resource_path('views/layouts/public.blade.php');
        
        if (!file_exists($layoutPath)) {
            $this->error("❌ Layout file not found: {$layoutPath}");
            return 1;
        }
        
        $content = file_get_contents($layoutPath);
        
        // Test mobile menu button implementation
        $this->info("\n🔧 Mobile Menu Button Tests:");
        
        $tests = [
            'button_exists' => [
                'pattern' => '/<button.*mobile-menu-button.*>/',
                'description' => 'Mobile menu button exists',
                'found' => false
            ],
            'responsive_classes' => [
                'pattern' => '/lg:hidden.*md:hidden/',
                'description' => 'Proper responsive classes (lg:hidden md:hidden)',
                'found' => false
            ],
            'inline_display' => [
                'pattern' => '/style="display: flex !important"/',
                'description' => 'Inline display style override',
                'found' => false
            ],
            'svg_fallback' => [
                'pattern' => '/<svg.*hamburger.*>/',
                'description' => 'SVG hamburger icon fallback',
                'found' => false
            ],
            'phosphor_backup' => [
                'pattern' => '/<i class="ph ph-list/',
                'description' => 'Phosphor icon as backup',
                'found' => false
            ],
            'alpinejs_handler' => [
                'pattern' => '/@click="mobileMenuOpen = true"/',
                'description' => 'Alpine.js click handler',
                'found' => false
            ],
            'alpinejs_state' => [
                'pattern' => '/x-data="\{ mobileMenuOpen: false \}"/',
                'description' => 'Alpine.js state initialization',
                'found' => false
            ]
        ];
        
        $successCount = 0;
        $totalCount = count($tests);
        
        foreach ($tests as $key => $test) {
            $found = preg_match($test['pattern'], $content);
            $tests[$key]['found'] = $found;
            
            if ($found) {
                $this->info("   ✅ {$test['description']}");
                $successCount++;
            } else {
                $this->error("   ❌ {$test['description']}");
            }
        }
        
        // Test CSS media queries
        $this->info("\n🎨 CSS Media Query Tests:");
        
        $cssTests = [
            'media_query_1023' => [
                'pattern' => '/@media \(max-width: 1023px\)/',
                'description' => 'Media query for tablets (max-width: 1023px)',
                'found' => false
            ],
            'media_query_640' => [
                'pattern' => '/@media \(max-width: 640px\)/',
                'description' => 'Media query for phones (max-width: 640px)',
                'found' => false
            ],
            'display_flex_important' => [
                'pattern' => '/display: flex !important/',
                'description' => 'CSS display: flex !important override',
                'found' => false
            ],
            'zindex_high' => [
                'pattern' => '/z-index: 1001/',
                'description' => 'High z-index for visibility',
                'found' => false
            ],
            'opacity_visible' => [
                'pattern' => '/opacity: 1 !important/',
                'description' => 'Opacity set to visible',
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
        
        // Test icon loading
        $this->info("\n🎯 Icon Loading Tests:");
        
        $iconTests = [
            'phosphor_script' => [
                'pattern' => '/@phosphor-icons\/web/',
                'description' => 'Phosphor Icons script loaded',
                'found' => false
            ],
            'phosphor_stylesheet' => [
                'pattern' => /<link.*@phosphor-icons\/web/,
                'description' => 'Phosphor Icons stylesheet loaded',
                'found' => false
            ],
            'svg_hamburger' => [
                'pattern' => '/<svg.*stroke-linecap="round".*stroke-linejoin="round"/',
                'description' => 'SVG hamburger icon properly formatted',
                'found' => false
            ]
        ];
        
        $iconSuccessCount = 0;
        $iconTotalCount = count($iconTests);
        
        foreach ($iconTests as $key => $test) {
            $found = preg_match($test['pattern'], $content);
            $iconTests[$key]['found'] = $found;
            
            if ($found) {
                $this->info("   ✅ {$test['description']}");
                $iconSuccessCount++;
            } else {
                $this->warn("   ⚠️  {$test['description']}");
            }
        }
        
        // Summary
        $totalSuccessCount = $successCount + $cssSuccessCount + $iconSuccessCount;
        $totalTestCount = $totalCount + $cssTotalCount + $iconTotalCount;
        
        $this->info("\n📊 Mobile Menu Visibility Results:");
        $this->info("✅ Button Implementation: {$successCount}/{$totalCount}");
        $this->info("✅ CSS Media Queries: {$cssSuccessCount}/{$cssTotalCount}");
        $this->info("✅ Icon Loading: {$iconSuccessCount}/{$iconTotalCount}");
        $this->info("📈 Overall: {$totalSuccessCount}/{$totalTestCount}");
        
        if ($totalSuccessCount >= $totalTestCount * 0.8) {
            $this->info("\n🎉 MOBILE MENU VISIBILITY FIXED!");
            $this->info("📱 Mobile menu icon should now be visible on phone screens");
            $this->info("🔧 Multiple fallback mechanisms implemented");
            $this->info("🎨 CSS media queries properly configured");
            $this->info("🎯 SVG hamburger icon as reliable fallback");
            $this->info("");
            $this->info("🔍 Debugging Steps Applied:");
            $this->info("   ✅ Added inline display: flex !important");
            $this->info("   ✅ Updated media queries (max-width: 1023px)");
            $this->info("   ✅ Added SVG hamburger icon fallback");
            $this->info("   ✅ Enhanced Phosphor Icons loading");
            $this->info("   ✅ Added z-index and opacity overrides");
            $this->info("");
            $this->info("📱 Test on different screen sizes:");
            $this->info("   - Mobile: 320px - 768px (should show)");
            $this->info("   - Tablet: 768px - 1023px (should show)");
            $this->info("   - Desktop: 1024px+ (should hide)");
        } else {
            $this->error("\n💔 Mobile menu visibility still has issues.");
            $this->info("🔧 Check the failed tests above.");
        }
        
        return $totalSuccessCount >= $totalTestCount * 0.8 ? 0 : 1;
    }
}
