<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDateFieldsNullableInWebReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('web_reservations', function (Blueprint $table) {
            $table->date('date1')->nullable()->change();
            $table->date('date2')->nullable()->change();
            $table->date('date3')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('web_reservations', function (Blueprint $table) {
            $table->date('date1')->nullable(false)->change();
            $table->date('date2')->nullable(false)->change();
            $table->date('date3')->nullable(false)->change();
        });
    }
}

