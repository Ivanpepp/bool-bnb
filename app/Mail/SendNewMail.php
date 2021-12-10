<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $element;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($element)
    {
        $this->element = $element;
    }

    public function setMessage($element)
    {
        $this->element = $element;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $element = $this->element;
        
        return $this->replyTo($this->element->email)->view("email.body", compact("element"));
    }
}


