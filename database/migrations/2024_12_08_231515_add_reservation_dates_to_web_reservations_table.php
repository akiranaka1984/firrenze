<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReservationDatesToWebReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('web_reservations', function (Blueprint $table) {
            $table->dateTime('first_reservation_date')->nullable()->after('lady3');
            $table->dateTime('second_reservation_date')->nullable()->after('first_reservation_date');
            $table->dateTime('third_reservation_date')->nullable()->after('second_reservation_date');
        });
    }

    public function down()
    {
        Schema::table('web_reservations', function (Blueprint $table) {
            $table->dropColumn(['first_reservation_date', 'second_reservation_date', 'third_reservation_date']);
        });
    }
}

