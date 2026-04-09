{{--<x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}

        <!DOCTYPE html>

<html class="light" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Sign In | TK Cape Accom</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work_Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "surface-tint": "#ba1a20",
              "primary-container": "#530005",
              "tertiary-fixed-dim": "#ffb4a8",
              "on-error": "#ffffff",
              "background": "#f9f9f9",
              "primary-fixed": "#ffdad6",
              "on-primary-container": "#fb4d48",
              "inverse-on-surface": "#f1f1f1",
              "surface-container-low": "#f3f3f3",
              "on-secondary-fixed": "#00006e",
              "secondary-fixed-dim": "#bfc2ff",
              "surface-dim": "#dadada",
              "error": "#ba1a1a",
              "on-error-container": "#93000a",
              "surface": "#f9f9f9",
              "on-secondary-fixed-variant": "#3037aa",
              "on-secondary-container": "#111692",
              "surface-container-high": "#e8e8e8",
              "surface-container": "#eeeeee",
              "surface-container-lowest": "#ffffff",
              "on-tertiary-fixed-variant": "#842419",
              "on-primary-fixed-variant": "#930010",
              "primary": "#2b0001",
              "on-tertiary-container": "#e06857",
              "outline-variant": "#c6c5d5",
              "on-secondary": "#ffffff",
              "tertiary-fixed": "#ffdad4",
              "on-primary-fixed": "#410003",
              "inverse-surface": "#2f3131",
              "tertiary": "#2c0000",
              "surface-container-highest": "#e2e2e2",
              "inverse-primary": "#ffb3ac",
              "secondary": "#4951c3",
              "on-surface-variant": "#454653",
              "primary-fixed-dim": "#ffb3ac",
              "on-tertiary-fixed": "#410000",
              "on-background": "#1a1c1c",
              "error-container": "#ffdad6",
              "on-tertiary": "#ffffff",
              "on-surface": "#1a1c1c",
              "outline": "#767684",
              "surface-bright": "#f9f9f9",
              "tertiary-container": "#540000",
              "surface-variant": "#e2e2e2",
              "secondary-container": "#838bff",
              "on-primary": "#ffffff",
              "secondary-fixed": "#e0e0ff"
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
        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface antialiased">
<!-- Login Shell Suppression: Per instructions, we suppress TopNavBar/BottomNavBar for transactional screens like Login. -->
<main class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Atmospheric Background Layer -->
    <div class="absolute inset-0 z-0">
        <img alt="" class="w-full h-full object-cover opacity-40 scale-105 blur-[2px]" data-alt="dramatic wide angle shot of Cape Town coastline with Twelve Apostles mountains under a soft hazy sunrise light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA3iF-EMNdSrGF4Nme1GSp4jnzUcSDULoZrS-UgBhuINZDL9ALrSembibHVBh4pfWmMehWIGw-_E_jmLRkfxnETYlAovAEqVXY9k4X1aQNBkqjURiPusv1zll269geoa_9u-coLnbS3MW_JgEslE12MkkHbk7-p539huNgfLej5XYCtOD6RP53dobBCRE3LfACdPsmQn6qmih5-jlRcBkOGbJOIL_ft22l3tKXaWImkaOJC_IbLQTnSlO8emcIDZZ6eyGNkzCDSP8U"/>
        <div class="absolute inset-0 bg-gradient-to-br from-surface via-transparent to-surface-container-low opacity-60"></div>
    </div>
    <!-- Content Container -->
    <div class="relative z-10 w-full max-w-xl px-6 py-12">
        <!-- Branding Anchor -->
        <div class="mb-10 text-center">
            <img alt="TK Cape Accom Logo" class="h-16 mx-auto mb-4" data-alt="elegant minimalist brand logo featuring clean sans-serif typography with a subtle coastal motif" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeHFfCTNtGINh5vB0yvMlUZhjSwWIIo3f7K4AJWax5aFRe9i2wTGG95R2NiibqAH2lJbm7LPPqyLzRyCBW5_n_vk2ijKP6eI4YyBXtg5-EdzmlQ4Jy6_ux2fRu6BRfI2G-CPNU3IotlU5ZYg6qL55PbF-4UEOY_ShKm8bbQ5VrmbvWtZ13wUrtw7tq80I3GRawhOGOzC_aeUkvTz0WU74qoEYuJFw3ApFYM4G75z-GuaBB5z99RN6r29cN2Scj44P4N6nX5EMGJEs"/>
            <h1 class="font-headline text-3xl font-extrabold tracking-tighter text-on-surface">
                TK Cape Accom
            </h1>
            <p class="font-body text-on-surface-variant mt-2 tracking-wide uppercase text-xs font-semibold opacity-60">
                The Coastal Curator
            </p>
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Central Login Card (Layering Principle) -->
        <div class="surface-container-lowest glass-panel shadow-[0_20px_40px_rgba(26,28,28,0.05)] rounded-sm p-8 md:p-12 transition-all duration-500">
            <div class="mb-8">
                <h2 class="font-headline text-2xl font-bold text-on-surface">Welcome Back</h2>
                <p class="font-body text-on-surface-variant mt-1 text-sm">Sign in to your curated collection of retreats.</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                <!-- Email Field -->
                <div class="space-y-1.5">
                    <label class="font-label text-xs font-semibold text-on-surface-variant uppercase tracking-widest" for="email">Email Address</label>
                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-secondary transition-colors py-3 px-0 font-body placeholder:text-outline/50" id="email" placeholder="your@email.com" :value="old('email')" name="email" required autofocus autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password Field -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center">
                        <label class="font-label text-xs font-semibold text-on-surface-variant uppercase tracking-widest" for="password">Password</label>
                        <a class="font-label text-xs font-medium text-secondary hover:underline underline-offset-4 transition-all" href="#">Forgot password?</a>
                    </div>
                    <input class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-secondary transition-colors py-3 px-0 font-body placeholder:text-outline/50" id="password" name="password" placeholder="••••••••" type="password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Actions -->
                <div class="flex items-center space-x-2 py-2">
                    <input class="h-4 w-4 rounded-sm border-outline-variant text-secondary focus:ring-secondary transition-all" id="remember" name="remember" type="checkbox"/>
                    <label class="font-label text-sm text-on-surface-variant" for="remember">Remember me for 30 days</label>
                </div>
                <!-- Sign In Button (Signature Gradient) -->
                <button class="w-full bg-gradient-to-r from-secondary to-secondary-container text-on-secondary font-headline font-bold py-4 rounded-lg shadow-lg shadow-secondary/20 hover:shadow-xl hover:shadow-secondary/30 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-[0.98]" type="submit">
                    Sign In
                </button>
            </form>
            <!-- Social Authentication -->
            <div class="mt-10">
                <div class="relative flex items-center mb-8">
                    <div class="flex-grow border-t border-outline-variant/20"></div>
                    <span class="flex-shrink mx-4 font-label text-[10px] uppercase tracking-[0.2em] text-outline font-bold">Or continue with</span>
                    <div class="flex-grow border-t border-outline-variant/20"></div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center space-x-3 py-3 border border-outline-variant/20 rounded-lg hover:bg-surface-container-low transition-colors duration-200">
                        <img alt="Google" class="w-5 h-5 grayscale opacity-70" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzDcRfs9prKCKy-iz1nmEmEglyViEMgki_GDvWQjCzveYIc63urg2SBRTqn8eoQzBaghOspk2AzbetEcgM3VD8oA2ZMUHXrS5GRk0mEO6uPlTLxQt-louYUukRybCWe00Ibno4Ji-jyMKzceaMkd78y-NXz0DhCo-mJVamH7JneCJ7HFNLVIBfVUE_LldSd1sChHJwZzw-Wf_biasqNYoHOLSMfLKY6YGLZ0_ltbZPg6AP5p-hibLWtj1LaziSvPS54WPdWCj_bQs"/>
                        <span class="font-label text-sm font-semibold text-on-surface">Google</span>
                    </button>
                    <button class="flex items-center justify-center space-x-3 py-3 border border-outline-variant/20 rounded-lg hover:bg-surface-container-low transition-colors duration-200">
                        <span class="material-symbols-outlined text-xl text-on-surface opacity-70">ios</span>
                        <span class="font-label text-sm font-semibold text-on-surface">Apple</span>
                    </button>
                </div>
            </div>
            <!-- Secondary Section: Create Account -->
            <div class="mt-12 text-center">
                <p class="font-body text-sm text-on-surface-variant">
                    New to the Cape?
                    <a class="font-label font-bold text-secondary ml-1 hover:underline underline-offset-4" href="#">Create an account</a>
                </p>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <!-- Focus Assist Link -->
        <div class="mt-8 text-center">
            <a class="inline-flex items-center text-xs font-label text-on-surface-variant hover:text-secondary transition-colors group" href="#">
                <span class="material-symbols-outlined text-sm mr-2 transition-transform group-hover:-translate-x-1">arrow_back</span>
                Back to Explore
            </a>
        </div>
    </div>
</main>
<!-- Shared Footer from JSON -->
<footer class="bg-slate-50 w-full py-12 px-8">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:flex lg:justify-between items-center gap-6">
        <div class="space-y-2">
            <p class="text-lg font-bold text-slate-900 font-headline">TK Cape Accom</p>
            <p class="font-['Work_Sans'] text-sm leading-relaxed text-slate-500">© 2024 TK Cape Accom. The Coastal Curator.</p>
        </div>
        <div class="flex flex-wrap gap-x-8 gap-y-4">
            <a class="font-['Work_Sans'] text-sm leading-relaxed text-slate-500 hover:underline decoration-indigo-500/30 underline-offset-4 transition-all duration-300 ease-in-out" href="#">Privacy Policy</a>
            <a class="font-['Work_Sans'] text-sm leading-relaxed text-slate-500 hover:underline decoration-indigo-500/30 underline-offset-4 transition-all duration-300 ease-in-out" href="#">Terms of Service</a>
            <a class="font-['Work_Sans'] text-sm leading-relaxed text-slate-500 hover:underline decoration-indigo-500/30 underline-offset-4 transition-all duration-300 ease-in-out" href="#">Contact Us</a>
            <a class="font-['Work_Sans'] text-sm leading-relaxed text-slate-500 hover:underline decoration-indigo-500/30 underline-offset-4 transition-all duration-300 ease-in-out" href="#">Sustainability</a>
        </div>
    </div>
</footer>
</body></html>
