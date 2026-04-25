@extends('layouts.admin')

@section('title', 'Inquiry Details - ' . $inquiry->name)

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Inquiry Details</h1>
            <p class="text-gray-600">Review and manage customer inquiry information</p>
        </div>
        <div class="flex gap-3 mt-4 lg:mt-0">
            <a href="{{ route('admin.inquiries.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">
                <i class="ph-bold ph-arrow-left mr-2"></i>Back to Inquiries
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Customer Information Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="ph-bold ph-user text-white text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white">{{ $inquiry->name }}</h2>
                                <p class="text-emerald-100 text-sm">Customer Inquiry</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            @switch($inquiry->status)
                                @case('pending')
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                        <i class="ph-bold ph-clock mr-1"></i>Pending
                                    </span>
                                    @break
                                @case('responded')
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                        <i class="ph-bold ph-chat-dots mr-1"></i>Responded
                                    </span>
                                    @break
                                @case('closed')
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                        <i class="ph-bold ph-check-circle mr-1"></i>Closed
                                    </span>
                                    @break
                            @endswitch
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Contact Information -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="ph-bold ph-envelope text-gray-400 mr-2"></i>Email Address
                                </label>
                                <a href="mailto:{{ $inquiry->email }}" class="text-emerald-600 hover:text-emerald-700 font-medium">
                                    {{ $inquiry->email }}
                                </a>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="ph-bold ph-phone text-gray-400 mr-2"></i>Phone Number
                                </label>
                                <p class="text-gray-900">{{ $inquiry->phone ?? 'Not provided' }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="ph-bold ph-calendar text-gray-400 mr-2"></i>Inquiry Date
                                </label>
                                <p class="text-gray-900">{{ $inquiry->created_at->format('F d, Y - g:i A') }}</p>
                            </div>
                        </div>
                        
                        <!-- Tour Information -->
                        @if($inquiry->tour)
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="ph-bold ph-map-pin text-gray-400 mr-2"></i>Interested Tour
                                </label>
                                <a href="{{ route('admin.tours.show', $inquiry->tour) }}" 
                                   class="block p-3 bg-emerald-50 rounded-lg hover:bg-emerald-100 transition-colors">
                                    <p class="font-medium text-emerald-900">{{ $inquiry->tour->name }}</p>
                                    <p class="text-sm text-emerald-700 mt-1">
                                        {{ $inquiry->tour->duration_days }} days • ${{ number_format($inquiry->tour->base_price, 2) }}
                                    </p>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Message Section -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            <i class="ph-bold ph-chat-text text-gray-400 mr-2"></i>Customer Message
                        </label>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-800 leading-relaxed">{{ nl2br(e($inquiry->message)) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Management Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-gear text-blue-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Admin Management</h2>
                </div>
                
                <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="pending" {{ $inquiry->status === 'pending' ? 'selected' : '' }}>
                                ⏳ Pending
                            </option>
                            <option value="responded" {{ $inquiry->status === 'responded' ? 'selected' : '' }}>
                                💬 Responded
                            </option>
                            <option value="closed" {{ $inquiry->status === 'closed' ? 'selected' : '' }}>
                                ✅ Closed
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="admin_notes" class="block text-sm font-semibold text-gray-700 mb-2">Admin Notes</label>
                        <textarea name="admin_notes" id="admin_notes" rows="4" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                                  placeholder="Internal notes about this inquiry...">{{ $inquiry->admin_notes }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">These notes are internal and not visible to the customer</p>
                    </div>

                    <div class="flex flex-wrap gap-3 pt-4">
                        <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                            <i class="ph-bold ph-check mr-2"></i>Update Inquiry
                        </button>
                        
                        @if($inquiry->status === 'pending')
                            <a href="{{ route('admin.inquiries.respond', $inquiry) }}" 
                               class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                                <i class="ph-bold ph-reply mr-2"></i>Mark as Responded
                            </a>
                        @endif
                        
                        @if($inquiry->status !== 'closed')
                            <a href="{{ route('admin.inquiries.close', $inquiry) }}" 
                               class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-medium">
                                <i class="ph-bold ph-check-circle mr-2"></i>Mark as Closed
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="ph-bold ph-bolt text-purple-600 text-xl"></i>
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">Quick Actions</h2>
                </div>
                
                <div class="space-y-3">
                    <a href="mailto:{{ $inquiry->email }}" class="w-full flex items-center justify-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                        <i class="ph-bold ph-envelope mr-2"></i>Send Email
                    </a>
                    
                    @if($inquiry->tour)
                        <a href="{{ route('admin.tours.show', $inquiry->tour) }}" 
                           class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                            <i class="ph-bold ph-map-pin mr-2"></i>View Tour Details
                        </a>
                        
                        <a href="{{ route('tours.show', $inquiry->tour->slug) }}" 
                           class="w-full flex items-center justify-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors font-medium"
                           target="_blank">
                            <i class="ph-bold ph-arrow-square-out mr-2"></i>View Tour Page
                        </a>
                    @endif

                    <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium"
                                onclick="return confirm('Are you sure you want to delete this inquiry? This action cannot be undone.')">
                            <i class="ph-bold ph-trash mr-2"></i>Delete Inquiry
                        </button>
                    </form>
                </div>
            </div>

            <!-- Related Inquiries -->
            @if($inquiry->email && $relatedInquiries->count() > 0)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ph-bold ph-users text-orange-600 text-xl"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Related Inquiries</h2>
                    </div>
                    
                    <div class="space-y-3">
                        @foreach($relatedInquiries as $related)
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $related->tour->name ?? 'No Tour' }}</p>
                                        <p class="text-xs text-gray-600">{{ $related->created_at->format('M d, Y') }}</p>
                                    </div>
                                    @switch($related->status)
                                        @case('pending')
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Pending</span>
                                            @break
                                        @case('responded')
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Responded</span>
                                            @break
                                        @case('closed')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Closed</span>
                                            @break
                                    @endswitch
                                </div>
                                <a href="{{ route('admin.inquiries.show', $related) }}" 
                                   class="inline-flex items-center px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors text-sm font-medium">
                                    <i class="ph-bold ph-eye mr-1"></i>View
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
