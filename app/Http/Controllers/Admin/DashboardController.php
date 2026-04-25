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
        // Enhanced statistics with growth rates
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

        // Monthly booking trends for the last 12 months
        $monthlyBookings = Booking::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Monthly revenue trends
        $monthlyRevenue = Booking::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total_price) as revenue')
            ->whereIn('payment_status', ['paid', 'partially_paid'])
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Tour popularity data
        $tourPopularity = Booking::join('tours', 'bookings.tour_id', '=', 'tours.id')
            ->selectRaw('tours.name, COUNT(bookings.id) as bookings_count, SUM(bookings.total_price) as total_revenue')
            ->groupBy('tours.id', 'tours.name')
            ->orderBy('bookings_count', 'desc')
            ->limit(10)
            ->get();

        // Payment status distribution
        $paymentDistribution = Booking::selectRaw('payment_status, COUNT(*) as count, SUM(total_price) as total')
            ->groupBy('payment_status')
            ->get();

        // Daily booking activity for the last 30 days
        $dailyActivity = Booking::selectRaw('DATE(created_at) as date, COUNT(*) as bookings')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Inquiry status trends
        $inquiryTrends = Inquiry::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        // Recent activity with enhanced data
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

        // Performance metrics
        $performanceMetrics = [
            'booking_conversion_rate' => $stats['total_bookings'] > 0 ? 
                round(($stats['confirmed_bookings'] / $stats['total_bookings']) * 100, 2) : 0,
            'average_booking_value' => $stats['total_bookings'] > 0 ? 
                round($stats['revenue_total'] / $stats['total_bookings'], 2) : 0,
            'inquiry_conversion_rate' => $stats['total_inquiries'] > 0 ? 
                round(($stats['total_bookings'] / $stats['total_inquiries']) * 100, 2) : 0,
        ];

        return view('admin.dashboard', compact(
            'stats', 
            'recentBookings', 
            'upcomingBookings', 
            'recentInquiries',
            'monthlyBookings',
            'monthlyRevenue',
            'tourPopularity',
            'paymentDistribution',
            'dailyActivity',
            'inquiryTrends',
            'performanceMetrics'
        ));
    }

    public function profile()
    {
        $user = auth()->user();
        $recentBookings = Booking::where('customer_email', $user->email)
            ->with('tour')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.profile', compact('user', 'recentBookings'));
    }

    public function accountSettings()
    {
        $user = auth()->user();
        return view('admin.account-settings', compact('user'));
    }

    public function updateAccountSettings(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user name
        $user->name = $validated['first_name'] . ' ' . $validated['last_name'];
        $user->email = $validated['email'];
        
        // Update profile fields if they exist in the users table
        if (isset($validated['phone'])) {
            $user->phone = $validated['phone'];
        }
        if (isset($validated['bio'])) {
            $user->bio = $validated['bio'];
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('admin.settings.account')
            ->with('success', 'Account settings updated successfully!');
    }
}
