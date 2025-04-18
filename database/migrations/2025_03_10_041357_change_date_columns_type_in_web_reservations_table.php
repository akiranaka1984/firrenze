<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDateColumnsTypeInWebReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_reservations', function (Blueprint $table) {
            $table->datetime('date1')->nullable()->change();
            $table->datetime('date2')->nullable()->change();
            $table->datetime('date3')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('web_reservations', function (Blueprint $table) {
            //
        });
    }
}
