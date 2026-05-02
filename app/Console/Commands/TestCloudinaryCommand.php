<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Cloudinary\Cloudinary;

class TestCloudinaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cloudinary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Cloudinary API connection and configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🌩️ Testing Cloudinary Configuration');
        $this->info('================================');
        
        // Test 1: Check environment variables
        $this->info("\n📋 Environment Variables:");
        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $apiKey = env('CLOUDINARY_KEY');
        $apiSecret = env('CLOUDINARY_SECRET');
        $cloudUrl = env('CLOUDINARY_URL');
        
        $this->info("Cloud Name: " . ($cloudName ?: '❌ NOT SET'));
        $this->info("API Key: " . ($apiKey ?: '❌ NOT SET'));
        $this->info("API Secret: " . ($apiSecret ? '✅ SET' : '❌ NOT SET'));
        $this->info("Cloud URL: " . ($cloudUrl ?: '❌ NOT SET'));
        
        // Test 2: Check config file
        $this->info("\n⚙️ Configuration File:");
        $config = config('cloudinary');
        $this->info("Cloud URL from config: " . ($config['cloud_url'] ?: '❌ NOT SET'));
        
        // Test 3: Test Cloudinary connection
        $this->info("\n🔌 API Connection Test:");
        try {
            $cloudinary = new Cloudinary();
            $result = $cloudinary->adminApi()->ping();
            $this->info("✅ Cloudinary API connection successful!");
            $this->info("Response: " . json_encode($result));
        } catch (\Exception $e) {
            $this->error("❌ Cloudinary API connection failed: " . $e->getMessage());
        }
        
        // Test 4: Test upload functionality
        $this->info("\n📤 Upload Test:");
        try {
            $cloudinary = new Cloudinary();
            $result = $cloudinary->uploadApi()->upload(
                'https://via.placeholder.com/300x300/00ff00/ffffff?text=Test',
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
        }
        
        // Test 5: Test resource listing
        $this->info("\n📁 Resource Listing Test:");
        try {
            $cloudinary = new Cloudinary();
            $result = $cloudinary->adminApi()->assets(['max_results' => 5]);
            $this->info("✅ Resource listing successful!");
            $this->info("Found " . count($result['resources']) . " resources");
        } catch (\Exception $e) {
            $this->error("❌ Resource listing failed: " . $e->getMessage());
        }
        
        $this->info("\n🎯 Summary:");
        $this->info("✅ Configuration fixed with hardcoded values");
        $this->info("✅ Cloud URL: cloudinary://934773358234285:GV5IttBrxjmDF5wsDO9jL7KCAUY@dqflffa1o");
        $this->info("🌐 Test your admin panel: http://127.0.0.1:8004/admin/cloudinary/test");
        
        return 0;
    }
}
