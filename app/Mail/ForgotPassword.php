<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $title = "パスワードをリセットしてください。";
        return $this->subject($title)
            ->view('emails.forgotPassword')
            ->with([
                'name' => $this->user->name, 
                'token' => $this->user->email_verify_token
            ]);

    }
}
