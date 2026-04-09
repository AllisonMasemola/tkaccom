<!DOCTYPE html>

<html class="light" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>TK Cape Accom - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "on-error-container": "#93000a",
              "surface-dim": "#dadada",
              "error": "#ba1a1a",
              "on-secondary-fixed": "#00006e",
              "secondary-fixed-dim": "#bfc2ff",
              "surface-container-lowest": "#ffffff",
              "on-tertiary-fixed-variant": "#842419",
              "on-primary-fixed-variant": "#930010",
              "surface-container-high": "#e8e8e8",
              "surface-container": "#eeeeee",
              "outline-variant": "#c6c5d5",
              "primary": "#2b0001",
              "on-tertiary-container": "#e06857",
              "surface": "#f9f9f9",
              "on-secondary-fixed-variant": "#3037aa",
              "on-secondary-container": "#111692",
              "on-primary-container": "#fb4d48",
              "inverse-on-surface": "#f1f1f1",
              "tertiary-fixed-dim": "#ffb4a8",
              "surface-tint": "#ba1a20",
              "primary-container": "#530005",
              "primary-fixed": "#ffdad6",
              "on-error": "#ffffff",
              "background": "#f9f9f9",
              "surface-container-low": "#f3f3f3",
              "on-tertiary": "#ffffff",
              "on-surface": "#1a1c1c",
              "inverse-primary": "#ffb3ac",
              "primary-fixed-dim": "#ffb3ac",
              "on-tertiary-fixed": "#410000",
              "on-background": "#1a1c1c",
              "error-container": "#ffdad6",
              "secondary": "#4951c3",
              "on-surface-variant": "#454653",
              "on-primary": "#ffffff",
              "surface-variant": "#e2e2e2",
              "secondary-container": "#838bff",
              "secondary-fixed": "#e0e0ff",
              "surface-bright": "#f9f9f9",
              "outline": "#767684",
              "tertiary-container": "#540000",
              "on-secondary": "#ffffff",
              "tertiary": "#2c0000",
              "surface-container-highest": "#e2e2e2",
              "tertiary-fixed": "#ffdad4",
              "on-primary-fixed": "#410003",
              "inverse-surface": "#2f3131"
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
            display: inline-block;
            vertical-align: middle;
        }
        body { font-family: 'Work Sans', sans-serif; }
        h1, h2, h3, .font-headline { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface">
<div class="flex min-h-screen">
    <!-- SideNavBar -->
    <aside class="hidden md:flex flex-col h-screen w-64 border-r-0 bg-[#f3f3f3] dark:bg-slate-900 py-6 sticky top-0">
        <div class="px-6 mb-10">
            <h1 class="text-xl font-bold text-[#00008B] dark:text-white tracking-tighter">TK Cape Accom</h1>
            <p class="text-xs text-slate-500 font-label">Admin Dashboard</p>
        </div>
        <nav class="flex-1 space-y-1">
            <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                Overview
            </a>
            <a class="bg-gradient-to-r from-[#4951c3] to-[#838bff] text-white rounded-md mx-2 px-4 py-3 flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">
                <span class="material-symbols-outlined">bed</span>
                Accommodations
            </a>
            <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">
                <span class="material-symbols-outlined">auto_awesome</span>
                Prestige Movement
            </a>
            <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">
                <span class="material-symbols-outlined">event</span>
                Events
            </a>
            <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">
                <span class="material-symbols-outlined">calendar_month</span>
                Bookings
            </a>
        </nav>
        <div class="mt-auto pt-6 border-t border-[#eeeeee] dark:border-slate-800 space-y-1">
            <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">
                <span class="material-symbols-outlined">settings</span>
                Settings
            </a>
            <a class="text-slate-600 dark:text-slate-400 hover:text-[#4951c3] mx-2 px-4 py-3 transition-colors flex items-center gap-3 font-manrope text-sm font-semibold tracking-tight" href="#">
                <span class="material-symbols-outlined">help</span>
                Support
            </a>
        </div>
    </aside>
