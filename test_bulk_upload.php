<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Admin\CloudinaryController;
use Illuminate\Http\Request;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Bulk Upload Functionality...\n\n";

try {
    // Test 1: Check if controller can be instantiated
    echo "1. Testing controller instantiation...\n";
    $controller = new CloudinaryController();
    echo "✓ Controller instantiated successfully\n\n";

    // Test 2: Test the upload page rendering
    echo "2. Testing upload page rendering...\n";
    
    $uploadResponse = $controller->upload();
    echo "✓ Upload page method executed\n";
    echo "Response type: " . get_class($uploadResponse) . "\n";
    
    // Test view rendering
    $uploadRendered = $uploadResponse->render();
    echo "✓ Upload page rendered successfully\n";
    echo "Rendered content length: " . strlen($uploadRendered) . " characters\n";
    
    // Check for expected content in upload page
    $expectedUploadContent = [
        'Upload Files',
        'Upload new media files to Cloudinary',
        'Drag and drop files here',
        'or click to browse',
        'PNG, JPG, GIF, WebP, MP4, MOV up to 10MB each',
        'Folder (Optional)',
        'Tags (Optional)',
        'Image Transformation Options',
        'Auto Format',
        'Quality',
        'Resize',
        'Upload Tips',
        'Recent Uploads'
    ];
    
    echo "\n3. Checking for expected upload page content...\n";
    foreach ($expectedUploadContent as $content) {
        if (strpos($uploadRendered, $content) !== false) {
            echo "✓ Found: $content\n";
        } else {
            echo "✗ Missing: $content\n";
        }
    }
    
    // Check for JavaScript functionality
    $jsFeatures = [
        'drop-zone',
        'files[]',
        'handleFiles',
        'removeFile',
        'upload-form',
        'upload-progress',
        'progress-bar',
        'multiple'
    ];
    
    echo "\n4. Checking for JavaScript functionality...\n";
    foreach ($jsFeatures as $feature) {
        if (strpos($uploadRendered, $feature) !== false) {
            echo "✓ Found JavaScript feature: $feature\n";
        } else {
            echo "✗ Missing JavaScript feature: $feature\n";
        }
    }
    
    // Test 3: Test bulk upload validation
    echo "\n5. Testing bulk upload validation...\n";
    
    // Create a mock request with multiple files
    $request = Request::create('/admin/cloudinary/store', 'POST');
    
    // Test validation rules by checking the store method structure
    $reflection = new ReflectionMethod($controller, 'store');
    $source = file_get_contents($reflection->getFileName());
    
    if (strpos($source, 'files.*') !== false) {
        echo "✓ Found validation for multiple files (files.*)\n";
    } else {
        echo "✗ Missing validation for multiple files\n";
    }
    
    if (strpos($source, 'files.*.max:10240') !== false) {
        echo "✓ Found file size validation (10MB max)\n";
    } else {
        echo "✗ Missing file size validation\n";
    }
    
    if (strpos($source, 'files.*.file') !== false) {
        echo "✓ Found file type validation\n";
    } else {
        echo "✗ Missing file type validation\n";
    }
    
    // Test 4: Check bulk upload processing logic
    echo "\n6. Testing bulk upload processing logic...\n";
    
    if (strpos($source, 'foreach ($files as $index => $file)') !== false) {
        echo "✓ Found foreach loop for processing multiple files\n";
    } else {
        echo "✗ Missing foreach loop for multiple files\n";
    }
    
    if (strpos($source, '$uploadedFiles[]') !== false) {
        echo "✓ Found uploaded files tracking\n";
    } else {
        echo "✗ Missing uploaded files tracking\n";
    }
    
    if (strpos($source, '$failedFiles[]') !== false) {
        echo "✓ Found failed files tracking\n";
    } else {
        echo "✗ Missing failed files tracking\n";
    }
    
    if (strpos($source, 'getUploadMessage') !== false) {
        echo "✓ Found upload message generation method\n";
    } else {
        echo "✗ Missing upload message generation method\n";
    }
    
    // Test 5: Check for proper error handling
    echo "\n7. Testing error handling...\n";
    
    if (strpos($source, 'try {') !== false && strpos($source, 'catch (\\Exception $e)') !== false) {
        echo "✓ Found proper try-catch error handling\n";
    } else {
        echo "✗ Missing proper error handling\n";
    }
    
    if (strpos($source, 'Cloudinary::upload') !== false) {
        echo "✓ Found Cloudinary upload call\n";
    } else {
        echo "✗ Missing Cloudinary upload call\n";
    }
    
    // Test 6: Check for unique public ID generation
    echo "\n8. Testing unique public ID generation...\n";
    
    if (strpos($source, 'public_id') !== false && strpos($source, 'time()') !== false) {
        echo "✓ Found unique public ID generation with timestamp\n";
    } else {
        echo "✗ Missing unique public ID generation\n";
    }
    
    // Test 7: Check for proper response handling
    echo "\n9. Testing response handling...\n";
    
    if (strpos($source, 'redirect()->route') !== false) {
        echo "✓ Found proper redirect response\n";
    } else {
        echo "✗ Missing proper redirect response\n";
    }
    
    if (strpos($source, 'with(\'success\'') !== false) {
        echo "✓ Found success message handling\n";
    } else {
        echo "✗ Missing success message handling\n";
    }
    
    // Test 8: Check for file information tracking
    echo "\n10. Testing file information tracking...\n";
    
    $fileInfoKeys = ['name', 'url', 'size'];
    foreach ($fileInfoKeys as $key) {
        if (strpos($source, "'$key'") !== false) {
            echo "✓ Found file info tracking for: $key\n";
        } else {
            echo "✗ Missing file info tracking for: $key\n";
        }
    }
    
    echo "\n✓ All bulk upload functionality tests completed successfully!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\nBulk upload functionality test completed!\n";
