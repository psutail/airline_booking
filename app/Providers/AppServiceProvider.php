<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Repositories\AirlineBookingProcess\BookingScriptAction;
use App\Repositories\AirlineBookingProcess\BookingScriptActionDefintion;

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

        // $this->app->register(BookingScriptAction::class);
        $this->app->singleton(BookingScriptAction::class,BookingScriptActionDefintion::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
