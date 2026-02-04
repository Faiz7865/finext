<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $isConfirmation;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $isConfirmation = false)
    {
        $this->data = $data;
        $this->isConfirmation = $isConfirmation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        if ($this->isConfirmation) {
            return new Envelope(
                subject: 'We received your message - Finext Solution',
            );
        }

        return new Envelope(
            subject: 'New Contact Form Submission from ' . $this->data['name'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
{
    if ($this->isConfirmation) {
        return new Content(
            view: 'emails.contact-confirmation',
            with: [
                'name' => $this->data['name'],
            ],
        );
    }

    return new Content(
        view: 'emails.contact-form',
        with: [
            'name'        => $this->data['name'],
            'email'       => $this->data['email'],
            'phone'       => $this->data['phone'],
            'subject'     => $this->data['subject'],
            'userMessage' => $this->data['message'], // ✅ renamed
        ],
    );
}


    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}