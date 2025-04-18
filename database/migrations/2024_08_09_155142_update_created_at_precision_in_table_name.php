<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCreatedAtPrecisionInTableName extends Migration
{
    public function up()
    {
        Schema::table('companions', function (Blueprint $table) {
            // カラムの精度を変更
            $table->dateTime('created_at', 3)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('table_name', function (Blueprint $table) {
            // 元に戻す
            $table->timestamp('created_at', 0)->nullable()->change();
        });
    }
}

