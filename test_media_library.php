<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Admin\CloudinaryController;
use Illuminate\Http\Request;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Media Library Controller...\n\n";

try {
    // Test 1: Check if controller can be instantiated
    echo "1. Testing controller instantiation...\n";
    $controller = new CloudinaryController();
    echo "✓ Controller instantiated successfully\n\n";

    // Test 2: Test the index method
    echo "2. Testing index method...\n";
    
    // Create a mock request
    $request = Request::create('/admin/cloudinary', 'GET');
    
    // Call the index method
    $response = $controller->index();
    
    echo "✓ Index method executed\n";
    echo "Response type: " . get_class($response) . "\n";
    
    // Check if it's a view response
    if (method_exists($response, 'getData')) {
        $data = $response->getData();
        echo "✓ View data available\n";
        echo "Data keys: " . implode(', ', array_keys($data)) . "\n";
        
        // Check for expected data
        $expectedKeys = ['resources', 'folders', 'stats', 'upload_url', 'folders_url', 'analytics_url'];
        foreach ($expectedKeys as $key) {
            if (array_key_exists($key, $data)) {
                echo "✓ Found key: $key\n";
            } else {
                echo "✗ Missing key: $key\n";
            }
        }
        
        // Check stats
        if (isset($data['stats'])) {
            echo "\nStats:\n";
            echo "- Total Files: " . $data['stats']['total_files'] . "\n";
            echo "- Images: " . $data['stats']['image_count'] . "\n";
            echo "- Videos: " . $data['stats']['video_count'] . "\n";
            echo "- Folders: " . $data['stats']['folder_count'] . "\n";
        }
        
        // Check resources
        if (isset($data['resources'])) {
            echo "\nResources count: " . count($data['resources']) . "\n";
            if (count($data['resources']) > 0) {
                $sample = $data['resources'][0];
                echo "Sample resource keys: " . implode(', ', array_keys($sample)) . "\n";
            }
        }
        
        // Check folders
        if (isset($data['folders'])) {
            echo "\nFolders count: " . count($data['folders']) . "\n";
        }
    }
    
    echo "\n✓ All tests completed successfully!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\nTesting Cloudinary API connection...\n\n";

try {
    // Test Cloudinary configuration
    echo "3. Testing Cloudinary configuration...\n";
    
    $cloudName = env('CLOUDINARY_CLOUD_NAME');
    $apiKey = env('CLOUDINARY_KEY');
    $apiSecret = env('CLOUDINARY_SECRET');
    
    echo "Cloud Name: " . ($cloudName ?: 'NOT SET') . "\n";
    echo "API Key: " . ($apiKey ? 'SET' : 'NOT SET') . "\n";
    echo "API Secret: " . ($apiSecret ? 'SET' : 'NOT SET') . "\n";
    
    if ($cloudName && $apiKey && $apiSecret) {
        echo "✓ All Cloudinary credentials are set\n";
        
        // Test direct Cloudinary API
        \Cloudinary\Configuration\Configuration::instance([
            'cloud' => [
                'cloud_name' => $cloudName,
                'api_key' => $apiKey,
                'api_secret' => $apiSecret,
            ]
        ]);
        
        echo "✓ Cloudinary SDK initialized\n";
        
        // Test search API
        $search = new \Cloudinary\Api\Search\SearchApi();
        $search->expression('resource_type:image')->maxResults(5);
        $result = $search->execute();
        
        if ($result && is_array($result) && isset($result['resources'])) {
            echo "✓ Cloudinary API connection successful\n";
            echo "Found " . count($result['resources']) . " resources\n";
        } else {
            echo "✗ Cloudinary API returned unexpected response\n";
            echo "Response type: " . gettype($result) . "\n";
        }
        
    } else {
        echo "✗ Missing Cloudinary credentials\n";
    }
    
} catch (Exception $e) {
    echo "✗ Cloudinary API Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
}

echo "\nMedia Library test completed!\n";
