@extends('layouts.public')

@section('title', 'Contact Us - Make an Inquiry')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white py-4">
                    <h2 class="mb-0 text-center">Contact Us</h2>
                    <p class="mb-0 text-center">Have questions about our tours? We'd love to hear from you!</p>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($tour)
                        <div class="alert alert-info mb-4">
                            <h5 class="alert-heading">Inquiring about: {{ $tour->name }}</h5>
                            <p class="mb-0">{{ $tour->duration_days }} days starting from ${{ number_format($tour->base_price, 2) }}</p>
                        </div>
                    @endif

                    <form action="{{ route('inquiries.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Your Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tour_id" class="form-label">Interested Tour</label>
                                <select class="form-select @error('tour_id') is-invalid @enderror" 
                                        id="tour_id" name="tour_id">
                                    <option value="">Select a tour (optional)</option>
                                    @foreach(App\Models\Tour::where('status', 'active')->get() as $tourOption)
                                        <option value="{{ $tourOption->id }}" 
                                                {{ ($tour && $tour->id == $tourOption->id) ? 'selected' : '' }}>
                                            {{ $tourOption->name }} - {{ $tourOption->duration_days }} days
                                        </option>
                                    @endforeach
                                </select>
                                @error('tour_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label">Your Message *</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-paper-plane me-2"></i> Send Inquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="row mt-5">
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Email Us</h5>
                            <p class="card-text">info@reputabletours.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-phone fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Call Us</h5>
                            <p class="card-text">+255 123 456 789</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Visit Us</h5>
                            <p class="card-text">Arusha, Tanzania</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
