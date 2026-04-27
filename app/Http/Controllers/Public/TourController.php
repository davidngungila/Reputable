<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;

class TourController extends Controller
{
    public function home(): View
    {
        $featuredTours = Tour::where('status', 'active')->where('featured', true)->take(3)->get();
        $destinations = Destination::where('status', 'active')->latest()->take(4)->get();
        return view('home', compact('featuredTours', 'destinations'));
    }

    public function index(Request $request): View|Response
    {
        $query = Tour::where('status', 'active');

        // Apply Destination Filter
        if ($request->filled('destination') && $request->destination !== 'All') {
            $query->where('location', 'like', '%' . $request->destination . '%');
        }

        // Apply Duration Filter
        if ($request->filled('duration')) {
            if ($request->duration === '1-3 Days') {
                $query->whereBetween('duration_days', [1, 3]);
            } elseif ($request->duration === '4-7 Days') {
                $query->whereBetween('duration_days', [4, 7]);
            } elseif ($request->duration === '8+ Days') {
                $query->where('duration_days', '>=', 8);
            }
        }

        // Apply Sorting
        if ($request->filled('sort')) {
            if ($request->sort === 'Low to High') {
                $query->orderBy('base_price', 'asc');
            } elseif ($request->sort === 'High to Low') {
                $query->orderBy('base_price', 'desc');
            }
        } else {
            $query->orderBy('featured', 'desc');
        }

        $tours = $query->paginate(6);

        if ($request->ajax()) {
            return response(view('tours.partials.tour_grid', compact('tours'))->render());
        }

        return view('tours.index', compact('tours'));
    }

    public function mountainTrekking(Request $request): View|Response
    {
        $query = Tour::where('status', 'active')
                     ->where('tour_type', 'mountain_trekking');

        // Apply Duration Filter
        if ($request->filled('duration')) {
            if ($request->duration === '1-3 Days') {
                $query->whereBetween('duration_days', [1, 3]);
            } elseif ($request->duration === '4-7 Days') {
                $query->whereBetween('duration_days', [4, 7]);
            } elseif ($request->duration === '8+ Days') {
                $query->where('duration_days', '>=', 8);
            }
        }

        // Apply Sorting
        if ($request->filled('sort')) {
            if ($request->sort === 'Low to High') {
                $query->orderBy('base_price', 'asc');
            } elseif ($request->sort === 'High to Low') {
                $query->orderBy('base_price', 'desc');
            }
        } else {
            $query->orderBy('featured', 'desc');
        }

        $tours = $query->paginate(6);

        if ($request->ajax()) {
            return response(view('tours.partials.tour_grid', compact('tours'))->render());
        }

        return view('mountain-trekking.index', compact('tours'));
    }

    public function preview($id): View
    {
        $tour = Tour::with(['itineraries', 'destinations', 'equipment', 'guides'])->findOrFail($id);
        return view('tours.preview', compact('tour'));
    }

    public function show($id): View
    {
        $tour = Tour::with('itineraries')->findOrFail($id);
        return view('tours.show', compact('tour'));
    }
}
