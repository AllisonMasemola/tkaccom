@include('partials/header')

<main class="pt-24 pb-20">
    <!-- Hero Section -->
    <header class="max-w-7xl mx-auto px-8 py-16 flex flex-col items-center text-center">
        <span class="text-on-tertiary-container font-bold tracking-widest uppercase text-xs mb-4">Curated Experiences</span>
        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter text-on-surface max-w-4xl mb-6">
            Atmospheric Cape Town <br/><span class="text-secondary">Refined Gatherings</span>
        </h1>
        <p class="text-on-surface-variant max-w-2xl text-lg leading-relaxed">
            Beyond stays, we curate moments. From private vineyard jazz sessions to elite yachting expeditions, discover the Western Cape's most exclusive calendar.
        </p>
    </header>
    <!-- Upcoming Curated Events (Bento Grid) -->
    <section class="max-w-7xl mx-auto px-8 mb-24">
        <div class="flex items-end justify-between mb-10">
            <h2 class="text-3xl font-bold tracking-tight">Upcoming Curated Events</h2>
            <div class="flex gap-2">
                <button class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:bg-surface-container-high transition-colors">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Large Feature Card -->
            <div class="md:col-span-8 group relative overflow-hidden bg-surface-container-lowest rounded-sm shadow-sm">
                <div class="aspect-[16/9] overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="dramatic sunset over lush vineyards in stellenbosch with golden lighting and distant mountains" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQ9cAFwoRX7eSrByS1TIzKIBBU_J1nc8XnZscFJC4IXI0vsyCQoDHG4S8nHrNYkmVKaNY8otId9SQwiThlncQrWna2iTbx56eWuyxUDKCckFmEjcZ3TeDj-2OSNKpno3dl8Y1cebsYtOHyd6ScWWdTNh-Q69zA2LJ-vW_Wq_ub4KLVqRj0Bp0jk-w7D63Pwi8Sg7XsqNL-B2ulPEnv5ZEOAE7E30i3dlHNla6yEFiZKfKazewAAeug3LmFMocZops5jvTJZjk1FMk"/>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="text-xs font-semibold text-secondary uppercase tracking-widest mb-1 block">Signature Experience</span>
                            <h3 class="text-3xl font-extrabold tracking-tight">Wine Safari in Stellenbosch</h3>
                        </div>
                        <div class="text-right">
                            <span class="text-xs text-on-surface-variant block uppercase">From</span>
                            <span class="text-xl font-bold text-on-surface">ZAR 4,200</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-6 text-on-surface-variant text-sm mb-8">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base">calendar_today</span> Oct 24, 2024</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-base">location_on</span> Stellenbosch Valley</span>
                    </div>
                    <div class="flex gap-4">
                        <button class="bg-gradient-to-r from-secondary to-secondary-container text-on-secondary px-8 py-3 rounded-lg font-bold text-sm uppercase transition-all active:scale-95">Book Now</button>
                        <button class="text-on-surface font-semibold text-sm underline underline-offset-8 hover:text-secondary transition-colors">View Details</button>
                    </div>
                </div>
            </div>
            <!-- Vertical Secondary Card -->
            <div class="md:col-span-4 flex flex-col bg-surface-container-lowest rounded-sm shadow-sm group">
                <div class="flex-grow overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="luxury yacht sailing on calm blue ocean waters near table mountain during golden hour" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDntgDsBjRHID8EJT7YHvG2cAJUt0K2fij4S2mpMdKBrHOLSMA3tZPJpyjDnB0umAaz-DW8Pa5WPtWHfXYTxmUuul_IOiRny8hjPMs_wB5AQlJGN6nN0BZBmeWbfIn9HaLnnwzvysCMrI91RrcTnG9-5o7K8NJREE3lwtOnotuOHtmTK_T68bPhdO0y6UFQgYibJ7R50dnnUr-WtZPcyOVDFSz6qM9RhG1qbXv1lZ33lxwZG3SuDQlixPkXWPHKE8PSigwQSUxKuZU"/>
                </div>
                <div class="p-6">
                    <span class="text-xs font-semibold text-secondary uppercase tracking-widest mb-1 block">Maritime Luxury</span>
                    <h3 class="text-xl font-extrabold mb-2">Sunset Yacht Cruise</h3>
                    <div class="flex items-center gap-3 text-on-surface-variant text-xs mb-6">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> Nov 02</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">location_on</span> V&amp;A Waterfront</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold">ZAR 2,850</span>
                        <button class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-secondary hover:bg-secondary hover:text-white transition-all">
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Private Experiences (Asymmetric Layout) -->
    <section class="bg-surface-container-low py-24">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex flex-col md:flex-row gap-16 items-center">
                <div class="w-full md:w-1/2 relative">
                    <div class="aspect-[4/5] overflow-hidden rounded-xl">
                        <img class="w-full h-full object-cover" data-alt="elegant evening jazz performance in a dimly lit sophisticated cape town lounge with musicians in silhouette" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDZ7EeId586wyqSg_ZPlfyyDFPNXtex_d8cIvm_9zKS61JzVJeGlr1gOl_sQ8mCtWnT9IVPGohRkYlU4RQV3AA5vUwu09p6WHWJM_ofXoo5oj6sG4LSYClfCab-3Rf-sZHQDUpOzNWfTguSgcAJ1R-wYGY20MTyyS2qdbbnWgYgAnxcAyfe9mr0UXnKD3o1-Sq6f2KiMZslBGsxduPAB_7_dH5_VumGpKnIL5W-RTwzl_4VBHvgwpKTOp_nTy3xCamGDTwCcLbIvsA"/>
                    </div>
                    <!-- Overlapping Element -->
                    <div class="absolute -bottom-10 -right-10 bg-surface-container-lowest p-8 shadow-xl max-w-xs hidden lg:block rounded-lg">
                        <div class="text-on-tertiary-container font-bold text-xs uppercase mb-2">Private Booking</div>
                        <p class="text-sm font-body italic text-on-surface-variant">"An intimate evening of world-class jazz, bespoke for your private group in the heart of the Cape."</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-8">Private Experiences</h2>
                    <p class="text-on-surface-variant text-lg mb-10 leading-relaxed">
                        For those who seek absolute exclusivity, we offer bespoke private experiences tailored to your desires. Private chefs, helicopter transfers, and after-hours gallery tours.
                    </p>
                    <div class="space-y-8">
                        <div class="flex gap-6 p-6 bg-surface-container-lowest rounded-sm hover:translate-x-2 transition-transform cursor-pointer">
                            <div class="w-16 h-16 flex-shrink-0 bg-secondary-fixed rounded-full flex items-center justify-center text-secondary">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">music_note</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Jazz at the Cape</h4>
                                <p class="text-on-surface-variant text-sm">Private ensembles at your residence or a clandestine local venue.</p>
                                <div class="mt-2 text-xs font-semibold text-secondary">Inquire for Pricing</div>
                            </div>
                        </div>
                        <div class="flex gap-6 p-6 bg-surface-container-lowest rounded-sm hover:translate-x-2 transition-transform cursor-pointer">
                            <div class="w-16 h-16 flex-shrink-0 bg-primary-fixed rounded-full flex items-center justify-center text-on-primary-container">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">restaurant_menu</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Culinary Masterclass</h4>
                                <p class="text-on-surface-variant text-sm">Work alongside Michelin-starred chefs in a private Stellenbosch kitchen.</p>
                                <div class="mt-2 text-xs font-semibold text-secondary">Inquire for Pricing</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Interactive Calendar / Upcoming Monthly List -->
    <section class="max-w-7xl mx-auto px-8 py-24">
        <div class="flex flex-col md:flex-row justify-between items-baseline mb-12 gap-4">
            <h2 class="text-3xl font-bold">Event Calendar: October 2024</h2>
            <div class="flex items-center gap-4 text-sm font-semibold">
                <button class="px-4 py-2 bg-surface-container-high rounded-full">List View</button>
                <button class="px-4 py-2 text-on-surface-variant hover:text-secondary">Grid View</button>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-[1px] bg-outline-variant/20 rounded-lg overflow-hidden border border-outline-variant/10">
            <!-- Calendar Row 1 -->
            <div class="grid grid-cols-1 md:grid-cols-4 bg-surface-container-lowest p-6 hover:bg-surface-container transition-colors group">
                <div class="flex flex-col mb-4 md:mb-0">
                    <span class="text-3xl font-black text-secondary">12</span>
                    <span class="text-xs uppercase font-bold text-on-surface-variant">OCT · WED</span>
                </div>
                <div class="md:col-span-2">
                    <h4 class="text-xl font-bold mb-1">Coastal Foraging &amp; Cook-off</h4>
                    <p class="text-sm text-on-surface-variant">Join local experts for a sustainable foraging trip along the Atlantic coastline followed by a seaside feast.</p>
                </div>
                <div class="flex items-center justify-end gap-6 mt-4 md:mt-0">
                    <span class="text-sm font-bold">ZAR 1,200 pp</span>
                    <button class="px-6 py-2 border-2 border-secondary text-secondary font-bold text-xs uppercase rounded-lg hover:bg-secondary hover:text-white transition-all">Reserve</button>
                </div>
            </div>
            <!-- Calendar Row 2 -->
            <div class="grid grid-cols-1 md:grid-cols-4 bg-surface-container-lowest p-6 hover:bg-surface-container transition-colors group">
                <div class="flex flex-col mb-4 md:mb-0">
                    <span class="text-3xl font-black text-secondary">18</span>
                    <span class="text-xs uppercase font-bold text-on-surface-variant">OCT · TUE</span>
                </div>
                <div class="md:col-span-2">
                    <h4 class="text-xl font-bold mb-1">Mountain Peak Meditation</h4>
                    <p class="text-sm text-on-surface-variant">A sunrise trek to a secluded Table Mountain plateau for guided breathwork and tea ceremony.</p>
                </div>
                <div class="flex items-center justify-end gap-6 mt-4 md:mt-0">
                    <span class="text-sm font-bold">ZAR 850 pp</span>
                    <button class="px-6 py-2 border-2 border-secondary text-secondary font-bold text-xs uppercase rounded-lg hover:bg-secondary hover:text-white transition-all">Reserve</button>
                </div>
            </div>
            <!-- Calendar Row 3 -->
            <div class="grid grid-cols-1 md:grid-cols-4 bg-surface-container-lowest p-6 hover:bg-surface-container transition-colors group">
                <div class="flex flex-col mb-4 md:mb-0">
                    <span class="text-3xl font-black text-secondary">27</span>
                    <span class="text-xs uppercase font-bold text-on-surface-variant">OCT · FRI</span>
                </div>
                <div class="md:col-span-2">
                    <h4 class="text-xl font-bold mb-1">Moonlight Manor Soirée</h4>
                    <p class="text-sm text-on-surface-variant">An elegant cocktail reception at a historic Constantia estate with live string quartet.</p>
                </div>
                <div class="flex items-center justify-end gap-6 mt-4 md:mt-0">
                    <span class="text-sm font-bold">ZAR 3,500 pp</span>
                    <button class="px-6 py-2 border-2 border-secondary text-secondary font-bold text-xs uppercase rounded-lg hover:bg-secondary hover:text-white transition-all">Reserve</button>
                </div>
            </div>
        </div>
        <div class="mt-12 text-center">
            <button class="text-secondary font-bold border-b-2 border-secondary pb-1 hover:opacity-70 transition-opacity">View Full Calendar</button>
        </div>
    </section>
</main>
@include('partials/footer')
