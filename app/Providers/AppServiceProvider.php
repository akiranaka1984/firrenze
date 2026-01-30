<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 既存の設定：ページネーションをBootstrapで
        Paginator::useBootstrap();

        // Artisan(tinker/queue等)実行時はHTTP_HOSTがないので切替え処理はスキップ
        if (app()->runningInConsole()) {
            return;
        }

        // vipサブドメインのときだけ各種設定を上書き
        if (request()->getHost() === 'vip.club-firenze.net') {

            // .env に追記した VIP_* の値で上書き
            config([
                'app.url' => env('VIP_APP_URL', 'https://vip.club-firenze.net'),

                // 既定(mysql)接続を書き換え
                'database.connections.mysql.database' => env('VIP_DB_DATABASE'),
                'database.connections.mysql.username' => env('VIP_DB_USERNAME'),
                'database.connections.mysql.password' => env('VIP_DB_PASSWORD'),
                'database.connections.mysql.host'     => env('VIP_DB_HOST', 'localhost'),

                // セッション/キャッシュの衝突を避ける（任意だが推奨）
                'session.cookie' => env('VIP_SESSION_COOKIE', 'laravel_session_vip'),
                'cache.prefix'   => env('VIP_CACHE_PREFIX', 'vip_'),
            ]);

            // 生成されるURL/asset()をVIPのURL・httpsに固定
            URL::forceRootUrl(config('app.url'));
            if (strpos((string) config('app.url'), 'https://') === 0) {
                URL::forceScheme('https');
            }

            // もし既に接続済みなら、上書き後の設定で再接続
            DB::purge('mysql');
            DB::reconnect('mysql');
        }
    }
}
