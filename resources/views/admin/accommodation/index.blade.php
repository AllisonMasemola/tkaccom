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
                    <h2 class="text-3xl font-extrabold tracking-tight font-headline">Manage Accommodations</h2>
                    <p class="text-on-surface-variant font-body">Curate and maintain the premium property collection in the Western Cape.</p>
                </div>
                <button class="bg-gradient-to-r from-secondary to-secondary-container text-white px-6 py-3 rounded-md font-semibold flex items-center gap-2 hover:opacity-90 transition-opacity active:scale-[0.98]">
                    <span class="material-symbols-outlined">add</span>
                    Add New Property
                </button>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Property Table Section -->
                <div class="lg:col-span-8 bg-surface-container-lowest rounded-sm overflow-hidden border border-outline-variant/20">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                            <tr class="bg-surface-container-low text-xs font-bold uppercase tracking-wider text-on-surface-variant">
                                <th class="px-6 py-4">Property</th>
                                <th class="px-6 py-4">Location</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Daily Rate</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/10">
                            {{-- Loop through real DB records passed via compact('accommodation') --}}
                            @forelse ($accommodation as $property)
                            <tr class="hover:bg-surface-container-low/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        {{-- Decode JSON images and show the first one as thumbnail --}}
                                        @php
                                            $images = json_decode($property->images, true) ?? [];
                                            $thumbnail = count($images) > 0
                                                ? asset('storage/' . $images[0])
                                                : 'https://placehold.co/48x48?text=No+Img';
                                        @endphp
                                        <img alt="{{ $property->name }}" class="w-12 h-12 rounded-xl object-cover" src="{{ $thumbnail }}"/>
                                        <div>
                                            <div class="font-bold text-on-surface">{{ $property->name }}</div>
                                            <div class="text-xs text-on-surface-variant">{{ $property->rooms }} Bed · {{ $property->bathrooms }} Bath</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm">{{ $property->location ?? '—' }}</td>
                                <td class="px-6 py-4">
                                    {{-- availability is boolean: 1 = active, 0 = inactive --}}
                                    @if ($property->availability)
                                        <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700">ACTIVE</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-orange-100 text-orange-700">INACTIVE</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-semibold text-sm">R {{ number_format($property->price, 2, '.', ',') }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        {{-- Link to the edit form --}}
                                        <a href="{{ route('admin.accommodation.edit', $property->id) }}" class="p-2 hover:text-secondary transition-colors">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </a>
                                        {{-- Delete via a small form so we can use the DELETE method --}}
                                        <form action="{{ route('admin.accommodation.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ addslashes($property->name) }}?')">
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
                            Insert Property Data
                        </h3>
                        {{-- POST to the resource store action --}}
                        <form class="space-y-6" action="{{ route('admin.accommodation.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Property Name</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="name" placeholder="e.g. Bantry Bay Retreat" type="text" value="{{ old('name') }}"/>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Description</label>
                                <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="description" placeholder="Description of the property">{{ old('description') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Apartment Type</label>
                                {{-- <option> must use value= not name= for the value to be submitted --}}
                                <select name="apartment_type" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                    <option value="">Select Apartment Type...</option>
                                    <option value="House" {{ old('apartment_type') == 'House' ? 'selected' : '' }}>House</option>
                                    <option value="Apartment" {{ old('apartment_type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                    <option value="Hotel" {{ old('apartment_type') == 'Hotel' ? 'selected' : '' }}>Hotel</option>
                                    <option value="Letting" {{ old('apartment_type') == 'Letting' ? 'selected' : '' }}>Letting</option>
                                    <option value="Other" {{ old('apartment_type') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Price (per/night)</label>
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
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Location</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="location" placeholder="e.g. Bantry Bay, Cape Town" type="text" value="{{ old('location') }}"/>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Bedrooms</label>
                                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="rooms" value="{{ old('rooms', 1) }}"/>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Bathrooms</label>
                                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="bathrooms" value="{{ old('bathrooms', 1) }}"/>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Shower</label>
                                <select name="showers" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                    <option value="1" {{ old('showers', '1') == '1' ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ old('showers') == '0' ? 'selected' : '' }}>Not Available</option>
                                </select>
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
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Parking</label>
                                <select name="parking" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                    <option value="1" {{ old('parking', '1') == '1' ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ old('parking') == '0' ? 'selected' : '' }}>Not Available</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Pool</label>
                                <select name="pool" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                    <option value="1" {{ old('pool', '1') == '1' ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ old('pool') == '0' ? 'selected' : '' }}>Not Available</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Image Gallery</label>
                                {{-- name="images[]" + multiple allows multi-file upload to match the controller's foreach --}}
                                <div class="border-2 border-dashed border-outline-variant/40 rounded-xl p-8 text-center cursor-pointer hover:border-secondary/40 hover:bg-secondary/5 transition-all group">
                                    <span class="material-symbols-outlined text-outline group-hover:text-secondary mb-2">cloud_upload</span>
                                    <p class="text-xs text-on-surface-variant">Drop images here or <span class="text-secondary font-bold">browse</span></p>
                                    <input type="file" name="images[]" multiple class="mt-2 text-xs w-full" accept="image/*"/>
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
                    <div class="text-3xl font-extrabold font-headline">{{ $accommodation->count() }}</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Listed properties</div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Average Nightly</div>
                    <div class="text-3xl font-extrabold font-headline">R {{ $accommodation->count() > 0 ? number_format($accommodation->avg('price'), 0, '.', ',') : '0' }}</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Across all listings</div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Active Listings</div>
                    <div class="text-3xl font-extrabold font-headline">{{ $accommodation->where('availability', true)->count() }}</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Currently available</div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Inactive Listings</div>
                    <div class="text-3xl font-extrabold font-headline">{{ $accommodation->where('availability', false)->count() }}</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Not currently available</div>
                </div>
            </div>
        </main>
    </div>

@include('admin/parials.footer')
