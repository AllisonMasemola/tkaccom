
<!DOCTYPE html>

<html lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Work+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "outline": "#767684",
                        "on-tertiary-fixed": "#410000",
                        "tertiary-fixed": "#ffdad4",
                        "surface-variant": "#e2e2e2",
                        "on-primary": "#ffffff",
                        "primary": "#0000ff", // change this color
                        "secondary-fixed": "#e0e0ff",
                        "primary-container": "#D32F2F",
                        "on-primary-fixed": "#410003",
                        "secondary-fixed-dim": "#bfc2ff",
                        "surface-container-high": "#e8e8e8",
                        "surface-container": "#eeeeee",
                        "primary-fixed-dim": "#ffb3ac",
                        "on-error-container": "#93000a",
                        "tertiary-container": "#540000",
                        "error": "#ba1a1a",
                        "surface": "#f9f9f9",
                        "secondary": "#00008B                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ",
                        "inverse-on-surface": "#f1f1f1",
                        "on-secondary-container": "#111692",
                        "background": "#f9f9f9",
                        "surface-tint": "#ba1a20",
                        "on-background": "#1a1c1c",
                        "inverse-surface": "#2f3131",
                        "surface-container-lowest": "#ffffff",
                        "secondary-container": "#838bff",
                        "tertiary": "#2c0000",
                        "surface-bright": "#f9f9f9",
                        "outline-variant": "#c6c5d5",
                        "on-secondary-fixed-variant": "#3037aa",
                        "surface-dim": "#dadada",
                        "on-secondary-fixed": "#00006e",
                        "on-tertiary-fixed-variant": "#842419",
                        "primary-fixed": "#ffdad6",
                        "inverse-primary": "#ffb3ac",
                        "error-container": "#ffdad6",
                        "tertiary-fixed-dim": "#ffb4a8",
                        "on-primary-fixed-variant": "#930010",
                        "on-surface-variant": "#454653",
                        "on-primary-container": "#fb4d48",
                        "surface-container-low": "#f3f3f3",
                        "on-secondary": "#ffffff",
                        "on-surface": "#1a1c1c",
                        "surface-container-highest": "#e2e2e2",
                        "on-tertiary-container": "#e06857",
                        "on-error": "#ffffff",
                        "on-tertiary": "#ffffff"
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
            vertical-align: middle;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface">
<!-- TopNavBar -->
@php
    $activeClass   = 'font-headline font-bold tracking-tight uppercase text-sm text-slate-600 hover:text-blue-600 transition-colors';
    $inactiveClass = 'text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight';
@endphp
<nav class="fixed top-0 w-full z-50 glass-nav border-none shadow-sm">
    <div class="flex justify-between items-center w-full px-8 py-4 max-w-7xl mx-auto">
        <div class="flex shrink-0 items-center">
            <img src="{{ asset('pics/logo/logo.png') }}" alt="TTK Cape Accommodation Logo" class="h-8 w-auto" />
        </div>
        <div class="text-2xl font-black tracking-tighter text-slate-900">TK Cape Accommodation</div>
        <div class="hidden md:flex items-center space-x-8">
            <a class="{{ request()->routeIs('home') ? $activeClass : $inactiveClass }}" href="{{ route('home') }}">Home</a>
            <a class="{{ request()->routeIs('accommodation') ? $activeClass : $inactiveClass }}" href="{{ route('accommodation') }}">Accommodations</a>
            <a class="{{ request()->routeIs('transport') ? $activeClass : $inactiveClass }}" href="{{ route('transport') }}">Prestige Movement</a>
            <a class="{{ request()->routeIs('events') ? $activeClass : $inactiveClass }}" href="{{ route('events') }}">Events</a>
        </div>
        <a href="{{ route('contact') }}" class="bg-gradient-to-r from-secondary to-secondary-container text-white px-6 py-2.5 rounded-lg font-headline font-bold tracking-tight uppercase text-xs hover:opacity-80 transition-opacity duration-300 active:scale-95">
            Contact
        </a>
    </div>
</nav>
