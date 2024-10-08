<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    public $firstName;

    public function __construct($firstName, $code)
    {
        $this->code = $code;
        $this->firstName = $firstName;
    }

    public function build()
    {
        return $this->view('layouts.email.forgot_password')
            ->subject('Your Password Reset Code')
            ->with([
                'code' => $this->code,
                'firstName' => $this->firstName,
            ]);
    }
}
