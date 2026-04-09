@include('admin/parials.header')
    <div class="flex-1 flex flex-col min-w-0">
        <main class="p-8 space-y-10">

            {{-- Show validation errors so failures are visible --}}
            @if ($errors->any())
                <div class="bg-red-50 border text-2xl border-red-200 rounded-md p-4">
                    <ul class="text-xs text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Show success flash message --}}
            @if (session('success'))
                <div class="bg-green-50 border text-2xl border-green-200 rounded-md p-4">
                    <p class="text-xs text-green-700">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Page Header -->
            <div class="flex justify-between items-end">
                <div class="space-y-1">
                    <h2 class="text-3xl font-extrabold tracking-tight font-headline">Manage Prestigous Movement</h2>
                    <p class="text-on-surface-variant font-body">Curate and maintain the premium car collection in the Western Cape.</p>
                </div>
                <button class="bg-gradient-to-r from-secondary to-secondary-container text-white px-6 py-3 rounded-md font-semibold flex items-center gap-2 hover:opacity-90 transition-opacity active:scale-[0.98]">
                    <span class="material-symbols-outlined">add</span>
                    Add New Car
                </button>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Car Table Section -->
                <div class="lg:col-span-8 bg-surface-container-lowest rounded-sm overflow-hidden border border-outline-variant/20">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                            <tr class="bg-surface-container-low text-xs font-bold uppercase tracking-wider text-on-surface-variant">
                                <th class="px-6 py-4">Car</th>
                                <th class="px-6 py-4">Transmission</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Daily Rate</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/10">
                            {{-- Loop through real DB records passed via compact('accommodation') --}}
                            @forelse ($prestige as $cars)
                            <tr class="hover:bg-surface-container-low/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        {{-- Decode JSON images and show the first one as thumbnail --}}
                                        @php
                                            $images = json_decode($cars->image, true) ?? [];
                                            $thumbnail = count($images) > 0
                                                ? asset('storage/' . $images[0])
                                                : 'https://placehold.co/48x48?text=No+Img';
                                        @endphp
                                        <img alt="{{ $cars->car_name }}" class="w-12 h-12 rounded-xl object-cover" src="{{ $thumbnail }}"/>
                                        <div>
                                            <div class="font-bold text-on-surface">{{ $cars->car_name }}</div>
                                            <div class="text-xs text-on-surface-variant">{{ $cars->rooms }} Bed · {{ $cars->bathrooms }} Bath</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm">{{ $cars->transmission ?? '—' }}</td>
                                <td class="px-6 py-4">
                                    {{-- availability is boolean: 1 = active, 0 = inactive --}}
                                    @if ($cars->availability)
                                        <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700">ACTIVE</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-orange-100 text-orange-700">INACTIVE</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-semibold text-sm">R {{ number_format($cars->price, 2, '.', ',') }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        {{-- Link to the edit form --}}
                                        <a href="{{ route('admin.prestige.edit', $cars->id) }}" class="p-2 hover:text-secondary transition-colors">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </a>
                                        {{-- Delete via a small form so we can use the DELETE method --}}
                                        <form action="{{ route('admin.prestige.destroy', $cars->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ addslashes($cars->name) }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 hover:text-error transition-colors">
                                                <span class="material-symbols-outlined text-xl">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            {{-- Empty state when no properties exist yet --}}
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-on-surface-variant">
                                    <span class="material-symbols-outlined text-4xl mb-2 block">home_work</span>
                                    <p class="text-sm font-medium">No properties listed yet</p>
                                    <p class="text-xs mt-1">Use the form on the right to add your first property.</p>
                                </td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Insert Data Form -->
                <div class="lg:col-span-4">
                    <div class="bg-surface-container-low p-8 rounded-sm sticky top-24 border border-outline-variant/10">
                        <h3 class="text-xl font-bold mb-6 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">add_circle</span>
                            Insert Car Data
                        </h3>
                        {{-- POST to the resource store action --}}
                        <form class="space-y-6" action="{{ route('admin.prestige.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Car Name</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="car_name" placeholder="e.g. BMW" type="text" value="{{ old('car_name') }}"/>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Description</label>
                                <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="car_description" placeholder="Description of the car">{{ old('description') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Apartment Type</label>
                                {{-- <option> must use value= not name= for the value to be submitted --}}
                                <select name="fuel_type" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                  <option value="">Select Fuel Type...</option>
                                  <option value="petrol" {{ old('fuel_type') == 'petrol' ? 'selected' : '' }}>Petrol</option>
                                  <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                  <option value="electric" {{ old('fuel_type') == 'electric' ? 'selected' : '' }}>Electric</option>
                                  <option value="hybrid" {{ old('fuel_type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                  <option value="other" {{ old('fuel_type') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Price (per/night/day)</label>
                                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" name="price" placeholder="0.00" type="number" step="0.01" value="{{ old('price') }}"/>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Availability</label>
                                    <select name="availability" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                        <option value="1" {{ old('availability', '1') == '1' ? 'selected' : '' }}>Available</option>
                                        <option value="0" {{ old('availability') == '0' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Transmission</label>
                                <select name="transmission" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                    <option value="1" {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Auto</option>
                                    <option value="0" {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Body Type</label>
                                <select name="body_type" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                    <option value="">Select Apartment Type...</option>
                                    <option value="House" {{ old('body_type') == 'micro' ? 'selected' : '' }}>Micro</option>
                                    <option value="Apartment" {{ old('body_type') == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                                    <option value="Hotel" {{ old('body_type') == 'crossover' ? 'selected' : '' }}>CrossOver</option>
                                    <option value="Letting" {{ old('body_type') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                                    <option value="Letting" {{ old('body_type') == 'coupe' ? 'selected' : '' }}>Caoupe</option>
                                    <option value="Letting" {{ old('body_type') == 'suv' ? 'selected' : '' }}>SUV</option>
                                    <option value="Letting" {{ old('body_type') == 'van' ? 'selected' : '' }}>Van</option>
                                    <option value="Letting" {{ old('body_type') == 'sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="Other" {{ old('body_type') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Kilometers on Clock</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="kilometers" value="{{ old('kilometers') }}"/>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Number of Doors</label>
                                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="doors" value="{{ old('doors', 1) }}"/>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Number of Seats</label>
                                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="seats" value="{{ old('seats', 1) }}"/>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Car Color</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="color" placeholder="e.g. White, Red" type="text" value="{{ old('location') }}"/>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Amenities</label>
                                <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="aminities" placeholder="Amenities">{{ old('aminities') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">List Point of Interest</label>
                                <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="point_of_interest" placeholder="Point of interest">{{ old('point_of_interest') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Car Make</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="make" placeholder="e.g. 1 Series" type="text" value="{{ old('make') }}"/>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Car Model</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="model" placeholder="e.g. 1 Series" type="text" value="{{ old('model') }}"/>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Image Gallery</label>
                                {{-- name="images[]" + multiple allows multi-file upload to match the controller's foreach --}}
                                <div class="border-2 border-dashed border-outline-variant/40 rounded-xl p-8 text-center cursor-pointer hover:border-secondary/40 hover:bg-secondary/5 transition-all group">
                                    <span class="material-symbols-outlined text-outline group-hover:text-secondary mb-2">cloud_upload</span>
                                    <p class="text-xs text-on-surface-variant">Drop images here or <span class="text-secondary font-bold">browse</span></p>
                                    <input type="file" name="image[]" multiple class="mt-2 text-xs w-full" accept="image/*"/>
                                </div>
                            </div>
                            <button class="w-full bg-on-surface text-surface py-4 rounded-md font-bold uppercase tracking-widest text-xs hover:bg-secondary transition-colors" type="submit">
                                Confirm Property Listing
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Stats Footer / Bento Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Total Portfolio</div>
                    <div class="text-3xl font-extrabold font-headline">{{ $prestige->count() }}</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Listed properties</div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Average Nightly</div>
                    <div class="text-3xl font-extrabold font-headline">R {{ $prestige->count() > 0 ? number_format($prestige->avg('price'), 0, '.', ',') : '0' }}</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Across all listings</div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Active Listings</div>
                    <div class="text-3xl font-extrabold font-headline">{{ $prestige->where('availability', true)->count() }}</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Currently available</div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Inactive Listings</div>
                    <div class="text-3xl font-extrabold font-headline">{{ $prestige->where('availability', false)->count() }}</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Not currently available</div>
                </div>
            </div>
        </main>
    </div>

@include('admin/parials.footer')
