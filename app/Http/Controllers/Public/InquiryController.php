<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Tour;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function create(Request $request)
    {
        $tour = null;
        if ($request->has('tour_id')) {
            $tour = Tour::find($request->tour_id);
        }

        return view('inquiries.create', compact('tour'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'tour_id' => 'nullable|exists:tours,id',
            'message' => 'required|string|max:2000',
        ]);

        $inquiry = Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'tour_id' => $validated['tour_id'] ?? null,
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Thank you for your inquiry! We will get back to you within 24 hours.');
    }
}
