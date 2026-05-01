@extends('layouts.public')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show success popup if success message exists
    @if(session('success'))
    Swal.fire({
        title: 'Thank You!',
        text: 'Thank you for your inquiry! We have received your message and will get back to you within 24 hours.',
        icon: 'success',
        confirmButtonColor: '#10b981',
        confirmButtonText: 'Great!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    });
    @endif
    
    // Handle form submission with loading state
    const form = document.querySelector('form[action="{{ route('inquiries.store') }}"]');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="ph ph-spinner-gap animate-spin mr-2"></i>Sending...';
            submitButton.classList.add('opacity-75', 'cursor-not-allowed');
            
            // Reset after 5 seconds as fallback
            setTimeout(() => {
                submitButton.disabled = false;
                submitButton.textContent = originalText;
                submitButton.classList.remove('opacity-75', 'cursor-not-allowed');
            }, 5000);
        });
    }
});
</script>
@endpush

@section('content')
<div class="pt-24">
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1516426122078-c23e76319801?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
                 class="w-full h-full object-cover" alt="Safari Consultation">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[1px]"></div>
        </div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-5xl md:text-7xl font-serif font-black text-white mb-6 border-move">Contact Our <span class="text-emerald-400 italic">Specialists</span></h1>
            <p class="text-lg text-emerald-50/70 max-w-2xl mx-auto">Skip the generic forms. Tell us what you dream of seeing, and we'll build the map.</p>
        </div>
    </section>

    <!-- Main Contact Area -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Contact Info Panel -->
                <div class="lg:col-span-5 space-y-12">
                    <div>
                        <h4 class="text-emerald-600 font-black text-xs uppercase tracking-[0.3em] mb-4">Direct Access</h4>
                        <h2 class="text-4xl font-serif font-black text-slate-900 leading-tight">We are always just <br> a message away.</h2>
                    </div>

                    <div class="grid gap-8">
                        @foreach([
                            ['label' => 'Official Email', 'val' => 'info@reputabletours.com', 'icon' => 'envelope-simple', 'sub' => 'Response within 4 hours'],
                            ['label' => 'WhatsApp', 'val' => '+255 622 239 304', 'icon' => 'whatsapp-logo', 'sub' => 'Instant Response Available'],
                            ['label' => 'Base Office', 'val' => 'NSSF Commercial Complex, Moshi', 'icon' => 'map-pin-line', 'sub' => 'P.O Box 25212, Tanzania']
                        ] as $item)
                        <div class="flex items-start gap-6 group">
                            <div class="w-14 h-14 rounded-2xl bg-slate-50 text-slate-400 flex items-center justify-center text-2xl group-hover:bg-emerald-600 group-hover:text-white group-hover:shadow-xl group-hover:shadow-emerald-500/20 transition-all duration-500">
                                <i class="ph ph-{{ $item['icon'] }}"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ $item['label'] }}</p>
                                @if($item['label'] === 'WhatsApp')
                                    <h4 class="text-lg font-black text-slate-900 mb-1">
                                        <a href="https://wa.me/255622239304" target="_blank" class="hover:text-emerald-600 transition-colors">{{ $item['val'] }}</a>
                                    </h4>
                                @else
                                    <h4 class="text-lg font-black text-slate-900 mb-1">{{ $item['val'] }}</h4>
                                @endif
                                <p class="text-xs font-bold text-slate-400">{{ $item['sub'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Social proof card -->
                    <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white relative overflow-hidden group">
                        <div class="absolute -right-10 -bottom-10 opacity-10 group-hover:scale-125 transition-transform duration-1000 rotate-12">
                            <i class="ph ph-chat-circle-dots text-[10rem]"></i>
                        </div>
                        <h4 class="text-xl font-bold mb-4 relative z-10 font-serif">Plan with a Human, <br> Not an Algorithm.</h4>
                        <p class="text-slate-400 text-sm leading-relaxed mb-8 relative z-10">Our specialists have lived in Tanzania their entire lives. We know the secret spots that don't show up on maps.</p>
                        <a href="mailto:info@reputabletours.com" class="px-6 py-3 bg-emerald-500 text-white font-black text-[10px] uppercase tracking-widest rounded-xl inline-block hover:bg-emerald-400 transition-all relative z-10">Email Us</a>
                    </div>
                </div>

                <!-- Inquiry Form -->
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-[3rem] border border-slate-100 shadow-2xl p-10 md:p-16 relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 opacity-5">
                            <i class="ph ph-pencil-line text-8xl"></i>
                        </div>
                        
                        <div class="relative z-10">
                            <div class="mb-12">
                                <h3 class="text-3xl font-serif font-black text-slate-900 mb-2">Build Your Itinerary</h3>
                                <p class="text-slate-400 font-medium text-sm tracking-tight">Our team will respond with a tailored quote within 24 hours.</p>
                            </div>

                            @if(session('success'))
                                <div class="mb-8 p-6 bg-emerald-50 border border-emerald-200 rounded-2xl">
                                    <div class="flex items-center gap-4">
                                        <i class="ph ph-check-circle text-emerald-600 text-2xl"></i>
                                        <p class="text-emerald-800 font-bold">{{ session('success') }}</p>
                                    </div>
                                </div>
                            @endif

                            <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-8">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Full Name</label>
                                        <input type="text" name="name" placeholder="Johnathan Doe" value="{{ old('name') }}" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all placeholder:text-slate-300 @error('name') border-red-500 @enderror" required>
                                        @error('name')
                                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Email Address</label>
                                        <input type="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all placeholder:text-slate-300 @error('email') border-red-500 @enderror" required>
                                        @error('email')
                                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Phone Number</label>
                                        <div class="relative">
                                            <input type="tel" name="phone" placeholder="+1 555 0123" value="{{ old('phone') }}" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all placeholder:text-slate-300">
                                            <span class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-300"><i class="ph ph-phone"></i></span>
                                        </div>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Nationality</label>
                                        <input type="text" name="nationality" placeholder="e.g., United States, United Kingdom" value="{{ old('nationality') }}" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all placeholder:text-slate-300 @error('nationality') border-red-500 @enderror">
                                        @error('nationality')
                                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Interested Tour</label>
                                        <select name="tour_id" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                                            <option value="">Select a tour (optional)</option>
                                            @foreach(App\Models\Tour::where('status', 'active')->get() as $tour)
                                                <option value="{{ $tour->id }}" {{ old('tour_id') == $tour->id ? 'selected' : '' }}>
                                                    {{ $tour->name }} - {{ $tour->duration_days }} days
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Travel Date</label>
                                        <input type="date" name="travel_date" value="{{ old('travel_date') }}" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all placeholder:text-slate-300 @error('travel_date') border-red-500 @enderror">
                                        @error('travel_date')
                                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Duration (Days)</label>
                                        <select name="duration" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                                            <option value="">Select duration</option>
                                            <option value="1-3" {{ old('duration') == '1-3' ? 'selected' : '' }}>1-3 days</option>
                                            <option value="4-7" {{ old('duration') == '4-7' ? 'selected' : '' }}>4-7 days</option>
                                            <option value="8-14" {{ old('duration') == '8-14' ? 'selected' : '' }}>8-14 days</option>
                                            <option value="15+" {{ old('duration') == '15+' ? 'selected' : '' }}>15+ days</option>
                                        </select>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Group Size</label>
                                        <select name="group_size" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                                            <option value="">Select group size</option>
                                            <option value="solo" {{ old('group_size') == 'solo' ? 'selected' : '' }}>Solo (1 person)</option>
                                            <option value="couple" {{ old('group_size') == 'couple' ? 'selected' : '' }}>Couple (2 people)</option>
                                            <option value="small-group" {{ old('group_size') == 'small-group' ? 'selected' : '' }}>Small Group (3-5 people)</option>
                                            <option value="large-group" {{ old('group_size') == 'large-group' ? 'selected' : '' }}>Large Group (6+ people)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Personal Requests & Dreams</label>
                                    <textarea name="message" rows="5" placeholder="Tell us about the animals you want to see or specific lodges you've heard about..." class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all placeholder:text-slate-300 @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="w-full py-6 bg-emerald-600 text-white font-black text-xs uppercase tracking-[0.3em] rounded-2xl shadow-2xl shadow-emerald-600/20 hover:bg-emerald-700 hover:scale-[1.02] transition-all duration-300">
                                    Request Bespoke Quote
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="h-[600px] w-full bg-slate-100 relative overflow-hidden group">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127521.16854585189!2d37.26257540510862!3d-3.342130767073356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1837000d11f99c67%3A0x685519f074d2836!2sMoshi%2C%20Tanzania!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s" 
            class="w-full h-full border-0 grayscale hover:grayscale-0 transition-all duration-1000" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        
        <!-- Interactive Overlay -->
        <div class="absolute inset-x-6 top-10 flex justify-between items-start pointer-events-none">
            <div class="bg-white/90 backdrop-blur-xl p-8 rounded-[2rem] shadow-2xl border border-white/50 pointer-events-auto max-w-sm transition-all duration-500 group-hover:translate-x-2">
                <h4 class="text-2xl font-black text-slate-900 mb-1">NSSF Commercial Complex</h4>
                <p class="text-emerald-600 font-bold text-sm mb-4">Moshi, Tanzania</p>
                <p class="text-slate-500 text-xs leading-relaxed mb-6">P.O Box 25212, Moshi-Tanzania. Located at the foothills of Mount Kilimanjaro, our headquarters is the starting point for all our epic adventures.</p>
                <a href="https://maps.app.goo.gl/moshi-tanzania" target="_blank" class="inline-flex items-center gap-2 text-slate-900 font-black text-[10px] uppercase tracking-widest hover:text-emerald-600 transition-colors">
                    <i class="ph ph-map-trifold text-lg"></i>
                    View Moshi Map
                </a>
            </div>
        </div>

        <a href="https://maps.app.goo.gl/moshi-tanzania" target="_blank" class="absolute bottom-10 right-10 bg-slate-900 text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.3em] shadow-2xl shadow-slate-900/40 hover:bg-emerald-600 hover:scale-105 transition-all opacity-0 group-hover:opacity-100 duration-500">
            Open in Google Maps
        </a>
    </section>
</div>
@endsection
