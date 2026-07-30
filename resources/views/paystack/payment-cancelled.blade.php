@include('partials/header')

@php
  $isAccommodation = str_ends_with($booking->bookable_type, 'Accommodation');
  $displayName     = $isAccommodation ? $booking->bookable?->name : $booking->bookable?->car_name;
  $typeLabel       = $isAccommodation ? 'Accommodation' : 'Prestige Vehicle';
@endphp

<main class="max-w-3xl mx-auto px-8 py-24 text-center">
  <!-- Cancelled Icon -->
  <div class="w-20 h-20 rounded-full bg-error/10 flex items-center justify-center mx-auto mb-8">
    <span class="material-symbols-outlined text-error text-4xl" style="font-variation-settings: 'FILL' 1;">
      cancel
    </span>
  </div>

  <h1 class="text-4xl font-extrabold tracking-tight text-on-surface mb-4">Payment Cancelled</h1>
  <p class="text-on-surface-variant text-lg mb-12 leading-relaxed">
    You cancelled the payment. Your booking is still confirmed — you can complete payment anytime using
    the link in your confirmation email sent to <strong>{{ $booking->customer_email }}</strong>.
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
        <span class="font-bold text-on-surface">Amount Due</span>
        <span class="font-extrabold text-secondary">R{{ number_format($booking->total_amount, 2) }}</span>
      </div>
    @endif

    <div class="flex justify-between text-sm pt-1">
      <span class="text-on-surface-variant">Payment Status</span>
      <span class="inline-flex items-center gap-1 text-xs font-bold bg-error/10 text-error px-2 py-1 rounded-full uppercase tracking-tighter">
        <span class="w-1.5 h-1.5 rounded-full bg-error inline-block"></span>
        Unpaid
      </span>
    </div>
  </div>

  <div class="bg-surface-container-high rounded-xl p-6 text-left mb-12">
    <div class="flex items-start gap-3">
      <span class="material-symbols-outlined text-secondary text-xl mt-0.5">info</span>
      <p class="text-sm text-on-surface-variant leading-relaxed">
        Your booking reservation is still held. Use the payment link in your confirmation email to
        complete your payment. If you need help, contact us with reference
        <strong class="text-on-surface font-mono">{{ $booking->booking_id }}</strong>.
      </p>
    </div>
  </div>

  <div class="flex items-center justify-center gap-6">
    <a href="{{ route('booking.payment', $booking->booking_id) }}"
       class="inline-flex items-center gap-2 bg-secondary text-on-secondary px-6 py-3 rounded-full font-medium hover:opacity-90 transition-all">
      <span class="material-symbols-outlined text-sm">payments</span>
      Try Payment Again
    </a>

    <a href="{{ route('home') }}"
       class="inline-flex items-center gap-2 text-secondary font-medium hover:underline transition-all">
      <span class="material-symbols-outlined text-sm">arrow_back</span>
      Back to Home
    </a>
  </div>
</main>

@include('partials/footer')

