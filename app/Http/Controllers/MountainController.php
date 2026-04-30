<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mountain;
use App\Models\HeroSlide;

class MountainController extends Controller
{
    // Public Pages
    public function index()
    {
        $mountains = Mountain::where('status', 'active')->get();
        $heroSlides = HeroSlide::active()->byPosition('mountains')->ordered()->get();
        return view('mountains.index', compact('mountains', 'heroSlides'));
    }

    public function show($slug)
    {
        $mountain = Mountain::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $heroSlides = HeroSlide::active()->byPosition('mountains')->ordered()->get();
        return view('mountains.show', compact('mountain', 'heroSlides'));
    }

    public function trekkingInfo($slug)
    {
        $mountain = Mountain::where('slug', $slug)->where('status', 'active')->firstOrFail();
        return view('mountains.trekking-info', compact('mountain'));
    }

    public function routes($slug)
    {
        $mountain = Mountain::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $tours = Tour::where('status', 'active')
            ->where('tour_type', 'mountain_trekking')
            ->where('location', 'like', '%' . $mountain->name . '%')
            ->get();
        return view('mountains.routes', compact('mountain', 'tours'));
    }

    public function equipmentGuide($slug)
    {
        $mountain = Mountain::where('slug', $slug)->where('status', 'active')->firstOrFail();
        return view('mountains.equipment', compact('mountain'));
    }

    public function expertGuides($slug)
    {
        $mountain = Mountain::where('slug', $slug)->where('status', 'active')->firstOrFail();
        return view('mountains.guides', compact('mountain'));
    }

    // Admin Pages
    public function adminIndex()
    {
        $mountains = Mountain::all();
        return view('admin.mountains.index', compact('mountains'));
    }

    public function adminShow($slug)
    {
        $mountain = Mountain::where('slug', $slug)->firstOrFail();
        return view('admin.mountains.show', compact('mountain'));
    }

    public function adminKilimanjaroRoutes()
    {
        $kilimanjaro = Mountain::where('slug', 'kilimanjaro')->firstOrFail();
        return view('admin.mountains.kilimanjaro-routes', compact('kilimanjaro'));
    }

    public function adminMeruClimbing()
    {
        $meru = Mountain::where('slug', 'meru')->firstOrFail();
        return view('admin.mountains.meru-climbing', compact('meru'));
    }

    public function edit($id)
    {
        $mountain = Mountain::findOrFail($id);
        return view('admin.mountains.edit', compact('mountain'));
    }

    public function update(Request $request, $id)
    {
        $mountain = Mountain::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:mountains,slug,' . $id,
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'height' => 'required|numeric',
            'height_unit' => 'required|string|max:50',
            'coordinates' => 'required|array',
            'trekking_info' => 'nullable|string',
            'routes' => 'nullable|array',
            'equipment_guide' => 'nullable|array',
            'expert_guides' => 'nullable|array',
            'images' => 'nullable|array',
            'difficulty_level' => 'nullable|string|max:255',
            'duration_days' => 'nullable|integer',
            'price_from' => 'nullable|numeric',
            'best_season' => 'nullable|string|max:255',
            'weather_info' => 'nullable|string',
            'highlights' => 'nullable|array',
            'status' => 'required|string|in:active,inactive',
        ]);

        $mountain->update($validated);
        
        return redirect()->route('admin.mountains.show', $mountain->slug)
            ->with('success', 'Mountain updated successfully!');
    }
}
