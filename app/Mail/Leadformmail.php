<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadFormMail extends Mailable
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
                subject: 'We received your project inquiry - Finext Solution',
            );
        }

        return new Envelope(
            subject: 'New Lead: ' . $this->data['first_name'] . ' ' . $this->data['last_name'] . ' - ' . $this->data['service_type'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->isConfirmation) {
            return new Content(
                view: 'emails.lead-confirmation',
                with: [
                    'first_name' => $this->data['first_name'],
                ],
            );
        }

        return new Content(
            view: 'emails.lead-form',
            with: [
                'first_name' => $this->data['first_name'],
                'last_name' => $this->data['last_name'],
                'email' => $this->data['email'],
                'phone' => $this->data['phone'],
                'company' => $this->data['company'],
                'service_type' => $this->data['service_type'],
                'budget' => $this->data['budget'],
                'project_description' => $this->data['project_description'],
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