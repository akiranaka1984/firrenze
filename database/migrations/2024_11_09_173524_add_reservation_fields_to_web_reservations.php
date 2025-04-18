<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReservationFieldsToWebReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_reservations', function (Blueprint $table) {
            if (!Schema::hasColumn('web_reservations', 'user_id')) {
                $table->integer('user_id')->nullable(); // ユーザーID
            }
            if (!Schema::hasColumn('web_reservations', 'name')) {
                $table->string('name')->nullable(); // お名前
            }
            if (!Schema::hasColumn('web_reservations', 'mail')) {
                $table->string('mail')->nullable(); // メールアドレス
            }
            if (!Schema::hasColumn('web_reservations', 'tel')) {
                $table->string('tel')->nullable(); // 電話番号
            }
            if (!Schema::hasColumn('web_reservations', 'lineid')) {
                $table->string('lineid')->nullable(); // LINE ID
            }
            if (!Schema::hasColumn('web_reservations', 'lady1')) {
                $table->string('lady1')->nullable(); // 希望モデル第一希望
            }
            if (!Schema::hasColumn('web_reservations', 'lady2')) {
                $table->string('lady2')->nullable(); // 希望モデル第二希望
            }
            if (!Schema::hasColumn('web_reservations', 'lady3')) {
                $table->string('lady3')->nullable(); // 希望モデル第三希望
            }
            if (!Schema::hasColumn('web_reservations', 'date1')) {
                $table->date('date1')->nullable(); // 第一希望日
            }
            if (!Schema::hasColumn('web_reservations', 'date2')) {
                $table->date('date2')->nullable(); // 第二希望日
            }
            if (!Schema::hasColumn('web_reservations', 'date3')) {
                $table->date('date3')->nullable(); // 第三希望日
            }
            if (!Schema::hasColumn('web_reservations', 'cource')) {
                $table->string('cource')->nullable(); // コース
            }
            if (!Schema::hasColumn('web_reservations', 'place')) {
                $table->string('place')->nullable(); // 利用予定のホテルまたは地域
            }
            if (!Schema::hasColumn('web_reservations', 'pay')) {
                $table->string('pay')->nullable(); // 支払い方法
            }
            if (!Schema::hasColumn('web_reservations', 'contact')) {
                $table->string('contact')->nullable(); // クラブからの連絡方法
            }
            if (!Schema::hasColumn('web_reservations', 'cmnt')) {
                $table->text('cmnt')->nullable(); // お問い合わせ内容
            }
            if (!Schema::hasColumn('web_reservations', 'compatible')) {
                $table->integer('compatible')->default(0); // 互換性（デフォルト0）
            }
            if (!Schema::hasColumn('web_reservations', 'status')) {
                $table->integer('status')->default(1); // ステータス（デフォルト1）
            }
            if (!Schema::hasColumn('web_reservations', 'reservation_month')) {
                $table->integer('reservation_month')->nullable(); // 予約希望月
            }
            if (!Schema::hasColumn('web_reservations', 'reservation_date')) {
                $table->integer('reservation_date')->nullable(); // 予約希望日
            }
            if (!Schema::hasColumn('web_reservations', 'reservation_hour')) {
                $table->integer('reservation_hour')->nullable(); // 予約希望時
            }
            if (!Schema::hasColumn('web_reservations', 'reservation_minute')) {
                $table->integer('reservation_minute')->nullable(); // 予約希望分
            }
            // timestamps（created_at, updated_at）は自動で追加されている場合があるため、ここでは省略
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
            if (Schema::hasColumn('web_reservations', 'user_id')) {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('web_reservations', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('web_reservations', 'mail')) {
                $table->dropColumn('mail');
            }
            if (Schema::hasColumn('web_reservations', 'tel')) {
                $table->dropColumn('tel');
            }
            if (Schema::hasColumn('web_reservations', 'lineid')) {
                $table->dropColumn('lineid');
            }
            if (Schema::hasColumn('web_reservations', 'lady1')) {
                $table->dropColumn('lady1');
            }
            if (Schema::hasColumn('web_reservations', 'lady2')) {
                $table->dropColumn('lady2');
            }
            if (Schema::hasColumn('web_reservations', 'lady3')) {
                $table->dropColumn('lady3');
            }
            if (Schema::hasColumn('web_reservations', 'date1')) {
                $table->dropColumn('date1');
            }
            if (Schema::hasColumn('web_reservations', 'date2')) {
                $table->dropColumn('date2');
            }
            if (Schema::hasColumn('web_reservations', 'date3')) {
                $table->dropColumn('date3');
            }
            if (Schema::hasColumn('web_reservations', 'cource')) {
                $table->dropColumn('cource');
            }
            if (Schema::hasColumn('web_reservations', 'place')) {
                $table->dropColumn('place');
            }
            if (Schema::hasColumn('web_reservations', 'pay')) {
                $table->dropColumn('pay');
            }
            if (Schema::hasColumn('web_reservations', 'contact')) {
                $table->dropColumn('contact');
            }
            if (Schema::hasColumn('web_reservations', 'cmnt')) {
                $table->dropColumn('cmnt');
            }
            if (Schema::hasColumn('web_reservations', 'compatible')) {
                $table->dropColumn('compatible');
            }
            if (Schema::hasColumn('web_reservations', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('web_reservations', 'reservation_month')) {
                $table->dropColumn('reservation_month');
            }
            if (Schema::hasColumn('web_reservations', 'reservation_date')) {
                $table->dropColumn('reservation_date');
            }
            if (Schema::hasColumn('web_reservations', 'reservation_hour')) {
                $table->dropColumn('reservation_hour');
            }
            if (Schema::hasColumn('web_reservations', 'reservation_minute')) {
                $table->dropColumn('reservation_minute');
            }
        });
    }
}