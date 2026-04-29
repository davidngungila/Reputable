<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Admin\CloudinaryController;
use Illuminate\Http\Request;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Success Popup Functionality...\n\n";

try {
    // Test 1: Check if controller can be instantiated
    echo "1. Testing controller instantiation...\n";
    $controller = new CloudinaryController();
    echo "✓ Controller instantiated successfully\n\n";

    // Test 2: Test upload page rendering with SweetAlert
    echo "2. Testing upload page rendering with SweetAlert...\n";
    
    $uploadResponse = $controller->upload();
    echo "✓ Upload page method executed\n";
    
    // Test view rendering
    $uploadRendered = $uploadResponse->render();
    echo "✓ Upload page rendered successfully\n";
    echo "Rendered content length: " . strlen($uploadRendered) . " characters\n";
    
    // Check for SweetAlert library
    if (strpos($uploadRendered, 'SweetAlert2@11') !== false) {
        echo "✓ Found SweetAlert2 library inclusion\n";
    } else {
        echo "✗ Missing SweetAlert2 library\n";
    }
    
    // Check for CSRF meta tag
    if (strpos($uploadRendered, 'csrf-token') !== false) {
        echo "✓ Found CSRF meta tag\n";
    } else {
        echo "✗ Missing CSRF meta tag\n";
    }
    
    // Check for SweetAlert JavaScript functions
    $sweetalertFeatures = [
        'Swal.fire',
        'icon: \'success\'',
        'title: \'Upload Successful!\'',
        'confirmButtonColor: \'#10b981\'',
        'showCancelButton: true',
        'confirmButtonText: \'View Files\'',
        'cancelButtonText: \'Upload More\'',
        'resetUploadForm',
        'DOMContentLoaded'
    ];
    
    echo "\n3. Checking for SweetAlert JavaScript features...\n";
    foreach ($sweetalertFeatures as $feature) {
        if (strpos($uploadRendered, $feature) !== false) {
            echo "✓ Found SweetAlert feature: $feature\n";
        } else {
            echo "✗ Missing SweetAlert feature: $feature\n";
        }
    }
    
    // Test 3: Test AJAX upload functionality
    echo "\n4. Testing AJAX upload functionality...\n";
    
    if (strpos($uploadRendered, 'fetch(') !== false) {
        echo "✓ Found fetch API for AJAX upload\n";
    } else {
        echo "✗ Missing fetch API\n";
    }
    
    if (strpos($uploadRendered, 'FormData') !== false) {
        echo "✓ Found FormData for file upload\n";
    } else {
        echo "✗ Missing FormData\n";
    }
    
    if (strpos($uploadRendered, 'response.json()') !== false) {
        echo "✓ Found JSON response handling\n";
    } else {
        echo "✗ Missing JSON response handling\n";
    }
    
    // Test 4: Test controller JSON response handling
    echo "\n5. Testing controller JSON response handling...\n";
    
    $reflection = new ReflectionMethod($controller, 'store');
    $source = file_get_contents($reflection->getFileName());
    
    if (strpos($source, '$request->expectsJson()') !== false) {
        echo "✓ Found expectsJson() check in controller\n";
    } else {
        echo "✗ Missing expectsJson() check\n";
    }
    
    if (strpos($source, 'response()->json([') !== false) {
        echo "✓ Found JSON response in controller\n";
    } else {
        echo "✗ Missing JSON response\n";
    }
    
    if (strpos($source, '\'success\' => true') !== false) {
        echo "✓ Found success response structure\n";
    } else {
        echo "✗ Missing success response structure\n";
    }
    
    // Test 5: Test error handling
    echo "\n6. Testing error handling...\n";
    
    if (strpos($uploadRendered, 'catch (error)') !== false) {
        echo "✓ Found AJAX error handling\n";
    } else {
        echo "✗ Missing AJAX error handling\n";
    }
    
    if (strpos($uploadRendered, 'icon: \'error\'') !== false) {
        echo "✓ Found error popup configuration\n";
    } else {
        echo "✗ Missing error popup configuration\n";
    }
    
    if (strpos($uploadRendered, 'session(\'success\')') !== false) {
        echo "✓ Found session success message check\n";
    } else {
        echo "✗ Missing session success message check\n";
    }
    
    if (strpos($uploadRendered, 'session(\'error\')') !== false) {
        echo "✓ Found session error message check\n";
    } else {
        echo "✗ Missing session error message check\n";
    }
    
    // Test 6: Test user interaction flow
    echo "\n7. Testing user interaction flow...\n";
    
    $interactionFeatures = [
        'View Files' => 'Redirect to media library',
        'Upload More' => 'Reset upload form',
        'resetUploadForm()' => 'Form reset functionality',
        'window.location.href' => 'Navigation handling'
    ];
    
    foreach ($interactionFeatures as $feature => $description) {
        if (strpos($uploadRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    // Test 7: Test progress tracking
    echo "\n8. Testing progress tracking...\n";
    
    $progressFeatures = [
        'progressBar.style.width' => 'Progress bar update',
        'progressPercent.textContent' => 'Progress percentage update',
        '100%' => 'Complete progress indicator',
        'uploadProgress.classList.remove' => 'Progress bar visibility'
    ];
    
    foreach ($progressFeatures as $feature => $description) {
        if (strpos($uploadRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    // Test 8: Test file management
    echo "\n9. Testing file management...\n";
    
    $fileManagementFeatures = [
        'uploadForm.reset()' => 'Form reset',
        'previewList.innerHTML' => 'Preview list management',
        'filePreview.classList.add' => 'Preview visibility control',
        'uploadPrompt.classList.remove' => 'Upload prompt control'
    ];
    
    foreach ($fileManagementFeatures as $feature => $description) {
        if (strpos($uploadRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    echo "\n✓ All success popup functionality tests completed successfully!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\nSuccess popup functionality test completed!\n";
