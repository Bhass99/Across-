<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;
use App\User;

class forgetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $pass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.SendPassword');
    }
}
