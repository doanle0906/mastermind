<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Users\UserRepositoryInterface::class,
            \App\Repositories\Users\UserRepository::class
        );
        $this->app->bind(
            \App\Repositories\Banks\BankRepositoryInterface::class,
            \App\Repositories\Banks\BankRepository::class
        );
        $this->app->bind(
            \App\Repositories\AvgSearchs\AvgSearchRepositoryInterface::class,
            \App\Repositories\AvgSearchs\AvgSearchRepository::class
        );
        $this->app->bind(
            \App\Repositories\AvgSearchVolumes\AvgSearchVolumeRepositoryInterface::class,
            \App\Repositories\AvgSearchVolumes\AvgSearchVolumeRepository::class
        );
        $this->app->bind(
            \App\Repositories\BqiMonthBB\BqiMonthBBRepositoryInterface::class,
            \App\Repositories\BqiMonthBB\BqiMonthBBRepository::class
        );
        $this->app->bind(
            \App\Repositories\BqiMonthTB\BqiMonthTBRepositoryInterface::class,
            \App\Repositories\BqiMonthTB\BqiMonthTBRepository::class
        );
        $this->app->bind(
            \App\Repositories\BqiProductBB\BqiProductBBRepositoryInterface::class,
            \App\Repositories\BqiProductBB\BqiProductBBRepository::class
        );
        $this->app->bind(
            \App\Repositories\BqiProductTB\BqiProductTBRepositoryInterface::class,
            \App\Repositories\BqiProductTB\BqiProductTBRepository::class
        );
        $this->app->bind(
            \App\Services\ReportBanks\ReportBankServiceInterface::class,
            \App\Services\ReportBanks\ReportBankService::class
        );
        $this->app->bind(
            \App\Services\Users\UserServiceInterface::class,
            \App\Services\Users\UserService::class
        );
        $this->app->bind(
            \App\Services\Banks\BankServiceInterface::class,
            \App\Services\Banks\BankService::class
        );
        $this->app->bind(
            \App\Repositories\Chart1BB\Chart1BBRepositoryInterface::class,
            \App\Repositories\Chart1BB\Chart1BBRepository::class
        );
        $this->app->bind(
            \App\Repositories\Chart2TB\Chart2TBRepositoryInterface::class,
            \App\Repositories\Chart2TB\Chart2TBRepository::class
        );
        $this->app->bind(
            \App\Repositories\Chart3Top10\Chart3Top10RepositoryInterface::class,
            \App\Repositories\Chart3Top10\Chart3Top10Repository::class
        );
        $this->app->bind(
            \App\Repositories\Chart4Daily\Chart4DailyRepositoryInterface::class,
            \App\Repositories\Chart4Daily\Chart4DailyRepository::class
        );
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
