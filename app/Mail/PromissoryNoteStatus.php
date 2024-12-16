<?php

namespace App\Mail;

use App\Models\PromissoryNote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PromissoryNoteStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $note; 
    public $subject; 
    public $messageBody; 
    /**
     * Create a new message instance.
     */
    public function __construct(PromissoryNote $note, $subject, $messageBody)
    {
        //
        $this->note = $note; 
        $this->subject = $subject; 
        $this->messageBody=$messageBody; 
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
            view: 'email.promissoryStatus',
            with:[
                'messageBody' =>$this->messageBody,
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
