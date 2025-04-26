<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from($this->data['email'])
                    ->subject('New Contact Form Submission: ' . ($this->data['subject'] ?? 'No Subject'))
                    ->view('emails.contact-form')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'subject' => $this->data['subject'] ?? 'No Subject',
                        'message' => $this->data['message'],
                    ]);
    }
} 