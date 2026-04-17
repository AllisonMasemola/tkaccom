@php
  $isAccommodation = str_ends_with($booking->bookable_type, 'Accommodation');
  $itemName        = $isAccommodation ? $booking->bookable?->name : $booking->bookable?->car_name;
  $typeLabel       = $isAccommodation ? 'Accommodation' : 'Prestige Vehicle';
@endphp

<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
  <div style="background-color: #b91c1c; color: white; padding: 20px; text-align: center;">
    <h1 style="margin: 0;">Booking Update</h1>
  </div>

  <div style="padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9;">
    <p>Dear {{ $booking->customer_name }},</p>
    <p>
      Thank you for your interest in booking with us. Unfortunately, after reviewing your request,
      we are unable to confirm this particular booking at this time.
    </p>

    <div style="background-color: white; padding: 15px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #b91c1c;">
      <h3 style="margin-top: 0; color: #b91c1c;">Booking Reference</h3>
      <p><strong>Reference:</strong> {{ $booking->booking_id }}</p>
      <p><strong>Type:</strong> {{ $typeLabel }}</p>
      @if($itemName)
        <p><strong>Item:</strong> {{ $itemName }}</p>
      @endif
      <p><strong>Requested Check-in:</strong>  {{ $booking->date_in?->format('D, d M Y H:i') ?? 'N/A' }}</p>
      <p><strong>Requested Check-out:</strong> {{ $booking->date_out?->format('D, d M Y H:i') ?? 'N/A' }}</p>
    </div>

    <p>
      We encourage you to browse our other available properties and vehicles. Our team would be
      happy to assist you find the perfect option for your stay.
    </p>

    <div style="text-align: center; margin: 32px 0;">
      <a href="{{ url('/accommodation') }}"
         style="background-color: #374151; color: white; padding: 14px 32px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">
        Browse Available Properties
      </a>
    </div>

    <p>If you have any questions, please reply to this email quoting your booking reference.</p>
    <p>We apologise for any inconvenience caused.<br>Best regards,<br>TK Cape Team</p>
  </div>

  <div style="text-align: center; padding: 10px; font-size: 12px; color: #666;">
    <p>TK Cape | Cape Town | +27 83 727 0256</p>
  </div>
</div>
