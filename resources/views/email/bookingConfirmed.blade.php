@php
  $isAccommodation = str_ends_with($booking->bookable_type, 'Accommodation');
  $itemName        = $isAccommodation ? $booking->bookable?->name : $booking->bookable?->car_name;
  $typeLabel       = $isAccommodation ? 'Accommodation' : 'Prestige Vehicle';
@endphp

<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
  <div style="background-color: #15803d; color: white; padding: 20px; text-align: center;">
    <h1 style="margin: 0;">Booking Confirmed ✓</h1>
  </div>

  <div style="padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9;">
    <p>Dear {{ $booking->customer_name }},</p>
    <p>
      Great news — your booking has been confirmed by our team. Please complete your payment using the secure link below to finalise your reservation.
    </p>

    <div style="background-color: white; padding: 15px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #15803d;">
      <h3 style="margin-top: 0; color: #15803d;">Confirmed Booking Details</h3>
      <p><strong>Booking Reference:</strong> {{ $booking->booking_id }}</p>
      <p><strong>Type:</strong> {{ $typeLabel }}</p>
      @if($itemName)
        <p><strong>Item:</strong> {{ $itemName }}</p>
      @endif
      <p><strong>Check-in:</strong>  {{ $booking->date_in?->format('D, d M Y H:i') ?? 'TBC' }}</p>
      <p><strong>Check-out:</strong> {{ $booking->date_out?->format('D, d M Y H:i') ?? 'TBC' }}</p>
    </div>

    <!-- Payment CTA -->
    <div style="text-align: center; margin: 32px 0;">
      <a href="{{ $paymentUrl }}"
         style="background-color: #15803d; color: white; padding: 14px 32px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">
        Complete Payment Now
      </a>
      <p style="font-size: 11px; color: #666; margin-top: 12px;">
        This link is unique to your booking. Do not share it.
      </p>
    </div>

    <p>If you have any questions, reply to this email with your booking reference.</p>
    <p>Best regards,<br>TK Cape Team</p>
  </div>

  <div style="text-align: center; padding: 10px; font-size: 12px; color: #666;">
    <p>TK Cape | Cape Town | +27 83 727 0256</p>
  </div>
</div>
