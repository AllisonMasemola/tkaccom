@include('partials/header')
<main class="pt-20">
    @php
        $property = $car;
    @endphp

    @php
        $images = is_array($car->image)
                    ? $car->image
                    : json_decode($car->image, true);

        $images = $images ?? [];

        $thumbnail = count($images) > 0
                    ? asset('storage/' . $images[0])
                    : 'https://placehold.co/600x450?text=No+Image';
    @endphp
    <!-- Hero Section -->
    <section class="relative h-[870px] w-full overflow-hidden flex items-end">
        <div class="absolute inset-0 z-0">
            <img alt="Porsche 911 Carrera" class="w-full h-full object-cover" data-alt="Sleek metallic silver Porsche 911 Carrera parked on a scenic coastal cliff road in Cape Town at dusk with soft violet sky" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAneosCVJNLaHtVghF6wj0N4TPswi5kq4AKJv_5tWKQzt4bQKUFu8fd6WRL6Mqr8m7ORVXXMfLUTfj8kwL8ShaAQjAw3Z57tMyLbPn9HD9LVPKzJd9G0ji9FUULEQDCARFgR11_78ly12qPC7RINgm9Hiz5FHSM9-ZUVhv_Xx1HbI06QaRbKzGOaO_R4vsiC7DYRFvp6-3tyy10EI7q64igl9vSvq8JXSBfrgEO7YJJ7Pz7wdoLc5Ld7EXhc8atSBAc9kgDtu1uV34"/>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto w-full px-8 pb-16">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8">
                <div class="max-w-2xl">
                    <span class="text-tertiary-fixed-dim font-headline font-bold tracking-widest uppercase text-xs mb-4 block">Prestige Movement Collection</span>
                    <h1 class="text-white font-headline text-6xl md:text-8xl font-extrabold tracking-tighter leading-none mb-4">
                        {{ $property->car_name }}</h1>
                    <p class="text-white/80 text-lg max-w-md font-light leading-relaxed">{{ $property->car_description }}</p>
                </div>
                <div class="bg-surface-container-lowest/10 backdrop-blur-xl p-8 rounded-xl border border-white/10 w-full md:w-auto">
                    <div class="text-white/60 text-sm font-label uppercase tracking-widest mb-1">Starting from</div>
                    <div class="text-white text-4xl font-headline font-black">R{{ number_format($property->price, 2) }} <span class="text-xl font-medium opacity-60">/ day</span></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Technical Bento Grid -->
    <section class="max-w-7xl mx-auto px-8 py-24">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Main Spec -->
            <div class="md:col-span-2 bg-surface-container-low p-10 rounded-xl flex flex-col justify-between">
                <div>
                    <h3 class="text-secondary font-headline font-bold text-2xl mb-2">Performance DNA</h3>
                    <p class="text-on-surface-variant leading-relaxed">{{ $property->car_description }}</p>
                </div>
                <div class="grid grid-cols-2 gap-8 mt-12">
                    <div>
                        <div class="text-on-surface-variant/50 text-xs font-bold uppercase tracking-widest mb-2">Engine</div>
                        <div class="text-3xl font-headline font-extrabold text-on-surface">3.0L Twin-Turbo</div>
                    </div>
                    {{--<div>--}}
                    {{--    <div class="text-on-surface-variant/50 text-xs font-bold uppercase tracking-widest mb-2">0-100 km/h</div>--}}
                    {{--    <div class="text-3xl font-headline font-extrabold text-on-surface">4.2s</div>--}}
                    {{--</div>--}}
                </div>
            </div>
            <!-- Acceleration Card -->
            <div class="bg-secondary text-white p-10 rounded-xl flex flex-col justify-center items-center text-center">
                <span class="material-symbols-outlined text-5xl mb-4" data-icon="speed">speed</span>
                <div class="text-4xl font-headline font-black mb-1">293</div>
                <div class="text-white/70 text-sm font-label uppercase tracking-tighter">Top Speed km/h</div>
            </div>
            <!-- Interior Detail -->
            <div class="relative overflow-hidden rounded-xl group">
                <img alt="Interior detail" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Close up of a luxury car steering wheel with leather stitching and high-end dashboard interface in soft ambient light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMdpxLAafNJUtY7I5CRzq45jKleXUKrTpNBD3g1_TlTE0rxiVCbQnEbKWr07011ahrbzFYOKh8QjZlzmcQDZZai7oCu7AZ4en5FzGlh1qmQuyaqiz9ntcBGHR8EBZhkhOXXCiWvbB6vk5HbKnMvTM2NWXtQRt2wrEkI3VkK7fcgzy1AOpwMLz_H145cuxMDr-BymT0tdiREGjUlZ02Fp8EyUIzQS3aWGmAnPC14a6zxoeQJx49wy5T54JV6IhZJoJS4ZRP4utWn9E"/>
                <div class="absolute inset-0 bg-secondary/20 mix-blend-multiply"></div>
                <div class="absolute bottom-6 left-6 text-white">
                    <div class="text-xs font-bold uppercase tracking-widest">Interior</div>
                    <div class="text-xl font-headline font-bold">Luxe Graphite</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Terms & Insurance Section -->
    <section class="bg-surface-container-low py-24">
        <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-16">
            <div class="lg:col-span-7">
                <h2 class="text-4xl font-headline font-extrabold tracking-tight text-on-surface mb-12">Rental Architecture</h2>
                <div class="space-y-12">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined" data-icon="verified_user">verified_user</span>
                        </div>
                        <div>
                            <h4 class="text-xl font-headline font-bold text-on-surface mb-2">Bespoke Insurance</h4>
                            <p class="text-on-surface-variant leading-relaxed">Comprehensive prestige cover included with a R25,000 refundable security deposit. Tailored for high-performance peace of mind.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined" data-icon="event_available">event_available</span>
                        </div>
                        <div>
                            <h4 class="text-xl font-headline font-bold text-on-surface mb-2">Curated Terms</h4>
                            <ul class="text-on-surface-variant space-y-2">
                                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Minimum age: 28 years</li>
                                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> 200km daily allowance</li>
                                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Concierge delivery to your Villa</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined" data-icon="support_agent">support_agent</span>
                        </div>
                        <div>
                            <h4 class="text-xl font-headline font-bold text-on-surface mb-2">The Specialist Touch</h4>
                            <p class="text-on-surface-variant leading-relaxed">24/7 roadside assistance and personal drive-consultant available for the duration of your rental.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-5">
                <div class="sticky top-32 bg-surface-container-lowest p-8 rounded-xl shadow-[0_20px_40px_rgba(26,28,28,0.05)] border border-outline-variant/20">
                    <h3 class="text-2xl font-headline font-bold mb-6">Secure Your Drive</h3>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center py-3 border-b border-outline-variant/10">
                            <span class="text-on-surface-variant">Daily Rate</span>
                            <span class="font-bold">R{{ number_format($property->price, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-outline-variant/10">
                            <span class="text-on-surface-variant">Insurance Premium</span>
                            <span class="text-on-primary-container font-medium">Included</span>
                        </div>
                        <div class="flex justify-between items-center py-3">
                            <span class="text-on-surface-variant">Delivery Fee</span>
                            <span class="font-bold">R0</span>
                        </div>
                    </div>
                    <div class="mb-8">
                        <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-3">Preferred Dates</label>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-3 bg-surface-container-low rounded text-sm text-on-surface-variant flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm" data-icon="calendar_today">calendar_today</span>
                                Pick-up
                            </div>
                            <div class="p-3 bg-surface-container-low rounded text-sm text-on-surface-variant flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm" data-icon="calendar_month">calendar_month</span>
                                Return
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('checkout', ['type' => 'prestige', 'id' => $property->id]) }}"
                       class="block w-full text-center premium-gradient text-white py-4 rounded-md font-headline font-extrabold text-lg transition-transform active:scale-95 shadow-lg shadow-secondary/20">
                        Rent This Car
                    </a>
                    <p class="text-center text-on-surface-variant/60 text-xs mt-6 px-4">
                        By clicking "Rent This Car", you agree to our prestige rental protocol and insurance verification.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Asymmetric Visual Break -->
    <section class="py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="absolute -top-12 -left-12 w-64 h-64 bg-secondary/5 rounded-full blur-3xl"></div>
                <img alt="Rear view" class="relative z-10 w-full h-[500px] object-cover rounded-sm asymmetric-clip shadow-2xl" data-alt="Rear view of a Porsche 911 showing the iconic tail light bar at night with city lights reflecting on the metallic paint" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDs_DmOto1nDWW0N3lblw2HvTSwb0ZGd1Wb5GWH4GE5ICodxTVhJO8fEH9q6nF6z8U-wkwSKYcygtbRPq6zkYlFUCChW_ukhayI2oX7mAsF1eRe02NqnINvm6mTfUkp-AByQ72jatBI6N5-UZTTPcUriBZftikgPsHe1FbViB_8lSH7BYp5HSNd3-XHDbKWxY55H6oO927CgWIiLdI4hQMyk4PV_WZBnJagxVEOFpA6BcadvFjHPYxZB2-gajQiYX-SUb4yE1jkOKU"/>
            </div>
            <div class="md:pl-12">
                <h2 class="text-4xl font-headline font-extrabold text-on-surface mb-6 leading-tight">Engineered For The <br/><span class="text-secondary">Cape Coastal Drive</span></h2>
                <p class="text-lg text-on-surface-variant mb-8 leading-relaxed">Whether it's the winding turns of Chapman's Peak or the sunset cruise along Victoria Road, the 911 Carrera provides the ultimate sensory connection to the landscape.</p>
                <div class="flex flex-wrap gap-4">
                    <span class="px-4 py-2 bg-surface-container rounded-full text-xs font-bold text-on-surface-variant">Precision Steering</span>
                    <span class="px-4 py-2 bg-surface-container rounded-full text-xs font-bold text-on-surface-variant">Sport Exhaust</span>
                    <span class="px-4 py-2 bg-surface-container rounded-full text-xs font-bold text-on-surface-variant">PDK Transmission</span>
                </div>
            </div>
        </div>
    </section>
</main>
@include('partials/footer')
