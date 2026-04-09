{{--<!DOCTYPE html>--}}

{{--<html class="light" lang="en"><head>--}}
{{--    <meta charset="utf-8"/>--}}
{{--    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>--}}
{{--    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;400;600;700;800&amp;family=Work+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>--}}
{{--    <script id="tailwind-config">--}}
{{--      tailwind.config = {--}}
{{--        darkMode: "class",--}}
{{--        theme: {--}}
{{--          extend: {--}}
{{--            colors: {--}}
{{--              "on-error-container": "#93000a",--}}
{{--              "surface-dim": "#dadada",--}}
{{--              "error": "#ba1a1a",--}}
{{--              "on-secondary-fixed": "#00006e",--}}
{{--              "secondary-fixed-dim": "#bfc2ff",--}}
{{--              "surface-container-lowest": "#ffffff",--}}
{{--              "on-tertiary-fixed-variant": "#842419",--}}
{{--              "on-primary-fixed-variant": "#930010",--}}
{{--              "surface-container-high": "#e8e8e8",--}}
{{--              "surface-container": "#eeeeee",--}}
{{--              "outline-variant": "#c6c5d5",--}}
{{--              "primary": "#2b0001",--}}
{{--              "on-tertiary-container": "#e06857",--}}
{{--              "surface": "#f9f9f9",--}}
{{--              "on-secondary-fixed-variant": "#3037aa",--}}
{{--              "on-secondary-container": "#111692",--}}
{{--              "on-primary-container": "#fb4d48",--}}
{{--              "inverse-on-surface": "#f1f1f1",--}}
{{--              "tertiary-fixed-dim": "#ffb4a8",--}}
{{--              "surface-tint": "#ba1a20",--}}
{{--              "primary-container": "#530005",--}}
{{--              "primary-fixed": "#ffdad6",--}}
{{--              "on-error": "#ffffff",--}}
{{--              "background": "#f9f9f9",--}}
{{--              "surface-container-low": "#f3f3f3",--}}
{{--              "on-tertiary": "#ffffff",--}}
{{--              "on-surface": "#1a1c1c",--}}
{{--              "inverse-primary": "#ffb3ac",--}}
{{--              "primary-fixed-dim": "#ffb3ac",--}}
{{--              "on-tertiary-fixed": "#410000",--}}
{{--              "on-background": "#1a1c1c",--}}
{{--              "error-container": "#ffdad6",--}}
{{--              "secondary": "#4951c3",--}}
{{--              "on-surface-variant": "#454653",--}}
{{--              "on-primary": "#ffffff",--}}
{{--              "surface-variant": "#e2e2e2",--}}
{{--              "secondary-container": "#838bff",--}}
{{--              "secondary-fixed": "#e0e0ff",--}}
{{--              "surface-bright": "#f9f9f9",--}}
{{--              "outline": "#767684",--}}
{{--              "tertiary-container": "#540000",--}}
{{--              "on-secondary": "#ffffff",--}}
{{--              "tertiary": "#2c0000",--}}
{{--              "surface-container-highest": "#e2e2e2",--}}
{{--              "tertiary-fixed": "#ffdad4",--}}
{{--              "on-primary-fixed": "#410003",--}}
{{--              "inverse-surface": "#2f3131"--}}
{{--            },--}}
{{--            fontFamily: {--}}
{{--              "headline": ["Manrope"],--}}
{{--              "body": ["Work Sans"],--}}
{{--              "label": ["Work Sans"]--}}
{{--            },--}}
{{--            borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},--}}
{{--          },--}}
{{--        },--}}
{{--      }--}}
{{--    </script>--}}
{{--    <style>--}}
{{--        .material-symbols-outlined {--}}
{{--            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;--}}
{{--        }--}}
{{--        body { font-family: 'Work Sans', sans-serif; }--}}
{{--        h1, h2, h3, .font-headline { font-family: 'Manrope', sans-serif; }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body class="bg-surface text-on-surface min-h-screen flex">--}}
{{--<!-- SideNavBar (from JSON) -->--}}
{{--<aside class="flex flex-col h-full py-6 h-screen w-64 border-r-0 bg-[#f3f3f3] dark:bg-slate-900 sticky top-0 shrink-0">--}}
{{--    <div class="px-6 mb-10">--}}
{{--        <h1 class="text-xl font-bold text-[#00008B] dark:text-white tracking-tighter">TK Cape Accom</h1>--}}
{{--        <p class="font-manrope text-xs font-semibold tracking-tight text-slate-500 uppercase">Admin Dashboard</p>--}}
{{--    </div>--}}
{{--    <nav class="flex-1 space-y-1">--}}
{{--        <!-- Active Tab: Overview -->--}}
{{--        <a class="bg-gradient-to-r from-[#4951c3] to-[#838bff] text-white rounded-md mx-2 px-4 py-3 flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">--}}
{{--            <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>--}}
{{--            <span>Overview</span>--}}
{{--        </a>--}}
{{--        <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">--}}
{{--            <span class="material-symbols-outlined" data-icon="bed">bed</span>--}}
{{--            <span>Accommodations</span>--}}
{{--        </a>--}}
{{--        <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">--}}
{{--            <span class="material-symbols-outlined" data-icon="auto_awesome">auto_awesome</span>--}}
{{--            <span>Prestige Movement</span>--}}
{{--        </a>--}}
{{--        <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">--}}
{{--            <span class="material-symbols-outlined" data-icon="event">event</span>--}}
{{--            <span>Events</span>--}}
{{--        </a>--}}
{{--        <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">--}}
{{--            <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>--}}
{{--            <span>Bookings</span>--}}
{{--        </a>--}}
{{--    </nav>--}}
{{--    <div class="mt-auto pt-6 space-y-1 border-t border-[#eeeeee] dark:border-slate-800">--}}
{{--        <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">--}}
{{--            <span class="material-symbols-outlined" data-icon="settings">settings</span>--}}
{{--            <span>Settings</span>--}}
{{--        </a>--}}
{{--        <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">--}}
{{--            <span class="material-symbols-outlined" data-icon="help">help</span>--}}
{{--            <span>Support</span>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</aside>--}}

@include('admin.parials.header')
<!-- Main Content Canvas -->
<main class="flex-1 flex flex-col min-w-0">
    <!-- TopNavBar (from JSON) -->
    <header class="flex justify-between items-center w-full px-8 sticky top-0 z-40 bg-[#f9f9f9]/80 dark:bg-slate-950/80 backdrop-blur-md border-b border-[#1a1c1c]/10 dark:border-white/10 h-16">
        <div class="flex items-center bg-surface-container-low px-4 py-2 rounded-full w-96">
            <span class="material-symbols-outlined text-outline text-sm" data-icon="search">search</span>
            <input class="bg-transparent border-none focus:ring-0 text-sm font-body w-full ml-2 text-on-surface"
                   placeholder="Search analytics or properties..."
                   type="text"
            />
        </div>
        <div class="flex items-center gap-6">
            <button class="text-slate-500 hover:text-[#4951c3] transition-colors relative">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                <span class="absolute top-0 right-0 w-2 h-2 bg-on-primary-container rounded-full"></span>
            </button>
            <button class="text-slate-500 hover:text-[#4951c3] transition-colors">
                <span class="material-symbols-outlined" data-icon="settings">settings</span>
            </button>

            <div class="flex items-center gap-3 pl-4 border-l border-outline-variant/20">
                <div class="text-right">
                    <p class="text-xs font-bold font-headline">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-slate-500 font-label">Platform Director</p>
                </div>
                <img alt="Admin User Profile"
                     class="w-10 h-10 rounded-full object-cover"
                     data-alt="professional headshot of a middle-aged male executive with a confident smile in a modern office setting"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuB5GigXSModt4hsJzfv3zjxaYyZytAS7z4ZajtSMvIneEbKEj1QwH2Wl9gakCi6yOJf5dlAw5jPi_UEF0jGpULBVpBh4Bz_OHQwRvuivJen_ZhW0dp55LVaphsRrKb0VCDoXTervSymSnTtH2MgNGvctYNsFcEq40IBn1-H6-1K04GE4bxt_hEv33m2tRnIOW-Qms2Xp8mQg4-dC7VGzpuxUTY09obfWuHPiQvbxpWZOwiXUVZgxMZF-OTysf7NgX2fkjSKFEykHZA"
                />
            </div>
            <div class="sm:flex sm:items-center sm:ms-6 flex items-center gap-3 pl-4 border-l border-outline-variant/20">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                        >
                            {{--<div>{{ Auth::user()->name }}</div>--}}
                            <p class="text-xs font-bold font-headline">{{ Auth::user()->name }}</p>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20"
                                >
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"
                                    />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            >
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </header>
    <!-- Dashboard Content -->
    <div class="p-8 space-y-8">
        <!-- Welcome Header -->
        <div class="flex justify-between items-end">
            <div>
                <h2 class="text-3xl font-extrabold font-headline tracking-tight text-primary">Overview Dashboard</h2>
                <p class="text-on-surface-variant font-body">Welcome back. Here is what's happening across the Western
                    Cape today.</p>
            </div>
            <div class="flex gap-3">
                <button class="px-5 py-2.5 bg-surface-container-lowest text-secondary font-label font-semibold rounded-md border border-outline-variant/20 hover:bg-surface-container-low transition-all">
                    Download Report
                </button>
                <button class="px-5 py-2.5 bg-gradient-to-r from-secondary to-secondary-container text-on-secondary font-label font-semibold rounded-md shadow-sm active:scale-95 transition-transform">
                    Refresh Data
                </button>
            </div>
        </div>
        <!-- Key Metrics Cards (Bento Style) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Revenue -->
            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/10 flex flex-col justify-between group hover:border-secondary/30 transition-colors">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-secondary/10 rounded-lg text-secondary">
                        <span class="material-symbols-outlined" data-icon="payments">payments</span>
                    </div>
                    <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded">+12.5%</span>
                </div>
                <div>
                    <p class="text-slate-500 font-label text-xs font-semibold uppercase tracking-wider">Total
                        Revenue</p>
                    <h3 class="text-2xl font-extrabold font-headline mt-1">R 4,280,000</h3>
                </div>
            </div>
            <!-- Active Villa Bookings -->
            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/10 flex flex-col justify-between group hover:border-secondary/30 transition-colors">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-on-primary-container/10 text-on-primary-container rounded-lg">
                        <span class="material-symbols-outlined" data-icon="cottage">cottage</span>
                    </div>
                    <span class="text-xs font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded">Stable</span>
                </div>
                <div>
                    <p class="text-slate-500 font-label text-xs font-semibold uppercase tracking-wider">Active Villa
                        Bookings</p>
                    <h3 class="text-2xl font-extrabold font-headline mt-1">142</h3>
                </div>
            </div>
            <!-- Car Rentals Today -->
            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/10 flex flex-col justify-between group hover:border-secondary/30 transition-colors">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-secondary-container/20 text-secondary rounded-lg">
                        <span class="material-symbols-outlined" data-icon="directions_car">directions_car</span>
                    </div>
                    <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded">+8%</span>
                </div>
                <div>
                    <p class="text-slate-500 font-label text-xs font-semibold uppercase tracking-wider">Car Rentals
                        Today</p>
                    <h3 class="text-2xl font-extrabold font-headline mt-1">28</h3>
                </div>
            </div>
            <!-- Upcoming Events -->
            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/10 flex flex-col justify-between group hover:border-secondary/30 transition-colors">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-tertiary-fixed-dim/20 text-on-tertiary-fixed-variant rounded-lg">
                        <span class="material-symbols-outlined" data-icon="celebration">celebration</span>
                    </div>
                    <span class="text-xs font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded">Next 7 Days</span>
                </div>
                <div>
                    <p class="text-slate-500 font-label text-xs font-semibold uppercase tracking-wider">Upcoming
                        Events</p>
                    <h3 class="text-2xl font-extrabold font-headline mt-1">12</h3>
                </div>
            </div>
        </div>
        <!-- Revenue Chart & Quick Actions Row -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Revenue Chart Simulation -->
            <div class="lg:col-span-2 bg-surface-container-lowest p-8 rounded-xl border border-outline-variant/10">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-lg font-bold font-headline">Revenue Performance</h3>
                    <div class="flex gap-2">
<span class="inline-flex items-center gap-1.5 text-xs font-label text-slate-500">
<span class="w-2.5 h-2.5 rounded-full bg-secondary"></span> Accommodations
                            </span>
                        <span class="inline-flex items-center gap-1.5 text-xs font-label text-slate-500">
<span class="w-2.5 h-2.5 rounded-full bg-secondary-container"></span> Prestige
                            </span>
                    </div>
                </div>
                <!-- Chart Placeholder Visual -->
                <div class="h-64 flex items-end justify-between gap-4 relative">
                    <div class="absolute inset-0 flex flex-col justify-between pointer-events-none">
                        <div class="border-t border-slate-100 w-full h-px"></div>
                        <div class="border-t border-slate-100 w-full h-px"></div>
                        <div class="border-t border-slate-100 w-full h-px"></div>
                        <div class="border-t border-slate-100 w-full h-px"></div>
                    </div>
                    <div class="flex-1 flex flex-col justify-end items-center group cursor-pointer h-full z-10">
                        <div class="w-full bg-secondary-container/30 rounded-t-sm h-1/2 group-hover:bg-secondary-container/50 transition-colors"></div>
                        <div class="w-full bg-secondary rounded-t-sm h-1/3 mt-[-10%] group-hover:bg-secondary/80 transition-colors"></div>
                        <p class="text-[10px] font-label mt-2 text-slate-400">JAN</p>
                    </div>
                    <div class="flex-1 flex flex-col justify-end items-center group cursor-pointer h-full z-10">
                        <div class="w-full bg-secondary-container/30 rounded-t-sm h-3/5 group-hover:bg-secondary-container/50 transition-colors"></div>
                        <div class="w-full bg-secondary rounded-t-sm h-2/5 mt-[-10%] group-hover:bg-secondary/80 transition-colors"></div>
                        <p class="text-[10px] font-label mt-2 text-slate-400">FEB</p>
                    </div>
                    <div class="flex-1 flex flex-col justify-end items-center group cursor-pointer h-full z-10">
                        <div class="w-full bg-secondary-container/30 rounded-t-sm h-2/3 group-hover:bg-secondary-container/50 transition-colors"></div>
                        <div class="w-full bg-secondary rounded-t-sm h-1/2 mt-[-10%] group-hover:bg-secondary/80 transition-colors"></div>
                        <p class="text-[10px] font-label mt-2 text-slate-400">MAR</p>
                    </div>
                    <div class="flex-1 flex flex-col justify-end items-center group cursor-pointer h-full z-10">
                        <div class="w-full bg-secondary-container/30 rounded-t-sm h-4/5 group-hover:bg-secondary-container/50 transition-colors"></div>
                        <div class="w-full bg-secondary rounded-t-sm h-3/5 mt-[-10%] group-hover:bg-secondary/80 transition-colors"></div>
                        <p class="text-[10px] font-label mt-2 text-slate-400">APR</p>
                    </div>
                    <div class="flex-1 flex flex-col justify-end items-center group cursor-pointer h-full z-10">
                        <div class="w-full bg-secondary-container/30 rounded-t-sm h-3/4 group-hover:bg-secondary-container/50 transition-colors"></div>
                        <div class="w-full bg-secondary rounded-t-sm h-2/3 mt-[-10%] group-hover:bg-secondary/80 transition-colors"></div>
                        <p class="text-[10px] font-label mt-2 text-slate-400">MAY</p>
                    </div>
                    <div class="flex-1 flex flex-col justify-end items-center group cursor-pointer h-full z-10">
                        <div class="w-full bg-secondary-container/30 rounded-t-sm h-[90%] group-hover:bg-secondary-container/50 transition-colors"></div>
                        <div class="w-full bg-secondary rounded-t-sm h-3/4 mt-[-10%] group-hover:bg-secondary/80 transition-colors"></div>
                        <p class="text-[10px] font-label mt-2 text-secondary font-bold">JUN</p>
                    </div>
                </div>
            </div>
            <!-- Quick Actions Section -->
            <div class="bg-secondary p-8 rounded-xl flex flex-col gap-6 text-on-secondary shadow-lg">
                <h3 class="text-lg font-bold font-headline">Quick Actions</h3>
                <div class="space-y-4">
                    <button class="w-full flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 rounded-lg transition-all border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined" data-icon="add_home">add_home</span>
                            <span class="font-body font-medium">Add Property</span>
                        </div>
                        <span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 rounded-lg transition-all border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined" data-icon="add_road">add_road</span>
                            <span class="font-body font-medium">Add Vehicle</span>
                        </div>
                        <span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 rounded-lg transition-all border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined" data-icon="add_reaction">add_reaction</span>
                            <span class="font-body font-medium">Create Event</span>
                        </div>
                        <span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
                    </button>
                </div>
                <div class="mt-auto">
                    <p class="text-xs opacity-70 italic">Need assistance? Contact IT Support at ext. 404</p>
                </div>
            </div>
        </div>
        <!-- Upcoming Arrivals Table -->
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/10 overflow-hidden">
            <div class="px-8 py-6 border-b border-outline-variant/10 flex justify-between items-center">
                <h3 class="text-lg font-bold font-headline">Upcoming Arrivals</h3>
                <a class="text-secondary font-label text-sm font-semibold hover:underline" href="#">View All Arrivals
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-surface-container-low/50">
                        <th class="px-8 py-4 font-label text-xs font-bold text-slate-500 uppercase tracking-widest">
                            Guest Name
                        </th>
                        <th class="px-8 py-4 font-label text-xs font-bold text-slate-500 uppercase tracking-widest">
                            Property / Service
                        </th>
                        <th class="px-8 py-4 font-label text-xs font-bold text-slate-500 uppercase tracking-widest">
                            Arrival Date
                        </th>
                        <th class="px-8 py-4 font-label text-xs font-bold text-slate-500 uppercase tracking-widest">
                            Duration
                        </th>
                        <th class="px-8 py-4 font-label text-xs font-bold text-slate-500 uppercase tracking-widest">
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/10 font-body text-sm">
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-secondary/10 rounded-full flex items-center justify-center text-secondary font-bold text-xs">
                                    JM
                                </div>
                                <span class="font-semibold">Julianna Meyer</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-on-surface-variant">Azure Bay Villa, Camps Bay</td>
                        <td class="px-8 py-5">14 Oct 2023</td>
                        <td class="px-8 py-5">5 Nights</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Confirmed</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-on-primary-container/10 rounded-full flex items-center justify-center text-on-primary-container font-bold text-xs">
                                    BT
                                </div>
                                <span class="font-semibold">Ben Thompson</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-on-surface-variant">Audi R8 Rental + Chauffeur</td>
                        <td class="px-8 py-5">15 Oct 2023</td>
                        <td class="px-8 py-5">2 Days</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">In Progress</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-tertiary-fixed-dim/20 rounded-full flex items-center justify-center text-on-tertiary-fixed-variant font-bold text-xs">
                                    SL
                                </div>
                                <span class="font-semibold">Sizwe Luthuli</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-on-surface-variant">Vineyard Jazz Night (Table 4)</td>
                        <td class="px-8 py-5">15 Oct 2023</td>
                        <td class="px-8 py-5">1 Night</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Confirmed</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-slate-200 rounded-full flex items-center justify-center text-slate-600 font-bold text-xs">
                                    EK
                                </div>
                                <span class="font-semibold">Elena Kovic</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-on-surface-variant">Mountain Retreat Loft</td>
                        <td class="px-8 py-5">18 Oct 2023</td>
                        <td class="px-8 py-5">7 Nights</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-bold">Pending Dep.</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Atmosphere Image Footer Section (Editorial Flow) -->
        <div class="relative h-64 rounded-xl overflow-hidden mt-12 group">
            <img alt="Cape Town Luxury"
                 class="w-full h-full object-cover grayscale-[0.2] group-hover:scale-105 transition-transform duration-700"
                 data-alt="dramatic aerial view of Cape Town coastline with the Twelve Apostles mountains at sunset, glowing golden light reflecting off the ocean"
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEXDr1vsITaUzDbonv0WQFY6cBt3W3dSINESDoLGhpomdBa8vY95nwJgfq0IBlsE0oZ_IoHlX52Zj8-I1VCueZa78Q3RrRBXOytoL01QCVViZshmhCGcQqB9Nx7xaEnAuPn-voXkwMhZzs6V21EljBPK3JmJaR55izqy6OROBDPcETGo1iB_J-aT42k2K4VJSozeQxe4NSMD-oVq7ShDC70CNjOKb_RWJ22Mkozmj4dqIi7kLc4tT38lTBQM6rg4U0OptI0_Iv2Co"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex items-end p-12">
                <div class="max-w-2xl">
                    <h4 class="text-3xl font-extrabold font-headline text-white leading-tight">Elevate the Guest
                        Experience.</h4>
                    <p class="text-white/80 font-body mt-2">Our mission is to curate the finest experiences in the Cape.
                        Keep the platform updated to ensure seamless luxury for every visitor.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Spacer for flow -->
    <div class="h-12"></div>
</main></body></html>

{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
