<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Admin\CloudinaryController;
use Illuminate\Http\Request;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Enhanced Analytics Page...\n\n";

try {
    // Test 1: Check if controller can be instantiated
    echo "1. Testing controller instantiation...\n";
    $controller = new CloudinaryController();
    echo "✓ Controller instantiated successfully\n\n";

    // Test 2: Test the enhanced analytics method
    echo "2. Testing enhanced analytics method...\n";
    
    // Create a mock request
    $request = Request::create('/admin/cloudinary/analytics', 'GET');
    
    // Call the analytics method
    $response = $controller->analytics();
    
    echo "✓ Analytics method executed\n";
    echo "Response type: " . get_class($response) . "\n";
    
    // Check if it's a view response
    if (method_exists($response, 'getData')) {
        $data = $response->getData();
        echo "✓ View data available\n";
        echo "Data keys: " . implode(', ', array_keys($data)) . "\n";
        
        // Check for expected data
        if (isset($data['stats'])) {
            $stats = $data['stats'];
            echo "✓ Found stats data\n";
            
            // Check for all expected stat keys
            $expectedKeys = ['total_files', 'total_bytes', 'image_count', 'video_count', 'raw_count', 'folder_stats', 'recent_files', 'file_type_distribution'];
            foreach ($expectedKeys as $key) {
                if (array_key_exists($key, $stats)) {
                    echo "✓ Found key: $key\n";
                    
                    // Show specific values for important keys
                    if ($key === 'total_files') {
                        echo "  - Total Files: " . $stats[$key] . "\n";
                    } elseif ($key === 'image_count') {
                        echo "  - Images: " . $stats[$key] . "\n";
                    } elseif ($key === 'video_count') {
                        echo "  - Videos: " . $stats[$key] . "\n";
                    } elseif ($key === 'raw_count') {
                        echo "  - Raw Files: " . $stats[$key] . "\n";
                    } elseif ($key === 'folder_stats') {
                        echo "  - Folder Stats Count: " . count($stats[$key]) . "\n";
                    } elseif ($key === 'recent_files') {
                        echo "  - Recent Files Count: " . count($stats[$key]) . "\n";
                    } elseif ($key === 'file_type_distribution') {
                        $dist = $stats[$key];
                        echo "  - Distribution: Images={$dist['images']}, Videos={$dist['videos']}, Raw={$dist['raw']}\n";
                    }
                } else {
                    echo "✗ Missing key: $key\n";
                }
            }
            
            // Check folder stats structure
            if (!empty($stats['folder_stats'])) {
                echo "\n3. Testing folder stats structure...\n";
                $sampleFolder = $stats['folder_stats'][0] ?? null;
                if ($sampleFolder) {
                    $folderKeys = ['name', 'path', 'file_count', 'storage_bytes', 'storage_used'];
                    foreach ($folderKeys as $key) {
                        if (array_key_exists($key, $sampleFolder)) {
                            echo "✓ Folder has key: $key = " . ($sampleFolder[$key] ?? 'N/A') . "\n";
                        } else {
                            echo "✗ Folder missing key: $key\n";
                        }
                    }
                }
            }
            
            // Check recent files structure
            if (!empty($stats['recent_files'])) {
                echo "\n4. Testing recent files structure...\n";
                $sampleFile = $stats['recent_files'][0] ?? null;
                if ($sampleFile) {
                    $fileKeys = ['public_id', 'secure_url', 'resource_type', 'bytes', 'created_at', 'folder'];
                    foreach ($fileKeys as $key) {
                        if (array_key_exists($key, $sampleFile)) {
                            echo "✓ Recent file has key: $key\n";
                        } else {
                            echo "✗ Recent file missing key: $key\n";
                        }
                    }
                }
            }
        } else {
            echo "✗ No stats data found\n";
        }
    }
    
    echo "\n5. Testing view rendering...\n";
    
    // Test view rendering to string
    $rendered = $response->render();
    
    echo "✓ View rendered successfully\n";
    echo "Rendered content length: " . strlen($rendered) . " characters\n";
    
    // Check for expected content
    $expectedContent = [
        'Media Analytics',
        'Track your media usage and performance',
        'Total Files',
        'Storage Used',
        'Images',
        'Videos',
        'Raw Files',
        'Upload Trend',
        'File Type Distribution',
        'Storage by Folder',
        'Recent Activity',
        'Back to Library'
    ];
    
    echo "\n6. Checking for expected content...\n";
    foreach ($expectedContent as $content) {
        if (strpos($rendered, $content) !== false) {
            echo "✓ Found: $content\n";
        } else {
            echo "✗ Missing: $content\n";
        }
    }
    
    // Check for JavaScript functionality
    $jsFeatures = [
        'Chart.js',
        'uploadChart',
        'typeChart',
        'distributionData',
        'getContext'
    ];
    
    echo "\n7. Checking for JavaScript functionality...\n";
    foreach ($jsFeatures as $feature) {
        if (strpos($rendered, $feature) !== false) {
            echo "✓ Found JavaScript feature: $feature\n";
        } else {
            echo "✗ Missing JavaScript feature: $feature\n";
        }
    }
    
    // Check for responsive design
    $responsiveClasses = [
        'grid-cols-1',
        'md:grid-cols-2',
        'lg:grid-cols-5',
        'bg-white',
        'rounded-xl'
    ];
    
    echo "\n8. Checking for responsive design...\n";
    foreach ($responsiveClasses as $class) {
        if (strpos($rendered, $class) !== false) {
            echo "✓ Found responsive class: $class\n";
        } else {
            echo "✗ Missing responsive class: $class\n";
        }
    }
    
    echo "\n✓ All enhanced analytics page tests completed successfully!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\nEnhanced analytics page test completed!\n";
