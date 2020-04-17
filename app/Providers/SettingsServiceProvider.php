<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $cache, Setting $settings)
    {
        if (env('APP_INSTALLED')) {
            if (DB::connection()->getDatabaseName()) {
                if (Schema::hasTable('settings')) {
                    $settings = $cache->remember('settings', 60, function () use ($settings) {
                        return $settings->pluck('value', 'key')->all();
                    });
                    config()->set('settings', $settings);
                }
            }
        }
    }
}
