@include('Admin/parials.header')
    <div class="flex-1 flex flex-col min-w-0">
        <!-- TopNavBar -->
        <header class="flex justify-between items-center w-full px-8 sticky top-0 z-40 bg-[#f9f9f9]/80 dark:bg-slate-950/80 backdrop-blur-md h-16 border-b border-[#1a1c1c]/10 dark:border-white/10">
            <div class="flex items-center gap-4 flex-1">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                    <input class="w-full bg-surface-container-low border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-secondary/20" placeholder="Search villas, estates or locations..." type="text"/>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-500 hover:text-[#4951c3] transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <button class="p-2 text-slate-500 hover:text-[#4951c3] transition-colors">
                    <span class="material-symbols-outlined">settings</span>
                </button>
                <div class="h-8 w-8 rounded-full overflow-hidden border border-outline-variant/20">
                    <img alt="Admin User Profile" class="h-full w-full object-cover" data-alt="professional headshot of a mature male executive in a sleek modern office setting with warm ambient lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCPvbUYpP_W2ngRxPYkyCM90pgYtNX50BhBMJKqYC37LnvVFKnVQbEbxqTy3IWdwrsDHnyTqMYeKCUzWFkazTGTFuYpv0Ai9VfEMDdeBEe59tt_2rLe3VNRIqe7F--9me1EE4G_DPUdKM0ywdx6pjWmkjdKHVTNVlR20VH-e7xpn8TwC_1tZhba3TFKXZzp-pUvHZMHNy7oyGmV46rs0wtwzQTZTgsVgwlWWPjnsMlAcBd08X508AYTxBZJL2s3WYRkkGfw5bsX1cE"/>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <main class="p-8 space-y-10">
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
                            <tr class="hover:bg-surface-container-low/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img alt="Clifton Sky Villa" class="w-12 h-12 rounded-xl object-cover" data-alt="ultra-modern glass villa perched on a cliffside overlooking a turquoise ocean at sunset with warm orange glows" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBQsSiUfutLamTsN2j6riUvzmUb2Ym4-POGbKTCAWxfQApRnMOOEsbTemQH2wLOLGyE-Ndn8ZLl91RY7lp2FAddz23MZMuwRzisj1vfRmfmWySZR4eRpI-k_kP9C2J-VbvJcniTuCTl8sNhLT0ysbD9sq1RZIRQGAU5mzxNsmM9GWNvXCvabL7RC4fJNrQVMSIJEsyoJYVLfUbMQFXIgzDuPHS0TfWw_YhNbAdnemz98v4bhV7Hj-Bzno9gq4Hg6dYbVbEXFXAGaPU"/>
                                        <div>
                                            <div class="font-bold text-on-surface">Clifton Sky Villa</div>
                                            <div class="text-xs text-on-surface-variant">4 Bed · 5 Bath</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm">Clifton, Cape Town</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700">ACTIVE</span>
                                </td>
                                <td class="px-6 py-4 font-semibold text-sm">R 45,000</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 hover:text-secondary transition-colors"><span class="material-symbols-outlined text-xl">edit</span></button>
                                        <button class="p-2 hover:text-error transition-colors"><span class="material-symbols-outlined text-xl">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img alt="Constantia Vine Garden" class="w-12 h-12 rounded-xl object-cover" data-alt="stately manor house surrounded by lush green vineyards and manicured gardens under a clear blue sky" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApTAjxb15riugVP0OheN1shHCEegjdK_AwBU2UXMNs4kiUQy-rcyLgb7j9IVN1O7xDJyBeCaqHYksoYJiXTjmfdEpXPO65v26eMZl94-_euoFlZ8nDGFSlPwfvu-jkMa1pFQ7sYyNA8OABSAoEti06Lx3Cfrx7PZaD_hAFXGdowR8M3RfoX7aXgyrPhcXd4XhBBKJhE__lUTtFUED1H9O2DIirH_vQZhJjET3u6dxxy1PCmbQUJlRLTD_wYcZZtyFzyJDcwiF5z1o"/>
                                        <div>
                                            <div class="font-bold text-on-surface">Constantia Vine Garden</div>
                                            <div class="text-xs text-on-surface-variant">6 Bed · 6 Bath</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm">Constantia Valley</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700">ACTIVE</span>
                                </td>
                                <td class="px-6 py-4 font-semibold text-sm">R 32,500</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 hover:text-secondary transition-colors"><span class="material-symbols-outlined text-xl">edit</span></button>
                                        <button class="p-2 hover:text-error transition-colors"><span class="material-symbols-outlined text-xl">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img alt="Llandudno Cove" class="w-12 h-12 rounded-xl object-cover" data-alt="minimalist white architectural masterpiece with infinity pool blending into the ocean horizon at dusk" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzw4pOrKTKco0UP6aA7HEV8heaMH70KedrMNaWUadKi119zvcpDwm2h-Dc-1XXb1i2K6lJdNgt9pCrz67stvsmtl5zrwZvg2Vw0KvflmFeksp0yqhiR_b8v7q11zx8korUNpGiiaPLgPKaUj1dL8FMU6KeyoIbqTtRj2Hhbn633MxLc7ok5H5XN2tRtf_FRdk-l8dk2EqxQV41gKyx7Fj90HLaviV_ceEV5uw_3LY2KEJ-dHG7G2tGVMZEzc8Ns71MaLU4Jj1fGTQ"/>
                                        <div>
                                            <div class="font-bold text-on-surface">Llandudno Cove</div>
                                            <div class="text-xs text-on-surface-variant">3 Bed · 3 Bath</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm">Llandudno</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-orange-100 text-orange-700">MAINTENANCE</span>
                                </td>
                                <td class="px-6 py-4 font-semibold text-sm">R 28,000</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 hover:text-secondary transition-colors"><span class="material-symbols-outlined text-xl">edit</span></button>
                                        <button class="p-2 hover:text-error transition-colors"><span class="material-symbols-outlined text-xl">delete</span></button>
                                    </div>
                                </td>
                            </tr>
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
                        <form class="space-y-6">
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Property Name</label>
                                <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 placeholder:text-outline-variant" placeholder="e.g. Bantry Bay Retreat" type="text"/>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Location</label>
                                <select class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                    <option>Select Region...</option>
                                    <option>Clifton</option>
                                    <option>Camps Bay</option>
                                    <option>Constantia</option>
                                    <option>Franschhoek</option>
                                    <option>Stellenbosch</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Daily Rate (ZAR)</label>
                                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" placeholder="0.00" type="number"/>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Property Type</label>
                                    <select class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2">
                                        <option>Villa</option>
                                        <option>Estate</option>
                                        <option>Penthouse</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Bedrooms</label>
                                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" value="1"/>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Bathrooms</label>
                                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2" type="number" value="1"/>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Description</label>
                                <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 focus:ring-0 focus:border-secondary transition-colors px-0 py-2 resize-none placeholder:text-outline-variant" placeholder="Describe the luxury experience..." rows="3"></textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2">Image Gallery</label>
                                <div class="border-2 border-dashed border-outline-variant/40 rounded-xl p-8 text-center cursor-pointer hover:border-secondary/40 hover:bg-secondary/5 transition-all group">
                                    <span class="material-symbols-outlined text-outline group-hover:text-secondary mb-2">cloud_upload</span>
                                    <p class="text-xs text-on-surface-variant">Drop images here or <span class="text-secondary font-bold">browse</span></p>
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
                    <div class="text-3xl font-extrabold font-headline">42</div>
                    <div class="text-[10px] text-green-600 font-bold mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">trending_up</span> +3 this month
                    </div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Average Nightly</div>
                    <div class="text-3xl font-extrabold font-headline">R 24,800</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Premium Tier focus</div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Occupancy Rate</div>
                    <div class="text-3xl font-extrabold font-headline">88%</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Current Seasonal Average</div>
                </div>
                <div class="bg-surface-container p-6 rounded-sm">
                    <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Revenue YTD</div>
                    <div class="text-3xl font-extrabold font-headline">R 12.4M</div>
                    <div class="text-[10px] text-on-surface-variant font-medium mt-2">Admin Performance Target</div>
                </div>
            </div>
        </main>
    </div>
</div>
</body></html>

@include('Admin/parials.footer')
