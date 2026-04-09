@include('partials/header')
<main class="pt-24 pb-20">
    @php
        $property = $accommodation;
    @endphp
    <!-- Hero Gallery Section (Editorial Asymmetry) -->
    <section class="max-w-7xl mx-auto px-8 mb-16">
            @php
                // $images = json_decode($property->images, true) ?? [];
                // $thumbnail = count($images) > 0
                //     ? asset('storage/' . $images[0])
                //     : 'https://placehold.co/600x450?text=No+Image';
                $images = is_array($accommodation->images)
                            ? $accommodation->images
                            : json_decode($accommodation->images, true);

                $images = $images ?? [];

                $thumbnail = count($images) > 0
                            ? asset('storage/' . $images[0])
                            : 'https://placehold.co/600x450?text=No+Image';
            @endphp

        <div class="grid grid-cols-12 gap-4 h-[716px]">
            <div class="col-span-12 lg:col-span-8 relative overflow-hidden rounded-xl">
                <img class="w-full h-full object-cover" data-alt="ultra-luxury modern villa perched on a cliffside overlooking the turquoise Atlantic ocean in Clifton at golden hour" src="{{ $thumbnail }}"/>
                <div class="absolute bottom-8 left-8 bg-surface-container-lowest/90 backdrop-blur-md p-6 rounded-lg editorial-shadow max-w-sm">
                    <span class="text-on-tertiary-container font-headline font-extrabold text-xs tracking-widest uppercase mb-2 block">Premium Collection</span>
                    <h1 class="text-4xl font-headline font-black text-secondary tracking-tighter leading-none mb-2">{{ $property->name }}</h1>
                    <p class="text-on-surface-variant text-sm flex items-center">
                        <span class="material-symbols-outlined text-sm mr-1">location_on</span>
                        Clifton, Cape Town
                    </p>
                </div>
            </div>
            <div class="hidden lg:flex lg:col-span-4 flex-col gap-4">
                <div class="h-1/2 overflow-hidden rounded-xl relative ">
                    @if(count($images) > 1)
                        <img class="w-full max-h-[350px] h-full object-cover" src="{{ asset('storage/' . $images[1]) }}" data-alt="architectural detail of a glass elevator inside a luxury villa with ocean views" />
                    @endif
                    {{--<img class="w-full h-full object-cover" data-alt="architectural detail of a glass elevator inside a luxury villa with ocean views" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJvslJUy1fFSXWtrdXd51DExsWWZideS1wXUFB45wj98r222EZy1IgmWF2ScG5GFqLIXsCf6FRPHGDBM-tVPCJ6uWgvPgkSayGN5V2lalxQHNCjFWhpncvZMsU3G3gMcgIfGhQdpMGGQHlHcNHWia8l0jG0XQkm7_Hg1d96p7GZU-a9f971yjzB200QA8JIWfL4mwI4fj_sFkok6-wrZOS3ls_g46C84PpgTGL6DUOcD9wpIyut9Cc1qF8y0TmTdQrfLxV9-RCxqA"/>--}}
                </div>
                <div class="h-1/2 overflow-hidden rounded-xl relative">
                    @if(count($images) > 1)
                        <img class="w-full max-h-[350px] h-full object-cover hover:scale-105 transition-transform duration-700" src="{{ asset('storage/' . $images[2]) }}" data-alt="infinity pool overlooking the sunset over the Atlantic Ocean with designer outdoor furniture" />
                    @endif
                    {{--<img class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" data-alt="infinity pool overlooking the sunset over the Atlantic Ocean with designer outdoor furniture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDA7Sw-L-uLNp71mLOmM7__8HI8Ax3gEk2V8eWQekKx-IAwK_e5DkuHliMBlWg2DuoE5CjkJ26S2PoIJrYVMkZqdiGcFVGdPCgEsKa2ZxnYg6yjHKhZhbjvNjghO8fHNgWP4YSnFLfT8_GGOMos3OikfJQ1F-D-7WIS146oQDhL4LtO21c2Dw5X-SXqZkhxtvOkQGZdk-qWANGkMhz86HgoSzeVTSaOTQ4BCQGQj3YBIQmdOjKor8cHSWXGUzbv2Wlq1IEnvht5OvY"/>--}}
{{--                    <div class="absolute inset-0 bg-secondary/20 flex items-center justify-center cursor-pointer group">--}}
{{--<span class="bg-surface-container-lowest text-secondary px-4 py-2 rounded-full font-headline font-bold text-sm flex items-center group-hover:bg-secondary group-hover:text-on-secondary transition-colors">--}}
{{--                                View all 24 photos--}}
{{--                            </span>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- Content Layout -->
    <section class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Left Column: Details & Description -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Quick Info -->
            <div class="flex flex-wrap gap-8 py-8 border-b border-outline-variant/20">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-surface-container-low flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary">king_bed</span>
                    </div>
                    <div>
                        <p class="text-xs text-on-surface-variant font-medium">Bedrooms</p>
                        <p class="font-headline font-bold">{{ $property->rooms }} Suites</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-surface-container-low flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary">bathroom</span>
                    </div>
                    <div>
                        <p class="text-xs text-on-surface-variant font-medium">Bathrooms</p>
                        <p class="font-headline font-bold">{{ $property->bathrooms }} Baths</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-surface-container-low flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary">square_foot</span>
                    </div>
                    <div>
                        <p class="text-xs text-on-surface-variant font-medium">Shower</p>
                        <p class="font-headline font-bold">{{ $property->showers ? 'Available' : 'Not Available' }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-surface-container-low flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary">person</span>
                    </div>
                    <div>
                        <p class="text-xs text-on-surface-variant font-medium">Parking</p>
                        <p class="font-headline font-bold">{{ $property->parking }}</p>
                    </div>
                </div>
            </div>
            <!-- Description -->
            <div>
                <h3 class="text-2xl font-headline font-bold text-on-surface mb-6">About the Estate</h3>
                <div class="prose prose-slate max-w-none text-on-surface-variant leading-relaxed space-y-4">
                    <p>
                        @php
                            echo nl2br(e($property->description));
                        @endphp
                    </p>
                </div>
            </div>
            <!-- Bento Grid Amenities -->
            <div>
                <h3 class="text-2xl font-headline font-bold text-on-surface mb-6">Luxury Amenities</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="p-6 bg-surface-container-low rounded-xl flex flex-col items-center justify-center text-center group hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined text-secondary text-3xl mb-3">pool</span>
                        <p class="font-headline font-bold text-sm">Private Rim-flow Pool</p>
                    </div>
                    <div class="p-6 bg-surface-container-low rounded-xl flex flex-col items-center justify-center text-center hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined text-secondary text-3xl mb-3">elevator</span>
                        <p class="font-headline font-bold text-sm">Glass Elevator</p>
                    </div>
                    <div class="p-6 bg-surface-container-low rounded-xl flex flex-col items-center justify-center text-center hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined text-secondary text-3xl mb-3">wine_bar</span>
                        <p class="font-headline font-bold text-sm">Temperature Cellar</p>
                    </div>
                    <div class="p-6 bg-surface-container-low rounded-xl flex flex-col items-center justify-center text-center hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined text-secondary text-3xl mb-3">theater_comedy</span>
                        <p class="font-headline font-bold text-sm">Private Cinema</p>
                    </div>
                    <div class="p-6 bg-surface-container-low rounded-xl flex flex-col items-center justify-center text-center hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined text-secondary text-3xl mb-3">fitness_center</span>
                        <p class="font-headline font-bold text-sm">Ocean-view Gym</p>
                    </div>
                    <div class="p-6 bg-surface-container-low rounded-xl flex flex-col items-center justify-center text-center hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined text-secondary text-3xl mb-3">local_parking</span>
                        <p class="font-headline font-bold text-sm">4-Car Gallery</p>
                    </div>
                </div>
            </div>
            <!-- Map Section -->
            <div class="rounded-xl overflow-hidden h-80 relative editorial-shadow border border-outline-variant/10">
                <img class="w-full h-full object-cover" data-location="Cape Town" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDuoekutQuWWCmXad5nJfYS_gay5XGczmVhjewL3ThQ5EBUdOSBiySLOWgk380y9JzW9K2ID50PMnLP6lwl5v-KFfhyI1kBFPP8h0bZW1dOsou1HfT_1PPt59u3x2tj1Q7kfrvQ1RFz0g1nzKypfZrGB1VcfX0GdecPUg4vO_3fIinS29ResFAfLFapuIY6gSAugrDBmzxRDCMJbO-7geFv0D2eQyFLFI0iIAMC1vpVTYJG0CXqJgwUW4QTh1jO3TzyJFSzbLlOgfQ"/>
                <div class="absolute inset-0 bg-secondary/5"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center editorial-shadow ring-8 ring-secondary/20 animate-pulse">
                        <span class="material-symbols-outlined text-on-secondary" data-weight="fill">location_on</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Column: Booking Widget -->
        <div class="lg:col-span-1">
            <div class="sticky top-32 bg-surface-container-lowest p-8 rounded-xl editorial-shadow border border-outline-variant/10">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <span class="text-xs font-label font-bold text-on-surface-variant uppercase tracking-widest">Pricing</span>
                        <p class="text-3xl font-headline font-black text-secondary">R @php echo $property->price @endphp <span class="text-sm font-normal text-on-surface-variant font-body">/ night</span></p>
                    </div>
                    <div class="flex items-center text-xs text-on-tertiary-container font-bold bg-error-container/20 px-2 py-1 rounded">
                        <span class="material-symbols-outlined text-xs mr-1">trending_up</span>
                        High Demand
                    </div>
                </div>

                @php
                    $date = date('Y-m-d h:i:s');
                @endphp
                <div class="space-y-4 mb-8">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="border-b border-outline-variant/30 py-2">
                            <label class="block text-[10px] uppercase font-bold tracking-tighter text-outline mb-1">Check In</label>
                            <input class="w-full bg-transparent border-none p-0 font-headline font-bold text-on-surface focus:ring-0" type="datetime-local" name="date_in" value="{{ $date }}"/>
                        </div>
                        <div class="border-b border-outline-variant/30 py-2">
                            <label class="block text-[10px] uppercase font-bold tracking-tighter text-outline mb-1">Check Out</label>
                            <input class="w-full bg-transparent border-none p-0 font-headline font-bold text-on-surface focus:ring-0" type="datetime-local" name="date_out" value="{{ $date }}"/>
                        </div>
                    </div>
                    <div class="border-b border-outline-variant/30 py-2">
                        <label class="block text-[10px] uppercase font-bold tracking-tighter text-outline mb-1">Guests</label>
                        <select class="w-full bg-transparent border-none p-0 font-headline font-bold text-on-surface focus:ring-0 cursor-pointer">
                            <option>4 Adults, 2 Children</option>
                            <option>2 Adults</option>
                            <option>6 Adults</option>
                        </select>
                    </div>
                </div>
                <!-- Availability Mock -->
                <div class="mb-8">
                    <p class="text-[10px] uppercase font-bold tracking-tighter text-outline mb-3">Availability</p>
                    <div class="grid grid-cols-7 gap-1 text-center">
                        <div class="text-[10px] text-outline font-bold">M</div>
                        <div class="text-[10px] text-outline font-bold">T</div>
                        <div class="text-[10px] text-outline font-bold">W</div>
                        <div class="text-[10px] text-outline font-bold">T</div>
                        <div class="text-[10px] text-outline font-bold">F</div>
                        <div class="text-[10px] text-outline font-bold">S</div>
                        <div class="text-[10px] text-outline font-bold">S</div>
                        <!-- Simple calendar row mock -->
                        <div class="aspect-square flex items-center justify-center text-xs text-outline line-through opacity-30">8</div>
                        <div class="aspect-square flex items-center justify-center text-xs text-outline line-through opacity-30">9</div>
                        <div class="aspect-square flex items-center justify-center text-xs text-outline line-through opacity-30">10</div>
                        <div class="aspect-square flex items-center justify-center text-xs text-outline line-through opacity-30">11</div>
                        <div class="aspect-square flex items-center justify-center text-xs font-bold bg-secondary/10 rounded-full text-secondary">12</div>
                        <div class="aspect-square flex items-center justify-center text-xs font-bold bg-secondary/10 text-secondary">13</div>
                        <div class="aspect-square flex items-center justify-center text-xs font-bold bg-secondary/10 text-secondary">14</div>
                    </div>
                </div>
                {{--<button class="w-full bg-gradient-to-r from-secondary to-secondary-container text-on-secondary py-4 rounded-lg font-headline font-black text-lg tracking-tight editorial-shadow transform active:scale-95 transition-all duration-200">--}}
                {{--    Book This Villa--}}
                {{--</button>--}}
                <a href="{{ route('checkout', $property->id) }}" style="min-width: 100%" class="w-full bg-gradient-to-r from-secondary to-secondary-container text-on-secondary py-4 rounded-lg font-headline font-black text-lg tracking-tight editorial-shadow transform active:scale-95 transition-all duration-200">
                    Book Now
                </a>
                <p class="text-center text-[11px] text-on-surface-variant mt-4">
                    You won't be charged yet. Private butler service included.
                </p>
            </div>
        </div>
    </section>


</main>

@include('partials/footer')
