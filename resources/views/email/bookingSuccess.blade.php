@php
  $isAccommodation = str_ends_with($booking->bookable_type, 'Accommodation');
  $itemName        = $isAccommodation ? $booking->bookable?->name : $booking->bookable?->car_name;
  $typeLabel       = $isAccommodation ? 'Accommodation' : 'Prestige Vehicle';
@endphp

<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
  <div style="background-color: #c2410c; color: white; padding: 20px; text-align: center;">
    <h1 style="margin: 0;">Booking Request Received</h1>
  </div>

  <div style="padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9;">
    <p>Dear {{ $booking->customer_name }},</p>
    <p>Thank you for booking with TK Cape. Your request has been received and is currently under review. You will be notified once a member of our team has confirmed it.</p>

    <div style="background-color: white; padding: 15px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #c2410c;">
      <h3 style="margin-top: 0; color: #c2410c;">Booking Details</h3>
      <p><strong>Booking Reference:</strong> {{ $booking->booking_id }}</p>
      <p><strong>Type:</strong> {{ $typeLabel }}</p>
      @if($itemName)
        <p><strong>Item:</strong> {{ $itemName }}</p>
      @endif
      <p><strong>Check-in:</strong>  {{ $booking->date_in?->format('D, d M Y H:i') ?? 'TBC' }}</p>
      <p><strong>Check-out:</strong> {{ $booking->date_out?->format('D, d M Y H:i') ?? 'TBC' }}</p>
      @if($booking->special_request)
        <p><strong>Special Request:</strong> {{ $booking->special_request }}</p>
      @endif
    </div>

    <p>If you need to make changes, please reply to this email and include your booking reference.</p>
    <p>Best regards,<br>TK Cape Team</p>
  </div>

  <div style="text-align: center; padding: 10px; font-size: 12px; color: #666;">
    <p>TK Cape | Cape Town | +27 83 727 0256</p>
  </div>
</div>
