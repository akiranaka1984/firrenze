<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;

use App\Models\BlogPost;

use App\Mail\RecruitmentToStore;

class RecruitmentToStoreJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function handle()
    {
        $interview = $this->details['interview'];

        $blogPost = BlogPost::where(['template_name'=>8])->first();
        $sender_name = $blogPost->sender_name;
        $sender_address = $blogPost->sender_address;
        $mail_subject = $blogPost->subject;
        $mail_content = $blogPost->content;

        $mail_subject = str_replace('%shop_name%', $sender_name, $mail_subject);

        $mail_content = str_replace('%rec_addr%', $interview->mail, $mail_content);
        $mail_content = str_replace('%rec_cmnt%', $interview->other_message, $mail_content);

        $mail_content = str_replace('%common_mail%', $sender_address, $mail_content);
        $mail_content = str_replace('%shop_name%', $sender_name, $mail_content);
        $mail_content = str_replace('%shop_tel%', "03-6868-5149", $mail_content);
        $mail_content = str_replace('%shop_open%', "12:00", $mail_content);
        $mail_content = str_replace('%shop_finish%', "05:00", $mail_content);
        $mail_content = str_replace('%shop_url%', "https://club-firenze.net", $mail_content);


        Mail::to("denizci_denizci2000@hotmail.com")->queue(new RecruitmentToStore([
            'subject'=>$mail_subject,
            'content'=>$mail_content
        ]));
    }
}
