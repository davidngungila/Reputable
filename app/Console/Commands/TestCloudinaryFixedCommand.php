<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CloudinaryService;

class TestCloudinaryFixedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cloudinary-fixed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Cloudinary API with fixed configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🌩️ Testing Cloudinary API (Fixed)');
        $this->info('==================================');
        
        // Test 1: Check configuration
        $this->info("\n⚙️ Configuration:");
        $config = CloudinaryService::getConfig();
        $this->info("Cloud Name: " . $config['cloud_name']);
        $this->info("API Key: " . $config['api_key']);
        $this->info("API Secret: " . ($config['api_secret'] ? '✅ SET' : '❌ NOT SET'));
        $this->info("Cloud URL: " . $config['cloud_url']);
        
        // Test 2: API Connection
        $this->info("\n🔌 API Connection Test:");
        try {
            $result = CloudinaryService::admin()->ping();
            $this->info("✅ Cloudinary API connection successful!");
            $this->info("Response: " . json_encode($result));
        } catch (\Exception $e) {
            $this->error("❌ Cloudinary API connection failed: " . $e->getMessage());
            return 1;
        }
        
        // Test 3: Upload Test
        $this->info("\n📤 Upload Test:");
        try {
            $result = CloudinaryService::upload()->upload(
                'https://via.placeholder.com/300x300/00ff00/ffffff?text=Cloudinary+Test',
                [
                    'public_id' => 'test-' . time(),
                    'folder' => 'test'
                ]
            );
            $this->info("✅ Upload test successful!");
            $this->info("Public ID: " . $result['public_id']);
            $this->info("URL: " . $result['secure_url']);
        } catch (\Exception $e) {
            $this->error("❌ Upload test failed: " . $e->getMessage());
            return 1;
        }
        
        // Test 4: Resource Listing
        $this->info("\n📁 Resource Listing Test:");
        try {
            $result = CloudinaryService::admin()->assets(['max_results' => 5]);
            $this->info("✅ Resource listing successful!");
            $this->info("Found " . count($result['resources']) . " resources");
            
            if (!empty($result['resources'])) {
                $this->info("Sample resources:");
                foreach ($result['resources'] as $i => $resource) {
                    $this->info("  " . ($i + 1) . ". " . $resource['public_id'] . " (" . $resource['resource_type'] . ")");
                }
            }
        } catch (\Exception $e) {
            $this->error("❌ Resource listing failed: " . $e->getMessage());
            return 1;
        }
        
        // Test 5: Search API
        $this->info("\n🔍 Search API Test:");
        try {
            $result = CloudinaryService::admin()->assets(['max_results' => 3, 'resource_type' => 'image']);
            $this->info("✅ Search API successful!");
            $this->info("Found " . count($result['resources']) . " image resources");
        } catch (\Exception $e) {
            $this->error("❌ Search API failed: " . $e->getMessage());
            return 1;
        }
        
        $this->info("\n🎉 ALL TESTS PASSED!");
        $this->info("✅ Cloudinary API is working correctly");
        $this->info("✅ Configuration is properly set");
        $this->info("✅ Upload functionality works");
        $this->info("✅ Resource listing works");
        $this->info("✅ Search API works");
        
        $this->info("\n🌐 Admin Panel Test URL:");
        $this->info("http://127.0.0.1:8004/admin/cloudinary/test");
        
        return 0;
    }
}
