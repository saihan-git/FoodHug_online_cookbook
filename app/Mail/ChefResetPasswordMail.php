<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChefResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetLink;

    public function __construct($resetLink)
    {
        $this->resetLink = $resetLink;
    }

    public function build()
    {
        return $this->view('emails.chef_reset_password')
            ->subject('Reset Password Request')
            ->with(['resetLink' => $this->resetLink]);
    }
}
