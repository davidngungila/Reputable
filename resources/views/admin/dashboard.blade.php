@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Bookings</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_bookings'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Revenue</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($stats['revenue_total'], 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Active Tours</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['active_packages'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Inquiries</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['pending_inquiries'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Bookings -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Bookings</h6>
                    <a href="#" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($recentBookings->count() > 0)
                        @foreach($recentBookings as $booking)
                        <div class="border-bottom mb-3 pb-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">{{ $booking->customer_name ?? 'Customer' }}</h6>
                                    <p class="mb-1 text-sm text-gray-600">{{ $booking->tour->name ?? 'No Tour' }}</p>
                                    <small class="text-gray-500">{{ $booking->created_at->format('M d, Y') }}</small>
                                </div>
                                <div class="text-right">
                                    <span class="badge badge-{{ $booking->status == 'confirmed' ? 'success' : 'warning' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                    <div class="text-sm font-weight-bold mt-1">${{ number_format($booking->total_price ?? 0, 2) }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-center">No recent bookings found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Inquiries -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Inquiries</h6>
                    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($recentInquiries->count() > 0)
                        @foreach($recentInquiries as $inquiry)
                        <div class="border-bottom mb-3 pb-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">{{ $inquiry->name }}</h6>
                                    <p class="mb-1 text-sm text-gray-600">{{ $inquiry->tour->name ?? 'General Inquiry' }}</p>
                                    <small class="text-gray-500">{{ $inquiry->created_at->format('M d, Y') }}</small>
                                </div>
                                <div class="text-right">
                                    {!! $inquiry->status_badge !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-center">No recent inquiries found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Upcoming Bookings -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Bookings</h6>
                    <a href="#" class="btn btn-sm btn-primary">Calendar View</a>
                </div>
                <div class="card-body">
                    @if($upcomingBookings->count() > 0)
                        @foreach($upcomingBookings as $booking)
                        <div class="border-bottom mb-3 pb-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">{{ $booking->customer_name ?? 'Customer' }}</h6>
                                    <p class="mb-1 text-sm text-gray-600">{{ $booking->tour->name ?? 'No Tour' }}</p>
                                    <small class="text-gray-500">
                                        <i class="fas fa-calendar"></i> {{ $booking->start_date->format('M d, Y') }}
                                        @if($booking->guide)
                                            <br><i class="fas fa-user"></i> {{ $booking->guide->name }}
                                        @endif
                                    </small>
                                </div>
                                <div class="text-right">
                                    <span class="badge badge-success">Confirmed</span>
                                    <div class="text-sm font-weight-bold mt-1">${{ number_format($booking->total_price ?? 0, 2) }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-center">No upcoming bookings found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.tours.index') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-map-marked-alt"></i> Manage Tours
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('bookings.index') }}" class="btn btn-success btn-block">
                                <i class="fas fa-calendar"></i> Manage Bookings
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-info btn-block">
                                <i class="fas fa-envelope"></i> Manage Inquiries
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.settings.users.index') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-users"></i> Manage Users
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
