<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDateFieldsInWebReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('web_reservations', function (Blueprint $table) {
        $table->date('date2')->nullable()->change();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // マイグレーションをロールバックする場合、NULLを許可しない元の設定に戻す
        Schema::table('web_reservations', function (Blueprint $table) {
            $table->date('date2')->nullable(false)->change(); // NULLを許可しない
        });
    }
}