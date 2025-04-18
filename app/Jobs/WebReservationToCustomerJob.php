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
use App\Models\BlogPost;

use App\Mail\WebReservationToCustomer;

class WebReservationToCustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function handle()
    {
        $webReservation = $this->details['webReservation'];
        $user = User::where(['id'=>$webReservation->user_id])->first();

        $blogPost = BlogPost::where(['template_name'=>5])->first();
        $sender_name = $blogPost->sender_name;
        $sender_address = $blogPost->sender_address;
        $mail_subject = $blogPost->subject;
        $mail_content = $blogPost->content;
        
        $mail_subject = str_replace('%shop_name%', $sender_name, $mail_subject);

        $mail_content = str_replace('%reserve_name%', $webReservation->name, $mail_content);
        $mail_content = str_replace('%reserve_tel%', $webReservation->tel, $mail_content);
        $mail_content = str_replace('%reserve_tel1%', $webReservation->tel, $mail_content);
        $mail_content = str_replace('%reserve_mail%', $webReservation->mail, $mail_content);
        $mail_content = str_replace('%reserve_cmnt%', $webReservation->cmnt, $mail_content);
        $mail_content = str_replace('%rec_cmnt%', $webReservation->cmnt, $mail_content);
        $mail_content = str_replace('%reserve_date%', date('Y-m-d', strtotime($webReservation->created_at)), $mail_content);

        $mail_content = str_replace('%common_mail%', $sender_address, $mail_content);
        $mail_content = str_replace('%shop_name%', $sender_name, $mail_content);
        $mail_content = str_replace('%shop_tel%', "03-6868-5149", $mail_content);
        $mail_content = str_replace('%shop_open%', "12:00", $mail_content);
        $mail_content = str_replace('%shop_finish%', "05:00", $mail_content);
        $mail_content = str_replace('%shop_url%', "https://club-firenze.net", $mail_content);


        Mail::to($user->email)->queue(new WebReservationToCustomer([
            'subject'=>$mail_subject,
            'content'=>$mail_content
        ]));

    }

}
