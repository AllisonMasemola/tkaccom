<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  Booking  $booking      The confirmed booking (with bookable relation loaded)
     * @param  string   $paymentUrl   The fully-formed PayFast payment page URL
     */
    public function __construct(
        public readonly Booking $booking,
        public readonly string $paymentUrl,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Booking Has Been Confirmed — Complete Your Payment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.bookingConfirmed',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
