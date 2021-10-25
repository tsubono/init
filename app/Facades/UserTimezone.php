<?php

namespace App\Facades;

use App\Services\UserTimezoneService;
use Illuminate\Support\Facades\Facade;

class UserTimezone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserTimezoneService::class;
    }
}
