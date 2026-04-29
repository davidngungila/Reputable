<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CloudinaryController extends Controller
{
    public function index()
    {
        try {
            // Initialize Cloudinary SDK directly
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_KEY'),
                    'api_secret' => env('CLOUDINARY_SECRET'),
                ]
            ]);

            // Get resources for Media Library
            $search = new \Cloudinary\Api\Search\SearchApi();
            $search->expression('resource_type:image OR resource_type:video')->maxResults(500);
            $result = $search->execute();
            
            // Handle response structure - convert object to array if needed
            $resultArray = is_object($result) ? json_decode(json_encode($result), true) : $result;
            
            if (is_array($resultArray) && isset($resultArray['resources'])) {
                $resources = $resultArray['resources'];
            } else {
                $resources = [];
                \Log::warning('Cloudinary returned unexpected structure: ' . json_encode($result));
            }

            // Get folders for Manage Folders section
            try {
                $api = new \Cloudinary\Api\Admin\AdminApi();
                $foldersResult = $api->rootFolders();
                $folders = is_object($foldersResult) ? json_decode(json_encode($foldersResult), true) : $foldersResult;
                $folders = is_array($folders) ? $folders : [];
            } catch (\Exception $e) {
                $folders = [];
            }

            // Get analytics data
            $stats = [
                'total_files' => count($resources),
                'total_bytes' => array_sum(array_column($resources, 'bytes')),
                'image_count' => count(array_filter($resources, fn($r) => ($r['resource_type'] ?? '') == 'image')),
                'video_count' => count(array_filter($resources, fn($r) => ($r['resource_type'] ?? '') == 'video')),
                'folder_count' => count($folders),
            ];

            // Format resources for display
            $formattedResources = collect($resources)->map(function ($resource) {
                return [
                    'id' => $resource['public_id'] ?? '',
                    'url' => $resource['secure_url'] ?? '',
                    'thumbnail' => $resource['secure_url'] ?? '',
                    'name' => basename($resource['public_id'] ?? ''),
                    'type' => $resource['resource_type'] ?? 'unknown',
                    'size' => $this->formatBytes($resource['bytes'] ?? 0),
                    'created_at' => $resource['created_at'] ?? '',
                    'folder' => $resource['folder'] ?? 'root',
                ];
            })->toArray();

            // Format folders
            $formattedFolders = collect($folders)->map(function ($folder) {
                return [
                    'name' => $folder['name'] ?? '',
                    'path' => $folder['path'] ?? '',
                    'created_at' => $folder['created_at'] ?? '',
                ];
            })->toArray();

            $mediaData = [
                'resources' => $formattedResources,
                'folders' => $formattedFolders,
                'stats' => $stats,
                'upload_url' => route('admin.cloudinary.upload'),
                'folders_url' => route('admin.cloudinary.folders'),
                'analytics_url' => route('admin.cloudinary.analytics'),
            ];

        } catch (\Exception $e) {
            // Return empty structure if Cloudinary fails
            $mediaData = [
                'resources' => [],
                'folders' => [],
                'stats' => [
                    'total_files' => 0,
                    'total_bytes' => 0,
                    'image_count' => 0,
                    'video_count' => 0,
                    'folder_count' => 0,
                ],
                'upload_url' => route('admin.cloudinary.upload'),
                'folders_url' => route('admin.cloudinary.folders'),
                'analytics_url' => route('admin.cloudinary.analytics'),
            ];
            session()->flash('error', 'Could not load media from Cloudinary: ' . $e->getMessage());
            \Log::error('Cloudinary error: ' . $e->getMessage());
        }

        return view('admin.cloudinary.index', $mediaData);
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }

    public function upload()
    {
        return view('admin.cloudinary.upload')->with('errors', session()->get('errors', new \Illuminate\Support\MessageBag()));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240', // Max 10MB per file
            'files' => 'required|array|min:1',
            'folder' => 'nullable|string|max:255',
        ]);

        try {
            $folder = $request->input('folder', 'reputable-tours');
            $files = $request->file('files');
            $uploadedFiles = [];
            $failedFiles = [];

            foreach ($files as $index => $file) {
                try {
                    $uploadResult = Cloudinary::upload(
                        $file->getRealPath(),
                        [
                            'folder' => $folder,
                            'resource_type' => 'auto',
                            'public_id' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '_' . $index,
                        ]
                    );

                    $uploadedFiles[] = [
                        'name' => $file->getClientOriginalName(),
                        'url' => $uploadResult->getSecurePath(),
                        'size' => $this->formatBytes($file->getSize()),
                    ];
                } catch (\Exception $e) {
                    $failedFiles[] = [
                        'name' => $file->getClientOriginalName(),
                        'error' => $e->getMessage(),
                    ];
                }
            }

            $message = $this->getUploadMessage(count($uploadedFiles), count($failedFiles), $folder);
            
            // Check if request expects JSON (AJAX)
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'uploaded_files' => $uploadedFiles,
                    'failed_files' => $failedFiles,
                    'total_uploaded' => count($uploadedFiles),
                    'total_failed' => count($failedFiles)
                ]);
            }
            
            return redirect()->route('admin.cloudinary.index')
                ->with('success', $message)
                ->with('uploaded_files', $uploadedFiles)
                ->with('failed_files', $failedFiles);

        } catch (\Exception $e) {
            // Check if request expects JSON (AJAX)
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Upload failed: ' . $e->getMessage()
                ]);
            }
            
            return redirect()->back()->with('error', 'Upload failed: ' . $e->getMessage());
        }
    }

    private function getUploadMessage($uploadedCount, $failedCount, $folder)
    {
        if ($failedCount === 0) {
            return "Successfully uploaded {$uploadedCount} file(s) to '{$folder}' folder!";
        } elseif ($uploadedCount === 0) {
            return "Failed to upload any files. Please try again.";
        } else {
            return "Uploaded {$uploadedCount} file(s) successfully, but {$failedCount} file(s) failed.";
        }
    }

    public function folders()
    {
        try {
            // Initialize Cloudinary SDK directly
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_KEY'),
                    'api_secret' => env('CLOUDINARY_SECRET'),
                ]
            ]);

            $api = new \Cloudinary\Api\Admin\AdminApi();
            $foldersResult = $api->rootFolders();
            
            // Get all resources to calculate folder statistics
            $search = new \Cloudinary\Api\Search\SearchApi();
            $search->expression('resource_type:image OR resource_type:video')->maxResults(500);
            $resourcesResult = $search->execute();
            $resourcesArray = is_object($resourcesResult) ? json_decode(json_encode($resourcesResult), true) : $resourcesResult;
            $resources = is_array($resourcesArray) && isset($resourcesArray['resources']) ? $resourcesArray['resources'] : [];
            
            // Format folders consistently with index method
            $folders = is_object($foldersResult) ? json_decode(json_encode($foldersResult), true) : $foldersResult;
            $folders = is_array($folders) ? $folders : [];
            
            $formattedFolders = collect($folders)->map(function ($folder) use ($resources) {
                $folderPath = $folder['path'] ?? ($folder['name'] ?? '');
                
                // Count files in this folder
                $folderFiles = collect($resources)->filter(function ($resource) use ($folderPath) {
                    $resourceFolder = $resource['folder'] ?? '';
                    return $resourceFolder === $folderPath || str_starts_with($resourceFolder, $folderPath . '/');
                });
                
                $fileCount = $folderFiles->count();
                $totalBytes = $folderFiles->sum('bytes');
                
                return [
                    'name' => $folder['name'] ?? '',
                    'path' => $folderPath,
                    'created_at' => $folder['created_at'] ?? '',
                    'file_count' => $fileCount,
                    'storage_used' => $this->formatBytes($totalBytes),
                    'storage_bytes' => $totalBytes,
                ];
            })->toArray();
            
            // Calculate overall statistics
            $totalFiles = count($resources);
            $totalBytes = array_sum(array_column($resources, 'bytes'));
            $totalStorage = $this->formatBytes($totalBytes);
            
        } catch (\Exception $e) {
            $formattedFolders = [];
            $totalFiles = 0;
            $totalStorage = '0 B';
            session()->flash('warning', 'Could not load folders from Cloudinary: ' . $e->getMessage());
        }

        return view('admin.cloudinary.folders', [
            'folders' => $formattedFolders,
            'total_files' => $totalFiles ?? 0,
            'total_storage' => $totalStorage ?? '0 B'
        ]);
    }

    public function analytics()
    {
        try {
            // Initialize Cloudinary SDK directly
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_KEY'),
                    'api_secret' => env('CLOUDINARY_SECRET'),
                ]
            ]);

            // Get all resources for analytics using direct Search API
            $search = new \Cloudinary\Api\Search\SearchApi();
            $search->maxResults(500);
            $result = $search->execute();
            
            // Handle response structure
            $resultArray = is_object($result) ? json_decode(json_encode($result), true) : $result;
            $resources = is_array($resultArray) && isset($resultArray['resources']) ? $resultArray['resources'] : [];

            // Get folders for storage breakdown
            $api = new \Cloudinary\Api\Admin\AdminApi();
            $foldersResult = $api->rootFolders();
            $folders = is_object($foldersResult) ? json_decode(json_encode($foldersResult), true) : $foldersResult;
            $folders = is_array($folders) ? $folders : [];

            // Calculate folder statistics
            $folderStats = collect($folders)->map(function ($folder) use ($resources) {
                $folderPath = $folder['path'] ?? ($folder['name'] ?? '');
                
                // Count files in this folder
                $folderFiles = collect($resources)->filter(function ($resource) use ($folderPath) {
                    $resourceFolder = $resource['folder'] ?? '';
                    return $resourceFolder === $folderPath || str_starts_with($resourceFolder, $folderPath . '/');
                });
                
                return [
                    'name' => $folder['name'] ?? '',
                    'path' => $folderPath,
                    'file_count' => $folderFiles->count(),
                    'storage_bytes' => $folderFiles->sum('bytes'),
                    'storage_used' => $this->formatBytes($folderFiles->sum('bytes')),
                ];
            })->sortByDesc('storage_bytes')->take(5)->values()->toArray();

            // Calculate file type distribution
            $imageCount = count(array_filter($resources, fn($r) => ($r['resource_type'] ?? '') == 'image'));
            $videoCount = count(array_filter($resources, fn($r) => ($r['resource_type'] ?? '') == 'video'));
            $rawCount = count(array_filter($resources, fn($r) => !in_array($r['resource_type'] ?? '', ['image', 'video'])));

            // Get recent activity (last 10 files by creation date)
            $recentFiles = collect($resources)
                ->sortByDesc('created_at')
                ->take(10)
                ->map(function ($resource) {
                    return [
                        'public_id' => $resource['public_id'] ?? '',
                        'secure_url' => $resource['secure_url'] ?? '',
                        'resource_type' => $resource['resource_type'] ?? 'unknown',
                        'bytes' => $resource['bytes'] ?? 0,
                        'created_at' => $resource['created_at'] ?? '',
                        'folder' => $resource['folder'] ?? 'root',
                    ];
                })
                ->toArray();

            $stats = [
                'total_files' => count($resources),
                'total_bytes' => array_sum(array_column($resources, 'bytes')),
                'image_count' => $imageCount,
                'video_count' => $videoCount,
                'raw_count' => $rawCount,
                'folder_stats' => $folderStats,
                'recent_files' => $recentFiles,
                'file_type_distribution' => [
                    'images' => $imageCount,
                    'videos' => $videoCount,
                    'raw' => $rawCount,
                ],
            ];
        } catch (\Exception $e) {
            // Return empty stats if Cloudinary fails, but still show the page
            $stats = [
                'total_files' => 0,
                'total_bytes' => 0,
                'image_count' => 0,
                'video_count' => 0,
                'raw_count' => 0,
                'folder_stats' => [],
                'recent_files' => [],
                'file_type_distribution' => [
                    'images' => 0,
                    'videos' => 0,
                    'raw' => 0,
                ],
            ];
            session()->flash('warning', 'Could not load analytics from Cloudinary: ' . $e->getMessage());
        }

        return view('admin.cloudinary.analytics', compact('stats'));
    }

    public function createFolder(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255',
        ]);

        try {
            Cloudinary::admin()->createFolder($request->input('folder_name'));

            return redirect()->route('admin.cloudinary.folders')
                ->with('success', 'Folder created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create folder: ' . $e->getMessage());
        }
    }

    public function destroy($publicId)
    {
        try {
            Cloudinary::destroy($publicId);

            return redirect()->route('admin.cloudinary.index')
                ->with('success', 'File deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete file: ' . $e->getMessage());
        }
    }

    public function test()
    {
        return view('admin.cloudinary.test');
    }

    public function testApi()
    {
        $results = [];

        // Test 1: Check Cloudinary configuration
        try {
            $config = [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_KEY'),
                'api_secret' => env('CLOUDINARY_SECRET') ? '***' : 'missing',
                'cloud_url' => env('CLOUDINARY_URL') ? '***' : 'missing',
            ];
            $results['config'] = ['status' => 'success', 'data' => $config];
        } catch (\Exception $e) {
            $results['config'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        // Test 2: Try search API with direct SDK
        try {
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_KEY'),
                    'api_secret' => env('CLOUDINARY_SECRET'),
                ]
            ]);

            $search = new \Cloudinary\Api\Search\SearchApi();
            $searchResult = $search->maxResults(5)->execute();
            
            if ($searchResult === null) {
                $results['search_api'] = ['status' => 'error', 'message' => 'Cloudinary returned null'];
            } else {
                $results['search_api'] = [
                    'status' => 'success',
                    'type' => gettype($searchResult),
                    'has_resources' => is_array($searchResult) ? isset($searchResult['resources']) : false,
                    'count' => is_array($searchResult) && isset($searchResult['resources']) ? count($searchResult['resources']) : 0
                ];
            }
        } catch (\Exception $e) {
            $results['search_api'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        // Test 3: Try admin assets API with direct SDK
        try {
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_KEY'),
                    'api_secret' => env('CLOUDINARY_SECRET'),
                ]
            ]);

            $api = new \Cloudinary\Api\Admin\AdminApi();
            $adminResult = $api->assets(['max_results' => 5, 'resource_type' => 'image']);
            
            if ($adminResult === null) {
                $results['admin_api'] = ['status' => 'error', 'message' => 'Cloudinary returned null'];
            } else {
                $results['admin_api'] = [
                    'status' => 'success',
                    'type' => gettype($adminResult),
                    'has_resources' => is_array($adminResult) ? isset($adminResult['resources']) : false,
                    'count' => is_array($adminResult) && isset($adminResult['resources']) ? count($adminResult['resources']) : 0
                ];
            }
        } catch (\Exception $e) {
            $results['admin_api'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        // Test 4: Try admin folders API with direct SDK
        try {
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_KEY'),
                    'api_secret' => env('CLOUDINARY_SECRET'),
                ]
            ]);

            $api = new \Cloudinary\Api\Admin\AdminApi();
            $foldersResult = $api->rootFolders();
            
            if ($foldersResult === null) {
                $results['folders_api'] = ['status' => 'error', 'message' => 'Cloudinary returned null'];
            } else {
                $results['folders_api'] = [
                    'status' => 'success',
                    'type' => gettype($foldersResult),
                    'count' => is_array($foldersResult) ? count($foldersResult) : 0,
                ];
            }
        } catch (\Exception $e) {
            $results['folders_api'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        // Test 5: Try to get actual resources with detailed output
        try {
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_KEY'),
                    'api_secret' => env('CLOUDINARY_SECRET'),
                ]
            ]);

            $search = new \Cloudinary\Api\Search\SearchApi();
            $search->expression('resource_type:image')->maxResults(3);
            $result = $search->execute();
            
            if ($result === null) {
                $results['actual_resources'] = ['status' => 'error', 'message' => 'Cloudinary returned null'];
            } elseif (is_array($result) && isset($result['resources'])) {
                $resources = $result['resources'];
                $results['actual_resources'] = [
                    'status' => 'success',
                    'count' => count($resources),
                    'sample' => count($resources) > 0 ? [
                        'public_id' => $resources[0]['public_id'] ?? 'N/A',
                        'secure_url' => $resources[0]['secure_url'] ?? 'N/A',
                        'resource_type' => $resources[0]['resource_type'] ?? 'N/A',
                        'bytes' => $resources[0]['bytes'] ?? 'N/A',
                    ] : 'no resources'
                ];
            } else {
                $results['actual_resources'] = [
                    'status' => 'error',
                    'message' => 'Unexpected response structure',
                    'type' => gettype($result)
                ];
            }
        } catch (\Exception $e) {
            $results['actual_resources'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        return response()->json($results, 200, [], JSON_PRETTY_PRINT);
    }
}
