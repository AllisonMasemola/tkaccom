@include('partials/header')

@php
  $isAccommodation = str_ends_with($booking->bookable_type, 'Accommodation');
  $displayName     = $isAccommodation ? $booking->bookable?->name : $booking->bookable?->car_name;
  $typeLabel       = $isAccommodation ? 'Accommodation' : 'Prestige Vehicle';
@endphp

<main class="max-w-3xl mx-auto px-8 py-24 text-center">
  <!-- Processing Icon -->
  <div class="w-20 h-20 rounded-full bg-secondary/10 flex items-center justify-center mx-auto mb-8">
    <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings: 'FILL' 1;">
      payments
    </span>
  </div>

  <h1 class="text-4xl font-extrabold tracking-tight text-on-surface mb-4">Payment Received</h1>
  <p class="text-on-surface-variant text-lg mb-12 leading-relaxed">
    Thank you! Your payment is being processed. You'll receive a confirmation email at
    <strong>{{ $booking->customer_email }}</strong> once it's verified.
  </p>

  <!-- Booking Summary Card -->
  <div class="bg-surface-container-lowest border border-outline-variant/10 rounded-xl p-8 text-left space-y-4 mb-12 shadow-sm">
    <h2 class="text-sm font-bold uppercase tracking-widest text-outline border-b border-outline-variant/10 pb-4 mb-6">
      Booking Summary
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

    @if($booking->total_amount)
      <div class="flex justify-between text-sm pt-3 border-t border-outline-variant/10">
        <span class="font-bold text-on-surface">Amount Paid</span>
        <span class="font-extrabold text-secondary">R{{ number_format($booking->total_amount, 2) }}</span>
      </div>
    @endif
  </div>

  {{-- Note: payment_status is updated by the PayFast IPN (server-to-server),
       not by this page. The IPN may arrive slightly after the browser redirect,
       so we avoid showing a status that could be stale. --}}
  <div class="bg-surface-container-high rounded-xl p-6 text-left mb-12">
    <div class="flex items-start gap-3">
      <span class="material-symbols-outlined text-secondary text-xl mt-0.5">schedule</span>
      <p class="text-sm text-on-surface-variant leading-relaxed">
        Payment confirmation typically arrives within a few minutes. If you don't receive an email, please
        check your spam folder or contact us with your booking reference
        <strong class="text-on-surface font-mono">{{ $booking->booking_id }}</strong>.
      </p>
    </div>
  </div>

  <a href="{{ route('home') }}"
     class="inline-flex items-center gap-2 text-secondary font-medium hover:underline transition-all">
    <span class="material-symbols-outlined text-sm">arrow_back</span>
    Back to Home
  </a>
</main>

@include('partials/footer')
