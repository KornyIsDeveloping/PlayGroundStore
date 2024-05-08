<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * @param $details
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * @return ContactFormMail
     */
    public function build()
    {
        return $this->from('info@example.com')
            ->subject('New Contact Message')
            ->view('emails.contact')
            ->with(['details' => $this->details]);
    }
}
