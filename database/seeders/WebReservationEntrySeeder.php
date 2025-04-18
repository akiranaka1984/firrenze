<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


use App\Models\WebReservation;
use App\Models\Interview;

class WebReservationEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $content = '<i class="entypo-right-bold"></i>LINE ID<br>
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i>ご希望の女性(第1 候補)<br>
        前島
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i> ご希望の女性(第2候補)<br>
        前島
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i>ご希望の女性(第3候補)<br>
        前島
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i> 希望ご予約日(第1 候補)<br>
        1月3 日18時00分
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i> 希望ご予約日(第2候補)<br>
        1月4 日15時00分
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i>希望ご予約日(第3候補)<br>
        1月4 日16時00分
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i>ご希望コース<br>
        RED DIAMOND 60分
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i>ご利用場所<br>
        ホテル
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i>お支払い方法&gt;<br>
        現金
        <p>---------------------------------</p>
        <i class="entypo-right-bold"></i> ご希望連絡方法<br>
        メール
        <p>---------------------------------</p>
        その他<br>';

        WebReservation::create(['name'=>'飯田'.rand('1111','9999'), 'mail'=>'test'.rand('1111','9999').'@gmail.com', 'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 'content'=>$content ]);
        WebReservation::create(['name'=>'飯田'.rand('1111','9999'), 'mail'=>'test'.rand('1111','9999').'@gmail.com', 'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 'content'=>$content ]);
        WebReservation::create(['name'=>'飯田'.rand('1111','9999'), 'mail'=>'test'.rand('1111','9999').'@gmail.com', 'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 'content'=>$content ]);
        WebReservation::create(['name'=>'飯田'.rand('1111','9999'), 'mail'=>'test'.rand('1111','9999').'@gmail.com', 'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 'content'=>$content ]);
        WebReservation::create(['name'=>'飯田'.rand('1111','9999'), 'mail'=>'test'.rand('1111','9999').'@gmail.com', 'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 'content'=>$content ]);
        WebReservation::create(['name'=>'飯田'.rand('1111','9999'), 'mail'=>'test'.rand('1111','9999').'@gmail.com', 'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 'content'=>$content ]);


        Interview::create([
            'name'=>'飯田'.rand('1111','9999'), 
            'mail'=>'test'.rand('1111','9999').'@gmail.com', 
            'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 
            'line_id'=>'test'.rand('1111','9999'),
            'inquiry' => 'お問い合わせ',
            'age' => rand('18','28'),
            'height' => rand('161','172'),
            'weight' => rand('51','61'),
            'bust' => 'C',
            'tattoo' => '無',
            'interview_date' => date('Y-m-d', strtotime('+10 days')),
            'experience' => '6 month',
            'appealing_points' => 'face',
            'other_message' => '大阪からの出稼ぎ希望です。<br>
            出稼ぎの条件等御座いましたらお伺いしたいです。<br>
            宜しくお願いいたします。'
        ]);

        Interview::create([
            'name'=>'飯田'.rand('1111','9999'), 
            'mail'=>'test'.rand('1111','9999').'@gmail.com', 
            'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 
            'line_id'=>'test'.rand('1111','9999'),
            'inquiry' => 'お問い合わせ',
            'age' => rand('18','28'),
            'height' => rand('161','172'),
            'weight' => rand('51','61'),
            'bust' => 'C',
            'tattoo' => '無',
            'interview_date' => date('Y-m-d', strtotime('+10 days')),
            'other_message' => '大阪からの出稼ぎ希望です。<br>
            出稼ぎの条件等御座いましたらお伺いしたいです。<br>
            宜しくお願いいたします。'
        ]);

        Interview::create([
            'name'=>'飯田'.rand('1111','9999'), 
            'mail'=>'test'.rand('1111','9999').'@gmail.com', 
            'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 
            'line_id'=>'test'.rand('1111','9999'),
            'inquiry' => 'お問い合わせ',
            'age' => rand('18','28'),
            'height' => rand('161','172'),
            'weight' => rand('51','61'),
            'bust' => 'C',
            'tattoo' => '無',
            'interview_date' => date('Y-m-d', strtotime('+10 days')),
            'other_message' => '大阪からの出稼ぎ希望です。<br>
            出稼ぎの条件等御座いましたらお伺いしたいです。<br>
            宜しくお願いいたします。'
        ]);

        Interview::create([
            'name'=>'飯田'.rand('1111','9999'), 
            'mail'=>'test'.rand('1111','9999').'@gmail.com', 
            'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 
            'line_id'=>'test'.rand('1111','9999'),
            'inquiry' => 'お問い合わせ',
            'age' => rand('18','28'),
            'height' => rand('161','172'),
            'weight' => rand('51','61'),
            'bust' => 'C',
            'tattoo' => '無',
            'interview_date' => date('Y-m-d', strtotime('+10 days')),
            'other_message' => '大阪からの出稼ぎ希望です。<br>
            出稼ぎの条件等御座いましたらお伺いしたいです。<br>
            宜しくお願いいたします。'
        ]);

        Interview::create([
            'name'=>'飯田'.rand('1111','9999'), 
            'mail'=>'test'.rand('1111','9999').'@gmail.com', 
            'tel'=>'81'.rand('11111','99999').rand('11111','99999'), 
            'line_id'=>'test'.rand('1111','9999'),
            'inquiry' => 'お問い合わせ',
            'age' => rand('18','28'),
            'height' => rand('161','172'),
            'weight' => rand('51','61'),
            'bust' => 'C',
            'tattoo' => '無',
            'other_message' => '大阪からの出稼ぎ希望です。<br>
            出稼ぎの条件等御座いましたらお伺いしたいです。<br>
            宜しくお願いいたします。'
        ]);
        
    }
}
