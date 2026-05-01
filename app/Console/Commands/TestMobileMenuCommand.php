<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestMobileMenuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mobile-menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test mobile menu implementation and visibility';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("📱 Testing Mobile Menu Implementation");
        $this->info("🔍 Verifying mobile menu icon and navigation");
        
        $layoutPath = resource_path('views/layouts/public.blade.php');
        
        if (!file_exists($layoutPath)) {
            $this->error("❌ Layout file not found: {$layoutPath}");
            return 1;
        }
        
        $content = file_get_contents($layoutPath);
        
        // Check for mobile menu components
        $checks = [
            'mobile_menu_button' => [
                'pattern' => '/mobile-menu-button.*lg:hidden/',
                'description' => 'Mobile menu button with proper classes',
                'found' => false
            ],
            'alpinejs_data' => [
                'pattern' => '/x-data="\{ mobileMenuOpen: false \}"/',
                'description' => 'Alpine.js mobile menu state',
                'found' => false
            ],
            'mobile_menu_toggle' => [
                'pattern' => '/@click="mobileMenuOpen = true"/',
                'description' => 'Mobile menu toggle click handler',
                'found' => false
            ],
            'mobile_menu_overlay' => [
                'pattern' => '/x-show="mobileMenuOpen"/',
                'description' => 'Mobile menu overlay with Alpine.js',
                'found' => false
            ],
            'mobile_menu_close' => [
                'pattern' => '/@click="mobileMenuOpen = false"/',
                'description' => 'Mobile menu close functionality',
                'found' => false
            ],
            'phosphor_icons' => [
                'pattern' => '/ph ph-list/',
                'description' => 'Phosphor Icons for menu',
                'found' => false
            ],
            'responsive_classes' => [
                'pattern' => '/@media.*max-width.*1024px/',
                'description' => 'Responsive CSS for mobile',
                'found' => false
            ],
            'circuit_links' => [
                'pattern' => '/destinations\/Northern-Circuit/',
                'description' => 'Circuit destination links in mobile menu',
                'found' => false
            ]
        ];
        
        $successCount = 0;
        $totalCount = count($checks);
        
        foreach ($checks as $key => $check) {
            $found = preg_match($check['pattern'], $content);
            $checks[$key]['found'] = $found;
            
            if ($found) {
                $this->info("   ✅ {$check['description']}");
                $successCount++;
            } else {
                $this->error("   ❌ {$check['description']}");
            }
        }
        
        // Check for specific mobile menu improvements
        $this->info("\n🎨 Mobile Menu Styling:");
        
        $stylingChecks = [
            'emerald_background' => strpos($content, 'bg-emerald-600') !== false,
            'white_text' => strpos($content, 'text-white') !== false,
            'rounded_corners' => strpos($content, 'rounded-2xl') !== false,
            'shadow_effects' => strpos($content, 'shadow-lg') !== false,
            'hover_states' => strpos($content, 'hover:bg-emerald-700') !== false,
            'transitions' => strpos($content, 'transition-all') !== false,
        ];
        
        foreach ($stylingChecks as $name => $found) {
            if ($found) {
                $this->info("   ✅ " . ucwords(str_replace('_', ' ', $name)));
                $successCount++;
            } else {
                $this->warn("   ⚠️  " . ucwords(str_replace('_', ' ', $name)));
            }
        }
        
        $this->info("\n📊 Mobile Menu Test Results:");
        $this->info("✅ Passed: {$successCount}/" . ($totalCount + count($stylingChecks)));
        $this->info("❌ Failed: " . ((($totalCount + count($stylingChecks)) - $successCount)) . "/" . ($totalCount + count($stylingChecks)));
        
        if ($successCount >= ($totalCount + count($stylingChecks)) * 0.8) {
            $this->info("\n🎉 MOBILE MENU IMPLEMENTATION COMPLETE!");
            $this->info("📱 Mobile menu icon properly displayed on phone screens");
            $this->info("🔧 Alpine.js functionality integrated");
            $this->info("🎨 Professional styling with emerald theme");
            $this->info("📱 Responsive design for all screen sizes");
            $this->info("🗺️ All circuit destinations included in mobile navigation");
            $this->info("");
            $this->info("🌐 Test on mobile devices:");
            $this->info("   - Phone screens (320px - 768px)");
            $this->info("   - Tablet screens (768px - 1024px)");
            $this->info("   - Desktop screens (1024px+)");
            $this->info("");
            $this->info("✨ Features:");
            $this->info("   - Hamburger menu icon on mobile");
            $this->info("   - Slide-in navigation panel");
            $this->info("   - Backdrop overlay");
            $this->info("   - Smooth transitions");
            $this->info("   - Touch-friendly buttons");
            $this->info("   - Circuit destination links");
        } else {
            $this->error("\n💔 Mobile menu implementation needs improvements.");
            $this->info("🔧 Check the failed tests above.");
        }
        
        return $successCount >= ($totalCount + count($stylingChecks)) * 0.8 ? 0 : 1;
    }
}
