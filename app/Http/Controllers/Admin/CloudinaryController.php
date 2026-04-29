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
            // Try using search API to list all resources
            $result = Cloudinary::search()
                ->expression('resource_type:image')
                ->maxResults(500)
                ->execute();
            
            // Handle different response structures
            if (is_array($result) && isset($result['resources'])) {
                $resources = $result['resources'];
            } elseif (is_object($result) && method_exists($result, 'getResources')) {
                $resources = $result->getResources();
            } else {
                $resources = [];
                \Log::warning('Cloudinary returned unexpected structure: ' . json_encode($result));
            }
            
            // Debug: Log the resources count
            \Log::info('Cloudinary resources count: ' . count($resources));
            
            if (empty($resources)) {
                session()->flash('info', 'No media files found in Cloudinary. Try uploading some files first.');
            }
        } catch (\Exception $e) {
            // Return empty array if Cloudinary fails, but still show the page
            $resources = [];
            session()->flash('error', 'Could not load media from Cloudinary: ' . $e->getMessage());
            \Log::error('Cloudinary error: ' . $e->getMessage());
        }

        return view('admin.cloudinary.index', compact('resources'));
    }

    public function upload()
    {
        return view('admin.cloudinary.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // Max 10MB
            'folder' => 'nullable|string|max:255',
        ]);

        try {
            $folder = $request->input('folder', 'reputable-tours');
            
            $uploadResult = Cloudinary::upload(
                $request->file('file')->getRealPath(),
                [
                    'folder' => $folder,
                    'resource_type' => 'auto',
                ]
            );

            return redirect()->route('admin.cloudinary.index')
                ->with('success', 'File uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Upload failed: ' . $e->getMessage());
        }
    }

    public function folders()
    {
        try {
            // Get all folders from Cloudinary
            $folders = Cloudinary::admin()->folders()->getFolders();
        } catch (\Exception $e) {
            // Return empty array if Cloudinary fails, but still show the page
            $folders = [];
            session()->flash('warning', 'Could not load folders from Cloudinary: ' . $e->getMessage());
        }

        return view('admin.cloudinary.folders', compact('folders'));
    }

    public function analytics()
    {
        try {
            // Get all resources for analytics using search API
            $result = Cloudinary::search()
                ->maxResults(500)
                ->execute();
            
            // Handle different response structures
            if (is_array($result) && isset($result['resources'])) {
                $resources = $result['resources'];
            } elseif (is_object($result) && method_exists($result, 'getResources')) {
                $resources = $result->getResources();
            } else {
                $resources = [];
            }

            $stats = [
                'total_files' => count($resources),
                'total_bytes' => array_sum(array_column($resources, 'bytes')),
                'image_count' => count(array_filter($resources, fn($r) => ($r['resource_type'] ?? '') == 'image')),
                'video_count' => count(array_filter($resources, fn($r) => ($r['resource_type'] ?? '') == 'video')),
            ];
        } catch (\Exception $e) {
            // Return empty stats if Cloudinary fails, but still show the page
            $stats = [
                'total_files' => 0,
                'total_bytes' => 0,
                'image_count' => 0,
                'video_count' => 0,
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
                'cloud_name' => config('cloudinary.cloud_name'),
                'api_key' => config('cloudinary.api_key'),
                'api_secret' => config('cloudinary.api_secret') ? '***' : 'missing',
                'url' => config('cloudinary.url') ? '***' : 'missing',
            ];
            $results['config'] = ['status' => 'success', 'data' => $config];
        } catch (\Exception $e) {
            $results['config'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        // Test 2: Try search API
        try {
            $searchResult = Cloudinary::search()
                ->maxResults(5)
                ->execute();
            
            $results['search_api'] = [
                'status' => 'success',
                'type' => gettype($searchResult),
                'has_resources' => is_array($searchResult) ? isset($searchResult['resources']) : (is_object($searchResult) ? method_exists($searchResult, 'getResources') : false),
                'data' => is_array($searchResult) ? array_keys($searchResult) : 'object'
            ];
        } catch (\Exception $e) {
            $results['search_api'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        // Test 3: Try admin assets API
        try {
            $adminResult = Cloudinary::admin()->assets([
                'max_results' => 5,
                'resource_type' => 'image',
            ]);
            
            $results['admin_api'] = [
                'status' => 'success',
                'type' => gettype($adminResult),
                'has_resources' => is_array($adminResult) ? isset($adminResult['resources']) : false,
                'data' => is_array($adminResult) ? array_keys($adminResult) : 'object'
            ];
        } catch (\Exception $e) {
            $results['admin_api'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        // Test 4: Try admin folders API
        try {
            $foldersResult = Cloudinary::admin()->folders()->getFolders();
            
            $results['folders_api'] = [
                'status' => 'success',
                'type' => gettype($foldersResult),
                'count' => is_array($foldersResult) ? count($foldersResult) : 0,
            ];
        } catch (\Exception $e) {
            $results['folders_api'] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        // Test 5: Try to get actual resources with detailed output
        try {
            $result = Cloudinary::search()
                ->expression('resource_type:image')
                ->maxResults(3)
                ->execute();
            
            if (is_array($result) && isset($result['resources'])) {
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
            } elseif (is_object($result) && method_exists($result, 'getResources')) {
                $resources = $result->getResources();
                $results['actual_resources'] = [
                    'status' => 'success',
                    'count' => count($resources),
                    'method' => 'object with getResources()'
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
