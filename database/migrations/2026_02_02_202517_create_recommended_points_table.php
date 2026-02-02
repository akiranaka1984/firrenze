<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRecommendedPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommended_points', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('position')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        $tags = [
            '新人','経験者','未経験','清楚系','スタイル抜群','モデル系','キレカワ系','アイドル系',
            '素人系','グラビア系','お姉様系','ギャル系','現役モデル','AV女優','CA','女子大生',
            'ロリ系','おっとり系','綺麗系','可愛い系','癒し系','オススメ','巨乳','スレンダー',
            '女子アナ系','小柄','高身長','愛嬌抜群','パイパン','美脚','美乳','美尻','黒髪','ハーフ'
        ];

        foreach ($tags as $index => $tag) {
            DB::table('recommended_points')->insert([
                'name' => $tag,
                'position' => $index + 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommended_points');
    }
}
