<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSeller extends Mailable
{
    use Queueable, SerializesModels;

    public $articleName, $sellerEmail, $description, $user;
    /**
     * Create a new message instance.
     */
    public function __construct($articleName, $sellerEmail, $description, $user)
    {
        $this->articleName = $articleName;
        $this->sellerEmail = $sellerEmail;
        $this->description = $description;
        $this->user = $user;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // dd(Auth::user()->email),
            from: new Address('noreplay@presto.it', 'BugBusters'),
            // from: new Address()
            subject: 'Contact Seller',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.contact_seller',
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
