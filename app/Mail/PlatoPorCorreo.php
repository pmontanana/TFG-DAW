<?php

namespace App\Mail;

use App\Models\Platos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlatoPorCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(Protected $platos,)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('postmaster@sandboxb61c35f74391470ca9c18a56bd8488c0.mailgun.org', 'Pablo Montañana'),
            subject: 'Platos por Correo',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'platosPorCorreo',
            with: ['platos' => $this->platos],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
