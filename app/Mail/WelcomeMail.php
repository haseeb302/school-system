<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user; 
    public $fromMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $fromMail)
    {
        $this->user = $user;
        $this->fromMail = $fromMail;
    }    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from($this->fromMail)
        ->subject('Welcome To School')
        ->view('emails.index')
        ->with([
            'user' => $this->user
        ]);

        return $this;
    }
}
