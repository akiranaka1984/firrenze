<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeAgeAndOtherFieldsNullableInInterviewsTable extends Migration
{
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->integer('age')->nullable()->change();
            $table->string('height')->nullable()->change();
            $table->string('weight')->nullable()->change();
            $table->string('bust')->nullable()->change();
            $table->string('tattoo')->nullable()->change();
            $table->string('line_id')->nullable()->change();
            $table->string('appealing_points')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('interviews', function (Blueprint $table) {
            // 元に戻す処理は省略（必要に応じて実装）
        });
    }
}