<?php

namespace App\Providers;

use App\Services\UserTimezoneService;
use Illuminate\Support\ServiceProvider;

class UserTimezoneServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserTimezoneService::class, function () {
            return new UserTimezoneService(config('app.user_timezone'));
        });
    }
}
