<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlide;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('position')->orderBy('sort_order')->get();
        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        $positions = ['home', 'mountains', 'about', 'contact', 'tours', 'destinations'];
        return view('admin.hero-slides.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image_url' => 'required|url',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'position' => 'required|in:home,mountains,about,contact,tours,destinations',
        ]);

        HeroSlide::create($validated);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide created successfully!');
    }

    public function edit($id)
    {
        $slide = HeroSlide::findOrFail($id);
        $positions = ['home', 'mountains', 'about', 'contact', 'tours', 'destinations'];
        return view('admin.hero-slides.edit', compact('slide', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $slide = HeroSlide::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image_url' => 'required|url',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'position' => 'required|in:home,mountains,about,contact,tours,destinations',
        ]);

        $slide->update($validated);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide updated successfully!');
    }

    public function destroy($id)
    {
        $slide = HeroSlide::findOrFail($id);
        $slide->delete();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $slide = HeroSlide::findOrFail($id);
        $slide->is_active = !$slide->is_active;
        $slide->save();

        return response()->json([
            'success' => true,
            'is_active' => $slide->is_active,
            'message' => 'Hero slide status updated successfully!'
        ]);
    }

    public function reorder(Request $request)
    {
        $order = $request->input('order', []);
        
        foreach ($order as $index => $slideId) {
            $slide = HeroSlide::find($slideId);
            if ($slide) {
                $slide->sort_order = $index;
                $slide->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Hero slides reordered successfully!'
        ]);
    }
}
