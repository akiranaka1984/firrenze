<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddUniqueConstraintToCompanionPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 既存の重複レコードを削除（古い方を残す）
        $duplicates = DB::table('companion_photos')
            ->select('companion_id', 'photo_setting_id')
            ->groupBy('companion_id', 'photo_setting_id')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($duplicates as $duplicate) {
            $keep = DB::table('companion_photos')
                ->where('companion_id', $duplicate->companion_id)
                ->where('photo_setting_id', $duplicate->photo_setting_id)
                ->orderBy('updated_at', 'desc')
                ->first();

            if ($keep) {
                DB::table('companion_photos')
                    ->where('companion_id', $duplicate->companion_id)
                    ->where('photo_setting_id', $duplicate->photo_setting_id)
                    ->where('id', '!=', $keep->id)
                    ->delete();
            }
        }

        Schema::table('companion_photos', function (Blueprint $table) {
            $table->unique(['companion_id', 'photo_setting_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companion_photos', function (Blueprint $table) {
            $table->dropUnique(['companion_id', 'photo_setting_id']);
        });
    }
}
