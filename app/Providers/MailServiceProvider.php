<?php

namespace App\Providers;


use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        if (\Schema::hasTable('email_creds')) {
            $mail = DB::table('email_creds')->first();
            if ($mail){
                $config = array(
                    'driver'     => $mail->driver,
                    'host'       => $mail->host,
                    'port'       => $mail->port,
                    'from'       => array('address' => $mail->address, 'name' => $mail->name),
                    'encryption' => $mail->encryption,
                    'username'   => $mail->username,
                    'password'   => $mail->password
                );
                Config::set('mail', $config);
            }
        }
    }

    public function boot()
    {
        //
    }
}


// pass:jg48sksdf9
