<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanionsTableChangeSalePointColumn extends Migration
{
    public function up()
    {
        Schema::table('companions', function (Blueprint $table) {
            $table->text('sale_point')->change();
        });
    }

    public function down()
    {
        Schema::table('companions', function (Blueprint $table) {
            $table->string('sale_point', 255)->change();
        });
    }
}
