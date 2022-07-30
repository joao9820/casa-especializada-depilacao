<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactStore extends Mailable
{
    use Queueable, SerializesModels;

    private $_subject;
    private $_msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $msg, $phone)
    {
        $this->_subject = $subject;
        $this->_msg = "De: {$name}";
        $this->_msg .= "<br/>E-mail: {$email}";

        if($phone)
            $this->_msg .= "<br/>Cel: {$phone}";

        $this->_msg .= "<br/><br/>{$msg}";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('casaespecializadadepilacao@gmai.com')->subject($this->_subject)->html($this->_msg);
    }
}
