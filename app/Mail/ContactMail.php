<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Les données du formulaire.
     *
     * @var array
     */
    public $data;

    /**
     * Crée une nouvelle instance du message.
     *
     * @param array $data Les données validées du formulaire
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Définit l'enveloppe du message (sujet, expéditeur...).
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
        // On utilise l'email de la personne qui contacte comme "répondre à"
            replyTo: $this->data['email'],
            subject: 'Nouveau message depuis le site Signest',
        );
    }

    /**
     * Définit le contenu du message.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return new Content(
        // On indique que le corps de l'email est défini dans le fichier 'emails.contact-form'
            view: 'emails.contact-form',
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
