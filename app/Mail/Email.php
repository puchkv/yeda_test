<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $mail;

    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    public function build()
    {
        return $this->view('email')->with('mail', $this->mail);
    }
}
