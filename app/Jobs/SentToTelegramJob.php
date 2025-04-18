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
use App\Models\Telegram;
use App\Models\TelegramCred;
use App\Models\Companion;

class SentToTelegramJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function handle()
    {

       $telegram_id = $this->details['telegram_id'];
       $telegram = Telegram::where(['id'=>$telegram_id])->first(); 
       $mail_subject = $telegram->template_name;
       $mail_content_old = $telegram->content;

       $telegramCred = TelegramCred::where(['id'=>1])->first();

       if(!empty($telegramCred->brodcast_id)){
            $mail_content = str_replace('%common_mail%', 'info@club-firenze.net', $mail_content_old);
            $mail_content = str_replace('%shop_name%', '東京 会員制高級デリヘル【Firenze〜フィレンツェ〜】', $mail_content);
            $mail_content = str_replace('%shop_tel%', "03-6868-5149", $mail_content);
            $mail_content = str_replace('%shop_open%', "12:00", $mail_content);
            $mail_content = str_replace('%shop_finish%', "05:00", $mail_content);
            $mail_content = str_replace('%shop_url%', "https://club-firenze.net", $mail_content);
            $mail_content = strip_tags($mail_content);

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.telegram.org/bot'.$telegramCred->token.'/sendmessage?chat_id='.$telegramCred->brodcast_id.'&text='.urlencode($mail_content),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }

        $users = User::all();
        foreach($users as $user){
            $mail_content = str_replace('%name%', $user->name, $mail_content_old);
            $mail_content = str_replace('%mail%', $user->email, $mail_content);
            $mail_content = str_replace('%common_mail%', 'info@club-firenze.net', $mail_content);
            $mail_content = str_replace('%shop_name%', '東京 会員制高級デリヘル【Firenze〜フィレンツェ〜】', $mail_content);
            $mail_content = str_replace('%shop_tel%', "03-6868-5149", $mail_content);
            $mail_content = str_replace('%shop_open%', "12:00", $mail_content);
            $mail_content = str_replace('%shop_finish%', "05:00", $mail_content);
            $mail_content = str_replace('%shop_url%', "https://club-firenze.net", $mail_content);
            $mail_content = strip_tags($mail_content);

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.telegram.org/bot'.$telegramCred->token.'/sendmessage?chat_id='.$user->username.'&text='.urlencode($mail_content),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }

    }
}
