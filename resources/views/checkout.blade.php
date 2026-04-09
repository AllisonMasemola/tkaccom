@include('partials/header')
<main class="max-w-7xl mx-auto px-8 py-12 md:py-20">
    <!-- Back Link -->
    <div class="mb-10">
        <a class="inline-flex items-center text-secondary font-medium hover:underline transition-all group" href="{{ url()->previous() }}">
            <span class="material-symbols-outlined text-sm mr-2 transition-transform group-hover:-translate-x-1">arrow_back</span>
            Back to Booking
        </a>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
        <!-- Left Column: Checkout Process -->
        <div class="lg:col-span-7 space-y-16">
            <!-- Progress Bar -->
            <div class="flex items-center justify-between w-full max-w-md">
                <div class="flex flex-col items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-bold text-sm">1</div>
                    <span class="text-xs font-bold font-label text-secondary uppercase tracking-widest">Guest Details</span>
                </div>
                <div class="h-[2px] flex-1 bg-outline-variant/30 mx-4 self-center -mt-6"></div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-bold text-sm">2</div>
                    <span class="text-xs font-bold font-label text-on-surface-variant uppercase tracking-widest">Payment</span>
                </div>
                <div class="h-[2px] flex-1 bg-outline-variant/30 mx-4 self-center -mt-6"></div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-bold text-sm">3</div>
                    <span class="text-xs font-bold font-label text-on-surface-variant uppercase tracking-widest">Confirmation</span>
                </div>
            </div>
            <!-- Guest Details Section -->
            <section>
                <h2 class="text-4xl font-extrabold tracking-tight mb-8 text-on-surface">Guest Information</h2>
                <form class="space-y-8" action="{{ route('booking.store') }}" method="POST">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="relative">
                            <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Full Name</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim" name="name" placeholder="Johnathan Doe" type="text"/>
                        </div>
                        <div class="relative">
                            <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Email Address</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim" name="email" placeholder="john@luxetravel.com" type="email"/>
                        </div>
                        <div class="relative md:col-span-2">
                            <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Phone Number</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim" name="phone" placeholder="+27 00 000 0000" type="tel"/>
                        </div>
                        <div class="relative md:col-span-2">
                            <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Phone Number</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim" name="" placeholder="+27 00 000 0000" type="tel"/>
                        </div>
                        <div class="relative md:col-span-2">
                            <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Special Requests</label>
                            <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim resize-none" placeholder="Dietary requirements, preferred check-in time, or occasion..." rows="3"></textarea>
                        </div>
                        @foreach($data as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                    </div>
                    <button type="submit" class="w-full bg-black text-white py-4 rounded-xl flex items-center justify-center gap-2 hover:opacity-90 transition-opacity">
                        <span class="font-bold tracking-tight">Book Now</span>
                    </button>
                </form>
            </section>
            <!-- Payment Section -->
            <section class="p-8 bg-surface-container-low rounded-xl border border-outline-variant/10">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-extrabold tracking-tight text-on-surface">Secure Payment</h2>
                    <div class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-lg border border-outline-variant/20 shadow-sm">
                        <span class="material-symbols-outlined text-green-600 text-sm" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                        <span class="text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant">PCI Compliant</span>
                    </div>
                </div>
                <div class="space-y-8">
                    <input type="submit" value="Submit">
                    <!-- Apple Pay Quick Action -->
                    {{--<button type="submit" class="w-full bg-black text-white py-4 rounded-xl flex items-center justify-center gap-2 hover:opacity-90 transition-opacity">--}}
                    {{--    <span class="font-bold tracking-tight">Pay with</span>--}}
                    {{--    <span class="text-xl font-bold"> Pay</span>--}}
                    {{--</button>--}}
                    <div class="relative flex items-center py-4">
                        <div class="flex-grow border-t border-outline-variant/30"></div>
                        <span class="flex-shrink mx-4 text-xs font-bold text-outline uppercase tracking-widest">Or card payment</span>
                        <div class="flex-grow border-t border-outline-variant/30"></div>
                    </div>
                    <!-- Card Entry -->
                    <div class="space-y-6">
                        <div class="relative">
                            <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Card Number</label>
                            <div class="flex items-center border-b border-outline-variant/40 focus-within:border-secondary transition-colors">
                                <input class="w-full bg-transparent border-0 py-3 focus:ring-0 placeholder:text-surface-dim" placeholder="0000 0000 0000 0000" type="text"/>
                                <span class="material-symbols-outlined text-outline">credit_card</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-8">
                            <div class="relative">
                                <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Expiry Date</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim" placeholder="MM/YY" type="text"/>
                            </div>
                            <div class="relative">
                                <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">CVV</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim" placeholder="***" type="password"/>
                            </div>
                        </div>
                    </div>
                    <button class="w-full py-5 bg-gradient-to-r from-secondary to-secondary-container text-white rounded-md font-bold text-lg shadow-lg hover:shadow-xl active:scale-[0.98] transition-all flex items-center justify-center gap-3 mt-10">
                        Complete Secure Booking
                        <span class="material-symbols-outlined">lock</span>
                    </button>
                </div>
            </section>
        </div>
        <!-- Right Column: Order Summary (Sticky) -->
        <aside class="lg:col-span-5">
            <div class="sticky top-32 bg-surface-container-lowest p-8 border border-outline-variant/10 shadow-2xl rounded-sm">
                <h3 class="text-2xl font-extrabold mb-8 tracking-tight border-b border-outline-variant/10 pb-4">Your Itinerary</h3>
                <div class="space-y-8">
                    <!-- Accommodation -->
                    <div class="flex gap-4">
                        <div class="w-24 h-24 rounded-xl overflow-hidden flex-shrink-0">
                            <img class="w-full h-full object-cover" data-alt="ultra-modern luxury clifton villa with infinity pool overlooking the deep blue atlantic ocean at sunset" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_p03mc9KIp8MZTdH0IvmBlVD0mRPkoWE0Cb0ytJO1UdqlFVa5-gSzOkKz8P_NmABY5M239DWIV_ro-ldfr_LP4Dw_C5Q2UhcdbN59o-aaI_4e_CHKGSiDijpiNsmnZ6DrojNf30UprS_CA1Gpn6ex6XwIpr00_f70nAUZfAQlEwoMyZL7rDTrIcCz5spoO9-s_mZvoBJS9LFOpBfaubIzv8VE5RGNg4blkHoBiv7vttqbR8EoEWa9-1ayOkNn5vjzntgkH47Gdxo"/>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg">Clifton Sky Villa</h4>
                            <p class="text-sm text-on-surface-variant mb-1">Dec 15 — Dec 18 (3 nights)</p>
                            <span class="text-xs font-bold bg-secondary/10 text-secondary px-2 py-0.5 rounded-full uppercase tracking-tighter">Luxury Suite</span>
                        </div>
                    </div>
                    <!-- Car Hire -->
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-surface">
                        <span class="material-symbols-outlined text-secondary-container" style="font-variation-settings: 'wght' 200;">directions_car</span>
                        <div>
                            <h4 class="font-bold">Porsche 911 Carrera</h4>
                            <p class="text-xs text-on-surface-variant">Self-drive rental (3 days)</p>
                        </div>
                        <div class="ml-auto font-bold text-sm">R1,200</div>
                    </div>
                    <!-- Experience -->
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-surface">
                        <span class="material-symbols-outlined text-secondary-container" style="font-variation-settings: 'wght' 200;">wine_bar</span>
                        <div>
                            <h4 class="font-bold">Wine Safari</h4>
                            <p class="text-xs text-on-surface-variant">Stellenbosch (2 guests)</p>
                        </div>
                        <div class="ml-auto font-bold text-sm">R450</div>
                    </div>
                    <!-- Totals -->
                    <div class="space-y-4 pt-8 border-t border-outline-variant/10">
                        <div class="flex justify-between text-sm">
                            <span class="text-on-surface-variant">Accommodation Subtotal</span>
                            <span class="font-medium">R8,400.00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-on-surface-variant">Curated Add-ons</span>
                            <span class="font-medium">R1,650.00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-on-surface-variant">VAT (15%)</span>
                            <span class="font-medium">R1,507.50</span>
                        </div>
                        <div class="flex justify-between text-sm text-on-tertiary-container font-bold">
                            <span>Concierge Service Fee</span>
                            <span>R150.00</span>
                        </div>
                        <div class="flex justify-between items-end pt-6">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-outline">Grand Total</span>
                                <span class="text-4xl font-black text-on-surface tracking-tighter">R11,707.50</span>
                            </div>
                            <span class="text-xs text-on-surface-variant pb-1 uppercase tracking-tighter">ZAR</span>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-3 text-on-surface-variant/60">
                    <span class="material-symbols-outlined text-sm">info</span>
                    <p class="text-[10px] leading-relaxed">Free cancellation until Dec 1. Secure handling of your premium transaction via end-to-end encryption.</p>
                </div>
            </div>
        </aside>

    </div>
</main>
<script>
  document.getElementById('payfastForm').submit();
</script>
<!-- Footer -->
@include('partials/footer')
