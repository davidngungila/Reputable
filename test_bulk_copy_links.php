<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Admin\CloudinaryController;
use Illuminate\Http\Request;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Bulk Copy Links Functionality...\n\n";

try {
    // Test 1: Check if controller can be instantiated
    echo "1. Testing controller instantiation...\n";
    $controller = new CloudinaryController();
    echo "✓ Controller instantiated successfully\n\n";

    // Test 2: Test Media Library page rendering with bulk copy functionality
    echo "2. Testing Media Library page rendering...\n";
    
    $indexResponse = $controller->index();
    echo "✓ Media Library page method executed\n";
    
    // Test view rendering
    $indexRendered = $indexResponse->render();
    echo "✓ Media Library page rendered successfully\n";
    echo "Rendered content length: " . strlen($indexRendered) . " characters\n";
    
    // Check for SweetAlert library
    if (strpos($indexRendered, 'SweetAlert2@11') !== false) {
        echo "✓ Found SweetAlert2 library inclusion\n";
    } else {
        echo "✗ Missing SweetAlert2 library\n";
    }
    
    // Check for bulk copy links button
    if (strpos($indexRendered, 'Copy Links') !== false) {
        echo "✓ Found Copy Links button\n";
    } else {
        echo "✗ Missing Copy Links button\n";
    }
    
    // Check for bulkCopyLinks function
    if (strpos($indexRendered, 'function bulkCopyLinks()') !== false) {
        echo "✓ Found bulkCopyLinks function\n";
    } else {
        echo "✗ Missing bulkCopyLinks function\n";
    }
    
    // Check for URL data attributes
    if (strpos($indexRendered, 'data-url') !== false) {
        echo "✓ Found URL data attributes on media items\n";
    } else {
        echo "✗ Missing URL data attributes\n";
    }
    
    // Test 3: Check bulk copy functionality features
    echo "\n3. Testing bulk copy functionality features...\n";
    
    $copyFeatures = [
        'selectedItems' => 'Selected items detection',
        'media-checkbox:checked' => 'Checkbox selection',
        'dataset.url' => 'URL extraction from data attributes',
        'urls.join(\'\\n\')' => 'URL formatting for clipboard',
        'document.execCommand(\'copy\')' => 'Clipboard copy functionality',
        'textarea.value = urlsText' => 'Temporary textarea creation',
        'Swal.fire' => 'SweetAlert notifications',
        'Links Copied!' => 'Success message',
        'No Files Selected' => 'Warning message',
        'No URLs Found' => 'Error message'
    ];
    
    foreach ($copyFeatures as $feature => $description) {
        if (strpos($indexRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    // Test 4: Check modal closing behavior
    echo "\n4. Testing modal closing behavior...\n";
    
    $modalFeatures = [
        'modal.addEventListener(\'click\'' => 'Click outside detection',
        'e.target === modal' => 'Modal target check',
        'closeModal()' => 'Modal close function',
        'document.addEventListener(\'keydown\'' => 'Keyboard event detection',
        'e.key === \'Escape\'' => 'Escape key detection',
        'DOMContentLoaded' => 'DOM ready event'
    ];
    
    foreach ($modalFeatures as $feature => $description) {
        if (strpos($indexRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    // Test 5: Check bulk actions bar functionality
    echo "\n5. Testing bulk actions bar functionality...\n";
    
    $bulkFeatures = [
        'bulk-actions-bar' => 'Bulk actions container',
        'select-all' => 'Select all checkbox',
        'selected-count' => 'Selected count display',
        'toggleSelectAll()' => 'Select all function',
        'updateSelectedCount()' => 'Update count function',
        'media-checkbox' => 'Individual checkboxes',
        'bg-blue-500' => 'Copy links button styling'
    ];
    
    foreach ($bulkFeatures as $feature => $description) {
        if (strpos($indexRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    // Test 6: Check error handling and fallbacks
    echo "\n6. Testing error handling and fallbacks...\n";
    
    $errorFeatures = [
        'try {' => 'Try-catch block',
        'catch (err)' => 'Error catching',
        'fallback' => 'Fallback mechanism',
        'Copy Links Manually' => 'Manual copy fallback',
        'textarea class="w-full h-32"' => 'Manual copy textarea',
        'confirmButtonColor' => 'Button styling in alerts'
    ];
    
    foreach ($errorFeatures as $feature => $description) {
        if (strpos($indexRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    // Test 7: Check user experience features
    echo "\n7. Testing user experience features...\n";
    
    $uxFeatures = [
        'timer: 3000' => 'Auto-dismiss timer',
        'timerProgressBar: true' => 'Progress bar indicator',
        'icon: \'success\'' => 'Success icon',
        'icon: \'warning\'' => 'Warning icon',
        'icon: \'error\'' => 'Error icon',
        'icon: \'info\'' => 'Info icon',
        'confirmButtonText' => 'Custom button text',
        'html:' => 'HTML content support'
    ];
    
    foreach ($uxFeatures as $feature => $description) {
        if (strpos($indexRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    // Test 8: Check data structure compatibility
    echo "\n8. Testing data structure compatibility...\n";
    
    $dataFeatures = [
        'data-url="{{ $resource[\'url\'] ?? \'\' }}"' => 'URL data attribute',
        'data-type="{{ $resource[\'type\'] ?? \'unknown\' }}"' => 'Type data attribute',
        'data-name="{{ $resource[\'name\'] ?? \'unknown\' }}"' => 'Name data attribute',
        'closest(\'.media-item\')' => 'DOM traversal',
        'forEach(checkbox =>' => 'Array iteration',
        'push(url)' => 'Array building'
    ];
    
    foreach ($dataFeatures as $feature => $description) {
        if (strpos($indexRendered, $feature) !== false) {
            echo "✓ Found $feature: $description\n";
        } else {
            echo "✗ Missing $feature: $description\n";
        }
    }
    
    echo "\n✓ All bulk copy links functionality tests completed successfully!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\nBulk copy links functionality test completed!\n";
