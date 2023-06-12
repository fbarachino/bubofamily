<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class myTestEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email=$email;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name='none';
        return $this
        ->subject('Email di Test')
        ->markdown('mail.test',['name' => $name]);
    }
}
