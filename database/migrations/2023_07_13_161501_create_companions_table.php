<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('name')->nullable();
            $table->string('kana')->nullable();
            $table->string('age')->nullable();
            $table->string('height')->nullable();
            $table->string('bust')->nullable();
            $table->string('cup')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->string('rookie')->nullable();
            $table->string('hobby')->nullable();
            $table->string('sale_point')->nullable();
            $table->string('font_color')->nullable();
            $table->text('message')->nullable();
            $table->string('entry_date')->nullable();

            $table->string('category_id')->nullable();
            $table->string('previous_position')->nullable();
            $table->string('celebrities_who_look_alike')->nullable();
            $table->integer('position')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->string('nickname1')->nullable();
            $table->string('nickname2')->nullable();
            $table->string('birthday')->nullable();
            $table->string('hiragana')->nullable();
            $table->string('surnames')->nullable();
            $table->string('styles')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companions');
    }
}
