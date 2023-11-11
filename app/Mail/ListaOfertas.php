<?php

namespace App\Mail;

use App\Providers\AppServiceProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ListaOfertas extends Mailable
{
    use Queueable, SerializesModels;

    public $url = AppServiceProvider::URL_APP;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public $resultados = [],
        public $subject = AppServiceProvider::DEFAULT_SUBJECT,
        public $content = AppServiceProvider::DEFAULT_VIEW,
        public $type = 'vencidas',
    ) {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->content,
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
