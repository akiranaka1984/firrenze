<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


use App\Models\User;
use App\Models\Category;
use App\Models\PhotoSizeSetting;
use App\Models\PhotoCategory;
use App\Models\Companion;
use App\Models\CompanionPhoto;

class AdminEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verify_status' => 1,
            'password' => bcrypt('123456'),
            'city'=>'jp',
            'role'=>'admin'
        ]);

        
        Category::create(['name'=>'PLATINUM', 'position'=>1]);
        Category::create(['name'=>'BLAK', 'position'=>2]);
        Category::create(['name'=>'DIAMOND', 'position'=>3]);
        Category::create(['name'=>'RED DIAMOND', 'position'=>4]);

        PhotoCategory::create(['name'=>'メイン', 'position'=>1]);
        PhotoCategory::create(['name'=>'ギャラリー', 'position'=>2]);

        PhotoSizeSetting::create([
            'name' => "メイン画像(在籍写真1枚目)",
            'kana' => "メイン画像(在籍写真1枚目)",
            'category_id' => 1,
            'prefix' => "moto",
            'status' => 1
        ]);

        PhotoSizeSetting::create([
            'name' => "在籍写真1 枚目",
            'kana' => "在籍写真1 枚目",
            'category_id' => 2,
            'hpx' => 120,
            'vpx' => 160,
            'prefix' => "thmb",
            'status' => 1
        ]);

        PhotoSizeSetting::create([
            'name' => "在籍写真2 枚目",
            'kana' => "在籍写真2 枚目",
            'category_id' => 2,
            'hpx' => 210,
            'vpx' => 280,
            'prefix' => "topi",
            'status' => 1
        ]);

        PhotoSizeSetting::create([
            'name' => "在籍写真3 枚目",
            'kana' => "在籍写真3 枚目",
            'category_id' => 2,
            'hpx' => 180,
            'vpx' => 240,
            'prefix' => "wk",
            'status' => 1
        ]);

        PhotoSizeSetting::create([
            'name' => "在籍写真4 枚目",
            'kana' => "在籍写真4 枚目",
            'category_id' => 2,
            'hpx' => 60,
            'vpx' => 80,
            'prefix' => "mthmb",
            'status' => 1
        ]);

        PhotoSizeSetting::create([
            'name' => "在籍写真5 枚目",
            'kana' => "在籍写真5 枚目",
            'category_id' => 2,
            'hpx' => 720,
            'vpx' => 960,
            'prefix' => "main",
            'status' => 1
        ]);

        $companion1 = Companion::create([
            'name' => '陽葵',
            'kana' => '陽葵',
            'age' => 21,
            'height' => 155,
            'bust' => 32,
            'cup' => 'D',
            'waist' => 36,
            'hip' => 34,
            'rookie' => '新人',
            'hobby' => 'tennis',
            'sale_point' => 152,
            'font_color' => '黒',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-13',
            'category_id' => 1,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion1->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion1->id.'.jpg',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion1->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion1->id.'.jpg',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion1->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion1->id.'.jpg',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion1->id,
            'photo_setting_id' => 4,
            'title' => '出勤',
            'photo' => 'wk_'.$companion1->id.'.jpg',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion1->id,
            'photo_setting_id' => 5,
            'title' => '携帯サムネイル',
            'photo' => 'mthmb_'.$companion1->id.'.jpg',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion1->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion1->id.'.jpg',
            'status' => 1
        ]);

        $companion2 = Companion::create([
            'name' => '陽菜',
            'kana' => '陽菜',
            'age' => 23,
            'height' => 157,
            'bust' => 34,
            'cup' => 'D',
            'waist' => 36,
            'hip' => 34,
            'rookie' => '経験者',
            'hobby' => 'tennis',
            'sale_point' => 154,
            'font_color' => 'デフォルト',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-14',
            'category_id' => 2,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion2->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion2->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion2->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion2->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion2->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion2->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion2->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion2->id.'.png',
            'status' => 1
        ]);


        $companion3 = Companion::create([
            'name' => '結愛',
            'kana' => '結愛',
            'age' => 19,
            'height' => 161,
            'bust' => 32,
            'cup' => 'C',
            'waist' => 28,
            'hip' => 32,
            'rookie' => '経験者',
            'hobby' => 'tennis',
            'sale_point' => 154,
            'font_color' => '青',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-11',
            'category_id' => 3,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion3->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion3->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion3->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion3->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion3->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion3->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion3->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion3->id.'.png',
            'status' => 1
        ]);

        $companion4 = Companion::create([
            'name' => '咲良',
            'kana' => '咲良',
            'age' => 26,
            'height' => 151,
            'bust' => 36,
            'cup' => 'D',
            'waist' => 30,
            'hip' => 36,
            'rookie' => '新人',
            'hobby' => 'tennis',
            'sale_point' => 159,
            'font_color' => '黒',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-12',
            'category_id' => 4,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion4->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion4->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion4->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion4->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion4->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion4->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion4->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion4->id.'.png',
            'status' => 1
        ]);

        $companion5 = Companion::create([
            'name' => '丹梨',
            'kana' => '丹梨',
            'age' => 27,
            'height' => 159,
            'bust' => 36,
            'cup' => 'D',
            'waist' => 30,
            'hip' => 36,
            'rookie' => '経験者',
            'hobby' => 'tennis',
            'sale_point' => 152,
            'font_color' => 'デフォルト',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-10',
            'category_id' => 1,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion5->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion5->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion5->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion5->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion5->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion5->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion5->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion5->id.'.png',
            'status' => 1
        ]);

        $companion6 = Companion::create([
            'name' => '冴咲',
            'kana' => '冴咲',
            'age' => 21,
            'height' => 151,
            'bust' => 32,
            'cup' => 'C',
            'waist' => 26,
            'hip' => 34,
            'rookie' => '新人',
            'hobby' => 'tennis',
            'sale_point' => 165,
            'font_color' => '青',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-14',
            'category_id' => 2,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion6->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion6->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion6->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion6->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion6->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion6->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion6->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion6->id.'.png',
            'status' => 1
        ]);


        $companion7 = Companion::create([
            'name' => '佑泉',
            'kana' => '佑泉',
            'age' => 23,
            'height' => 161,
            'bust' => 32,
            'cup' => 'C',
            'waist' => 26,
            'hip' => 36,
            'rookie' => '経験者',
            'hobby' => 'tennis',
            'sale_point' => 167,
            'font_color' => 'デフォルト',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-14',
            'category_id' => 3,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion7->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion7->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion7->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion7->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion7->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion7->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion7->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion7->id.'.png',
            'status' => 1
        ]);

        $companion8 = Companion::create([
            'name' => '亜桜依',
            'kana' => '亜桜依',
            'age' => 26,
            'height' => 154,
            'bust' => 34,
            'cup' => 'D',
            'waist' => 28,
            'hip' => 38,
            'rookie' => '新人',
            'hobby' => 'tennis',
            'sale_point' => 163,
            'font_color' => '黒',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-14',
            'category_id' => 4,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion8->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion8->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion8->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion8->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion8->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion8->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion8->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion8->id.'.png',
            'status' => 1
        ]);

        $companion9 = Companion::create([
            'name' => '大翔',
            'kana' => '大翔',
            'age' => 27,
            'height' => 153,
            'bust' => 30,
            'cup' => 'B',
            'waist' => 26,
            'hip' => 34,
            'rookie' => '新人',
            'hobby' => 'tennis',
            'sale_point' => 163,
            'font_color' => '青',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-14',
            'category_id' => 3,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion9->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion9->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion9->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion9->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion9->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion9->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion9->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion9->id.'.png',
            'status' => 1
        ]);

        $companion10 = Companion::create([
            'name' => '俐空',
            'kana' => '俐空',
            'age' => 18,
            'height' => 159,
            'bust' => 34,
            'cup' => 'D',
            'waist' => 28,
            'hip' => 38,
            'rookie' => '経験者',
            'hobby' => 'tennis',
            'sale_point' => 168,
            'font_color' => '青',
            'message' => '<p>ひらがな</p>',
            'entry_date' => '2023-07-14',
            'category_id' => 4,
            'celebrities_who_look_alike'=>'なべくらうた',
            'position' => 1,
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion10->id,
            'photo_setting_id' => 1,
            'title' => '元画像',
            'photo' => 'moto_'.$companion10->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion10->id,
            'photo_setting_id' => 2,
            'title' => '基本サム',
            'photo' => 'thmb_'.$companion10->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion10->id,
            'photo_setting_id' => 3,
            'title' => 'トピックス',
            'photo' => 'topi_'.$companion10->id.'.png',
            'status' => 1
        ]);
        CompanionPhoto::create([
            'companion_id' => $companion10->id,
            'photo_setting_id' => 6,
            'title' => 'メイン',
            'photo' => 'main_'.$companion10->id.'.png',
            'status' => 1
        ]);

    }
}
