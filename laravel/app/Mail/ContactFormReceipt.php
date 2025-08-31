<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Contacts;

class ContactFormReceipt extends Mailable
{
    use Queueable, SerializesModels;

     public Contacts $contact;
     public array $settings;

    /**
     * Create a new message instance.
     */
    public function __construct( Contacts $contact, array $settings )
    {
        $this->contact = $contact;
        $this->settings = $settings;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'เราได้รับข้อความของคุณแล้ว ขอบคุณที่ติดต่อเรา',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'contact.email.contact_form_receipt',
            with: [
                'contact' => $this->contact,
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
