@include('partials/header')
<main>
    <!-- Hero Section -->
    <section class="relative h-[972px] w-full flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img alt="Cape Town Coastline" class="w-full h-full object-cover" data-alt="Stunning wide-angle shot of Cape Town's Twelve Apostles mountains meeting the turquoise Atlantic Ocean at sunset with golden light." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAVUyB_rsyFTPk_S_4KGW5khqx1rq6b4jQbo7ZFgXx1RJUdaLjY70JPzHMs0siDNhwU4qkKpVsPVke-uni4QBPsLt__tJ8L1PaZY34dpkspVxhW0F__uBcjtRhweTMuNIxGXiC7JcSOjgFBEDGK8W3mSCI13NvEYpE8ti9oTJ1SCmvVgBWgUUKwZ57CYDuCahXkcV9_FsmQ9EKSI1yx5-iDxTxU5RufsBruqrcx-gCUrUQ9wnsdY3dUNGHrbeKEh2_UUWV61osTc0U"/>
            <div class="absolute inset-0 bg-black/20"></div>
        </div>
        <div class="relative z-10 text-center px-6 max-w-4xl">
            <h1 class="text-white font-headline text-5xl md:text-7xl font-extrabold tracking-tight mb-8">
                Elevated Living. <br/>
                <span class="italic font-light">The Cape Unveiled.</span>
            </h1>
            <!-- Booking Widget -->
            <div class="bg-surface-container-lowest p-2 rounded-xl editorial-shadow max-w-5xl mx-auto flex flex-col md:flex-row items-stretch gap-2">
                <div class="flex-1 flex flex-col items-start px-6 py-3 border-r border-outline-variant/20">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-outline mb-1">Location</span>
                    <input class="w-full border-0 p-0 text-on-surface focus:ring-0 placeholder:text-surface-variant font-medium" placeholder="Where to?" type="text"/>
                </div>
                <div class="flex-1 flex flex-col items-start px-6 py-3 border-r border-outline-variant/20">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-outline mb-1">Check In - Out</span>
                    <input class="w-full border-0 p-0 text-on-surface focus:ring-0 placeholder:text-surface-variant font-medium" placeholder="Add Dates" type="text"/>
                </div>
                <div class="flex-1 flex flex-col items-start px-6 py-3 border-r border-outline-variant/20">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-outline mb-1">Guests</span>
                    <input class="w-full border-0 p-0 text-on-surface focus:ring-0 placeholder:text-surface-variant font-medium" placeholder="2 Adults" type="text"/>
                </div>
                <button class="bg-action-gradient text-on-secondary px-10 py-4 rounded-xl font-bold flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined" data-icon="search">search</span>
                    Search
                </button>
            </div>
        </div>
    </section>
    <!-- The Portfolio -->
    <section class="py-32 px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
            <div class="max-w-xl">
                <span class="text-on-tertiary-container font-bold tracking-widest text-xs uppercase mb-4 block">The Collections</span>
                <h2 class="text-4xl md:text-5xl font-headline font-bold tracking-tight text-primary">Curated Experiences for the Discerning Traveler.</h2>
            </div>
            <p class="text-on-surface-variant max-w-xs font-light leading-relaxed">Every detail is hand-picked to ensure your stay in the Western Cape is nothing short of extraordinary.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1: Stays -->
            <div class="group cursor-pointer">
                <div class="relative aspect-[4/5] overflow-hidden rounded-xl mb-6">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Ultra-modern luxury villa with glass walls overlooking the ocean in Clifton, Cape Town, during the blue hour." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUkJt00DmHubTQxzqat8Gd73Q8RNxcnhrC1WxPp2M_3G7u36VmG2hqJgjknT7TTXKsLF9DutboAornj6ELyjCRSYAbL-jGNmzx7yjeF-YQ5YgwmabHG8BY58vgDGfnxbPgYQd2bWWEfFIwpN-1fyLmbxLsnXTnIgqAXDpeShKzoGT7HuCxr1SeTE0kI30RyYuLDySerQyB1fXJLiIBRgD0b__44tsar-94wtQjmrawr6w3pgeiZdP7cJoQC23RJ3EBlfdk0VNFhLY"/>
                    <div class="absolute top-6 left-6">
                        <span class="bg-surface-container-lowest/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-bold tracking-tighter">Villas</span>
                    </div>
                </div>
                <h3 class="font-headline text-2xl font-bold mb-2">Curated Stays</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed mb-4">From architectural marvels in Clifton to heritage estates in the Winelands.</p>
                <a class="text-on-primary-container font-bold text-sm flex items-center gap-1 group/link" href="#">
                    Explore Residences
                    <span class="material-symbols-outlined transition-transform group-hover/link:translate-x-1" data-icon="arrow_forward">arrow_forward</span>
                </a>
            </div>
            <!-- Card 2: Movement -->
            <div class="group cursor-pointer translate-y-8">
                <div class="relative aspect-[4/5] overflow-hidden rounded-xl mb-6">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Sleek black high-end sports car parked on a scenic coastal road in Cape Town with Chapman's Peak in the background." src="https://lh3.googleusercontent.com/aida-public/AB6AXuATl7ffwpHG75Cxp0gR8AmSLKFREHt9KH_dPePA_1E-BIR9DSmN_JXNUjswQ7d_cROB5HWbZwqX39CUMDgqCRVzuGeGDiosltLwNqqkBBEb9udOwApwUW5COtPADixF6GBTkwT6Qr6SIlVZ206KoAZX5jdSMlH_nswUqCnBFqoueFxMQNYu93eyGYdN-S-Q6P2AiYo_Gl5pD-pNM95bAkhCh-fkt6LfP0P3f0_WAx2THLmhtD0ggZD_Xdl-TvR0usUsinnXuA1HrIc"/>
                    <div class="absolute top-6 left-6">
                        <span class="bg-surface-container-lowest/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-bold tracking-tighter">Movement</span>
                    </div>
                </div>
                <h3 class="font-headline text-2xl font-bold mb-2">Prestige Movement</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed mb-4">Traverse the coast in unparalleled style with our fleet of elite vehicles and private chauffeurs.</p>
                <a class="text-on-primary-container font-bold text-sm flex items-center gap-1 group/link" href="#">
                    View Fleet
                    <span class="material-symbols-outlined transition-transform group-hover/link:translate-x-1" data-icon="arrow_forward">arrow_forward</span>
                </a>
            </div>
            <!-- Card 3: Events -->
            <div class="group cursor-pointer">
                <div class="relative aspect-[4/5] overflow-hidden rounded-xl mb-6">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Luxury yacht cruising the Atlantic ocean near Cape Town, with people enjoying champagne on the deck at sunset." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAARjXl_ZaA2ixpXnShzUDzVT5wXmWMEB6xnJHLOv0e5JID_shboopBbLicbbSLk3x2u7wmiDnmn9Khh7ZTVoakkY2st1jEKc95O5MS9Uo9RwZe0Olbwjkcp0g-bYKEuDPBKX83J1IqNhKUmPsu_TfvwhgPaAe67YyiGmx9Xd_kHtuIf0CpHXPYTvhNiRz1jYESqoq5QgL7yxM8IdCkrqDXhBu5zP7i3vrm3y8ZfPqlRmiMAfybIssapuvuEoH2nm6K_GNa_PzuRo"/>
                    <div class="absolute top-6 left-6">
                        <span class="bg-surface-container-lowest/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-bold tracking-tighter">Moments</span>
                    </div>
                </div>
                <h3 class="font-headline text-2xl font-bold mb-2">Bespoke Events</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed mb-4">Exclusive access to private wine safaris, yacht charters, and curated local celebrations.</p>
                <a class="text-on-primary-container font-bold text-sm flex items-center gap-1 group/link" href="#">
                    Discover Experiences
                    <span class="material-symbols-outlined transition-transform group-hover/link:translate-x-1" data-icon="arrow_forward">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>
    <!-- Brand Storytelling: The Coastal Curator -->
    <section class="bg-surface-container-low py-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-8 flex flex-col lg:flex-row items-center gap-20">
            <div class="lg:w-1/2 relative">
                <!-- Asymmetrical Image Layout -->
                <div class="relative z-10 w-4/5 rounded-xl overflow-hidden editorial-shadow">
                    <img class="w-full aspect-square object-cover" data-alt="Elegant lifestyle shot of a high-end concierge arranging a private dinner setting with coastal views." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBa1dfrlDrQqdAJzEXscQMXbLOxkQngKDRWgUhTwCTHfy2Km41CInntU63ID-uCAXty3YxrCJRLdoYmoCqHrnQgTBKdybPJcB5GYR7mn8HQCpvzf9GhlXMRXyS0-d3VeICvhoQB9Pp_UMGBnugSVgVuQ7g4AC5f7s5Mm53490f4S91Cn2KdU66o7kcTMX4bWV_GI_MP30c6V5Kv9ClsQVRnTwwn_KqIp7zddC4t7SXvdV5728M0118ZWRPpMMEa2rDy0yK74KyEi3M"/>
                </div>
                <div class="absolute -bottom-10 -right-4 w-3/5 rounded-xl overflow-hidden editorial-shadow z-20 border-8 border-surface-container-low">
                    <img class="w-full aspect-video object-cover" data-alt="Close up of a luxury property detail, high quality linens and a view of the mountains through a window." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDG1IsbpNyWX5FCzph_ZFq2PWNEA0SNalAbvcxxgqBRFF7qLY8-42qYxZsvZESUoLNVB-kC7aTcpnQsfPTszaNFI7FBPBq0J0yNDhqqhbyCQDgq1YMxBma8gdIa71feqbQcSIY0UGdqfF9hL-i3RCklxzb81T_SvVjUZ3W82PYB_Dd29P3FOUulDfQ7eQuvgrekpCtBC16CTquiz3BDM854Aq2NtxpvBn4sEyOa_UyfJYZvZ_5yKDmSivRlKyJZfrti287UkJcL_aY"/>
                </div>
            </div>
            <div class="lg:w-1/2">
                <span class="text-secondary font-bold tracking-[0.2em] text-xs uppercase mb-6 block">Our Ethos</span>
                <h2 class="text-5xl font-headline font-bold text-primary mb-8 tracking-tight">The Coastal Curator</h2>
                <div class="space-y-6 text-on-surface-variant font-body text-lg leading-relaxed max-w-lg">
                    <p>We believe travel is an art form. TK Cape Accom was born from a desire to redefine luxury in the Western Cape—moving beyond standard hospitality to a meticulously curated lifestyle.</p>
                    <p>As your personal curators, we don't just find you a room; we design a narrative. From the first pour of a rare vintage to the perfect light hitting your terrace, we manage the invisible details that make a journey unforgettable.</p>
                    <div class="pt-4">
                        <button class="text-on-primary-container border-b border-on-primary-container pb-1 font-bold hover:text-secondary hover:border-secondary transition-all">Our Full Story</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Visual Gallery (Bento Style) -->
    <section class="py-32 bg-surface">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-headline font-bold text-primary">A Glimpse of the Extraordinary</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-[800px]">
                <div class="md:col-span-2 md:row-span-2 rounded-xl overflow-hidden relative group">
                    <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Wide shot of a luxury villa infinity pool reflecting the Cape Town sky at dawn." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDeDlJA1YKi425N2NVUONtpLtIH-01IPGaIOhtXbQogYFcoE5cv6rh2DyUbumK8GAKEgaaMXwGiPDvK6ydt_RNYBBcHKZftZAqFBp1phdix9DUEuIF64bj-DspxTazruWqOtBWmmpcblatkvmsEkR7WP9XqA_nFtSSOfQisov4G6kh_HcNlj1Nu9XS8leyxS94V5N8rxgt983sMwdJnOytPsdviWYmbtxau-rMwDTL9VoDD5v85Mn3woWmuha6MKbX08nA18lN_T44"/>
                </div>
                <div class="rounded-xl overflow-hidden relative group">
                    <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Interior of a modern luxury living room with high ceilings and local South African art." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBj3sAyGvXO0WJtEVt7cIIb4V2YXlstr5QDue6RIDPSsgtXpE00G9r4jVkhvhWsHBYk8Ktz-Qr4oDlaBtBoAIGDholtTRKrnSVZq-hGLbrG-DsZrbovxZcWiNTv6V5YYTkqZG9MD19gDverGiObFWqNgtn04_1mgLz0ZUQqo3wDO_rG6Pel-F4K7gOnMcCKFvXkKklh4RdrFaUTyKYPeg4mrK08stSuok1qH1nDdEX6XcShylXoyeFjqnMFbOydYCe1YylvGm8-ke8"/>
                </div>
                <div class="rounded-xl overflow-hidden relative group">
                    <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Close up of a wine tasting experience at a historic Stellenbosch vineyard with lush green vines." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDx42revJBxkW9sQwI7E--7IIArC2UHrmh2niUDza0jnsxS5PPhK8ml_0RNEwM74qWrGP0edoaVbSCd8aDiS37Fim-BMPcUSU1vDKM0zvxe6q6gjzY2s_rVrXiiUrjWLm00WxGepJgKH7HJMGAZM8AHu5pCGEfkAfyM5XZim2bTYU7nLMKPOogdB6-ejqf_W1LsG75pIHaOi4WHKQtPYWqEwPnP7OYNjx2micBjOuhE6uuf9-SxbcokE8hpIxYodlRSfq5a8hiz4Qk"/>
                </div>
                <div class="md:col-span-2 rounded-xl overflow-hidden relative group">
                    <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Dramatic aerial view of the Atlantic Seaboard coastal road hugging the mountain side." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7bls1pCM7w1SAjHJSi0sUMG2XrZgxuWmrbrPE3Lfc4xrDsHiWVTIkc7w29IccBczQH8uBL0kzH3IP3kwifle1IFrfhIB2psmWzgOP8E83pXggm27VzF7eEvbjZATGO_BNU3iSyyh7gwHy85xWOJMi0V9q2nyrvWqSzhfLDKuSwOjO3Mo7ge2mUsqwY5LY5tkzTpjQ7RPXuoqQuNJn25rfzxlYrXi3dPw8fedwav9xXtMorG0fHp7ZTVdGAx2jnBdjyKstQ0p0w8o"/>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="py-32 px-8">
        <div class="max-w-5xl mx-auto bg-primary text-on-primary rounded-xl overflow-hidden flex flex-col md:flex-row items-center editorial-shadow">
            <div class="p-12 md:p-20 md:w-2/3">
                <h2 class="text-4xl md:text-5xl font-headline font-extrabold mb-6 tracking-tight leading-tight">Ready to Curate Your Cape Adventure?</h2>
                <p class="text-primary-fixed-dim/80 text-lg mb-10 max-w-md font-light">Join the ranks of those who see travel as an investment in the soul. Let us craft your next masterpiece.</p>
                <div class="flex flex-wrap gap-4">
                    <button class="bg-action-gradient text-on-secondary px-8 py-4 rounded-xl font-bold transition-transform hover:scale-105 active:scale-95">Start Your Journey</button>
                    <button class="border border-primary-fixed-dim text-on-primary px-8 py-4 rounded-xl font-bold hover:bg-white/10 transition-colors">Speak to a Curator</button>
                </div>
            </div>
            <div class="hidden md:block md:w-1/3 h-full self-stretch">
                <img class="w-full h-full object-cover grayscale opacity-60" data-alt="Minimalist architectural detail of a white building against a clear blue sky." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmrFeEzGZAEZvxbdRAkFLS2fQcjAGb5njyuvA7aewwLm81I0clSvc1sydHXlwz_cx46om_ZNziu4_C4rEi_nVu1H5mhynmZO7H3J866DOaaWLf580jPWpG0iAg9foBa0Bwiilzxn-qnLNx4QWEqfQj84xyK8ybsvorbcFw21hBO3Xd_SBpEb8BM_fJTVJE7aQro3h6ttBUtBBT8C7sPiIXokYqTyX_zkk4xeVjmOwgLCh9l6cLH8BHmnf_MznATkmcjRPrllLsYBI"/>
            </div>
        </div>
    </section>
</main>

@include('partials/footer')
