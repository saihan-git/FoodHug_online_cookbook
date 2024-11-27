<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class MemberResetPasswordMail extends Mailable
{
    public $resetLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($resetLink)
    {
        $this->resetLink = $resetLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset Password')
            ->view('emails.member.reset_password')
            ->with('resetLink', $this->resetLink);
    }
}