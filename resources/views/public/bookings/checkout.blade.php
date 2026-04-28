@extends('layouts.public')

@section('content')
<section class="py-32 bg-slate-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-serif font-black text-slate-900 mb-6">Confirm Your Booking</h1>
            <p class="text-slate-500 font-medium tracking-wide text-lg">Review your booking details and submit your request.</p>
        </div>

        <div class="space-y-8">
            <!-- Booking Details -->
            <div class="bg-white rounded-[3rem] border border-slate-100 shadow-xl p-12 overflow-hidden relative group">
                <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                    <i class="ph ph-article text-9xl"></i>
                </div>
                
                <h2 class="text-3xl font-serif font-black text-slate-900 mb-10 flex items-center gap-4">
                    <span class="w-12 h-1 bg-emerald-500 rounded-full"></span>
                    Booking Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="space-y-6">
                        <div class="space-y-1">
                            <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Selected Expedition</p>
                            <p class="text-xl font-bold text-slate-900">{{ $booking->tour->name }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Departure Date</p>
                            <p class="text-xl font-bold text-emerald-600">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M, Y') }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Participants</p>
                            <p class="text-xl font-bold text-slate-900">{{ $booking->adults }} Adults, {{ $booking->children }} Children</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="space-y-1">
                            <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Primary Contact</p>
                            <p class="text-xl font-bold text-slate-900">{{ $booking->customer_name }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Email Address</p>
                            <p class="text-xl font-bold text-slate-900">{{ $booking->customer_email }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Phone Number</p>
                            <p class="text-xl font-bold text-slate-900">{{ $booking->customer_phone }}</p>
                        </div>
                    </div>
                </div>

                @if($booking->special_requests)
                <div class="mt-12 pt-8 border-t border-slate-50">
                    <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-3">Special Instructions</p>
                    <p class="text-slate-600 italic leading-relaxed">"{{ $booking->special_requests }}"</p>
                </div>
                @endif

                <div class="mt-12 flex flex-wrap gap-4">
                    <a href="{{ route('bookings.invoice.preview', $booking->id) }}" target="_blank" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-slate-900 font-black text-xs uppercase tracking-widest rounded-2xl border border-slate-100 hover:bg-slate-50 transition-all">
                        <i class="ph ph-eye text-xl text-emerald-600"></i> Preview Proforma PDF
                    </a>
                    <a href="{{ route('bookings.invoice', $booking->id) }}" class="inline-flex items-center gap-3 px-8 py-4 bg-slate-50 text-slate-900 font-black text-xs uppercase tracking-widest rounded-2xl border border-slate-100 hover:bg-slate-100 transition-all">
                        <i class="ph ph-file-pdf text-xl text-rose-500"></i> Export Proforma PDF
                    </a>
                </div>
            </div>

            <!-- Price Summary -->
            <div class="bg-white rounded-[3rem] border border-slate-100 shadow-xl p-12">
                <h2 class="text-3xl font-serif font-black text-slate-900 mb-10 flex items-center gap-4">
                    <span class="w-12 h-1 bg-emerald-500 rounded-full"></span>
                    Price Summary
                </h2>

                <div class="space-y-4">
                    <div class="flex justify-between items-center text-sm font-bold">
                        <span class="text-slate-400 uppercase tracking-widest text-[10px]">Expedition Fee</span>
                        <span class="text-slate-900">${{ number_format($booking->total_price, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm font-bold">
                        <span class="text-slate-400 uppercase tracking-widest text-[10px]">VAT (Tanzania)</span>
                        <span class="text-slate-900">$0.00</span>
                    </div>
                    <div class="pt-6 border-t border-slate-100">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-slate-900">Total</span>
                            <span class="text-3xl font-black text-emerald-600">${{ number_format($booking->total_price, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="bg-emerald-600 rounded-[2.5rem] p-10 text-white text-center">
                <h4 class="text-xl font-bold mb-4">Ready to Confirm?</h4>
                <p class="text-emerald-100 text-sm leading-relaxed mb-6 opacity-80">Your booking request will be submitted to our team. We will contact you shortly to confirm availability and provide payment instructions.</p>
                <form action="{{ route('bookings.confirm', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-3 px-10 py-5 bg-white text-emerald-700 font-black text-xs uppercase tracking-widest rounded-2xl hover:bg-emerald-50 transition-all">
                        <i class="ph ph-check-circle text-xl"></i>
                        Submit Booking Request
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // Show success popup if booking was just confirmed
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Booking Submitted!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#10b981',
        confirmButtonText: 'OK'
    });
    @endif
</script>
@endsection
