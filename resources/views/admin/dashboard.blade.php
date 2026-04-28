@extends('layouts.admin')

@section('title', 'Advanced Analytics Dashboard')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header with Date Range Selector -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Analytics Dashboard</h1>
            <p class="text-gray-600">Real-time insights and performance metrics</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <select class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option>Last 30 Days</option>
                <option>Last 3 Months</option>
                <option>Last 6 Months</option>
                <option>Last Year</option>
            </select>
            <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium">
                <i class="fas fa-download mr-2"></i>Export Report
            </button>
        </div>
    </div>

    <!-- Key Performance Indicators -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Revenue -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-100 rounded-lg">
                    <i class="fas fa-dollar-sign text-emerald-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    +12.5%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">${{ number_format($stats['revenue_total'], 0) }}</h3>
                <p class="text-sm text-gray-600">Total Revenue</p>
            </div>
        </div>

        <!-- Total Bookings -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-calendar-check text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    +8.2%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_bookings'] }}</h3>
                <p class="text-sm text-gray-600">Total Bookings</p>
            </div>
        </div>

        <!-- Active Customers -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-users text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">
                    +15.3%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $stats['active_customers'] }}</h3>
                <p class="text-sm text-gray-600">Active Customers</p>
            </div>
        </div>

        <!-- Conversion Rate -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <i class="fas fa-chart-line text-orange-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">
                    +5.7%
                </span>
            </div>
            <div class="space-y-1">
                <h3 class="text-2xl font-bold text-gray-900">{{ $performanceMetrics['booking_conversion_rate'] }}%</h3>
                <p class="text-sm text-gray-600">Conversion Rate</p>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Revenue Trend Chart -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Revenue Trend</h2>
                <div class="flex gap-2">
                    <button class="px-3 py-1 text-xs bg-emerald-100 text-emerald-700 rounded-lg font-medium">Monthly</button>
                    <button class="px-3 py-1 text-xs text-gray-600 hover:bg-gray-100 rounded-lg">Weekly</button>
                </div>
            </div>
            <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                <canvas id="revenueChart" class="w-full h-full"></canvas>
            </div>
        </div>

        <!-- Booking Distribution -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Booking Distribution</h2>
                <button class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>
            <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                <canvas id="bookingChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>

    <!-- Tour Performance & Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Top Tours -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Tour Performance</h2>
                <a href="{{ route('admin.tours.index') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View All</a>
            </div>
            <div class="space-y-4">
                @foreach($tourPopularity->take(5) as $tour)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900 mb-1">{{ $tour->name }}</h4>
                        <div class="flex items-center gap-4 text-sm text-gray-600">
                            <span><i class="fas fa-calendar mr-1"></i>{{ $tour->bookings_count }} bookings</span>
                            <span><i class="fas fa-dollar-sign mr-1"></i>${{ number_format($tour->total_revenue, 0) }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-lg font-bold text-emerald-600">{{ $tour->bookings_count }}</div>
                        <div class="text-xs text-gray-500">bookings</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Daily Activity -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Daily Activity</h2>
                <span class="text-xs text-gray-500">Last 7 days</span>
            </div>
            <div class="space-y-3">
                @for($i = 6; $i >= 0; $i--)
                <?php 
                $date = now()->subDays($i)->format('Y-m-d');
                $dayBookings = $dailyActivity->where('date', $date)->first();
                $count = $dayBookings ? $dayBookings->bookings : 0;
                ?>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">{{ now()->subDays($i)->format('D') }}</span>
                    <div class="flex-1 mx-4">
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-500 rounded-full transition-all duration-500" style="width: {{ min($count * 10, 100) }}%"></div>
                        </div>
                    </div>
                    <span class="text-sm font-medium text-gray-900">{{ $count }}</span>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Bookings -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Recent Bookings</h2>
                <a href="{{ route('admin.bookings.index') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View All</a>
            </div>
            <div class="space-y-4">
                @if($recentBookings->count() > 0)
                    @foreach($recentBookings->take(5) as $booking)
                    <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-1">
                                <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-medium text-emerald-700">{{ substr($booking->customer_name ?? 'C', 0, 1) }}</span>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900 text-sm">{{ $booking->customer_name ?? 'Customer' }}</h4>
                                    <p class="text-xs text-gray-600">{{ $booking->tour->name ?? 'No Tour' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 text-xs text-gray-500">
                                <span>{{ $booking->created_at->format('M d, Y') }}</span>
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    @if($booking->status == 'confirmed') bg-green-100 text-green-700
                                    @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-700
                                    @else bg-gray-100 text-gray-700 @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-bold text-gray-900">${{ number_format($booking->total_price ?? 0, 0) }}</div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="text-gray-500 text-center py-8">No recent bookings found.</p>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Quick Actions</h2>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.tours.index') }}" class="flex flex-col items-center justify-center p-4 bg-emerald-50 rounded-lg hover:bg-emerald-100 transition-colors group">
                    <i class="fas fa-map-marked-alt text-emerald-600 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-medium text-gray-900">Manage Tours</span>
                </a>
                <a href="{{ route('admin.bookings.index') }}" class="flex flex-col items-center justify-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors group">
                    <i class="fas fa-calendar text-blue-600 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-medium text-gray-900">Manage Bookings</span>
                </a>
                <a href="{{ route('admin.inquiries.index') }}" class="flex flex-col items-center justify-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors group">
                    <i class="fas fa-envelope text-purple-600 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-medium text-gray-900">Manage Inquiries</span>
                </a>
                <a href="{{ route('admin.inquiries.export') }}" class="flex flex-col items-center justify-center p-4 bg-rose-50 rounded-lg hover:bg-rose-100 transition-colors group">
                    <i class="fas fa-file-export text-rose-600 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-medium text-gray-900">Export Inquiries</span>
                </a>
                <a href="{{ route('admin.settings.users.index') }}" class="flex flex-col items-center justify-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors group">
                    <i class="fas fa-users text-orange-600 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-medium text-gray-900">Manage Users</span>
                </a>
                <a href="{{ route('admin.destinations.index') }}" class="flex flex-col items-center justify-center p-4 bg-teal-50 rounded-lg hover:bg-teal-100 transition-colors group">
                    <i class="fas fa-map-pin text-teal-600 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-medium text-gray-900">Manage Destinations</span>
                </a>
            </div>
            
            <!-- Pending Items Alert -->
            @if($stats['pending_bookings'] > 0 || $stats['pending_inquiries'] > 0)
            <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <div class="flex items-center gap-3">
                    <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-yellow-800">Action Required</h4>
                        <p class="text-xs text-yellow-700">
                            {{ $stats['pending_bookings'] }} pending bookings and {{ $stats['pending_inquiries'] }} inquiries need attention
                        </p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Chart.js Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Trend Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: @json($monthlyRevenue->pluck('month')),
            datasets: [{
                label: 'Revenue',
                data: @json($monthlyRevenue->pluck('revenue')),
                borderColor: 'rgb(16, 185, 129)',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Booking Distribution Chart
    const bookingCtx = document.getElementById('bookingChart').getContext('2d');
    new Chart(bookingCtx, {
        type: 'doughnut',
        data: {
            labels: @json($paymentDistribution->pluck('payment_status')),
            datasets: [{
                data: @json($paymentDistribution->pluck('count')),
                backgroundColor: [
                    'rgb(16, 185, 129)',
                    'rgb(59, 130, 246)',
                    'rgb(251, 146, 60)',
                    'rgb(147, 51, 234)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endsection
