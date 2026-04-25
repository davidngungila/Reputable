@extends('layouts.app')

@section('title', 'Inquiry Details - ' . $inquiry->name)

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inquiry Details</h1>
        <div>
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Inquiries
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Inquiry Details -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Inquiry Information</h6>
                    <div>{!! $inquiry->status_badge !!}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Name:</label>
                            <p>{{ $inquiry->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email:</label>
                            <p>
                                <a href="mailto:{{ $inquiry->email }}" class="text-decoration-none">
                                    {{ $inquiry->email }}
                                </a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Phone:</label>
                            <p>{{ $inquiry->phone ?? 'Not provided' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Date:</label>
                            <p>{{ $inquiry->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    @if($inquiry->tour)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Interested Tour:</label>
                                <p>
                                    <a href="{{ route('admin.tours.show', $inquiry->tour) }}" 
                                       class="text-decoration-none">
                                        {{ $inquiry->tour->name }}
                                    </a>
                                    <br>
                                    <small class="text-muted">
                                        {{ $inquiry->tour->duration_days }} days - 
                                        ${{ number_format($inquiry->tour->base_price, 2) }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Message:</label>
                            <div class="border rounded p-3 bg-light">
                                <p class="mb-0">{{ nl2br(e($inquiry->message)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Notes -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Admin Notes</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status:</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="pending" {{ $inquiry->status === 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="responded" {{ $inquiry->status === 'responded' ? 'selected' : '' }}>
                                    Responded
                                </option>
                                <option value="closed" {{ $inquiry->status === 'closed' ? 'selected' : '' }}>
                                    Closed
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="admin_notes" class="form-label fw-bold">Notes:</label>
                            <textarea name="admin_notes" id="admin_notes" rows="4" 
                                      class="form-control">{{ $inquiry->admin_notes }}</textarea>
                            <div class="form-text">Internal notes about this inquiry (not visible to customer)</div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Inquiry
                            </button>
                            @if($inquiry->status === 'pending')
                                <a href="{{ route('admin.inquiries.respond', $inquiry) }}" 
                                   class="btn btn-info">
                                    <i class="fas fa-reply"></i> Mark as Responded
                                </a>
                            @endif
                            @if($inquiry->status !== 'closed')
                                <a href="{{ route('admin.inquiries.close', $inquiry) }}" 
                                   class="btn btn-success">
                                    <i class="fas fa-check"></i> Mark as Closed
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="mailto:{{ $inquiry->email }}" class="btn btn-primary">
                            <i class="fas fa-envelope"></i> Send Email
                        </a>
                        
                        @if($inquiry->tour)
                            <a href="{{ route('admin.tours.show', $inquiry->tour) }}" class="btn btn-info">
                                <i class="fas fa-map-marked-alt"></i> View Tour Details
                            </a>
                            <a href="{{ route('tours.show', $inquiry->tour->slug) }}" 
                               class="btn btn-secondary" target="_blank">
                                <i class="fas fa-external-link-alt"></i> View Tour Page
                            </a>
                        @endif

                        <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100" 
                                    onclick="return confirm('Are you sure you want to delete this inquiry?')">
                                <i class="fas fa-trash"></i> Delete Inquiry
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Related Inquiries -->
            @if($inquiry->email && $relatedInquiries->count() > 0)
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Related Inquiries</h6>
                    </div>
                    <div class="card-body">
                        @foreach($relatedInquiries as $related)
                            <div class="border-bottom mb-2 pb-2">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">{{ $related->tour->name ?? 'No Tour' }}</h6>
                                        <small class="text-muted">{{ $related->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <div>{!! $related->status_badge !!}</div>
                                </div>
                                <a href="{{ route('admin.inquiries.show', $related) }}" 
                                   class="btn btn-sm btn-outline-primary mt-2">
                                    View
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
