@extends('layouts.public')

@section('title', 'Contact Us - Make an Inquiry')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-emerald-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-emerald-600 to-blue-600 text-white">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative container mx-auto px-4 py-16">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Get in Touch</h1>
                <p class="text-xl text-white/90 mb-8">Have questions about our adventures? We're here to help you plan the perfect journey</p>
                
                <!-- Quick Contact Stats -->
                <div class="flex justify-center gap-8 text-center">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">24/7</div>
                        <div class="text-sm text-white/80">Support</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">< 1hr</div>
                        <div class="text-sm text-white/80">Response Time</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">100%</div>
                        <div class="text-sm text-white/80">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Form -->
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
