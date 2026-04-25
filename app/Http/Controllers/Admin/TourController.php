<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Destination;
use App\Models\Equipment;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::withCount('bookings')->latest()->get();
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        $destinations = Destination::all();
        $equipment = Equipment::all();
        $guides = Staff::where('role', 'guide')->get();
        return view('admin.tours.create', compact('destinations', 'equipment', 'guides'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
            'base_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'tour_type' => 'required|in:safari,mountain,beach,cultural',
            'difficulty_level' => 'nullable|in:easy,moderate,challenging',
            'max_group_size' => 'nullable|integer|min:1|max:50',
            'min_age' => 'nullable|integer|min:0|max:100',
            'destinations' => 'nullable|array',
            'destinations.*' => 'exists:destinations,id',
            'equipment_required' => 'nullable|array',
            'equipment_required.*' => 'exists:equipment,id',
            'recommended_guides' => 'nullable|array',
            'recommended_guides.*' => 'exists:staff,id',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'what_to_bring' => 'nullable|array',
            'highlights' => 'nullable|array',
            'images' => 'nullable|array',
            'status' => 'nullable|in:active,inactive,draft',
        ]);

        $tour = Tour::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']) . '-' . Str::random(6),
            'location' => $validated['location'],
            'duration_days' => $validated['duration_days'],
            'base_price' => $validated['base_price'],
            'description' => $validated['description'] ?? null,
            'tour_type' => $validated['tour_type'],
            'difficulty_level' => $validated['difficulty_level'] ?? 'easy',
            'max_group_size' => $validated['max_group_size'] ?? 20,
            'min_age' => $validated['min_age'] ?? 0,
            'images' => $validated['images'] ?? [],
            'inclusions' => $validated['inclusions'] ?? [],
            'exclusions' => $validated['exclusions'] ?? [],
            'what_to_bring' => $validated['what_to_bring'] ?? [],
            'highlights' => $validated['highlights'] ?? [],
            'featured' => false,
            'status' => $validated['status'] ?? 'active',
        ]);

        // Attach relationships
        if (!empty($validated['destinations'])) {
            $tour->destinations()->attach($validated['destinations']);
        }
        if (!empty($validated['equipment_required'])) {
            $tour->equipment()->attach($validated['equipment_required']);
        }
        if (!empty($validated['recommended_guides'])) {
            $tour->recommendedGuides()->attach($validated['recommended_guides']);
        }

        return redirect()->route('admin.tours.show', $tour)->with('success', 'Tour created successfully.');
    }

    public function show(Tour $tour)
    {
        $tour->load(['itineraries', 'destinations', 'equipment', 'recommendedGuides', 'bookings']);
        return view('admin.tours.show', compact('tour'));
    }

    public function edit(Tour $tour)
    {
        $destinations = Destination::all();
        $equipment = Equipment::all();
        $guides = Staff::where('role', 'guide')->get();
        $tour->load(['destinations', 'equipment', 'recommendedGuides']);
        return view('admin.tours.edit', compact('tour', 'destinations', 'equipment', 'guides'));
    }

    public function update(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
            'base_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'tour_type' => 'required|in:safari,mountain,beach,cultural',
            'difficulty_level' => 'nullable|in:easy,moderate,challenging',
            'max_group_size' => 'nullable|integer|min:1|max:50',
            'min_age' => 'nullable|integer|min:0|max:100',
            'destinations' => 'nullable|array',
            'destinations.*' => 'exists:destinations,id',
            'equipment_required' => 'nullable|array',
            'equipment_required.*' => 'exists:equipment,id',
            'recommended_guides' => 'nullable|array',
            'recommended_guides.*' => 'exists:staff,id',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'what_to_bring' => 'nullable|array',
            'highlights' => 'nullable|array',
            'images' => 'nullable|array',
            'status' => 'nullable|in:active,inactive,draft',
            'featured' => 'nullable|boolean',
        ]);

        $tour->update([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'duration_days' => $validated['duration_days'],
            'base_price' => $validated['base_price'],
            'description' => $validated['description'] ?? null,
            'tour_type' => $validated['tour_type'],
            'difficulty_level' => $validated['difficulty_level'] ?? 'easy',
            'max_group_size' => $validated['max_group_size'] ?? 20,
            'min_age' => $validated['min_age'] ?? 0,
            'images' => $validated['images'] ?? [],
            'inclusions' => $validated['inclusions'] ?? [],
            'exclusions' => $validated['exclusions'] ?? [],
            'what_to_bring' => $validated['what_to_bring'] ?? [],
            'highlights' => $validated['highlights'] ?? [],
            'status' => $validated['status'] ?? $tour->status,
            'featured' => (bool) ($validated['featured'] ?? $tour->featured),
        ]);

        // Sync relationships
        $tour->destinations()->sync($validated['destinations'] ?? []);
        $tour->equipment()->sync($validated['equipment_required'] ?? []);
        $tour->recommendedGuides()->sync($validated['recommended_guides'] ?? []);

        return redirect()->route('admin.tours.show', $tour)->with('success', 'Tour updated successfully.');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('admin.tours.index')->with('success', 'Tour deleted successfully.');
    }

    // Itinerary Builder
    public function itineraryBuilder()
    {
        return view('admin.tours.itinerary-builder');
    }

    public function storeItinerary(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'day_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'activities' => 'nullable|array',
            'meals' => 'nullable|array',
            'accommodation' => 'nullable|string',
            'transportation' => 'nullable|string',
        ]);

        // Create itinerary logic here
        return redirect()->back()->with('success', 'Itinerary added successfully.');
    }

    // Availability & Pricing
    public function availabilityPricing()
    {
        $tours = Tour::all();
        return view('admin.tours.availability-pricing', compact('tours'));
    }

    public function updateAvailability(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'availability' => 'required|array',
            'availability.*.date' => 'required|date',
            'availability.*.available_slots' => 'required|integer|min:0',
            'availability.*.price' => 'required|numeric|min:0',
            'seasonal_pricing' => 'nullable|array',
        ]);

        // Update availability logic here
        return redirect()->back()->with('success', 'Availability updated successfully.');
    }

    // Destinations Management
    public function destinations()
    {
        $destinations = Destination::withCount('tours')->latest()->get();
        return view('admin.tours.destinations', compact('destinations'));
    }

    public function storeDestination(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'coordinates' => 'nullable|array',
            'coordinates.lat' => 'nullable|numeric',
            'coordinates.lng' => 'nullable|numeric',
            'highlights' => 'nullable|array',
            'best_time_to_visit' => 'nullable|string',
            'weather_info' => 'nullable|string',
            'images' => 'nullable|array',
            'status' => 'nullable|in:active,inactive',
        ]);

        Destination::create($validated);
        return redirect()->back()->with('success', 'Destination created successfully.');
    }

    // Mountain Trekking Specific Methods
    public function kilimanjaroRoutes()
    {
        $routes = Tour::where('tour_type', 'mountain')
            ->where('location', 'like', '%kilimanjaro%')
            ->withCount('bookings')
            ->latest()
            ->get();
        
        return view('admin.mountain.kilimanjaro-routes', compact('routes'));
    }

    public function meruClimbing()
    {
        $routes = Tour::where('tour_type', 'mountain')
            ->where('location', 'like', '%meru%')
            ->withCount('bookings')
            ->latest()
            ->get();
        
        return view('admin.mountain.meru-climbing', compact('routes'));
    }

    // Equipment Management
    public function equipmentManagement()
    {
        $equipment = Equipment::withCount('tours')->latest()->get();
        return view('admin.mountain.equipment-management', compact('equipment'));
    }

    public function storeEquipment(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:climbing,camping,safety,general',
            'quantity' => 'required|integer|min:0',
            'condition' => 'required|in:excellent,good,fair,poor',
            'purchase_date' => 'nullable|date',
            'last_maintenance' => 'nullable|date',
            'next_maintenance' => 'nullable|date',
            'images' => 'nullable|array',
            'status' => 'nullable|in:available,maintenance,retired',
        ]);

        Equipment::create($validated);
        return redirect()->back()->with('success', 'Equipment added successfully.');
    }

    // Guide Assignments
    public function guideAssignments()
    {
        $guides = Staff::where('role', 'guide')->with(['assignments.tour', 'assignments.booking'])->get();
        $upcomingAssignments = [];
        
        return view('admin.mountain.guide-assignments', compact('guides', 'upcomingAssignments'));
    }

    public function assignGuide(Request $request)
    {
        $validated = $request->validate([
            'guide_id' => 'required|exists:staff,id',
            'tour_id' => 'required|exists:tours,id',
            'booking_id' => 'nullable|exists:bookings,id',
            'assignment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Create assignment logic here
        return redirect()->back()->with('success', 'Guide assigned successfully.');
    }
}
