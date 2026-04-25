<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(20);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        $relatedInquiries = Inquiry::where('email', $inquiry->email)
            ->where('id', '!=', $inquiry->id)
            ->with('tour')
            ->latest()
            ->limit(5)
            ->get();
            
        return view('admin.inquiries.show', compact('inquiry', 'relatedInquiries'));
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,responded,closed',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $inquiry->update($validated);

        return redirect()->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry updated successfully.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry deleted successfully.');
    }

    public function markAsResponded(Inquiry $inquiry)
    {
        $inquiry->update(['status' => 'responded']);
        return redirect()->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry marked as responded.');
    }

    public function markAsClosed(Inquiry $inquiry)
    {
        $inquiry->update(['status' => 'closed']);
        return redirect()->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry marked as closed.');
    }
}
