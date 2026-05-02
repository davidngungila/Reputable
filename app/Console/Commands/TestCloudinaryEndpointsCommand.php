<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CloudinaryService;

class TestCloudinaryEndpointsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cloudinary-endpoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test all Cloudinary API endpoints with database config';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🌩️ Testing Cloudinary Endpoints');
        $this->info('============================');
        
        $results = [];
        
        // Test 1: Configuration
        $this->info("\n⚙️ Configuration Test:");
        try {
            $config = CloudinaryService::getConfig();
            $this->info("✅ Cloud Name: " . $config['cloud_name']);
            $this->info("✅ API Key: " . $config['api_key']);
            $this->info("✅ API Secret: " . ($config['api_secret'] ? '***' : 'missing'));
            $this->info("✅ Cloud URL: " . $config['cloud_url']);
            $results['config'] = 'success';
        } catch (\Exception $e) {
            $this->error("❌ Configuration Error: " . $e->getMessage());
            $results['config'] = 'failed';
        }
        
        // Test 2: Search API
        $this->info("\n🔍 Search API Test:");
        try {
            $search = CloudinaryService::search();
            $result = $search->maxResults(5)->execute();
            $count = is_array($result) && isset($result['resources']) ? count($result['resources']) : 0;
            $this->info("✅ Search API: Found {$count} resources");
            $results['search'] = 'success';
        } catch (\Exception $e) {
            $this->error("❌ Search API Error: " . $e->getMessage());
            $results['search'] = 'failed';
        }
        
        // Test 3: Admin Assets API
        $this->info("\n📁 Admin Assets API Test:");
        try {
            $admin = CloudinaryService::admin();
            $result = $admin->assets(['max_results' => 5, 'resource_type' => 'image']);
            $count = is_array($result) && isset($result['resources']) ? count($result['resources']) : 0;
            $this->info("✅ Admin Assets API: Found {$count} image resources");
            $results['admin_assets'] = 'success';
        } catch (\Exception $e) {
            $this->error("❌ Admin Assets API Error: " . $e->getMessage());
            $results['admin_assets'] = 'failed';
        }
        
        // Test 4: Folders API
        $this->info("\n📂 Folders API Test:");
        try {
            $admin = CloudinaryService::admin();
            $result = $admin->rootFolders();
            $count = is_array($result) ? count($result) : 0;
            $this->info("✅ Folders API: Found {$count} folders");
            $results['folders'] = 'success';
        } catch (\Exception $e) {
            $this->error("❌ Folders API Error: " . $e->getMessage());
            $results['folders'] = 'failed';
        }
        
        // Test 5: Actual Resources
        $this->info("\n🎯 Actual Resources Test:");
        try {
            $search = CloudinaryService::search();
            $result = $search->expression('resource_type:image')->maxResults(3)->execute();
            if (is_array($result) && isset($result['resources'])) {
                $count = count($result['resources']);
                $this->info("✅ Actual Resources: Found {$count} image resources");
                if ($count > 0) {
                    $this->info("   Sample: " . $result['resources'][0]['public_id']);
                }
                $results['actual_resources'] = 'success';
            } else {
                $this->error("❌ Unexpected response structure");
                $results['actual_resources'] = 'failed';
            }
        } catch (\Exception $e) {
            $this->error("❌ Actual Resources Error: " . $e->getMessage());
            $results['actual_resources'] = 'failed';
        }
        
        // Summary
        $this->info("\n📊 Test Results Summary:");
        $successCount = 0;
        $totalTests = count($results);
        
        foreach ($results as $test => $status) {
            $icon = $status === 'success' ? '✅' : '❌';
            $this->info("{$icon} {$test}: {$status}");
            if ($status === 'success') $successCount++;
        }
        
        $this->info("\n🎯 Overall: {$successCount}/{$totalTests} tests passed");
        
        if ($successCount === $totalTests) {
            $this->info("\n🎉 ALL TESTS PASSED!");
            $this->info("✅ Cloudinary API is fully functional");
            $this->info("✅ Database configuration is working");
            $this->info("✅ Admin panel should show all green checkmarks");
            $this->info("🌐 Test at: http://127.0.0.1:8004/admin/cloudinary/test");
        } else {
            $this->error("\n💔 Some tests failed. Check the errors above.");
        }
        
        return $successCount === $totalTests ? 0 : 1;
    }
}
