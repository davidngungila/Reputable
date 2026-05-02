@extends('layouts.public')

@section('content')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show success popup if success message exists
    @if(session('success'))
    Swal.fire({
        title: 'Inquiry Received!',
        text: 'Thank you for your detailed inquiry! Our safari specialists will review your requirements and respond within 24 hours with a personalized quote.',
        icon: 'success',
        confirmButtonColor: '#054422',
        confirmButtonText: 'Great!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    });
    @endif
    
    // Initialize date picker
    flatpickr("#travel_date", {
        minDate: "today",
        dateFormat: "Y-m-d",
        locale: {
            firstDayOfWeek: 1
        }
    });
    
    // Handle form submission with loading state
    const form = document.querySelector('form[action="{{ route('inquiries.store') }}"]');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="ph ph-spinner-gap animate-spin mr-2"></i>Submitting Inquiry...';
            submitButton.classList.add('opacity-75', 'cursor-not-allowed');
            
            // Reset after 5 seconds as fallback
            setTimeout(() => {
                submitButton.disabled = false;
                submitButton.textContent = originalText;
                submitButton.classList.remove('opacity-75', 'cursor-not-allowed');
            }, 5000);
        });
    }
    
    // Dynamic pricing calculator
    function updateEstimate() {
        const duration = document.querySelector('select[name="duration"]').value;
        const groupSize = document.querySelector('select[name="group_size"]').value;
        const estimateElement = document.getElementById('price-estimate');
        
        if (duration && groupSize) {
            let basePrice = 0;
            let multiplier = 1;
            
            // Base pricing per duration
            switch(duration) {
                case '1-3': basePrice = 500; break;
                case '4-7': basePrice = 800; break;
                case '8-14': basePrice = 1200; break;
                case '15+': basePrice = 2000; break;
            }
            
            // Group size multipliers
            switch(groupSize) {
                case 'solo': multiplier = 1.2; break;
                case 'couple': multiplier = 1; break;
                case 'small-group': multiplier = 0.9; break;
                case 'large-group': multiplier = 0.8; break;
            }
            
            const estimatedPrice = Math.round(basePrice * multiplier);
            estimateElement.textContent = `Estimated: $${estimatedPrice} per person`;
            estimateElement.classList.remove('hidden');
        }
    }
    
    // Add event listeners for price calculator
    document.querySelector('select[name="duration"]')?.addEventListener('change', updateEstimate);
    document.querySelector('select[name="group_size"]')?.addEventListener('change', updateEstimate);
});
</script>
@endpush

@section('title', 'Advanced Safari Inquiry - Reputable Tours')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-orange-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-emerald-600 to-orange-500 text-white overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 to-orange-500/20"></div>
        </div>
        <div class="relative container mx-auto px-4 pt-24 pb-20">
            <div class="text-center max-w-4xl mx-auto">
                <div class="mb-6">
                    <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 text-sm font-semibold">
                        <i class="ph ph-star-fill text-yellow-300 mr-2"></i>
                        Premium Safari Planning Service
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Plan Your Dream Safari</h1>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Our Tanzania safari specialists will craft a personalized itinerary based on your preferences, budget, and travel dates
                </p>
                
                <!-- Trust Indicators -->
                <div class="flex justify-center gap-6 text-center">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">24/7</div>
                        <div class="text-sm text-white/80">Expert Support</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">< 1hr</div>
                        <div class="text-sm text-white/80">Response Time</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">500+</div>
                        <div class="text-sm text-white/80">Safaris Planned</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Advanced Inquiry Form -->
            <div class="lg:col-span-2">
                @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 rounded-xl p-6">
                    <div class="flex items-start">
                        <i class="ph-bold ph-check-circle text-emerald-600 text-2xl mr-3 mt-0.5"></i>
                        <div>
                            <h4 class="font-semibold text-emerald-900 mb-1">Inquiry Sent Successfully!</h4>
                            <p class="text-emerald-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-600 to-orange-500 text-white p-6">
                        <h2 class="text-2xl font-bold mb-2">Advanced Safari Inquiry</h2>
                        <p class="text-white/90">Fill in the details below for a personalized safari experience</p>
                    </div>
                    
                    <form action="{{ route('inquiries.store') }}" method="POST" class="p-8 space-y-8">
                        @csrf
                        
                        <!-- Personal Information -->
                        <div class="border-b border-gray-200 pb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="ph ph-user text-emerald-600"></i>
                                </div>
                                Personal Information
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Full Name *</label>
                                    <input type="text" name="name" placeholder="Johnathan Doe" value="{{ old('name') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all" required>
                                    @error('name')
                                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Email Address *</label>
                                    <input type="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all" required>
                                    @error('email')
                                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Phone Number</label>
                                    <div class="relative">
                                        <input type="tel" name="phone" placeholder="+1 555 0123" value="{{ old('phone') }}" 
                                               class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                            <i class="ph ph-phone text-xl"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Nationality</label>
                                    <select name="nationality" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        <option value="">Select nationality</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Japan">Japan</option>
                                        <option value="China">China</option>
                                        <option value="India">India</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Safari Preferences -->
                        <div class="border-b border-gray-200 pb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="ph ph-compass text-orange-600"></i>
                                </div>
                                Safari Preferences
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Interested Tour</label>
                                    <select name="tour_id" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        <option value="">Select a tour (optional)</option>
                                        @foreach(App\Models\Tour::where('status', 'active')->get() as $tour)
                                            <option value="{{ $tour->id }}" {{ old('tour_id') == $tour->id ? 'selected' : '' }}>
                                                {{ $tour->name }} - {{ $tour->duration_days }} days
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Travel Date</label>
                                    <input type="date" id="travel_date" name="travel_date" value="{{ old('travel_date') }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                    @error('travel_date')
                                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Trip Duration</label>
                                    <select name="duration" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        <option value="">Select duration</option>
                                        <option value="1-3" {{ old('duration') == '1-3' ? 'selected' : '' }}>1-3 days (Short Safari)</option>
                                        <option value="4-7" {{ old('duration') == '4-7' ? 'selected' : '' }}>4-7 days (Classic Safari)</option>
                                        <option value="8-14" {{ old('duration') == '8-14' ? 'selected' : '' }}>8-14 days (Extended Safari)</option>
                                        <option value="15+" {{ old('duration') == '15+' ? 'selected' : '' }}>15+ days (Comprehensive Safari)</option>
                                    </select>
                                </div>
                                
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Group Size</label>
                                    <select name="group_size" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        <option value="">Select group size</option>
                                        <option value="solo" {{ old('group_size') == 'solo' ? 'selected' : '' }}>Solo Traveler (1 person)</option>
                                        <option value="couple" {{ old('group_size') == 'couple' ? 'selected' : '' }}>Couple (2 people)</option>
                                        <option value="small-group" {{ old('group_size') == 'small-group' ? 'selected' : '' }}>Small Group (3-5 people)</option>
                                        <option value="large-group" {{ old('group_size') == 'large-group' ? 'selected' : '' }}>Large Group (6+ people)</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div id="price-estimate" class="hidden mt-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl">
                                <p class="text-emerald-800 font-semibold"></p>
                            </div>
                        </div>

                        <!-- Detailed Requirements -->
                        <div class="pb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="ph ph-chat-circle-dots text-blue-600"></i>
                                </div>
                                Detailed Requirements
                            </h3>
                            
                            <div class="space-y-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Safari Dreams & Requirements *</label>
                                    <textarea name="message" rows="6" placeholder="Tell us about your dream Tanzania safari - wildlife you want to see, accommodation preferences, special interests, dietary requirements, or any specific requests..." 
                                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all resize-none" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-600 to-orange-500 text-white font-bold py-4 px-8 rounded-xl hover:from-emerald-700 hover:to-orange-600 transition-all duration-300 transform hover:scale-[1.02] shadow-lg">
                                <i class="ph ph-paper-plane-right mr-2"></i>
                                Submit Advanced Inquiry
                            </button>
                            
                            <button type="button" onclick="window.location.href='{{ route('contact') }}'" class="px-8 py-4 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-300">
                                <i class="ph ph-arrow-left mr-2"></i>
                                Back to Contact
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar Information -->
            <div class="space-y-8">
                <!-- Why Choose Us -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Why Choose Our Advanced Planning?</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="ph ph-check text-emerald-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Personalized Itinerary</h4>
                                <p class="text-gray-600 text-sm">Custom safari designed around your preferences and interests</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="ph ph-currency-dollar text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Transparent Pricing</h4>
                                <p class="text-gray-600 text-sm">No hidden fees with detailed cost breakdown</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="ph ph-users text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Expert Guides</h4>
                                <p class="text-gray-600 text-sm">Local Tanzanian guides with 10+ years experience</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="ph ph-shield-check text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Safety First</h4>
                                <p class="text-gray-600 text-sm">Fully insured with emergency support 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Contact -->
                <div class="bg-gradient-to-br from-emerald-600 to-orange-500 rounded-2xl shadow-xl p-6 text-white">
                    <h3 class="text-xl font-bold mb-6">Need Immediate Help?</h3>
                    
                    <div class="space-y-4">
                        <a href="tel:+255622239304" class="flex items-center text-white hover:text-white/80 transition-colors">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                                <i class="ph ph-phone"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Call Us</div>
                                <div class="text-sm text-white/80">+255 622 239 304</div>
                            </div>
                        </a>
                        
                        <a href="https://wa.me/255622239304" target="_blank" class="flex items-center text-white hover:text-white/80 transition-colors">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                                <i class="ph ph-whatsapp-logo"></i>
                            </div>
                            <div>
                                <div class="font-semibold">WhatsApp</div>
                                <div class="text-sm text-white/80">Instant chat available</div>
                            </div>
                        </a>
                        
                        <a href="mailto:info@reputabletours.com" class="flex items-center text-white hover:text-white/80 transition-colors">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                                <i class="ph ph-envelope"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Email</div>
                                <div class="text-sm text-white/80">info@reputabletours.com</div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Popular Tours -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Popular Safari Options</h3>
                    
                    <div class="space-y-3">
                        <div class="p-3 border border-gray-200 rounded-xl hover:border-emerald-500 transition-colors cursor-pointer">
                            <h4 class="font-semibold text-gray-900">Serengeti Migration Safari</h4>
                            <p class="text-sm text-gray-600">7 days • Witness the Great Migration</p>
                        </div>
                        
                        <div class="p-3 border border-gray-200 rounded-xl hover:border-emerald-500 transition-colors cursor-pointer">
                            <h4 class="font-semibold text-gray-900">Kilimanjaro Climb</h4>
                            <p class="text-sm text-gray-600">8 days • Machame Route</p>
                        </div>
                        
                        <div class="p-3 border border-gray-200 rounded-xl hover:border-emerald-500 transition-colors cursor-pointer">
                            <h4 class="font-semibold text-gray-900">Zanzibar Beach Extension</h4>
                            <p class="text-sm text-gray-600">4 days • Relax after safari</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                <!-- Tour Information Card -->
                @if($tour)
                <div class="mb-6 bg-gradient-to-r from-blue-50 to-emerald-50 border border-emerald-200 rounded-xl p-6">
                    <div class="flex items-start gap-4">
                        @if(!empty($tour->images) && count($tour->images) > 0)
                        <img src="{{ asset($tour->images[0]) }}" alt="{{ $tour->name }}" 
                             class="w-24 h-24 rounded-lg object-cover">
                        @else
                        <div class="w-24 h-24 bg-gradient-to-br from-emerald-400 to-blue-500 rounded-lg flex items-center justify-center">
                            <i class="ph-bold ph-map-pin text-white text-3xl"></i>
                        </div>
                        @endif
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $tour->name }}</h3>
                            <div class="flex flex-wrap gap-3 text-sm text-gray-600">
                                <span class="flex items-center">
                                    <i class="ph-bold ph-clock mr-1"></i>{{ $tour->duration_days }} days
                                </span>
                                <span class="flex items-center">
                                    <i class="ph-bold ph-currency-dollar mr-1"></i>From ${{ number_format($tour->base_price, 0) }}
                                </span>
                                <span class="flex items-center">
                                    <i class="ph-bold ph-map-pin mr-1"></i>{{ $tour->location }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-600 to-blue-600 text-white p-6">
                        <h2 class="text-2xl font-bold mb-2">Send Us a Message</h2>
                        <p class="text-white/90">Fill out the form below and we'll get back to you shortly</p>
                    </div>
                    
                    <div class="p-8">
                        <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Your Name *</label>
                                    <div class="relative">
                                        <i class="ph-bold ph-user absolute left-3 top-3 text-gray-400"></i>
                                        <input type="text" name="name" value="{{ old('name') }}" required
                                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors"
                                               placeholder="John Doe">
                                    </div>
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                    <div class="relative">
                                        <i class="ph-bold ph-envelope absolute left-3 top-3 text-gray-400"></i>
                                        <input type="email" name="email" value="{{ old('email') }}" required
                                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors"
                                               placeholder="john@example.com">
                                    </div>
                                    @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                    <div class="relative">
                                        <i class="ph-bold ph-phone absolute left-3 top-3 text-gray-400"></i>
                                        <input type="tel" name="phone" value="{{ old('phone') }}"
                                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors"
                                               placeholder="+255 123 456 789">
                                    </div>
                                    @error('phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Interested Tour</label>
                                    <div class="relative">
                                        <i class="ph-bold ph-map-trifold absolute left-3 top-3 text-gray-400"></i>
                                        <select name="tour_id" 
                                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors appearance-none">
                                            <option value="">Select a tour (optional)</option>
                                            @foreach(App\Models\Tour::where('status', 'active')->get() as $tourOption)
                                                <option value="{{ $tourOption->id }}" 
                                                        {{ ($tour && $tour->id == $tourOption->id) ? 'selected' : '' }}>
                                                    {{ $tourOption->name }} - {{ $tourOption->duration_days }} days
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tour_id')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Your Message *</label>
                                <div class="relative">
                                    <i class="ph-bold ph-chat-dots absolute left-3 top-3 text-gray-400"></i>
                                    <textarea name="message" rows="5" required
                                              class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors resize-none"
                                              placeholder="Tell us about your dream adventure...">{{ old('message') }}</textarea>
                                </div>
                                @error('message')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="newsletter" name="newsletter" class="mr-2">
                                <label for="newsletter" class="text-sm text-gray-600">Send me travel tips and exclusive offers</label>
                            </div>

                            <div class="flex items-center justify-between">
                                <p class="text-sm text-gray-500">
                                    <i class="ph-bold ph-lock mr-1"></i>
                                    Your information is secure and encrypted
                                </p>
                                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-blue-600 text-white rounded-lg font-semibold hover:from-emerald-700 hover:to-blue-700 transition-all transform hover:scale-105 shadow-lg">
                                    <i class="ph-bold ph-paper-plane-tilt mr-2"></i>Send Inquiry
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information Sidebar -->
            <div class="space-y-6">
                <!-- Quick Contact -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Get in Touch</h3>
                    
                    <div class="space-y-4">
                        <a href="mailto:info@reputabletours.com" class="flex items-center p-4 bg-emerald-50 rounded-lg hover:bg-emerald-100 transition-colors group">
                            <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center text-white mr-4 group-hover:scale-110 transition-transform">
                                <i class="ph-bold ph-envelope text-xl"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Email Us</div>
                                <div class="text-sm text-gray-600">info@reputabletours.com</div>
                            </div>
                        </a>

                        <a href="tel:+255123456789" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors group">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white mr-4 group-hover:scale-110 transition-transform">
                                <i class="ph-bold ph-phone text-xl"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Call Us</div>
                                <div class="text-sm text-gray-600">+255 123 456 789</div>
                            </div>
                        </a>

                        <div class="flex items-center p-4 bg-purple-50 rounded-lg">
                            <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center text-white mr-4">
                                <i class="ph-bold ph-map-pin text-xl"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Visit Us</div>
                                <div class="text-sm text-gray-600">Arusha, Tanzania</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Business Hours</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-semibold text-gray-900">8:00 AM - 6:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Saturday</span>
                            <span class="font-semibold text-gray-900">9:00 AM - 4:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sunday</span>
                            <span class="font-semibold text-gray-900">10:00 AM - 2:00 PM</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-3 bg-emerald-50 rounded-lg text-center">
                        <div class="text-sm text-emerald-700 font-medium">
                            <i class="ph-bold ph-clock mr-1"></i>
                            Emergency: Available 24/7
                        </div>
                    </div>
                </div>

                <!-- Why Contact Us -->
                <div class="bg-gradient-to-br from-emerald-50 to-blue-50 rounded-2xl border border-emerald-200 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Why Choose Us?</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-0.5"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Expert Guidance</div>
                                <div class="text-sm text-gray-600">Professional tour consultants</div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-0.5"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Quick Response</div>
                                <div class="text-sm text-gray-600">Reply within 1 hour</div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-0.5"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Best Prices</div>
                                <div class="text-sm text-gray-600">Guaranteed competitive rates</div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="ph-bold ph-check-circle text-emerald-600 mr-3 mt-0.5"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Safe & Secure</div>
                                <div class="text-sm text-gray-600">Licensed and insured</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Form validation enhancements
document.querySelector('form').addEventListener('submit', function(e) {
    const submitBtn = document.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="ph-bold ph-spinner text-xl mr-2 animate-spin"></i>Sending...';
    
    // Re-enable after 3 seconds (in case of network issues)
    setTimeout(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="ph-bold ph-paper-plane-tilt mr-2"></i>Send Inquiry';
    }, 3000);
});

// Character counter for message
const messageTextarea = document.querySelector('textarea[name="message"]');
if (messageTextarea) {
    const counter = document.createElement('div');
    counter.className = 'text-sm text-gray-500 text-right mt-1';
    counter.textContent = '0 / 500 characters';
    messageTextarea.parentNode.insertBefore(counter, messageTextarea.nextSibling);
    
    messageTextarea.addEventListener('input', function() {
        const length = this.value.length;
        counter.textContent = `${length} / 500 characters`;
        counter.className = length > 500 ? 'text-sm text-red-500 text-right mt-1' : 'text-sm text-gray-500 text-right mt-1';
    });
}
</script>
@endsection
