<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Interview;

class RecruitmentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $interview;

    public function __construct(Interview $interview)
    {
        $this->interview = $interview;
    }

    public function build()
    {
        return $this->subject('【club-firenze】新規応募がありました')
                    ->view('emails.recruitment')
                    ->with([
                        'interview' => $this->interview
                    ]);
    }
}