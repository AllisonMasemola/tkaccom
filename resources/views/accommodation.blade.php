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
        {{--
            Sidebar Filters — powered by Laravel Purity.
            All inputs live inside a GET form. On submit, Purity's filter()
            scope in the model picks up the ?filters[...] query params.

            Purity operator syntax:
              Property type  → filters[apartment_type][$in][]=House
              Min bedrooms   → filters[rooms][$gte]=2
              Max price      → filters[price][$lte]=10000
        --}}
        <aside class="w-full lg:w-64 flex-shrink-0 space-y-10">
            <form method="GET" action="{{ route('accommodation') }}" id="filter-form">

                {{-- Property Type — checkboxes (multi-select via $in) --}}
                <section>
                    <h3 class="font-headline font-bold text-sm tracking-widest uppercase mb-6 text-on-surface-variant">Property Type</h3>
                    <div class="space-y-3">
                        @php
                            // Must match the apartment_type enum in the DB migration.
                            $typeOptions = ['House', 'Apartment', 'Hotel', 'Letting', 'Other'];
                            $activeTypes = request()->input('filters.apartment_type.$in', []);
                        @endphp
                        @foreach ($typeOptions as $type)
                        <label class="flex items-center group cursor-pointer">
                            <input
                                type="checkbox"
                                name="filters[apartment_type][$in][]"
                                value="{{ $type }}"
                                {{ in_array($type, (array) $activeTypes) ? 'checked' : '' }}
                                class="filter-input rounded-sm border-outline-variant text-secondary focus:ring-secondary mr-3 w-5 h-5"
                            />
                            <span class="text-sm font-medium text-on-surface group-hover:text-secondary transition-colors">{{ $type }}</span>
                        </label>
                        @endforeach
                    </div>
                </section>

                {{-- Bedrooms — minimum count via $gte, styled as radio buttons --}}
                <section class="mt-10">
                    <h3 class="font-headline font-bold text-sm tracking-widest uppercase mb-6 text-on-surface-variant">Bedrooms</h3>
                    @php $activeBeds = request()->input('filters.rooms.$gte', ''); @endphp
                    <div class="flex flex-wrap gap-2">
                        @foreach ([1, 2, 4, 6] as $beds)
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="filters[rooms][$gte]"
                                value="{{ $beds }}"
                                {{ (string)$activeBeds === (string)$beds ? 'checked' : '' }}
                                class="filter-input sr-only peer"
                            />
                            <span class="px-4 py-2 text-xs font-bold rounded-full
                                peer-checked:bg-secondary peer-checked:text-on-secondary
                                bg-surface-container-high text-on-surface-variant
                                hover:bg-surface-variant transition-colors inline-block">
                                {{ $beds }}+
                            </span>
                        </label>
                        @endforeach
                    </div>
                </section>

                {{-- Price Range — maximum price via $lte --}}
                <section class="mt-10">
                    <h3 class="font-headline font-bold text-sm tracking-widest uppercase mb-6 text-on-surface-variant">Price Range</h3>
                    @php $activePrice = request()->input('filters.price.$lte', 25000); @endphp
                    <input
                        type="range"
                        id="priceRange"
                        name="filters[price][$lte]"
                        min="500"
                        max="25000"
                        step="1000"
                        value="{{ $activePrice }}"
                        class="w-full h-1.5 bg-surface-container-highest rounded-lg appearance-none cursor-pointer accent-secondary"
                        oninput="document.getElementById('priceOutput').textContent = 'R ' + Number(this.value).toLocaleString()"
                        onchange="document.getElementById('filter-form').submit()"
                    />
                    <p id="priceOutput" class="mt-2 text-sm text-on-surface-variant">
                        R {{ number_format($activePrice, 0, '.', ' ') }}
                    </p>
                </section>

                {{-- Clear all — plain link resets to unfiltered listing --}}
                <div class="pt-6 mt-6 border-t border-outline-variant/20">
                    <a
                        href="{{ route('accommodation') }}"
                        class="w-full py-3 text-sm font-bold text-secondary border border-secondary/20 rounded-lg hover:bg-secondary/5 transition-colors text-center block">
                        Clear All Filters
                    </a>
                </div>

            </form>

            {{-- Auto-submit: checkboxes and bedroom radios submit on change.
                 The price range uses onchange (fires on pointer release) directly
                 on the input so there's no redundant listener here. --}}
            <script>
              document.querySelectorAll('#filter-form .filter-input').forEach(function (input) {
                input.addEventListener('change', function () {
                  document.getElementById('filter-form').submit();
                });
              });
            </script>
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
