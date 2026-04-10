@include('partials/header')

@php
  $isAccommodation = str_ends_with($booking->bookable_type, 'Accommodation');
  $displayName     = $isAccommodation ? $booking->bookable?->name : $booking->bookable?->car_name;
  $typeLabel       = $isAccommodation ? 'Accommodation' : 'Prestige Vehicle';
@endphp

<main class="max-w-3xl mx-auto px-8 py-24 text-center">
  <!-- Success Icon -->
  <div class="w-20 h-20 rounded-full bg-secondary/10 flex items-center justify-center mx-auto mb-8">
    <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
  </div>

  <h1 class="text-4xl font-extrabold tracking-tight text-on-surface mb-4">Booking Request Submitted</h1>
  <p class="text-on-surface-variant text-lg mb-12 leading-relaxed">
    Your request has been received and is being reviewed by our team. You'll get a confirmation email at
    <strong>{{ $booking->customer_email }}</strong> shortly.
  </p>

  <!-- Booking Summary Card -->
  <div class="bg-surface-container-lowest border border-outline-variant/10 rounded-xl p-8 text-left space-y-4 mb-12 shadow-sm">
    <h2 class="text-sm font-bold uppercase tracking-widest text-outline border-b border-outline-variant/10 pb-4 mb-6">
      Reference Summary
    </h2>

    <div class="flex justify-between text-sm">
      <span class="text-on-surface-variant">Booking Reference</span>
      <span class="font-bold font-mono text-secondary tracking-tight">{{ $booking->booking_id }}</span>
    </div>

    <div class="flex justify-between text-sm">
      <span class="text-on-surface-variant">Type</span>
      <span class="font-medium">{{ $typeLabel }}</span>
    </div>

    @if($displayName)
      <div class="flex justify-between text-sm">
        <span class="text-on-surface-variant">{{ $typeLabel }}</span>
        <span class="font-medium">{{ $displayName }}</span>
      </div>
    @endif

    <div class="flex justify-between text-sm">
      <span class="text-on-surface-variant">Check-in</span>
      <span class="font-medium">{{ $booking->date_in?->format('D, d M Y H:i') ?? '—' }}</span>
    </div>

    <div class="flex justify-between text-sm">
      <span class="text-on-surface-variant">Check-out</span>
      <span class="font-medium">{{ $booking->date_out?->format('D, d M Y H:i') ?? '—' }}</span>
    </div>

    <div class="flex justify-between text-sm">
      <span class="text-on-surface-variant">Status</span>
      <span class="inline-flex items-center gap-1 text-xs font-bold bg-secondary/10 text-secondary px-2 py-1 rounded-full uppercase tracking-tighter">
        <span class="w-1.5 h-1.5 rounded-full bg-secondary inline-block"></span>
        {{ ucfirst($booking->status) }}
      </span>
    </div>
  </div>

  <!-- What Happens Next -->
  <div class="text-left space-y-6 mb-12">
    <h3 class="text-xs font-bold uppercase tracking-widest text-outline">What Happens Next</h3>
    <ol class="space-y-4">
      <li class="flex items-start gap-4">
        <div class="w-7 h-7 rounded-full bg-secondary/10 text-secondary flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">1</div>
        <p class="text-sm text-on-surface-variant leading-relaxed">Our team reviews your request (usually within a few hours).</p>
      </li>
      <li class="flex items-start gap-4">
        <div class="w-7 h-7 rounded-full bg-secondary/10 text-secondary flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">2</div>
        <p class="text-sm text-on-surface-variant leading-relaxed">You'll receive a confirmation email with a secure payment link.</p>
      </li>
      <li class="flex items-start gap-4">
        <div class="w-7 h-7 rounded-full bg-secondary/10 text-secondary flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">3</div>
        <p class="text-sm text-on-surface-variant leading-relaxed">Complete your payment — your booking is then fully locked in.</p>
      </li>
    </ol>
  </div>

  <a href="{{ route('home') }}"
     class="inline-flex items-center gap-2 text-secondary font-medium hover:underline transition-all">
    <span class="material-symbols-outlined text-sm">arrow_back</span>
    Back to Home
  </a>
</main>

@include('partials/footer')
