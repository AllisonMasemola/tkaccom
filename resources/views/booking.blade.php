<!DOCTYPE html>

<html lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>My Bookings | TK Cape Accom</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;400;700;800&amp;family=Work+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "surface-tint": "#ba1a20",
              "on-error": "#ffffff",
              "surface-bright": "#f9f9f9",
              "primary-fixed-dim": "#ffb3ac",
              "primary-container": "#530005",
              "error-container": "#ffdad6",
              "tertiary-fixed": "#ffdad4",
              "on-error-container": "#93000a",
              "surface-container-lowest": "#ffffff",
              "tertiary-container": "#540000",
              "on-background": "#1a1c1c",
              "secondary-container": "#838bff",
              "primary-fixed": "#ffdad6",
              "on-tertiary-container": "#e06857",
              "secondary": "#4951c3",
              "inverse-surface": "#2f3131",
              "inverse-primary": "#ffb3ac",
              "surface-variant": "#e2e2e2",
              "on-tertiary-fixed": "#410000",
              "inverse-on-surface": "#f1f1f1",
              "on-tertiary-fixed-variant": "#842419",
              "outline": "#767684",
              "on-primary-fixed-variant": "#930010",
              "on-secondary": "#ffffff",
              "on-secondary-fixed": "#00006e",
              "error": "#ba1a1a",
              "on-primary": "#ffffff",
              "primary": "#2b0001",
              "secondary-fixed": "#e0e0ff",
              "on-secondary-container": "#111692",
              "surface-container-low": "#f3f3f3",
              "on-tertiary": "#ffffff",
              "surface-container-highest": "#e2e2e2",
              "tertiary": "#2c0000",
              "on-surface": "#1a1c1c",
              "background": "#f9f9f9",
              "surface-container-high": "#e8e8e8",
              "on-primary-container": "#fb4d48",
              "surface-container": "#eeeeee",
              "on-primary-fixed": "#410003",
              "secondary-fixed-dim": "#bfc2ff",
              "surface": "#f9f9f9",
              "on-secondary-fixed-variant": "#3037aa",
              "surface-dim": "#dadada",
              "tertiary-fixed-dim": "#ffb4a8",
              "on-surface-variant": "#454653",
              "outline-variant": "#c6c5d5"
            },
            fontFamily: {
              "headline": ["Manrope"],
              "body": ["Work Sans"],
              "label": ["Work Sans"]
            },
            borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
          },
        },
      }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .editorial-shadow {
            box-shadow: 0 20px 40px rgba(26, 28, 28, 0.05);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface selection:bg-secondary/30">
<!-- Top Navigation Bar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
    <div class="flex justify-between items-center w-full px-8 py-4 max-w-screen-2xl mx-auto">
        <div class="text-2xl font-black tracking-tighter text-blue-900 font-headline uppercase">
            TK Cape Accom
        </div>
        <div class="hidden md:flex gap-8 items-center">
            <a class="font-headline tracking-tight font-bold uppercase text-sm text-slate-600 hover:text-blue-600 transition-colors" href="#">Home</a>
            <a class="font-headline tracking-tight font-bold uppercase text-sm text-slate-600 hover:text-blue-600 transition-colors" href="#">Accommodations</a>
            <a class="font-headline tracking-tight font-bold uppercase text-sm text-slate-600 hover:text-blue-600 transition-colors" href="#">Prestige Movement</a>
            <a class="font-headline tracking-tight font-bold uppercase text-sm text-slate-600 hover:text-blue-600 transition-colors" href="#">Events</a>
        </div>
        <div class="flex items-center gap-4">
            <button class="p-2 rounded-full hover:bg-slate-50 transition-all">
                <span class="material-symbols-outlined text-on-surface-variant">notifications</span>
            </button>
            <button class="flex items-center gap-2 p-1 pl-3 rounded-full border border-outline-variant/20 hover:bg-slate-50 transition-all">
                <span class="text-sm font-semibold text-blue-700">My Account</span>
                <span class="material-symbols-outlined text-blue-700" style="font-variation-settings: 'FILL' 1;">account_circle</span>
            </button>
        </div>
    </div>
</nav>
<main class="pt-32 pb-24 px-6 md:px-12 max-w-screen-2xl mx-auto">
    <!-- Header Section -->
    <header class="mb-16">
        <h1 class="font-headline text-5xl md:text-6xl font-extrabold tracking-tighter text-blue-900 mb-4">Your Cape Journey</h1>
        <p class="text-on-surface-variant max-w-2xl text-lg">Curating your prestigious stays, movement, and experiences across the Western Cape.</p>
    </header>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <!-- Main Content: Bookings -->
        <div class="lg:col-span-8 space-y-16">
            <!-- Upcoming Stays & Rentals -->
            <section>
                <div class="flex justify-between items-end mb-8">
                    <h2 class="font-headline text-2xl font-bold uppercase tracking-widest text-secondary">Upcoming Stays &amp; Rentals</h2>
                    <span class="text-sm font-medium text-on-surface-variant">2 Bookings Found</span>
                </div>
                <div class="space-y-6">
                    <!-- Card 1: Property -->
                    <div class="group relative bg-surface-container-lowest editorial-shadow overflow-hidden flex flex-col md:flex-row transition-transform duration-500 hover:-translate-y-1">
                        <div class="md:w-1/3 h-64 md:h-auto overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="luxury modern white villa overlooking the ocean in Clifton Cape Town at dusk with glowing warm interior lights" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBUh6jyrb7o6VRbb9IJ3vDEPIiVSb7u-yqkloosjHQg_LjGICdar5Xl5k7-V7W9Ub1H3nHnXv9CwjQXcC0wKj2mQB8BKZ2N3vi0PY45eGRAhglXUgaMIyP_pN1HEVLIzuuZxmbsNokVM-84_hpDFZhL4NJnj6jbLE3jvuBmUs3sUYrZHHbdmxxWS28bM4vmbaggQsR-Ffnxvaw11T1YHmv6o5Tl2v1M2ReSx4NELwCaMmBxBA0lfzT0ArcSE11EMY5M65ARX33aT0"/>
                        </div>
                        <div class="md:w-2/3 p-8 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start mb-4">
                                    <span class="px-3 py-1 bg-secondary/10 text-secondary text-[10px] font-bold uppercase tracking-widest rounded-full">Villa Stay</span>
                                    <div class="flex items-center gap-1 text-emerald-600">
                                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        <span class="text-xs font-bold uppercase tracking-tight">Confirmed</span>
                                    </div>
                                </div>
                                <h3 class="font-headline text-2xl font-bold text-on-surface mb-2">Clifton Sky Villa</h3>
                                <p class="text-on-surface-variant text-sm flex items-center gap-2 mb-6">
                                    <span class="material-symbols-outlined text-sm">calendar_today</span>
                                    Dec 12 — Dec 18, 2024
                                </p>
                            </div>
                            <div class="flex justify-between items-center border-t border-outline-variant/10 pt-6">
                                <div>
                                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-1">Total Value</p>
                                    <p class="text-xl font-headline font-extrabold text-blue-900">R 142,500.00</p>
                                </div>
                                <button class="bg-gradient-to-r from-secondary to-secondary-container text-white px-6 py-3 rounded-md text-sm font-bold tracking-tight hover:opacity-90 transition-all">
                                    Manage Booking
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: Rental -->
                    <div class="group relative bg-surface-container-lowest editorial-shadow overflow-hidden flex flex-col md:flex-row transition-transform duration-500 hover:-translate-y-1">
                        <div class="md:w-1/3 h-64 md:h-auto overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="sleek silver modern Porsche 911 parked on a scenic coastal road in Cape Town during the golden hour" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDm0HV8PPND-QErR3VYX-J7hviBkpvDntK2JCetQEumb0r6jGDPa9Mw0PfhflBaZk4WjB5OVwfmRvNDWEkrFXX21byhvSV1lNC9LRcgdx1N-NBTg4tmbNvHij1DSZ9nmqzyvmMwDDDW0iDqvcDdzwZKwm1tXq276zj0_F6P6q2elb-WJ5qGes6eljbeCm_KbaGAoFDdmsMvLYLSkLbAb6QRMZ2mu2NJ6wvFSRhKO301a46kUIPgigLeRB6uY7osg3m7rIYmr7Urp7Q"/>
                        </div>
                        <div class="md:w-2/3 p-8 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start mb-4">
                                    <span class="px-3 py-1 bg-blue-900/10 text-blue-900 text-[10px] font-bold uppercase tracking-widest rounded-full">Prestige Movement</span>
                                    <div class="flex items-center gap-1 text-emerald-600">
                                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        <span class="text-xs font-bold uppercase tracking-tight">Confirmed</span>
                                    </div>
                                </div>
                                <h3 class="font-headline text-2xl font-bold text-on-surface mb-2">Porsche 911 Carrera S</h3>
                                <p class="text-on-surface-variant text-sm flex items-center gap-2 mb-6">
                                    <span class="material-symbols-outlined text-sm">directions_car</span>
                                    Dec 12 — Dec 18, 2024
                                </p>
                            </div>
                            <div class="flex justify-between items-center border-t border-outline-variant/10 pt-6">
                                <div>
                                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-1">Total Value</p>
                                    <p class="text-xl font-headline font-extrabold text-blue-900">R 28,800.00</p>
                                </div>
                                <button class="bg-gradient-to-r from-secondary to-secondary-container text-white px-6 py-3 rounded-md text-sm font-bold tracking-tight hover:opacity-90 transition-all">
                                    Manage Rental
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Upcoming Events -->
            <section>
                <div class="flex justify-between items-end mb-8">
                    <h2 class="font-headline text-2xl font-bold uppercase tracking-widest text-secondary">Curated Experiences</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Event 1 -->
                    <div class="bg-white p-6 editorial-shadow flex gap-4 items-center">
                        <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0">
                            <img class="w-full h-full object-cover" data-alt="glass of white wine with vineyards in the background under a warm sunlit sky" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbbQm34au0mfCwSIrjpoQH6R0MZLk_56FVQJeXyqaXjQoR28w8QcqwB5QLr4KqDkSEGDmW5r-03EeCxAkw4ARs49lYIqhokeAZIf2h4MH-9RnU5F64T2kvR89NTWYbXZqgUefa9lAWd2ArbzrMGEDdPp2GcZ0m3xmedeYtAgzsji_loaWL4Q228soVOxrkooxonV6pLY_kTImzM9XG_hJ7nfZpMaZMvkHRqA4mpv0CbcgjGXZLo1omxggkSS-zeSSqKKoTIVe9RO0"/>
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-headline font-bold text-on-surface">Wine Safari: Franschhoek</h4>
                            <p class="text-xs text-on-surface-variant mb-3">Dec 14, 2024 • 11:00 AM</p>
                            <button class="text-secondary text-[10px] font-bold uppercase tracking-widest hover:underline decoration-secondary/30 underline-offset-4">View Ticket</button>
                        </div>
                    </div>
                    <!-- Event 2 -->
                    <div class="bg-white p-6 editorial-shadow flex gap-4 items-center">
                        <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0">
                            <img class="w-full h-full object-cover" data-alt="luxury yacht sailing on clear blue water during a vibrant orange and pink sunset" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxiocINn0kOQyRSfSAE6gv1IA1lKyI7Ga0ulbCXBJMCiDe7l1IG710OeyN7zDAcQJuV35pjXIo-5ZE-p7b1cwDJWnA-P2xM1BRjXBHw-dsKQj3w5XJjxjgbe-ZC55Vy3Bg62hNqewnNRxZJ3dOhW6nPEbREiQCwYmm7lYKzUb2a16L441out3o3-rmUOa0JMmYl4BnMSfp89r9xF5nwDoViv4SZFXyO9JK_5X7ZncE5xFS5uDqU5Q0bTmkeVm4LG2Xyzh7WzOtWnA"/>
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-headline font-bold text-on-surface">Sunset Yacht Cruise</h4>
                            <p class="text-xs text-on-surface-variant mb-3">Dec 16, 2024 • 05:30 PM</p>
                            <button class="text-secondary text-[10px] font-bold uppercase tracking-widest hover:underline decoration-secondary/30 underline-offset-4">View RSVP</button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- History -->
            <section>
                <div class="flex justify-between items-end mb-8">
                    <h2 class="font-headline text-2xl font-bold uppercase tracking-widest text-secondary">Past Bookings</h2>
                    <button class="text-sm font-bold text-on-surface-variant hover:text-secondary transition-colors">View All History</button>
                </div>
                <div class="bg-surface-container-low p-2 rounded-xl">
                    <div class="bg-white p-6 editorial-shadow flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-6 w-full md:w-auto">
                            <div class="w-16 h-16 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                <span class="material-symbols-outlined">hotel</span>
                            </div>
                            <div>
                                <h4 class="font-headline font-bold text-on-surface">The Penthouse, Camps Bay</h4>
                                <p class="text-xs text-on-surface-variant">Stayed: August 2024</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 w-full md:w-auto justify-end">
                            <span class="text-sm font-semibold text-on-surface-variant">R 45,000.00</span>
                            <button class="px-6 py-2 border border-outline-variant/30 text-[10px] font-bold uppercase tracking-widest hover:bg-slate-50 transition-all">Book Again</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Sidebar: Quick Actions & Concierge -->
        <aside class="lg:col-span-4 space-y-8">
            <!-- Concierge Card -->
            <div class="bg-blue-900 text-white p-8 rounded-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-16 -mt-16 blur-3xl"></div>
                <div class="relative z-10">
                    <span class="material-symbols-outlined text-4xl mb-6 text-secondary-fixed">support_agent</span>
                    <h3 class="font-headline text-2xl font-extrabold mb-2 tracking-tight">Personal Concierge</h3>
                    <p class="text-blue-100/70 text-sm mb-8 leading-relaxed">Your dedicated assistant is standing by to ensure your Cape experience is flawless.</p>
                    <div class="space-y-3">
                        <button class="w-full bg-white text-blue-900 py-3 rounded-md text-sm font-bold flex items-center justify-center gap-2 hover:bg-blue-50 transition-all">
                            <span class="material-symbols-outlined text-sm">chat</span>
                            Live Chat
                        </button>
                        <button class="w-full bg-blue-800 text-white py-3 rounded-md text-sm font-bold flex items-center justify-center gap-2 border border-blue-700 hover:bg-blue-700 transition-all">
                            <span class="material-symbols-outlined text-sm">call</span>
                            Call Priority Line
                        </button>
                    </div>
                </div>
            </div>
            <!-- Quick Actions -->
            <div class="bg-surface-container-low p-8 rounded-sm">
                <h4 class="font-headline text-xs font-black uppercase tracking-[0.2em] text-on-surface-variant mb-6">Quick Actions</h4>
                <ul class="space-y-4">
                    <li>
                        <a class="group flex items-center justify-between py-2 text-sm font-medium text-on-surface hover:text-secondary transition-colors" href="#">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors">more_time</span>
                                Request Late Check-in
                            </div>
                            <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 transition-all">arrow_forward</span>
                        </a>
                    </li>
                    <li>
                        <a class="group flex items-center justify-between py-2 text-sm font-medium text-on-surface hover:text-secondary transition-colors" href="#">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors">airport_shuttle</span>
                                Book Airport Transfer
                            </div>
                            <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 transition-all">arrow_forward</span>
                        </a>
                    </li>
                    <li>
                        <a class="group flex items-center justify-between py-2 text-sm font-medium text-on-surface hover:text-secondary transition-colors" href="#">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors">restaurant</span>
                                Reserve Private Chef
                            </div>
                            <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 transition-all">arrow_forward</span>
                        </a>
                    </li>
                    <li>
                        <a class="group flex items-center justify-between py-2 text-sm font-medium text-on-surface hover:text-secondary transition-colors" href="#">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors">receipt_long</span>
                                Download Statements
                            </div>
                            <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 transition-all">arrow_forward</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Weather/Dest Info -->
            <div class="bg-white p-8 editorial-shadow">
                <div class="flex items-center justify-between mb-6">
                    <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Cape Town Now</span>
                    <span class="text-2xl font-headline font-bold">24°C</span>
                </div>
                <div class="flex gap-4 items-center">
                    <span class="material-symbols-outlined text-amber-500 text-3xl">sunny</span>
                    <div>
                        <p class="text-sm font-bold">Perfect Beach Day</p>
                        <p class="text-xs text-on-surface-variant">Gentle breeze from the South East.</p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>
<!-- Footer -->
<footer class="bg-slate-50 w-full border-t border-slate-200">
    <div class="flex flex-col md:flex-row justify-between items-center px-12 py-12 w-full mt-auto max-w-screen-2xl mx-auto">
        <div class="mb-8 md:mb-0 text-center md:text-left">
            <div class="font-['Manrope'] font-bold text-lg text-blue-900 mb-2">TK Cape Accom</div>
            <p class="font-['Work_Sans'] text-xs tracking-wide text-blue-900 opacity-60">© 2024 TK Cape Accom. The Coastal Curator.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-8">
            <a class="font-['Work_Sans'] text-xs tracking-wide text-slate-500 hover:text-blue-600 hover:underline decoration-blue-500/30 underline-offset-4 transition-all" href="#">Privacy Policy</a>
            <a class="font-['Work_Sans'] text-xs tracking-wide text-slate-500 hover:text-blue-600 hover:underline decoration-blue-500/30 underline-offset-4 transition-all" href="#">Terms of Service</a>
            <a class="font-['Work_Sans'] text-xs tracking-wide text-slate-500 hover:text-blue-600 hover:underline decoration-blue-500/30 underline-offset-4 transition-all" href="#">Contact Us</a>
            <a class="font-['Work_Sans'] text-xs tracking-wide text-slate-500 hover:text-blue-600 hover:underline decoration-blue-500/30 underline-offset-4 transition-all" href="#">Sustainability</a>
        </div>
    </div>
</footer>
</body></html>
