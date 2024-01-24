<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RRHHEmpresa extends Mailable
{
    use Queueable, SerializesModels;
    public $empresa,$estadoSolicitud;

    /**
     * Create a new message instance.
     */
    public function __construct($empresa,$estadoSolicitud)
    {
        $this->empresa=$empresa;
        $this->estadoSolicitud=$estadoSolicitud;
    
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Seguimiento a solicitud: Bolsa de empleo Universidad Mesoamericana',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emailrrhh',
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
