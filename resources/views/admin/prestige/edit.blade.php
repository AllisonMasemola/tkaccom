@include('admin/parials.header')
    <div class="flex-1 flex flex-col min-w-0">
        <header class="flex justify-between items-center w-full px-8 sticky top-0 z-40 bg-[#f9f9f9]/80 dark:bg-slate-950/80 backdrop-blur-md h-16 border-b border-[#1a1c1c]/10 dark:border-white/10">
            <div class="flex items-center gap-4 flex-1">
                <a href="{{ route('admin.prestige.index') }}" class="flex items-center gap-1 text-sm text-on-surface-variant hover:text-secondary transition-colors">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    Back to prestige listings
                </a>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-500 hover:text-[#4951c3] transition-colors" type="button">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <button class="p-2 text-slate-500 hover:text-[#4951c3] transition-colors" type="button">
                    <span class="material-symbols-outlined">settings</span>
                </button>
            </div>
        </header>

        <main class="p-8 space-y-10 max-w-4xl mx-auto w-full">
            <div class="space-y-1">
                <h2 class="text-3xl font-extrabold tracking-tight font-headline">Edit Car</h2>
                <p class="text-on-surface-variant font-body">Update the details for <strong>{{ $prestige->car_name }}</strong>.</p>
            </div>

            <div class="bg-surface-container-low p-8 rounded-sm border border-outline-variant/10">
                <form class="space-y-6" action="{{ route('admin.prestige.update', $prestige->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 rounded-md p-4">
                            <ul class="text-xs text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="bg-green-50 border border-green-200 rounded-md p-4">
                            <p class="text-xs text-green-700">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-50 border border-red-200 rounded-md p-4">
                            <p class="text-xs text-red-700">{{ session('error') }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Car Name</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="car_name" placeholder="e.g. BMW" type="text" value="{{ old('car_name', $prestige->car_name) }}"/>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Description</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="car_description" placeholder="Description of the car">{{ old('car_description', $prestige->car_description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Fuel Type</label>
                        <select name="fuel_type" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                            <option value="">Select Fuel Type...</option>
                            @foreach (['petrol' => 'Petrol', 'diesel' => 'Diesel', 'electric' => 'Electric', 'hybrid' => 'Hybrid', 'other' => 'Other'] as $value => $label)
                                <option value="{{ $value }}" {{ old('fuel_type', $prestige->fuel_type) == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Price (per/day)</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" name="price" placeholder="0.00" type="number" step="0.01" value="{{ old('price', $prestige->price) }}"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Availability</label>
                            <select name="availability" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                <option value="1" {{ (string) old('availability', (int) $prestige->availability) === '1' ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ (string) old('availability', (int) $prestige->availability) === '0' ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Transmission</label>
                        <select name="transmission" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                            <option value="automatic" {{ old('transmission', $prestige->transmission) == 'automatic' ? 'selected' : '' }}>Auto</option>
                            <option value="manual" {{ old('transmission', $prestige->transmission) == 'manual' ? 'selected' : '' }}>Manual</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Body Type</label>
                        <select name="body_type" class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                            <option value="">Select Body Type...</option>
                            @foreach (['micro' => 'Micro', 'hatchback' => 'Hatchback', 'crossover' => 'CrossOver', 'sedan' => 'Sedan', 'coupe' => 'Coupe', 'suv' => 'SUV', 'van' => 'Van', 'sports' => 'Sports', 'other' => 'Other'] as $value => $label)
                                <option value="{{ $value }}" {{ old('body_type', $prestige->body_type) == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Kilometers on Clock</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="kilometers" value="{{ old('kilometers', $prestige->kilometers) }}"/>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Number of Doors</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="doors" value="{{ old('doors', $prestige->doors) }}"/>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Number of Seats</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" name="seats" value="{{ old('seats', $prestige->seats) }}"/>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Car Color</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="color" placeholder="e.g. White, Red" type="text" value="{{ old('color', $prestige->color) }}"/>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Amenities</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="aminities" placeholder="Amenities">{{ old('aminities', $prestige->aminities) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">List Point of Interest</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="point_of_interest" placeholder="Point of interest">{{ old('point_of_interest', $prestige->point_of_interest) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Car Make</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="make" placeholder="e.g. BMW" type="text" value="{{ old('make', $prestige->make) }}"/>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Car Model</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" name="model" placeholder="e.g. 1 Series" type="text" value="{{ old('model', $prestige->model) }}"/>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Current Images</label>
                        @php
                            $storedImages = $prestige->image ?? $prestige->image ?? [];
                            $existingImages = is_array($storedImages) ? $storedImages : json_decode($storedImages, true);
                            if (! is_array($existingImages)) {
                                $existingImages = filled($storedImages) ? [$storedImages] : [];
                            }
                        @endphp
                        @if (count($existingImages) > 0)
                            <div class="flex flex-wrap gap-3 mb-4">
                                @foreach ($existingImages as $img)
                                    <img src="{{ asset('storage/' . $img) }}" alt="{{ $prestige->car_name }} image" class="w-20 h-20 rounded-xl object-cover border border-outline-variant/20"/>
                                @endforeach
                            </div>
                            <p class="text-xs text-on-surface-variant mb-2">Uploading new images will replace the current gallery.</p>
                        @else
                            <p class="text-xs text-on-surface-variant mb-2">No images uploaded yet.</p>
                        @endif
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Upload New Images</label>
                        <div class="border-2 border-dashed border-outline-variant/40 rounded-xl p-8 text-center cursor-pointer hover:border-secondary/40 hover:bg-secondary/5 transition-all group">
                            <span class="material-symbols-outlined text-outline group-hover:text-secondary mb-2">cloud_upload</span>
                            <p class="text-xs text-on-surface-variant">Drop images here or <span class="text-secondary font-bold">browse</span></p>
                            <input type="file" name="image[]" multiple class="mt-2 text-xs w-full" accept="image/*"/>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <button class="flex-1 bg-on-surface text-surface py-4 rounded-md font-bold uppercase tracking-widest text-xs hover:bg-secondary transition-colors" type="submit">
                            Update Car Listing
                        </button>
                        <a href="{{ route('admin.prestige.index') }}" class="flex-1 text-center border border-outline-variant/40 text-on-surface-variant py-4 rounded-md font-bold uppercase tracking-widest text-xs hover:bg-surface-container transition-colors">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

@include('admin/parials.footer')
