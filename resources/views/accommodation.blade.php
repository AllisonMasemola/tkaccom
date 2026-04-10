@include('partials/header')
<main class="pt-24 pb-20 px-6 max-w-7xl mx-auto">
    <!-- Header & Editorial Introduction -->
    <header class="mb-16">
        <h1 class="font-headline text-5xl md:text-7xl font-extrabold tracking-tighter text-on-background mb-4">
            The Coastal <span class="text-secondary italic">Curator.</span>
        </h1>
        <p class="max-w-2xl text-on-surface-variant text-lg leading-relaxed">
            A hand-picked selection of the Western Cape's most architectural and atmospheric residences. From the cliffs of Clifton to the vineyards of Constantia.
        </p>
    </header>
    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Sidebar Filters -->
        <aside class="w-full lg:w-64 flex-shrink-0 space-y-10">
            <section>
                <h3 class="font-headline font-bold text-sm tracking-widest uppercase mb-6 text-on-surface-variant">Property Type</h3>
                <div class="space-y-3">
                    <label class="flex items-center group cursor-pointer">
                        <input checked="" class="rounded-sm border-outline-variant text-secondary focus:ring-secondary mr-3 w-5 h-5" type="checkbox"/>
                        <span class="text-sm font-medium text-on-surface group-hover:text-secondary transition-colors">Villa</span>
                    </label>
                    <label class="flex items-center group cursor-pointer">
                        <input class="rounded-sm border-outline-variant text-secondary focus:ring-secondary mr-3 w-5 h-5" type="checkbox"/>
                        <span class="text-sm font-medium text-on-surface group-hover:text-secondary transition-colors">Apartment</span>
                    </label>
                    <label class="flex items-center group cursor-pointer">
                        <input class="rounded-sm border-outline-variant text-secondary focus:ring-secondary mr-3 w-5 h-5" type="checkbox"/>
                        <span class="text-sm font-medium text-on-surface group-hover:text-secondary transition-colors">Estate</span>
                    </label>
                </div>
            </section>
            <section>
                <h3 class="font-headline font-bold text-sm tracking-widest uppercase mb-6 text-on-surface-variant">Bedrooms</h3>
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 bg-secondary text-on-secondary text-xs font-bold rounded-full">1+</button>
                    <button class="px-4 py-2 bg-surface-container-high text-on-surface-variant text-xs font-bold rounded-full hover:bg-surface-variant transition-colors">2+</button>
                    <button class="px-4 py-2 bg-surface-container-high text-on-surface-variant text-xs font-bold rounded-full hover:bg-surface-variant transition-colors">4+</button>
                    <button class="px-4 py-2 bg-surface-container-high text-on-surface-variant text-xs font-bold rounded-full hover:bg-surface-variant transition-colors">6+</button>
                </div>
            </section>
            <section>
                <h3 class="font-headline font-bold text-sm tracking-widest uppercase mb-6 text-on-surface-variant">Price Range</h3>
                <input class="w-full h-1.5 bg-surface-container-highest rounded-lg appearance-none cursor-pointer accent-secondary" max="50000" min="5000" step="1000" type="range"/>
                <div class="flex justify-between mt-4 text-xs font-bold text-on-surface-variant">
                    <span>R5,000</span>
                    <span>R50,000+</span>
                </div>
            </section>
            <div class="pt-6 border-t border-outline-variant/20">
                <button class="w-full py-3 text-sm font-bold text-secondary border border-secondary/20 rounded-lg hover:bg-secondary/5 transition-colors">
                    Clear All Filters
                </button>
            </div>
        </aside>
        <!-- Main Listing Grid -->
        <div class="flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                {{-- Loop through available accommodations from DB --}}
                @forelse ($accommodations as $property)
                @php
                    $images = json_decode($property->images, true) ?? [];
                    $thumbnail = count($images) > 0
                        ? asset('storage/' . $images[0])
                        : 'https://placehold.co/600x450?text=No+Image';
                @endphp
                <div class="group bg-surface-container-lowest rounded-sm overflow-hidden flex flex-col transition-all duration-300 hover:shadow-2xl hover:shadow-on-surface/5">
                    <div class="relative overflow-hidden aspect-[4/3]">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 rounded-xl" alt="{{ $property->name }}" src="{{ $thumbnail }}"/>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <h2 class="font-headline text-2xl font-bold tracking-tight text-on-background">{{ $property->name }}</h2>
                            <p class="text-lg font-bold text-secondary">R{{ number_format($property->price, 0, '.', ',') }} <span class="text-xs font-medium text-on-surface-variant uppercase tracking-tighter">/ night</span></p>
                        </div>
                        <p class="text-on-surface-variant text-sm leading-relaxed mb-4 flex-1">
                            {{ Str::limit($property->description, 160) }}
                        </p>
                        {{-- Property quick specs --}}
                        <div class="flex items-center gap-4 text-xs text-on-surface-variant mb-6">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">bed</span>
                                {{ $property->rooms }} Bed
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">bathtub</span>
                                {{ $property->bathrooms }} Bath
                            </span>
                            @if ($property->location)
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">location_on</span>
                                {{ $property->location }}
                            </span>
                            @endif
                        </div>
                        <div class="flex items-center gap-4 pt-4">
                            <a href="{{ route('accommodationInfo', $property->id) }}" class="flex-1 py-3 text-xs font-bold uppercase tracking-widest text-on-surface border-b border-outline-variant/30 hover:border-secondary transition-colors text-center">
                                View Details
                            </a>
                            <a href="{{ route('checkout', ['type' => 'accommodation', 'id' => $property->id]) }}" class="flex-1 py-3 bg-gradient-to-r from-secondary to-secondary-container text-white text-xs font-bold uppercase tracking-widest rounded-lg active:scale-95 transition-transform text-center">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                {{-- Empty state when no available properties --}}
                <div class="col-span-full text-center py-20">
                    <span class="material-symbols-outlined text-5xl text-outline mb-4 block">home_work</span>
                    <h3 class="font-headline text-xl font-bold mb-2">No Properties Available</h3>
                    <p class="text-on-surface-variant text-sm">Check back soon — new residences are added regularly.</p>
                </div>
                @endforelse
            </div>

            {{-- Laravel pagination links --}}
            @if ($accommodations->hasPages())
            <div class="mt-16 text-center">
                {{ $accommodations->links() }}
            </div>
            @endif
        </div>
    </div>
</main>
@include('partials/footer')
