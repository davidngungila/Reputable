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
            // Get all resources from Cloudinary
            $resources = Cloudinary::search()
                ->maxResults(50)
                ->execute()
                ->getResources();

            return view('admin.cloudinary.index', compact('resources'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load media library: ' . $e->getMessage());
        }
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

            return view('admin.cloudinary.folders', compact('folders'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load folders: ' . $e->getMessage());
        }
    }

    public function analytics()
    {
        try {
            // Get all resources for analytics
            $resources = Cloudinary::search()
                ->maxResults(500)
                ->execute()
                ->getResources();

            $stats = [
                'total_files' => count($resources),
                'total_bytes' => array_sum(array_column($resources, 'bytes')),
                'image_count' => count(array_filter($resources, fn($r) => $r['resource_type'] == 'image')),
                'video_count' => count(array_filter($resources, fn($r) => $r['resource_type'] == 'video')),
            ];

            return view('admin.cloudinary.analytics', compact('stats'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load analytics: ' . $e->getMessage());
        }
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
