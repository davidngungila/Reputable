@extends('layouts.public')

@section('title', 'Book Your Safari - ' . $tour->name)

@section('content')
<div class="min-h-screen bg-slate-50">
    <!-- Hero Section -->
    <div class="relative h-64 overflow-hidden">
        @if(!empty($tour->images) && count($tour->images) > 0)
        <img src="{{ asset($tour->images[0]) }}" alt="{{ $tour->name }}" class="w-full h-full object-cover">
        @else
        <img src="{{ asset('images/01.jpg') }}" alt="{{ $tour->name }}" class="w-full h-full object-cover">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-4xl font-bold text-white mb-2">Book Your Safari</h1>
                <p class="text-slate-200 text-lg">{{ $tour->name }}</p>
            </div>
        </div>
    </div>

    <!-- Booking Form -->
    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
            <form action="{{ route('bookings.store') }}" method="POST" class="space-y-8">
                @csrf
                <input type="hidden" name="tour_id" value="{{ $tour->id }}">

                <!-- Tour Summary -->
                <div class="bg-emerald-50 rounded-xl p-6 mb-8">
                    <h3 class="font-bold text-emerald-900 mb-2">Tour Summary</h3>
                    <p class="text-emerald-700 font-semibold text-lg">{{ $tour->name }}</p>
                    <p class="text-emerald-600 text-sm">{{ $tour->duration_days }} days | ${{ number_format($tour->base_price) }} per person</p>
                </div>

                <!-- Personal Information -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Personal Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name *</label>
                            <input type="text" name="customer_name" required class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address *</label>
                            <input type="email" name="customer_email" required class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="john@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Phone Number *</label>
                            <input type="tel" name="customer_phone" required class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="+255 123 456 789">
                        </div>
                    </div>
                </div>

                <!-- Booking Details -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Booking Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Start Date *</label>
                            <input type="date" name="start_date" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Number of Adults *</label>
                            <input type="number" name="adults" required min="1" value="1" class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Number of Children</label>
                            <input type="number" name="children" min="0" value="0" class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <p class="text-xs text-slate-500 mt-1">Children (2-12 years) - 50% of adult price</p>
                        </div>
                    </div>
                </div>

                <!-- Special Requests -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Special Requests</label>
                    <textarea name="special_requests" rows="4" class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Any special requests or dietary requirements..."></textarea>
                </div>

                <!-- Terms -->
                <div>
                    <label class="flex items-start gap-3">
                        <input type="checkbox" name="agree_terms" value="1" required class="mt-1 w-5 h-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700">
                            I agree to the booking terms and conditions and understand that a 30% deposit is required to confirm this booking.
                        </span>
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-3">
                    <i class="ph ph-calendar-check text-xl"></i>
                    <span>Proceed to Booking</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
