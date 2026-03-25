<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $firstName;

    public function __construct(string $otp, string $firstName)
    {
        $this->otp = $otp;
        $this->firstName = $firstName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Verification Code - Finext Solution',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.lead-otp',
            with: [
                'otp' => $this->otp,
                'firstName' => $this->firstName,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}