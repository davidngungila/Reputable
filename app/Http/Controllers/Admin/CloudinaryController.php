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
            // Try using admin API to list all resources
            $result = Cloudinary::admin()->assets([
                'max_results' => 500,
                'resource_type' => 'image',
            ]);
            
            $resources = $result['resources'] ?? [];
            
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
            // Get all resources for analytics using admin API
            $result = Cloudinary::admin()->assets([
                'max_results' => 500,
                'resource_type' => 'all',
            ]);
            
            $resources = $result['resources'] ?? [];

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
}
