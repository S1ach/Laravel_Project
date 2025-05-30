<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DailyStatsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $views;
    public $comments;

    public function __construct($views, $comments)
    {
        $this->views = $views;
        $this->comments = $comments;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ежедневная статистика',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.stats',
            with: [
                'views' => $this->views,
                'comments' => $this->comments,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
