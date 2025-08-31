<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Contacts;

class AdminContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public Contacts $contact;
    public string $novaUrl;
    public array $settings;

    /**
     * Create a new message instance.
     */
    public function __construct(Contacts $contact, string $novaUrl, array $settings)
    {
        $this->contact = $contact;
        $this->novaUrl = $novaUrl;
        $this->settings = $settings;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $name = trim($this->contact->fname . ' ' . ($this->contact->lname ?? ''));
        return new Envelope(
            subject: "มีการติดต่อจาก {$name}"
        );;
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'contact.email.admin_contact_notification',
            with: [
                'contact' => $this->contact,
                'novaUrl' => $this->novaUrl,
                'settings' => $this->settings,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
