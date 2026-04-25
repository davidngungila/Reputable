<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Tour;
use App\Models\Inquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'revenue_total' => Booking::whereIn('payment_status', ['paid', 'partially_paid'])->sum('total_price'),
            'active_customers' => Booking::distinct('customer_email')->count('customer_email'),
            'active_packages' => Tour::where('status', 'active')->count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'total_inquiries' => Inquiry::count(),
            'pending_inquiries' => Inquiry::where('status', 'pending')->count(),
        ];

        $recentBookings = Booking::with('tour')
            ->latest()
            ->limit(8)
            ->get();

        $upcomingBookings = Booking::with(['tour', 'guide'])
            ->whereDate('start_date', '>=', now()->toDateString())
            ->orderBy('start_date')
            ->limit(6)
            ->get();

        $recentInquiries = Inquiry::with('tour')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentBookings', 'upcomingBookings', 'recentInquiries'));
    }
}
