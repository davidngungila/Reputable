@extends('layouts.app')

@section('title', 'Manage Inquiries')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Inquiries</h1>
        <div>
            <a href="{{ route('admin.inquiries.export') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Export
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filters</h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.inquiries.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="responded" {{ request('status') == 'responded' ? 'selected' : '' }}>Responded</option>
                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tour_id" class="form-label">Tour</label>
                        <select name="tour_id" id="tour_id" class="form-select">
                            <option value="">All Tours</option>
                            @foreach(App\Models\Tour::all() as $tour)
                                <option value="{{ $tour->id }}" {{ request('tour_id') == $tour->id ? 'selected' : '' }}>
                                    {{ $tour->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" name="search" id="search" class="form-control" 
                               value="{{ request('search') }}" placeholder="Name or Email">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">Filter</button>
                        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Inquiries Table -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Inquiries ({{ $inquiries->total() }} total)
            </h6>
        </div>
        <div class="card-body">
            @if($inquiries->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Tour</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inquiries as $inquiry)
                                <tr>
                                    <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                                    <td>{{ $inquiry->name }}</td>
                                    <td>{{ $inquiry->email }}</td>
                                    <td>
                                        @if($inquiry->tour)
                                            <a href="{{ route('admin.tours.show', $inquiry->tour) }}" 
                                               class="text-decoration-none">
                                                {{ $inquiry->tour->name }}
                                            </a>
                                        @else
                                            <span class="text-muted">No Tour</span>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="mb-0 text-truncate" style="max-width: 200px;">
                                            {{ Str::limit($inquiry->message, 100) }}
                                        </p>
                                    </td>
                                    <td>{!! $inquiry->status_badge !!}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" 
                                               class="btn btn-sm btn-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($inquiry->status === 'pending')
                                                <form action="{{ route('admin.inquiries.respond', $inquiry) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-info" 
                                                            title="Mark as Responded">
                                                        <i class="fas fa-reply"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            @if($inquiry->status !== 'closed')
                                                <form action="{{ route('admin.inquiries.close', $inquiry) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success" 
                                                            title="Mark as Closed">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        title="Delete" 
                                                        onclick="return confirm('Are you sure you want to delete this inquiry?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        Showing {{ $inquiries->firstItem() }} to {{ $inquiries->lastItem() }} 
                        of {{ $inquiries->total() }} entries
                    </div>
                    <div>
                        {{ $inquiries->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-envelope fa-3x text-gray-300 mb-3"></i>
                    <h5 class="text-gray-500">No inquiries found</h5>
                    <p class="text-gray-400">There are no inquiries matching your criteria.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
