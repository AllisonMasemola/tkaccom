@include('admin/parials.header')

{{-- Alpine x-data scoped to this column so the modal and table share state --}}
<div class="flex-1 flex flex-col min-w-0" x-data="bookingAdmin()">

    {{-- [x-cloak] hides Alpine-controlled elements before JS initialises --}}
    <style>[x-cloak]{display:none!important}</style>

    <!-- TopNavBar -->
    <header class="flex justify-between items-center w-full px-8 sticky top-0 z-40 bg-[#f9f9f9]/80 dark:bg-slate-950/80 backdrop-blur-md h-16 border-b border-[#1a1c1c]/10 dark:border-white/10">
        <div class="flex items-center gap-4 flex-1">
            <div class="relative w-full max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                <input class="w-full bg-surface-container-low border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-secondary/20"
                       placeholder="Search by reference, customer name or email..."
                       type="text"
                       x-model="search"
                       @input.debounce.300ms="filterTable()"/>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="p-2 text-slate-500 hover:text-[#4951c3] transition-colors">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <button class="p-2 text-slate-500 hover:text-[#4951c3] transition-colors">
                <span class="material-symbols-outlined">settings</span>
            </button>
            <div class="h-8 w-8 rounded-full overflow-hidden border border-outline-variant/20">
                <img alt="Admin User Profile" class="h-full w-full object-cover"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuCPvbUYpP_W2ngRxPYkyCM90pgYtNX50BhBMJKqYC37LnvVFKnVQbEbxqTy3IWdwrsDHnyTqMYeKCUzWFkazTGTFuYpv0Ai9VfEMDdeBEe59tt_2rLe3VNRIqe7F--9me1EE4G_DPUdKM0ywdx6pjWmkjdKHVTNVlR20VH-e7xpn8TwC_1tZhba3TFKXZzp-pUvHZMHNy7oyGmV46rs0wtwzQTZTgsVgwlWWPjnsMlAcBd08X508AYTxBZJL2s3WYRkkGfw5bsX1cE"/>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="p-8 space-y-10">

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-5 py-3 rounded-lg text-sm font-medium">
                <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1">check_circle</span>
                {{ session('success') }}
            </div>
        @endif
        @if(session('info'))
            <div class="flex items-center gap-3 bg-blue-50 border border-blue-200 text-blue-800 px-5 py-3 rounded-lg text-sm font-medium">
                <span class="material-symbols-outlined text-base">info</span>
                {{ session('info') }}
            </div>
        @endif

        <!-- Page Header -->
        <div class="flex justify-between items-end">
            <div class="space-y-1">
                <h2 class="text-3xl font-extrabold tracking-tight font-headline">Manage Bookings</h2>
                <p class="text-on-surface-variant font-body">
                    Review, confirm and respond to all guest booking requests.
                    @if($activeType)
                        Filtered by <span class="font-bold text-secondary capitalize">{{ $activeType }}</span>.
                    @endif
                </p>
            </div>
            {{-- Export placeholder (future) --}}
            <button class="bg-gradient-to-r from-secondary to-secondary-container text-white px-6 py-3 rounded-md font-semibold flex items-center gap-2 hover:opacity-90 transition-opacity active:scale-[0.98]">
                <span class="material-symbols-outlined">download</span>
                Export CSV
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- ── Bookings Table ── (lg:col-span-8 mirrors the property table) -->
            <div class="lg:col-span-8 bg-surface-container-lowest rounded-sm overflow-hidden border border-outline-variant/20">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="bookings-table">
                        <thead>
                            <tr class="bg-surface-container-low text-xs font-bold uppercase tracking-wider text-on-surface-variant">
                                <th class="px-6 py-4">Reference</th>
                                <th class="px-6 py-4">Customer</th>
                                <th class="px-6 py-4">Type</th>
                                <th class="px-6 py-4">Property / Vehicle</th>
                                <th class="px-6 py-4">Check-in</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            @forelse($bookings as $booking)
                                @php
                                    $isAccomm  = str_ends_with($booking->bookable_type, 'Accommodation');
                                    $itemName  = $isAccomm ? $booking->bookable?->name : $booking->bookable?->car_name;
                                    $typeLabel = $isAccomm ? 'Accommodation' : 'Prestige';

                                    // All data needed by the modal, serialised once per row
                                    $modalPayload = json_encode([
                                        'id'             => $booking->id,
                                        'booking_id'     => $booking->booking_id,
                                        'customer_name'  => $booking->customer_name,
                                        'customer_email' => $booking->customer_email,
                                        'customer_phone' => $booking->customer_phone ?? '—',
                                        'type'           => $typeLabel,
                                        'item_name'      => $itemName ?? '—',
                                        'date_in'        => $booking->date_in?->format('D, d M Y H:i') ?? 'TBC',
                                        'date_out'       => $booking->date_out?->format('D, d M Y H:i') ?? 'TBC',
                                        'special_request'=> $booking->special_request ?? '—',
                                        'status'         => $booking->status,
                                        'payment_status' => $booking->payment_status ?? 'unpaid',
                                        'total_amount'   => 'R ' . number_format($booking->total_amount, 2),
                                        'confirm_url'    => route('admin.bookings.confirm', $booking->id),
                                        'decline_url'    => route('admin.bookings.decline', $booking->id),
                                        'csrf'           => csrf_token(),
                                    ]);

                                    $statusCss = match($booking->status) {
                                        'pending'   => 'bg-yellow-100 text-yellow-700',
                                        'confirmed' => 'bg-blue-100 text-blue-700',
                                        'completed' => 'bg-green-100 text-green-700',
                                        'declined'  => 'bg-red-100 text-red-700',
                                        default     => 'bg-gray-100 text-gray-600',
                                    };
                                @endphp
                                <tr class="hover:bg-surface-container-low/50 transition-colors group cursor-pointer"
                                    data-ref="{{ strtolower($booking->booking_id) }}"
                                    data-customer="{{ strtolower($booking->customer_name . ' ' . $booking->customer_email) }}"
                                    @click="openModal({{ $modalPayload }})">

                                    <td class="px-6 py-4 font-mono text-xs font-bold text-secondary">
                                        {{ $booking->booking_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-on-surface">{{ $booking->customer_name }}</div>
                                        <div class="text-xs text-on-surface-variant">{{ $booking->customer_email }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 rounded-full text-[10px] font-bold
                                            {{ $isAccomm ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                            {{ $typeLabel }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-sm">{{ $itemName ?? '—' }}</td>
                                    <td class="px-6 py-4 text-xs text-on-surface-variant">
                                        <div>{{ $booking->date_in?->format('d M Y') ?? 'TBC' }}</div>
                                        <div class="text-outline">→ {{ $booking->date_out?->format('d M Y') ?? 'TBC' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase {{ $statusCss }}">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right" @click.stop>
                                        <div class="flex justify-end items-center gap-1">
                                            {{-- Confirm --}}
                                            @if(!in_array($booking->status, ['confirmed','completed','declined','cancelled']))
                                                <form method="POST" action="{{ route('admin.bookings.confirm', $booking->id) }}">
                                                    @csrf @method('PATCH')
                                                    <button type="submit"
                                                            title="Confirm & send payment link"
                                                            class="p-2 hover:text-green-700 hover:bg-green-50 rounded-lg transition-colors">
                                                        <span class="material-symbols-outlined text-xl" style="font-variation-settings:'FILL' 1">check_circle</span>
                                                    </button>
                                                </form>
                                            @endif
                                            {{-- Decline --}}
                                            @if(!in_array($booking->status, ['declined','cancelled','completed']))
                                                <form method="POST" action="{{ route('admin.bookings.decline', $booking->id) }}"
                                                      onsubmit="return confirm('Decline {{ $booking->booking_id }}? The customer will be notified by email.')">
                                                    @csrf @method('PATCH')
                                                    <button type="submit"
                                                            title="Decline booking"
                                                            class="p-2 hover:text-error hover:bg-error-container/30 rounded-lg transition-colors">
                                                        <span class="material-symbols-outlined text-xl">cancel</span>
                                                    </button>
                                                </form>
                                            @endif
                                            {{-- Detail popup --}}
                                            <button type="button"
                                                    title="View full details"
                                                    class="p-2 hover:text-secondary hover:bg-secondary/10 rounded-lg transition-colors"
                                                    @click="openModal({{ $modalPayload }})">
                                                <span class="material-symbols-outlined text-xl">open_in_new</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-20 text-center">
                                        <span class="material-symbols-outlined text-5xl text-outline mb-3 block">calendar_month</span>
                                        <p class="text-on-surface-variant font-medium">No bookings found{{ $activeType ? ' for this type' : '' }}.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($bookings->hasPages())
                    <div class="px-6 py-4 border-t border-outline-variant/10 text-sm">
                        {{ $bookings->links() }}
                    </div>
                @endif
            </div>

            <!-- ── Right Panel: Filter + Status Summary ── (lg:col-span-4 mirrors "Insert Data" panel) -->
            <div class="lg:col-span-4">
                <div class="bg-surface-container-low p-8 rounded-sm sticky top-24 border border-outline-variant/10 space-y-8">

                    {{-- Filter by type --}}
                    <div>
                        <h3 class="text-xl font-bold mb-4 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">filter_list</span>
                            Filter Bookings
                        </h3>
                        <div class="space-y-2">
                            <a href="{{ route('admin.bookings.adminIndex') }}"
                               class="flex items-center justify-between px-4 py-3 rounded-md text-sm font-semibold transition-colors
                                   {{ !$activeType ? 'bg-secondary text-white' : 'text-on-surface-variant hover:bg-surface-container hover:text-secondary' }}">
                                <span class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">layers</span>
                                    All Bookings
                                </span>
                                <span class="text-xs font-bold">{{ $statusCounts->sum() }}</span>
                            </a>
                            <a href="{{ route('admin.bookings.adminIndex', ['type' => 'accommodation']) }}"
                               class="flex items-center justify-between px-4 py-3 rounded-md text-sm font-semibold transition-colors
                                   {{ $activeType === 'accommodation' ? 'bg-secondary text-white' : 'text-on-surface-variant hover:bg-surface-container hover:text-secondary' }}">
                                <span class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">bed</span>
                                    Accommodation
                                </span>
                            </a>
                            <a href="{{ route('admin.bookings.adminIndex', ['type' => 'prestige']) }}"
                               class="flex items-center justify-between px-4 py-3 rounded-md text-sm font-semibold transition-colors
                                   {{ $activeType === 'prestige' ? 'bg-secondary text-white' : 'text-on-surface-variant hover:bg-surface-container hover:text-secondary' }}">
                                <span class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">directions_car</span>
                                    Prestige Vehicles
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="border-t border-outline-variant/20"></div>

                    {{-- Status breakdown --}}
                    <div>
                        <h3 class="text-xl font-bold mb-4 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">donut_small</span>
                            Status Breakdown
                        </h3>
                        <div class="space-y-3">
                            @foreach([
                                ['label' => 'Pending',   'key' => 'pending',   'css' => 'bg-yellow-100 text-yellow-700'],
                                ['label' => 'Confirmed', 'key' => 'confirmed', 'css' => 'bg-blue-100 text-blue-700'],
                                ['label' => 'Completed', 'key' => 'completed', 'css' => 'bg-green-100 text-green-700'],
                                ['label' => 'Declined',  'key' => 'declined',  'css' => 'bg-red-100 text-red-700'],
                                ['label' => 'Cancelled', 'key' => 'cancelled', 'css' => 'bg-gray-100 text-gray-600'],
                            ] as $row)
                                <div class="flex items-center justify-between">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase {{ $row['css'] }}">
                                        {{ $row['label'] }}
                                    </span>
                                    <span class="text-sm font-bold text-on-surface">
                                        {{ $statusCounts->get($row['key'], 0) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="border-t border-outline-variant/20"></div>

                    {{-- Quick note --}}
                    <p class="text-[11px] text-on-surface-variant leading-relaxed">
                        Confirming a booking will email the customer a secure payment link.
                        Declining will notify them immediately. All actions are logged.
                    </p>
                </div>
            </div>

        </div><!-- /grid -->

        <!-- Stats Footer / Bento Overview (mirrors accommodation stats row) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-surface-container p-6 rounded-sm">
                <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Total Bookings</div>
                <div class="text-3xl font-extrabold font-headline">{{ $statusCounts->sum() }}</div>
                <div class="text-[10px] text-on-surface-variant font-medium mt-2">All time</div>
            </div>
            <div class="bg-surface-container p-6 rounded-sm">
                <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Pending Review</div>
                <div class="text-3xl font-extrabold font-headline text-yellow-600">{{ $statusCounts->get('pending', 0) }}</div>
                <div class="text-[10px] text-yellow-600 font-bold mt-2 flex items-center gap-1">
                    <span class="material-symbols-outlined text-xs">schedule</span> Awaiting action
                </div>
            </div>
            <div class="bg-surface-container p-6 rounded-sm">
                <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Confirmed</div>
                <div class="text-3xl font-extrabold font-headline text-blue-600">{{ $statusCounts->get('confirmed', 0) }}</div>
                <div class="text-[10px] text-blue-600 font-bold mt-2 flex items-center gap-1">
                    <span class="material-symbols-outlined text-xs">check_circle</span> Payment pending
                </div>
            </div>
            <div class="bg-surface-container p-6 rounded-sm">
                <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Completed</div>
                <div class="text-3xl font-extrabold font-headline text-green-600">{{ $statusCounts->get('completed', 0) }}</div>
                <div class="text-[10px] text-green-600 font-bold mt-2 flex items-center gap-1">
                    <span class="material-symbols-outlined text-xs">trending_up</span> Paid & completed
                </div>
            </div>
        </div>

    </main>

    <!-- ============================================================
         Booking Detail Modal
         Alpine state lives on the parent flex-1 div (x-data="bookingAdmin()").
         Each row dispatches its payload directly into openModal().
         ============================================================ -->
    <div x-cloak
         x-show="open"
         class="fixed inset-0 z-50 flex items-center justify-center p-4"
         @keydown.escape.window="close()">

        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="close()"></div>

        <!-- Panel -->
        <div class="relative bg-surface-container-lowest rounded-sm shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto border border-outline-variant/20"
             x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">

            <!-- Modal Header -->
            <div class="flex items-start justify-between p-6 border-b border-outline-variant/10">
                <div>
                    <h2 class="text-xl font-extrabold font-headline tracking-tight">Booking Details</h2>
                    <p class="text-xs font-mono font-bold text-secondary mt-1" x-text="booking?.booking_id"></p>
                </div>
                <button @click="close()" class="p-2 hover:bg-surface-container rounded-lg transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-6">

                <!-- Status + payment row -->
                <div class="flex items-center gap-3 flex-wrap">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Status</span>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase"
                          :class="{
                              'bg-yellow-100 text-yellow-700': booking?.status === 'pending',
                              'bg-blue-100   text-blue-700':   booking?.status === 'confirmed',
                              'bg-green-100  text-green-700':  booking?.status === 'completed',
                              'bg-red-100    text-red-700':    booking?.status === 'declined',
                              'bg-gray-100   text-gray-600':   booking?.status === 'cancelled',
                          }"
                          x-text="booking?.status"></span>
                    <span class="text-xs text-on-surface-variant ml-auto font-semibold"
                          x-text="'Payment: ' + (booking?.payment_status ?? 'unpaid')"></span>
                </div>

                <!-- Detail grid -->
                <div class="grid grid-cols-2 gap-x-8 gap-y-5 text-sm">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-outline mb-1">Customer Name</p>
                        <p class="font-semibold" x-text="booking?.customer_name"></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-outline mb-1">Email Address</p>
                        <p class="font-semibold break-all" x-text="booking?.customer_email"></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-outline mb-1">Phone Number</p>
                        <p class="font-semibold" x-text="booking?.customer_phone"></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-outline mb-1">Booking Type</p>
                        <p class="font-semibold" x-text="booking?.type"></p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-outline mb-1">Property / Vehicle</p>
                        <p class="font-semibold" x-text="booking?.item_name"></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-outline mb-1">Check-in</p>
                        <p class="font-semibold" x-text="booking?.date_in"></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-outline mb-1">Check-out</p>
                        <p class="font-semibold" x-text="booking?.date_out"></p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-outline mb-1">Special Requests</p>
                        <p class="text-on-surface-variant" x-text="booking?.special_request"></p>
                    </div>
                </div>

                <!-- Total amount -->
                <div class="bg-surface-container p-4 rounded-sm flex items-center justify-between">
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-outline">Estimated Total</span>
                    <span class="text-2xl font-black font-headline text-on-surface" x-text="booking?.total_amount"></span>
                </div>

                <!-- Action buttons — rendered conditionally based on current status -->
                <div class="flex gap-3 pt-2">

                    <!-- Confirm & send payment link -->
                    <template x-if="booking && !['confirmed','completed','declined','cancelled'].includes(booking.status)">
                        <form :action="booking.confirm_url" method="POST" class="flex-1">
                            <input type="hidden" name="_token" :value="booking.csrf">
                            <input type="hidden" name="_method" value="PATCH">
                            <button type="submit"
                                    class="w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-md font-bold text-sm transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1">check_circle</span>
                                Confirm &amp; Send Payment Link
                            </button>
                        </form>
                    </template>

                    <!-- Decline -->
                    <template x-if="booking && !['declined','cancelled','completed'].includes(booking.status)">
                        <form :action="booking.decline_url" method="POST" class="flex-1"
                              @submit.prevent="if(confirm('Decline this booking? The customer will be notified by email.')) $el.submit()">
                            <input type="hidden" name="_token" :value="booking.csrf">
                            <input type="hidden" name="_method" value="PATCH">
                            <button type="submit"
                                    class="w-full py-3 bg-red-600 hover:bg-red-700 text-white rounded-md font-bold text-sm transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-base">cancel</span>
                                Decline Booking
                            </button>
                        </form>
                    </template>

                    <!-- Close only — terminal states -->
                    <template x-if="booking && ['declined','cancelled','completed'].includes(booking.status)">
                        <button @click="close()"
                                class="flex-1 py-3 border border-outline-variant rounded-md text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">
                            Close
                        </button>
                    </template>

                </div>
            </div>
        </div><!-- /panel -->
    </div><!-- /modal -->

</div><!-- /flex-1 -->
</div><!-- /flex min-h-screen -->
</body></html>

<script>
    function bookingAdmin() {
        return {
            open:    false,
            booking: null,
            search:  '',

            openModal(data) {
                this.booking = data;
                this.open    = true;
                document.body.style.overflow = 'hidden';
            },

            close() {
                this.open    = false;
                this.booking = null;
                document.body.style.overflow = '';
            },

            // Client-side search on reference + customer columns
            filterTable() {
                const term = this.search.toLowerCase().trim();
                document.querySelectorAll('#bookings-table tbody tr[data-ref]').forEach(row => {
                    const ref      = row.dataset.ref      ?? '';
                    const customer = row.dataset.customer ?? '';
                    row.style.display = (!term || ref.includes(term) || customer.includes(term)) ? '' : 'none';
                });
            },
        };
    }
</script>

@include('admin/parials.footer')
