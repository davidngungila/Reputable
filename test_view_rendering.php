<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Admin\CloudinaryController;
use Illuminate\Http\Request;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Media Library View Rendering...\n\n";

try {
    // Test view rendering
    echo "1. Testing view compilation...\n";
    
    $controller = new CloudinaryController();
    $request = Request::create('/admin/cloudinary', 'GET');
    
    // Get the view response
    $response = $controller->index();
    
    echo "✓ View response generated\n";
    echo "View name: " . $response->getName() . "\n";
    
    // Check view data
    $data = $response->getData();
    echo "✓ View data extracted\n";
    
    // Test view rendering to string
    echo "2. Testing view rendering...\n";
    $rendered = $response->render();
    
    echo "✓ View rendered successfully\n";
    echo "Rendered content length: " . strlen($rendered) . " characters\n";
    
    // Check for expected content
    $expectedContent = [
        'Media Library',
        'Upload Files',
        'Manage Folders',
        'Analytics',
        'Total Files',
        'Images',
        'Videos',
        'Folders',
        'Storage Used'
    ];
    
    echo "\n3. Checking for expected content...\n";
    foreach ($expectedContent as $content) {
        if (strpos($rendered, $content) !== false) {
            echo "✓ Found: $content\n";
        } else {
            echo "✗ Missing: $content\n";
        }
    }
    
    // Check for analytics data
    if (isset($data['stats'])) {
        echo "\n4. Analytics data in view:\n";
        echo "- Total Files: " . $data['stats']['total_files'] . "\n";
        echo "- Images: " . $data['stats']['image_count'] . "\n";
        echo "- Videos: " . $data['stats']['video_count'] . "\n";
        echo "- Folders: " . $data['stats']['folder_count'] . "\n";
        echo "- Storage Used: " . number_format(($data['stats']['total_bytes'] ?? 0) / 1024 / 1024, 2) . " MB\n";
    }
    
    // Check for media grid
    if (isset($data['resources']) && count($data['resources']) > 0) {
        echo "\n5. Media grid data:\n";
        echo "- Resources count: " . count($data['resources']) . "\n";
        echo "- Sample resource: " . $data['resources'][0]['name'] . "\n";
        echo "- Sample type: " . $data['resources'][0]['type'] . "\n";
        echo "- Sample size: " . $data['resources'][0]['size'] . "\n";
    }
    
    // Check for folder data
    if (isset($data['folders'])) {
        echo "\n6. Folder data:\n";
        echo "- Folders count: " . count($data['folders']) . "\n";
        if (count($data['folders']) > 0) {
            echo "- Sample folder: " . $data['folders'][0]['name'] . "\n";
        }
    }
    
    // Check for navigation URLs
    echo "\n7. Navigation URLs:\n";
    echo "- Upload URL: " . $data['upload_url'] . "\n";
    echo "- Folders URL: " . $data['folders_url'] . "\n";
    echo "- Analytics URL: " . $data['analytics_url'] . "\n";
    
    // Check for JavaScript functionality
    $jsFeatures = [
        'filterMedia',
        'setView',
        'toggleSelectAll',
        'updateSelectedCount',
        'showFileDetails',
        'transformImage',
        'copyToClipboard'
    ];
    
    echo "\n8. Checking JavaScript functionality...\n";
    foreach ($jsFeatures as $feature) {
        if (strpos($rendered, $feature) !== false) {
            echo "✓ Found function: $feature\n";
        } else {
            echo "✗ Missing function: $feature\n";
        }
    }
    
    // Check for responsive design elements
    $responsiveElements = [
        'grid grid-cols-2',
        'md:grid-cols-3',
        'lg:grid-cols-4',
        'xl:grid-cols-5',
        'flex-col lg:flex-row'
    ];
    
    echo "\n9. Checking responsive design...\n";
    foreach ($responsiveElements as $element) {
        if (strpos($rendered, $element) !== false) {
            echo "✓ Found responsive class: $element\n";
        } else {
            echo "✗ Missing responsive class: $element\n";
        }
    }
    
    echo "\n✓ All view rendering tests completed successfully!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\nMedia Library view rendering test completed!\n";
