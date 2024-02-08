<?php

namespace App\Providers;

use App\Repositories\API\mocky\MockyAPI;
use App\Repositories\CompaniesRepository;
use App\Repositories\Interface\CompaniesRepositoryInterface;
use App\Repositories\Interface\MockyRepositoryInterface;
use App\Repositories\Interface\OrdersRepositoryInterface;
use App\Repositories\Interface\OrdersTrackingRepositoryInterface;
use App\Repositories\Interface\ReceiversRepositoryInterface;
use App\Repositories\Interface\SendersRepositoryInterface;
use App\Repositories\Interface\UsersRepositoryInterface;
use App\Repositories\OrdersRepository;
use App\Repositories\ReceiversRepository;
use App\Repositories\SendersRepository;
use App\Repositories\UsersRepository;
use App\Services\OrdersTrackingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UsersRepositoryInterface::class,
            UsersRepository::class,
        );

        $this->app->bind(
            CompaniesRepositoryInterface::class,
            CompaniesRepository::class,
        );

        $this->app->bind(
            MockyRepositoryInterface::class,
            MockyAPI::class,
        );

        $this->app->bind(
            SendersRepositoryInterface::class,
            SendersRepository::class,
        );

        $this->app->bind(
            ReceiversRepositoryInterface::class,
            ReceiversRepository::class,
        );

        $this->app->bind(
            OrdersRepositoryInterface::class,
            OrdersRepository::class,
        );

        $this->app->bind(
            OrdersTrackingRepositoryInterface::class,
            OrdersTrackingRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
