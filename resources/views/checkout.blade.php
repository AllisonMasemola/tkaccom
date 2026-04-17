@include('partials/header')

@php
  $isAccommodation = $bookableType === 'accommodation';
  $displayName     = $isAccommodation ? $bookable->name : $bookable->car_name;
  $typeLabel       = $isAccommodation ? 'Accommodation' : 'Prestige Vehicle';
  $unitLabel       = $isAccommodation ? '/ night' : '/ day';

  $thumbnail = null;
  if ($isAccommodation) {
    $imgs      = is_array($bookable->images) ? $bookable->images : json_decode($bookable->images, true);
    $thumbnail = count($imgs ?? []) > 0 ? asset('storage/' . $imgs[0]) : null;
  } else {
    $imgs      = is_array($bookable->image) ? $bookable->image : json_decode($bookable->image, true);
    $thumbnail = count($imgs ?? []) > 0 ? asset('storage/' . $imgs[0]) : null;
  }

  $thumbnail = $thumbnail ?? 'https://placehold.co/600x450?text=No+Image';
  $now       = now()->format('Y-m-d\TH:i');
@endphp

<main class="max-w-7xl mx-auto px-8 py-12 md:py-20">
  <!-- Back Link -->
  <div class="mb-10">
    <a class="inline-flex items-center text-secondary font-medium hover:underline transition-all group"
       href="{{ url()->previous() }}">
      <span class="material-symbols-outlined text-sm mr-2 transition-transform group-hover:-translate-x-1">arrow_back</span>
      Back
    </a>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
    <!-- Left Column: Checkout Form -->
    <div class="lg:col-span-7 space-y-16">
      <!-- Progress Bar -->
      <div class="flex items-center justify-between w-full max-w-md">
        <div class="flex flex-col items-center gap-2">
          <div class="w-10 h-10 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-bold text-sm">1</div>
          <span class="text-xs font-bold font-label text-secondary uppercase tracking-widest">Guest Details</span>
        </div>
        <div class="h-[2px] flex-1 bg-outline-variant/30 mx-4 self-center -mt-6"></div>
        <div class="flex flex-col items-center gap-2">
          <div class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-bold text-sm">2</div>
          <span class="text-xs font-bold font-label text-on-surface-variant uppercase tracking-widest">Review</span>
        </div>
        <div class="h-[2px] flex-1 bg-outline-variant/30 mx-4 self-center -mt-6"></div>
        <div class="flex flex-col items-center gap-2">
          <div class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-bold text-sm">3</div>
          <span class="text-xs font-bold font-label text-on-surface-variant uppercase tracking-widest">Confirmation</span>
        </div>
      </div>

      <!-- Guest Details Form -->
      <section>
        <h2 class="text-4xl font-extrabold tracking-tight mb-8 text-on-surface">Guest Information</h2>

        <form class="space-y-8" action="{{ route('bookings.store') }}" method="POST">
          @csrf

          {{-- Polymorphic booking context — tells the controller what is being booked --}}
          <input type="hidden" name="bookable_type" value="{{ $bookableType }}">
          <input type="hidden" name="bookable_id"   value="{{ $bookable->id }}">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Full Name -->
            <div class="relative">
              <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Full Name</label>
              <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim @error('customer_name') border-error @enderror"
                     name="customer_name"
                     placeholder="Johnathan Doe"
                     type="text"
                     value="{{ old('customer_name') }}"/>
              @error('customer_name')
                <p class="text-xs text-error mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Email -->
            <div class="relative">
              <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Email Address</label>
              <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim @error('customer_email') border-error @enderror"
                     name="customer_email"
                     placeholder="john@example.com"
                     type="email"
                     value="{{ old('customer_email') }}"/>
              @error('customer_email')
                <p class="text-xs text-error mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Phone -->
            <div class="relative md:col-span-2">
              <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Phone Number</label>
              <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim @error('customer_phone') border-error @enderror"
                     name="customer_phone"
                     placeholder="+27 00 000 0000"
                     type="tel"
                     value="{{ old('customer_phone') }}"/>
              @error('customer_phone')
                <p class="text-xs text-error mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Dates -->
            <div class="relative">
              <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Check In</label>
              <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors @error('date_in') border-error @enderror"
                     id="date_in"
                     type="datetime-local"
                     name="date_in"
                     value="{{ old('date_in', $now) }}"/>
              @error('date_in')
                <p class="text-xs text-error mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="relative">
              <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Check Out</label>
              <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors @error('date_out') border-error @enderror"
                     id="date_out"
                     type="datetime-local"
                     name="date_out"
                     value="{{ old('date_out', $now) }}"/>
              @error('date_out')
                <p class="text-xs text-error mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Optional second notification email -->
            <div class="relative md:col-span-2">
              <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">
                Additional Notification Email <span class="normal-case font-normal text-on-surface-variant">(optional)</span>
              </label>
              <input class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim"
                     name="email_notification"
                     placeholder="partner@example.com"
                     type="email"
                     value="{{ old('email_notification') }}"/>
            </div>

            <!-- Special Requests -->
            <div class="relative md:col-span-2">
              <label class="block text-xs font-bold text-outline uppercase tracking-wider mb-2">Special Requests</label>
              <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/40 py-3 focus:ring-0 focus:border-secondary transition-colors placeholder:text-surface-dim resize-none"
                        name="special_request"
                        placeholder="Dietary requirements, preferred check-in time, or occasion..."
                        rows="3">{{ old('special_request') }}</textarea>
            </div>
          </div>

          <button type="submit"
                  class="w-full bg-secondary text-on-secondary py-4 rounded-xl flex items-center justify-center gap-2 hover:opacity-90 transition-opacity font-bold tracking-tight text-lg">
            Request Booking
          </button>
        </form>
      </section>
    </div>

    <!-- Right Column: Order Summary -->
    <aside class="lg:col-span-5">
      <div class="sticky top-32 bg-surface-container-lowest p-8 border border-outline-variant/10 shadow-2xl rounded-sm">
        <h3 class="text-2xl font-extrabold mb-8 tracking-tight border-b border-outline-variant/10 pb-4">Your Selection</h3>

        <div class="space-y-8">
          <!-- Bookable Summary -->
          <div class="flex gap-4">
            <div class="w-24 h-24 rounded-xl overflow-hidden flex-shrink-0">
              <img class="w-full h-full object-cover" src="{{ $thumbnail }}" alt="{{ $displayName }}"/>
            </div>
            <div>
              <span class="text-xs font-bold text-outline uppercase tracking-widest">{{ $typeLabel }}</span>
              <h4 class="font-bold text-lg mt-1">{{ $displayName }}</h4>
              @if($isAccommodation && $bookable->location)
                <p class="text-sm text-on-surface-variant flex items-center mt-1">
                  <span class="material-symbols-outlined text-sm mr-1">location_on</span>
                  {{ $bookable->location }}
                </p>
              @elseif(!$isAccommodation)
                <p class="text-sm text-on-surface-variant mt-1">
                  {{ $bookable->make }} · {{ $bookable->year }}
                </p>
              @endif
            </div>
          </div>

          <!-- Pricing breakdown -->
          <div class="space-y-4 pt-6 border-t border-outline-variant/10"
               data-price="{{ $bookable->price }}"
               data-unit="{{ $isAccommodation ? 'night' : 'day' }}">
            <div class="flex justify-between text-sm">
              <span class="text-on-surface-variant">Rate</span>
              <span class="font-medium">R{{ number_format($bookable->price, 2) }} {{ $unitLabel }}</span>
            </div>
            {{-- Duration row — hidden until both dates are valid --}}
            <div id="duration-row" class="justify-between text-sm text-on-surface-variant hidden">
              <span id="duration-label">0 nights</span>
              <span id="duration-rate"></span>
            </div>
            {{-- Total row --}}
            <div class="flex justify-between items-center pt-3 border-t border-outline-variant/10">
              <span class="text-sm font-bold text-on-surface">Grand Total</span>
              <span id="total-price" class="text-lg font-extrabold text-secondary">
                —
              </span>
            </div>
          </div>

          @if($isAccommodation && $bookable->rooms)
            <div class="flex gap-6 pt-4 border-t border-outline-variant/10 text-sm text-on-surface-variant">
              <span><strong class="text-on-surface">{{ $bookable->rooms }}</strong> Rooms</span>
              @if($bookable->bathrooms)
                <span><strong class="text-on-surface">{{ $bookable->bathrooms }}</strong> Baths</span>
              @endif
              @if($bookable->parking)
                <span><strong class="text-on-surface">Parking</strong> included</span>
              @endif
            </div>
          @elseif(!$isAccommodation)
            <div class="flex gap-6 pt-4 border-t border-outline-variant/10 text-sm text-on-surface-variant">
              @if($bookable->transmission)
                <span><strong class="text-on-surface">{{ $bookable->transmission }}</strong></span>
              @endif
              @if($bookable->seats)
                <span><strong class="text-on-surface">{{ $bookable->seats }}</strong> seats</span>
              @endif
            </div>
          @endif
        </div>

        <div class="mt-8 flex items-center gap-3 text-on-surface-variant/60">
          <span class="material-symbols-outlined text-sm">info</span>
          <p class="text-[10px] leading-relaxed">
            No payment is taken now. Your booking request will be reviewed by our team, and you'll receive a confirmation email with a payment link.
          </p>
        </div>
      </div>
    </aside>
  </div>
</main>

@include('partials/footer')

<script>
  (function () {
    const dateIn    = document.getElementById('date_in');
    const dateOut   = document.getElementById('date_out');
    const pricing   = document.querySelector('[data-price]');

    if (!dateIn || !dateOut || !pricing) return;

    const ratePerUnit = parseFloat(pricing.dataset.price);
    const unit        = pricing.dataset.unit; // 'night' | 'day'

    const durationRow  = document.getElementById('duration-row');
    const durationLabel = document.getElementById('duration-label');
    const durationRate  = document.getElementById('duration-rate');
    const totalPrice    = document.getElementById('total-price');

    function formatZAR(amount) {
      return 'R' + amount.toLocaleString('en-ZA', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function recalculate() {
      const inVal  = dateIn.value;
      const outVal = dateOut.value;

      // Both dates must be filled and check-out must be after check-in.
      if (!inVal || !outVal) {
        totalPrice.textContent = '—';
        durationRow.classList.remove('flex');
        durationRow.classList.add('hidden');
        return;
      }

      const msIn   = new Date(inVal).getTime();
      const msOut  = new Date(outVal).getTime();
      const diffMs = msOut - msIn;

      if (diffMs <= 0) {
        totalPrice.textContent = '—';
        durationRow.classList.remove('flex');
        durationRow.classList.add('hidden');
        dateOut.setCustomValidity('Check-out must be after check-in.');
        return;
      }

      dateOut.setCustomValidity('');

      // Round up any partial day/night to a full unit.
      const units = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
      const total = ratePerUnit * units;

      durationLabel.textContent = units + ' ' + (units === 1 ? unit : unit + 's');
      durationRate.textContent  = formatZAR(ratePerUnit) + ' × ' + units;
      // Swap hidden for flex to reveal the duration row.
      durationRow.classList.remove('hidden');
      durationRow.classList.add('flex');
      totalPrice.textContent = formatZAR(total);
    }

    dateIn.addEventListener('change', recalculate);
    dateOut.addEventListener('change', recalculate);

    // Run on load in case old() values are restored after validation failure.
    recalculate();
  })();
</script>
