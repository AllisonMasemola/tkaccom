@include('admin/parials.header')
    <div class="flex-1 flex flex-col min-w-0">
        <!-- TopNavBar -->
        <header class="flex justify-between items-center w-full px-8 sticky top-0 z-40 bg-[#f9f9f9]/80 dark:bg-slate-950/80 backdrop-blur-md h-16 border-b border-[#1a1c1c]/10 dark:border-white/10">
            <div class="flex items-center gap-4 flex-1">
                <a href="{{ route('admin.accommodation.index') }}" class="flex items-center gap-1 text-sm text-on-surface-variant hover:text-secondary transition-colors">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    Back to listings
                </a>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-500 hover:text-[#4951c3] transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <button class="p-2 text-slate-500 hover:text-[#4951c3] transition-colors">
                    <span class="material-symbols-outlined">settings</span>
                </button>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-8 space-y-10 max-w-4xl mx-auto w-full">
            <!-- Page Header -->
            <div class="space-y-1">
                <h2 class="text-3xl font-extrabold tracking-tight font-headline">Edit Property</h2>
                <p class="text-on-surface-variant font-body">Update the details for <strong>{{ $accommodation->name }}</strong>.</p>
            </div>

            <div class="bg-surface-container-low p-8 rounded-sm border border-outline-variant/10">
                {{-- PUT/PATCH to the resource update action --}}
                <form class="space-y-6" action="{{ route('admin.accommodation.update', $accommodation->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Validation errors --}}
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 rounded-md p-4">
                            <ul class="text-xs text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Success flash --}}
                    @if (session('success'))
                        <div class="bg-green-50 border border-green-200 rounded-md p-4">
                            <p class="text-xs text-green-700">{{ session('success') }}</p>
                        </div>
                    @endif

                    {{-- Error flash --}}
                    @if (session('error'))
                        <div class="bg-red-50 border border-red-200 rounded-md p-4">
                            <p class="text-xs text-red-700">{{ session('error') }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Property Name</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="name" placeholder="e.g. Bantry Bay Retreat" type="text" value="{{ old('name', $accommodation->name) }}"/>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Description</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="description" placeholder="Description of the property">{{ old('description', $accommodation->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Apartment Type</label>
                        <select name="apartment_type" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                            <option value="">Select Apartment Type...</option>
                            @foreach (['House', 'Apartment', 'Hotel', 'Letting', 'Other'] as $type)
                                <option value="{{ $type }}" {{ old('apartment_type', $accommodation->apartment_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Price (per/night)</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" name="price" placeholder="0.00" type="number" step="0.01" value="{{ old('price', $accommodation->price) }}"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Availability</label>
                            <select name="availability" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                <option value="1" {{ old('availability', $accommodation->availability) == '1' ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ old('availability', $accommodation->availability) == '0' ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Location</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="location" placeholder="e.g. Bantry Bay, Cape Town" type="text" value="{{ old('location', $accommodation->location) }}"/>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Bedrooms</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="rooms" value="{{ old('rooms', $accommodation->rooms) }}"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Bathrooms</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="bathrooms" value="{{ old('bathrooms', $accommodation->bathrooms) }}"/>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Shower</label>
                        <select name="showers" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                            <option value="1" {{ old('showers', $accommodation->showers) == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ old('showers', $accommodation->showers) == '0' ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Amenities</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="aminities" placeholder="Amenities">{{ old('aminities', $accommodation->aminities) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">List Point of Interest</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="point_of_interest" placeholder="Point of interest">{{ old('point_of_interest', $accommodation->point_of_interest) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Parking</label>
                        <select name="parking" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                            <option value="1" {{ old('parking', $accommodation->parking) == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ old('parking', $accommodation->parking) == '0' ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Pool</label>
                        <select name="pool" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                            <option value="1" {{ old('pool', $accommodation->pool) == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ old('pool', $accommodation->pool) == '0' ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>

                    {{-- Current images preview --}}
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Current Images</label>
                        @php $existingImages = json_decode($accommodation->images, true) ?? []; @endphp
                        @if (count($existingImages) > 0)
                            <div class="flex flex-wrap gap-3 mb-4">
                                @foreach ($existingImages as $img)
                                    <img src="{{ asset('storage/' . $img) }}" alt="Property image" class="w-20 h-20 rounded-xl object-cover border border-outline-variant/20"/>
                                @endforeach
                            </div>
                            <p class="text-xs text-on-surface-variant mb-2">Uploading new images will replace the current ones.</p>
                        @else
                            <p class="text-xs text-on-surface-variant mb-2">No images uploaded yet.</p>
                        @endif
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Upload New Images</label>
                        <div class="border-2 border-dashed border-outline-variant/40 rounded-xl p-8 text-center cursor-pointer hover:border-secondary/40 hover:bg-secondary/5 transition-all group">
                            <span class="material-symbols-outlined text-outline group-hover:text-secondary mb-2">cloud_upload</span>
                            <p class="text-xs text-on-surface-variant">Drop images here or <span class="text-secondary font-bold">browse</span></p>
                            <input type="file" name="images[]" multiple class="mt-2 text-xs w-full" accept="image/*"/>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <button class="flex-1 bg-on-surface text-surface py-4 rounded-md font-bold uppercase tracking-widest text-xs hover:bg-secondary transition-colors" type="submit">
                            Update Property
                        </button>
                        <a href="{{ route('admin.accommodation.index') }}" class="flex-1 text-center border border-outline-variant/40 text-on-surface-variant py-4 rounded-md font-bold uppercase tracking-widest text-xs hover:bg-surface-container transition-colors">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
</body></html>

@include('admin/parials.footer')
