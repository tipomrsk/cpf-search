<?php

namespace App\Providers;

use App\Repositories\API\mocky\MockyAPI;
use App\Repositories\CompaniesRepository;
use App\Repositories\Interface\CompaniesRepositoryInterface;
use App\Repositories\Interface\MockyRepositoryInterface;
use App\Repositories\Interface\UsersRepositoryInterface;
use App\Repositories\UsersRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
