<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingDeclined extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  Booking  $booking  The declined booking (with bookable relation loaded)
     */
    public function __construct(public readonly Booking $booking) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update on Your Booking Request — ' . $this->booking->booking_id,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.bookingDeclined',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
