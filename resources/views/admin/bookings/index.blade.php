@extends('layouts.admin')

@section('title', 'Bookings Management')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header with Statistics -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Bookings Management</h1>
            <p class="text-gray-600">Track and manage customer tour bookings and inquiries</p>
        </div>
        <button class="mt-4 lg:mt-0 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold transition-all flex items-center gap-2">
            <i class="ph-bold ph-plus"></i>
            New Booking
        </button>
    </div>

    <!-- Statistics Dashboard -->
    @if(isset($stats))
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Bookings</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['total'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-calendar-check text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Pending</p>
                    <p class="text-2xl font-bold text-orange-600 mt-1">{{ $stats['pending'] }}</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-clock-clockwise text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Confirmed</p>
                    <p class="text-2xl font-bold text-emerald-600 mt-1">{{ $stats['confirmed'] }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-check-circle text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                    <p class="text-2xl font-bold text-purple-600 mt-1">${{ number_format($stats['revenue'], 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="ph-bold ph-currency-dollar text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-lg font-bold text-gray-900">Recent Bookings</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">Customer</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">Tour</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">Date</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">Price</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">Status</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="ph-bold ph-user text-gray-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">{{ $booking->first_name }} {{ $booking->last_name }}</p>
                                    <p class="text-xs text-gray-500">{{ $booking->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">{{ $booking->tour->name ?? 'N/A' }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">{{ $booking->created_at->format('M d, Y') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-900">${{ number_format($booking->total_price, 2) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold 
                                {{ $booking->status === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : 
                                   ($booking->status === 'pending' ? 'bg-orange-100 text-orange-700' : 'bg-red-100 text-red-700') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="#" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="ph-bold ph-eye"></i>
                                </a>
                                <button class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors">
                                    <i class="ph-bold ph-check-circle"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            No bookings found in the system.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $bookings->links() }}
        </div>
    </div>
</div>
@endsection
