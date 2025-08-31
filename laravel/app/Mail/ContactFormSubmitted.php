<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new message instance.
     */
    public function __construct( array $data )
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $fullName = trim(($this->data['first_name'] ?? '') . ' ' . ($this->data['last_name'] ?? ''));

        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: [
                // lets you click “Reply” in the inbox and email the sender
                new Address($this->data['email'] ?? '', $fullName ?: 'Website Visitor'),
            ],
            subject: $this->data['subject'] ?? "มีการติดต่อผ่านหน้าเว็บไซต์จาก {$fullName}"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_email',
            with: [
                'first_name' => $this->data['first_name'] ?? '',
                'last_name'  => $this->data['last_name']  ?? '',
                'email'      => $this->data['email']      ?? '',
                'body'       => $this->data['message']    ?? '',
                'ip_address' => $this->data['ip_address']         ?? '',
                'user_agent' => $this->data['user_agent'] ?? '',
            ],
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
