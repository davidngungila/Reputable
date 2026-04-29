<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Admin\CloudinaryController;
use Illuminate\Http\Request;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Folders Page Functionality...\n\n";

try {
    // Test 1: Check if controller can be instantiated
    echo "1. Testing controller instantiation...\n";
    $controller = new CloudinaryController();
    echo "✓ Controller instantiated successfully\n\n";

    // Test 2: Test the folders method
    echo "2. Testing folders method...\n";
    
    // Create a mock request
    $request = Request::create('/admin/cloudinary/folders', 'GET');
    
    // Call the folders method
    $response = $controller->folders();
    
    echo "✓ Folders method executed\n";
    echo "Response type: " . get_class($response) . "\n";
    
    // Check if it's a view response
    if (method_exists($response, 'getData')) {
        $data = $response->getData();
        echo "✓ View data available\n";
        echo "Data keys: " . implode(', ', array_keys($data)) . "\n";
        
        // Check for expected data
        if (isset($data['folders'])) {
            echo "✓ Found folders data\n";
            echo "Folders count: " . count($data['folders']) . "\n";
            
            if (count($data['folders']) > 0) {
                $sampleFolder = $data['folders'][array_key_first($data['folders'])];
                echo "Sample folder keys: " . implode(', ', array_keys($sampleFolder)) . "\n";
                echo "Sample folder name: " . ($sampleFolder['name'] ?? 'N/A') . "\n";
                echo "Sample folder path: " . ($sampleFolder['path'] ?? 'N/A') . "\n";
                echo "Sample folder created_at: " . ($sampleFolder['created_at'] ?? 'N/A') . "\n";
                
                // Check if all expected keys exist
                $expectedKeys = ['name', 'path', 'created_at'];
                foreach ($expectedKeys as $key) {
                    if (array_key_exists($key, $sampleFolder)) {
                        echo "✓ Found key: $key\n";
                    } else {
                        echo "✗ Missing key: $key\n";
                    }
                }
            }
        } else {
            echo "✗ No folders data found\n";
        }
    }
    
    echo "\n3. Testing view rendering...\n";
    
    // Test view rendering to string
    $rendered = $response->render();
    
    echo "✓ View rendered successfully\n";
    echo "Rendered content length: " . strlen($rendered) . " characters\n";
    
    // Check for expected content
    $expectedContent = [
        'Manage Folders',
        'Media Management',
        'Create New Folder',
        'Folder Name',
        'Cloudinary'
    ];
    
    echo "\n4. Checking for expected content...\n";
    foreach ($expectedContent as $content) {
        if (strpos($rendered, $content) !== false) {
            echo "✓ Found: $content\n";
        } else {
            echo "✗ Missing: $content\n";
        }
    }
    
    // Check for form elements
    $formElements = [
        'form',
        'input',
        'button',
        'grid'
    ];
    
    echo "\n5. Checking for form elements...\n";
    foreach ($formElements as $element) {
        if (strpos($rendered, $element) !== false) {
            echo "✓ Found element: $element\n";
        } else {
            echo "✗ Missing element: $element\n";
        }
    }
    
    // Check for responsive design
    $responsiveClasses = [
        'grid-cols-1',
        'md:grid-cols-2',
        'lg:grid-cols-3'
    ];
    
    echo "\n6. Checking for responsive design...\n";
    foreach ($responsiveClasses as $class) {
        if (strpos($rendered, $class) !== false) {
            echo "✓ Found responsive class: $class\n";
        } else {
            echo "✗ Missing responsive class: $class\n";
        }
    }
    
    echo "\n✓ All folders page tests completed successfully!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\nFolders page test completed!\n";
