<?php

namespace App\Providers;

use DB;
use Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->isLocal() || $this->app->runningUnitTests()) {
            DB::listen(function ($event) {
                info([
                    'sql' => $event->sql,
                    'bindings' => $event->bindings,
                ]);
            });
        }

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
