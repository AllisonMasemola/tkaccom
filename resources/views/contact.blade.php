@include('partials/header')

<main class="pt-20">
    <!-- Hero Section -->
    <section class="relative h-[614px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover" data-alt="cinematic wide shot of the twelve apostles mountain range in cape town at sunrise with soft mist over the ocean" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkkRz8knqxVksV8SQEqxkCXaNlrzMRiHlBlLIVBgne-ZE1qf1mdPwWkJg3xPlUkKl3SBVk5ddgtJ8zBbg4-Pno1OYlavWEza0Qxk_lxyL7Ts-_MkEoPf6Ol6vaS3kUZl6U38T39ynbMLKfhjZVE8mQAvUxyoyrZ2582CxmY5k35zFMKXTMiS_O0a3nj8QSEZ1ipzucK-avk_3tXajx8I8dCfUxmFr6LxwubYd3QT3qAtZHZ-ES6aGRAyQnhWOI5K9oW68IXjWK4aQ"/>
            <div class="absolute inset-0 bg-gradient-to-b from-primary/30 to-background"></div>
        </div>
        <div class="relative z-10 text-center px-6 max-w-4xl">
            <h1 class="font-headline text-5xl md:text-7xl font-extrabold tracking-tighter text-on-surface mb-6">
                Let’s Compose Your <span class="text-secondary italic">Stay.</span>
            </h1>
            <p class="font-body text-lg md:text-xl text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
                Personalized luxury is a conversation. Reach out to our dedicated specialists to curate your perfect Western Cape escape.
            </p>
        </div>
    </section>
    <!-- Connect with the Curator (Asymmetric Bento) -->
    <section class="py-24 px-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row gap-12 items-start">
            <div class="w-full md:w-1/3">
                <h2 class="font-headline text-4xl font-bold tracking-tight mb-6">Connect with the <span class="block">Curator</span></h2>
                <p class="text-on-surface-variant mb-8 leading-relaxed">Our team of experts is dedicated to matching you with an accommodation that fits your lifestyle and aspirations.</p>
                <div class="space-y-6">
                    <div class="flex items-start gap-4 p-6 bg-surface-container-low rounded-xl border-l-4 border-secondary">
                        <span class="material-symbols-outlined text-secondary text-3xl">concierge</span>
                        <div>
                            <h3 class="font-headline font-bold text-lg">Concierge Services</h3>
                            <p class="text-sm text-on-surface-variant mt-1">Bespoke itineraries, private chefs, and transport logistics.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-6 bg-surface-container-low rounded-xl border-l-4 border-on-tertiary-container">
                        <span class="material-symbols-outlined text-on-tertiary-container text-3xl">domain</span>
                        <div>
                            <h3 class="font-headline font-bold text-lg">Property Specialists</h3>
                            <p class="text-sm text-on-surface-variant mt-1">Investment inquiries and portfolio management for homeowners.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Form Card -->
            <div class="w-full md:w-2/3 bg-surface-container-lowest editorial-shadow p-8 md:p-12 rounded-lg relative">
                <div class="absolute -top-6 -right-6 hidden lg:block w-32 h-32 opacity-10 bg-secondary rounded-full"></div>
                <form class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="font-label text-xs font-semibold uppercase tracking-widest text-on-surface-variant">Full Name</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-secondary transition-all py-3 px-0" placeholder="Johnathan Doe" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label text-xs font-semibold uppercase tracking-widest text-on-surface-variant">Email Address</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-secondary transition-all py-3 px-0" placeholder="johnathan@curated.com" type="email"/>
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="font-label text-xs font-semibold uppercase tracking-widest text-on-surface-variant">Service of Interest</label>
                        <select class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-secondary transition-all py-3 px-0 appearance-none">
                            <option>Villa Accommodation</option>
                            <option>Prestige Movement (Transport)</option>
                            <option>Event Planning</option>
                            <option>Property Management</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="font-label text-xs font-semibold uppercase tracking-widest text-on-surface-variant">Your Message</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-secondary transition-all py-3 px-0 resize-none" placeholder="How can we help you experience the Cape differently?" rows="4"></textarea>
                    </div>
                    <div class="md:col-span-2 pt-4">
                        <button class="bg-gradient-to-r from-secondary to-secondary-container text-on-secondary px-10 py-4 rounded-md font-headline font-bold text-base tracking-wide hover:opacity-95 transition-all w-full md:w-auto shadow-lg shadow-secondary/20">
                            Send Inquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Direct Details Section (Editorial Layout) -->
    <section class="bg-surface-container-low py-20 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2 rounded-xl overflow-hidden editorial-shadow h-[400px]">
                <div class="w-full h-full bg-surface-variant flex items-center justify-center relative">
                    <img class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" data-alt="luxury modern office space in cape town with large windows overlooking the atlantic ocean and sleek minimalist furniture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4ENRv2XQ0R0wuLP0mUw24MTgVHXS21uVZ8Vvsf4zC-eqo_vfHrccxAciG3uOE4szycOtR1ai1zPdLCAp6H5p8gET9U62jN_jjlicy24BvMP9BA3YEkpBdV4uuI5XflO-qfhQ0ikl8irEDPdd0hf6PgGuWNIcNNV-dQOXw146GFnAwUmG8TLPXsp5InOWS5cdlV3XNjwUVWneDoe7lQsH-CyNh7uyw9W8Dv_TUsJ8gEt1xmrtO5ILtkfbQdYzPbYecEWZgbCdu5IE"/>
                    <div class="absolute inset-0 bg-secondary/10"></div>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <h2 class="font-headline text-3xl font-bold mb-10 tracking-tight">Our Base in the <span class="text-on-tertiary-container">Mother City</span></h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
                    <div class="space-y-4">
                        <h4 class="font-label font-bold text-sm uppercase tracking-widest text-secondary">Physical Address</h4>
                        <p class="text-on-surface leading-relaxed">
                            The Waterfront Silo District<br/>
                            Level 4, V&amp;A Waterfront<br/>
                            Cape Town, 8001
                        </p>
                    </div>
                    <div class="space-y-4">
                        <h4 class="font-label font-bold text-sm uppercase tracking-widest text-secondary">Priority Contact</h4>
                        <p class="text-on-surface text-lg font-headline font-bold">
                            +27 21 555 0192
                        </p>
                        <p class="text-on-surface-variant text-sm">Mon - Sun, 8am - 10pm SAST</p>
                    </div>
                    <div class="space-y-4">
                        <h4 class="font-label font-bold text-sm uppercase tracking-widest text-secondary">Email Inquiries</h4>
                        <a class="text-on-surface text-lg font-headline font-bold hover:text-secondary transition-colors block" href="mailto:concierge@tkcapeaccom.com">
                            concierge@tkcapeaccom.com
                        </a>
                        <p class="text-on-surface-variant text-sm">Response within 24 hours.</p>
                    </div>
                    <div class="space-y-4">
                        <h4 class="font-label font-bold text-sm uppercase tracking-widest text-secondary">Social Gallery</h4>
                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-on-surface-variant hover:text-secondary cursor-pointer transition-colors">camera_enhance</span>
                            <span class="material-symbols-outlined text-on-surface-variant hover:text-secondary cursor-pointer transition-colors">brand_awareness</span>
                            <span class="material-symbols-outlined text-on-surface-variant hover:text-secondary cursor-pointer transition-colors">travel_explore</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Consultation Request Section -->
    <section class="py-24 px-6 relative overflow-hidden bg-white">
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span class="inline-block px-4 py-1 bg-tertiary-fixed text-on-tertiary-fixed-variant font-label text-xs font-bold uppercase tracking-widest rounded-full mb-6">Exclusive Service</span>
            <h2 class="font-headline text-4xl md:text-5xl font-extrabold mb-8 tracking-tighter">Bespoke Travel Planning</h2>
            <p class="text-on-surface-variant text-lg mb-10 leading-relaxed">
                Planning a multi-property stay or a signature event? Our Principal Curators offer 1-on-1 virtual consultations to map out your entire journey across the Cape.
            </p>
            <button class="px-8 py-4 border-b-2 border-secondary font-headline font-bold text-secondary text-lg hover:bg-secondary/5 transition-all">
                Request a Consultation →
            </button>
        </div>
        <!-- Decorative Background Element -->
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-surface-container rounded-full blur-3xl opacity-50"></div>
    </section>
</main>
@include('partials/footer')
