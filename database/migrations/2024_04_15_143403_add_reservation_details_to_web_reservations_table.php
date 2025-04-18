<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReservationDetailsToWebReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_reservations', function (Blueprint $table) {
            $table->integer('reservation_month')->nullable();
            $table->integer('reservation_date')->nullable();
            $table->integer('reservation_hour')->nullable();
            $table->integer('reservation_minute')->nullable();
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
            $table->dropColumn(['reservation_month', 'reservation_date', 'reservation_hour', 'reservation_minute']);
        });
    }
}
