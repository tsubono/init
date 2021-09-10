<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\AdviserUser\AdviserUserRepositoryInterface::class,
            \App\Repositories\AdviserUser\AdviserUserRepository::class
        );

        $this->app->bind(
            \App\Repositories\MateUser\MateUserRepositoryInterface::class,
            \App\Repositories\MateUser\MateUserRepository::class
        );

        $this->app->bind(
            \App\Repositories\MstCategory\MstCategoryRepositoryInterface::class,
            \App\Repositories\MstCategory\MstCategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\MstCountry\MstCountryRepositoryInterface::class,
            \App\Repositories\MstCountry\MstCountryRepository::class
        );

        $this->app->bind(
            \App\Repositories\MstLanguage\MstLanguageRepositoryInterface::class,
            \App\Repositories\MstLanguage\MstLanguageRepository::class
        );

        $this->app->bind(
            \App\Repositories\MstRoom\MstRoomRepositoryInterface::class,
            \App\Repositories\MstRoom\MstRoomRepository::class
        );

        $this->app->bind(
            \App\Repositories\Lesson\LessonRepositoryInterface::class,
            \App\Repositories\Lesson\LessonRepository::class
        );

        $this->app->bind(
            \App\Repositories\Attendance\AttendanceRepositoryInterface::class,
            \App\Repositories\Attendance\AttendanceRepository::class
        );

        $this->app->bind(
            \App\Repositories\MateUserCoin\MateUserCoinRepositoryInterface::class,
            \App\Repositories\MateUserCoin\MateUserCoinRepository::class
        );

        $this->app->bind(
            \App\Repositories\AttendanceSale\AttendanceSaleRepositoryInterface::class,
            \App\Repositories\AttendanceSale\AttendanceSaleRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
