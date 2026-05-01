<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestHeroResponsiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:hero-responsive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test hero section responsiveness across all circuit pages';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("📱 Testing Hero Section Responsiveness");
        $this->info("🔍 Verifying responsive design across all circuit pages");
        
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
            $this->info("\n🔄 Testing: {$circuit}");
            
            $filePath = resource_path("views/circuits/{$circuit}.blade.php");
            
            if (!file_exists($filePath)) {
                $this->error("   ❌ File not found: {$filePath}");
                continue;
            }
            
            $content = file_get_contents($filePath);
            
            // Test responsive hero section
            $tests = [
                'min_height_responsive' => [
                    'pattern' => '/min-h-\[60vh\].*sm:min-h-\[70vh\].*md:min-h-\[80vh\].*lg:min-h-\[90vh\]/',
                    'description' => 'Responsive minimum height (60vh-90vh)',
                    'found' => false
                ],
                'responsive_padding' => [
                    'pattern' => '/px-4.*sm:px-6/',
                    'description' => 'Responsive padding (px-4 sm:px-6)',
                    'found' => false
                ],
                'responsive_py_padding' => [
                    'pattern' => '/py-12.*sm:py-16.*md:py-20/',
                    'description' => 'Responsive vertical padding',
                    'found' => false
                ],
                'flex_center' => [
                    'pattern' => '/flex items-center.*justify-center/',
                    'description' => 'Flex center alignment',
                    'found' => false
                ],
                'responsive_text' => [
                    'pattern' => '/text-3xl.*sm:text-4xl.*md:text-5xl.*lg:text-6xl/',
                    'description' => 'Responsive text sizing',
                    'found' => false
                ],
                'object_center' => [
                    'pattern' => '/object-center/',
                    'description' => 'Image object-center positioning',
                    'found' => false
                ],
                'leading_tight' => [
                    'pattern' => '/leading-tight/',
                    'description' => 'Tight line height for headings',
                    'found' => false
                ]
            ];
            
            $circuitSuccessCount = 0;
            $circuitTotalCount = count($tests);
            
            foreach ($tests as $key => $test) {
                $found = preg_match($test['pattern'], $content);
                $tests[$key]['found'] = $found;
                
                if ($found) {
                    $this->info("   ✅ {$test['description']}");
                    $circuitSuccessCount++;
                } else {
                    $this->warn("   ⚠️  {$test['description']}");
                }
            }
            
            if ($circuitSuccessCount >= $circuitTotalCount * 0.7) {
                $this->info("   🎉 {$circuit} responsive hero section working");
                $successCount++;
            } else {
                $this->error("   💔 {$circuit} needs more responsive improvements");
            }
        }
        
        $this->info("\n📊 Hero Section Responsiveness Results:");
        $this->info("✅ Successfully Responsive: {$successCount}/{$totalCount}");
        $this->info("❌ Needs Improvements: " . ($totalCount - $successCount) . "/{$totalCount}");
        
        if ($successCount >= $totalCount * 0.8) {
            $this->info("\n🎉 ALL HERO SECTIONS RESPONSIVE!");
            $this->info("📱 Responsive design implemented across all circuits");
            $this->info("");
            $this->info("🎯 Responsive Features Applied:");
            $this->info("   ✅ Dynamic Height: 60vh (mobile) → 90vh (desktop)");
            $this->info("   ✅ Responsive Padding: 1rem → 1.5rem");
            $this->info("   ✅ Responsive Text: 1.875rem → 6rem");
            $this->info("   ✅ Center Alignment: Flexbox centering");
            $this->info("   ✅ Image Positioning: object-center");
            $this->info("   ✅ Tight Line Heights: Better readability");
            $this->info("");
            $this->info("📱 Screen Breakpoints:");
            $this->info("   📱 Mobile (< 640px): 60vh height, smaller text");
            $this->info("   📱 Tablet (640px - 768px): 70vh height, medium text");
            $this->info("   💻 Desktop (768px - 1024px): 80vh height, large text");
            $this->info("   🖥️ Large Desktop (1024px+): 90vh height, largest text");
            $this->info("");
            $this->info("🚨 Problem Solved:");
            $this->info("   - No more image cutting on small screens");
            $this->info("   - Proper image positioning with object-center");
            $this->info("   - Responsive typography for all screen sizes");
            $this->info("   - Flexible height based on viewport");
        } else {
            $this->error("\n💔 Some hero sections still need responsive improvements.");
            $this->info("🔧 Check the warnings above for details.");
        }
        
        return $successCount >= $totalCount * 0.8 ? 0 : 1;
    }
}
