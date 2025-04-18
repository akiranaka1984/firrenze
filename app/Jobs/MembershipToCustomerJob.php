<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\WebReservation;
use App\Models\Companion;
use App\Models\BlogPost;

use App\Mail\MembershipToCustomer;

class MembershipToCustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function handle()
    {
        $user = $this->details['user'];
        $comp_id = $this->details['comp_id'];

        $companion = Companion::where(['id'=>$comp_id])->first();

        $blogPost = BlogPost::where(['template_name'=>1])->first();
        $sender_name = $blogPost->sender_name;
        $sender_address = $blogPost->sender_address;
        $mail_subject = $blogPost->subject;
        $mail_content = $blogPost->content;

        $mail_subject = str_replace('%shop_name%', $sender_name, $mail_subject);

        $mail_content = str_replace('%name%', $user->name, $mail_content);
        $mail_content = str_replace('%mail%', $user->email, $mail_content);
        $mail_content = str_replace('%lady_name%', $companion->name, $mail_content);

        $mail_content = str_replace('%common_mail%', $sender_address, $mail_content);
        $mail_content = str_replace('%shop_name%', $sender_name, $mail_content);
        $mail_content = str_replace('%shop_tel%', "03-6868-5149", $mail_content);
        $mail_content = str_replace('%shop_open%', "12:00", $mail_content);
        $mail_content = str_replace('%shop_finish%', "05:00", $mail_content);
        $mail_content = str_replace('%shop_url%', "https://club-firenze.net", $mail_content);

        Mail::to($user->email)->queue(new MembershipToCustomer([
            'subject'=>$mail_subject,
            'content'=>$mail_content
        ]));

    }
}
