<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeInquiryNullableInInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            // inquiry カラムを nullable に変更
            $table->string('inquiry')->nullable()->change();
            
            // 必要に応じて他のカラムも nullable に
            $table->string('other_message')->nullable()->change();
            $table->string('appealing_points')->nullable()->change();
            $table->datetime('interview_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interviews', function (Blueprint $table) {
            // 元に戻す処理
            $table->string('inquiry')->nullable(false)->change();
            $table->string('other_message')->nullable(false)->change();
            $table->string('appealing_points')->nullable(false)->change();
            $table->datetime('interview_date')->nullable(false)->change();
        });
    }
}