<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MountainTrekkingRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MountainTrekkingRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $routes = MountainTrekkingRoute::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->when($request->mountain, function ($query, $mountain) {
                $query->where('mountain_name', $mountain);
            })
            ->when($request->difficulty, function ($query, $difficulty) {
                $query->where('difficulty', $difficulty);
            })
            ->when($request->status !== null, function ($query, $status) {
                $query->where('is_active', $status);
            })
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(15);

        $mountains = MountainTrekkingRoute::distinct()->pluck('mountain_name');
        $difficulties = MountainTrekkingRoute::distinct()->pluck('difficulty');

        return view('admin.mountain-trekking-routes.index', compact('routes', 'mountains', 'difficulties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mountains = ['Mount Kilimanjaro', 'Mount Meru'];
        $difficulties = ['Easy to Moderate', 'Moderate', 'Challenging', 'Very Challenging'];
        
        return view('admin.mountain-trekking-routes.create', compact('mountains', 'difficulties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:mountain_trekking_routes,slug',
            'description' => 'required|string',
            'mountain_name' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'difficulty' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
            'price_from' => 'required|numeric|min:0',
            'price_to' => 'nullable|numeric|min:0',
            'success_rate' => 'required|string|max:50',
            'highlights' => 'nullable|array',
            'itinerary' => 'nullable|array',
            'included' => 'nullable|array',
            'excluded' => 'nullable|array',
            'best_season' => 'required|string|max:255',
            'images' => 'nullable|array',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->has('is_active');

        MountainTrekkingRoute::create($validated);

        return redirect()
            ->route('admin.mountain-trekking-routes.index')
            ->with('success', 'Mountain trekking route created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MountainTrekkingRoute $mountainTrekkingRoute)
    {
        return view('admin.mountain-trekking-routes.show', compact('mountainTrekkingRoute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MountainTrekkingRoute $mountainTrekkingRoute)
    {
        $mountains = ['Mount Kilimanjaro', 'Mount Meru'];
        $difficulties = ['Easy to Moderate', 'Moderate', 'Challenging', 'Very Challenging'];
        
        return view('admin.mountain-trekking-routes.edit', compact('mountainTrekkingRoute', 'mountains', 'difficulties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MountainTrekkingRoute $mountainTrekkingRoute)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('mountain_trekking_routes', 'slug')->ignore($mountainTrekkingRoute->id)],
            'description' => 'required|string',
            'mountain_name' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'difficulty' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
            'price_from' => 'required|numeric|min:0',
            'price_to' => 'nullable|numeric|min:0',
            'success_rate' => 'required|string|max:50',
            'highlights' => 'nullable|array',
            'itinerary' => 'nullable|array',
            'included' => 'nullable|array',
            'excluded' => 'nullable|array',
            'best_season' => 'required|string|max:255',
            'images' => 'nullable|array',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->has('is_active');

        $mountainTrekkingRoute->update($validated);

        return redirect()
            ->route('admin.mountain-trekking-routes.index')
            ->with('success', 'Mountain trekking route updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MountainTrekkingRoute $mountainTrekkingRoute)
    {
        $mountainTrekkingRoute->delete();

        return redirect()
            ->route('admin.mountain-trekking-routes.index')
            ->with('success', 'Mountain trekking route deleted successfully!');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(MountainTrekkingRoute $mountainTrekkingRoute)
    {
        $mountainTrekkingRoute->update([
            'is_active' => !$mountainTrekkingRoute->is_active
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!',
            'is_active' => $mountainTrekkingRoute->is_active
        ]);
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'No items selected!'
            ]);
        }

        switch ($action) {
            case 'activate':
                MountainTrekkingRoute::whereIn('id', $ids)->update(['is_active' => true]);
                $message = 'Selected routes activated successfully!';
                break;
            case 'deactivate':
                MountainTrekkingRoute::whereIn('id', $ids)->update(['is_active' => false]);
                $message = 'Selected routes deactivated successfully!';
                break;
            case 'delete':
                MountainTrekkingRoute::whereIn('id', $ids)->delete();
                $message = 'Selected routes deleted successfully!';
                break;
            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid action!'
                ]);
        }

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    /**
     * Reorder routes
     */
    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);

        foreach ($orders as $order) {
            MountainTrekkingRoute::where('id', $order['id'])
                ->update(['sort_order' => $order['sort_order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Routes reordered successfully!'
        ]);
    }
}
