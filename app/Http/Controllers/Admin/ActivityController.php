<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::withCount(['tours', 'bookings'])->latest()->get();
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.activities.create', compact('destinations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'activity_type' => 'required|in:cultural,beach,wildlife,adventure',
            'location' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'difficulty_level' => 'nullable|in:easy,moderate,challenging',
            'age_requirement' => 'nullable|integer|min:0|max:100',
            'group_size' => 'nullable|integer|min:1|max:100',
            'price' => 'required|numeric|min:0',
            'highlights' => 'nullable|array',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'what_to_bring' => 'nullable|array',
            'safety_info' => 'nullable|array',
            'best_time' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'destinations' => 'nullable|array',
            'destinations.*' => 'exists:destinations,id',
            'status' => 'nullable|in:active,inactive,draft',
            'featured' => 'nullable|boolean',
        ]);

        $activity = Activity::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']) . '-' . Str::random(6),
            'description' => $validated['description'],
            'activity_type' => $validated['activity_type'],
            'location' => $validated['location'],
            'duration' => $validated['duration'],
            'difficulty_level' => $validated['difficulty_level'] ?? 'easy',
            'age_requirement' => $validated['age_requirement'] ?? 0,
            'group_size' => $validated['group_size'] ?? 20,
            'price' => $validated['price'],
            'highlights' => $validated['highlights'] ?? [],
            'inclusions' => $validated['inclusions'] ?? [],
            'exclusions' => $validated['exclusions'] ?? [],
            'what_to_bring' => $validated['what_to_bring'] ?? [],
            'safety_info' => $validated['safety_info'] ?? [],
            'best_time' => $validated['best_time'] ?? null,
            'images' => $validated['images'] ?? [],
            'status' => $validated['status'] ?? 'active',
            'featured' => (bool) ($validated['featured'] ?? false),
        ]);

        // Attach destinations
        if (!empty($validated['destinations'])) {
            $activity->destinations()->attach($validated['destinations']);
        }

        return redirect()->route('admin.activities.show', $activity)->with('success', 'Activity created successfully.');
    }

    public function show(Activity $activity)
    {
        $activity->load(['destinations', 'tours', 'bookings']);
        return view('admin.activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        $destinations = Destination::all();
        $activity->load('destinations');
        return view('admin.activities.edit', compact('activity', 'destinations'));
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'activity_type' => 'required|in:cultural,beach,wildlife,adventure',
            'location' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'difficulty_level' => 'nullable|in:easy,moderate,challenging',
            'age_requirement' => 'nullable|integer|min:0|max:100',
            'group_size' => 'nullable|integer|min:1|max:100',
            'price' => 'required|numeric|min:0',
            'highlights' => 'nullable|array',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'what_to_bring' => 'nullable|array',
            'safety_info' => 'nullable|array',
            'best_time' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'destinations' => 'nullable|array',
            'destinations.*' => 'exists:destinations,id',
            'status' => 'nullable|in:active,inactive,draft',
            'featured' => 'nullable|boolean',
        ]);

        $activity->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'activity_type' => $validated['activity_type'],
            'location' => $validated['location'],
            'duration' => $validated['duration'],
            'difficulty_level' => $validated['difficulty_level'] ?? 'easy',
            'age_requirement' => $validated['age_requirement'] ?? 0,
            'group_size' => $validated['group_size'] ?? 20,
            'price' => $validated['price'],
            'highlights' => $validated['highlights'] ?? [],
            'inclusions' => $validated['inclusions'] ?? [],
            'exclusions' => $validated['exclusions'] ?? [],
            'what_to_bring' => $validated['what_to_bring'] ?? [],
            'safety_info' => $validated['safety_info'] ?? [],
            'best_time' => $validated['best_time'] ?? null,
            'images' => $validated['images'] ?? [],
            'status' => $validated['status'] ?? $activity->status,
            'featured' => (bool) ($validated['featured'] ?? $activity->featured),
        ]);

        // Sync destinations
        $activity->destinations()->sync($validated['destinations'] ?? []);

        return redirect()->route('admin.activities.show', $activity)->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activities.index')->with('success', 'Activity deleted successfully.');
    }

    // View All Activities (Things to Do main page)
    public function viewAllActivities()
    {
        $activities = Activity::withCount(['tours', 'bookings'])
            ->latest()
            ->get()
            ->groupBy('activity_type');

        return view('admin.activities.view-all', compact('activities'));
    }

    // Cultural Tours
    public function culturalTours()
    {
        $activities = Activity::cultural()
            ->withCount(['tours', 'bookings'])
            ->latest()
            ->get();

        return view('admin.activities.cultural', compact('activities'));
    }

    // Beach Activities
    public function beachActivities()
    {
        $activities = Activity::beach()
            ->withCount(['tours', 'bookings'])
            ->latest()
            ->get();

        return view('admin.activities.beach', compact('activities'));
    }

    // Wildlife Experiences
    public function wildlifeExperiences()
    {
        $activities = Activity::wildlife()
            ->withCount(['tours', 'bookings'])
            ->latest()
            ->get();

        return view('admin.activities.wildlife', compact('activities'));
    }

    // Activities Management (main management page)
    public function activitiesManagement()
    {
        $activities = Activity::withCount(['tours', 'bookings'])
            ->latest()
            ->paginate(20);

        $stats = [
            'total' => Activity::count(),
            'cultural' => Activity::cultural()->count(),
            'beach' => Activity::beach()->count(),
            'wildlife' => Activity::wildlife()->count(),
            'adventure' => Activity::adventure()->count(),
            'featured' => Activity::featured()->count(),
            'active' => Activity::active()->count(),
        ];

        return view('admin.activities.management', compact('activities', 'stats'));
    }
}
