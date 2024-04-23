<?php

namespace App\Providers;

use App\Repositories\FavorisRepository;
use App\Repositories\FavorisRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    $this->app->bind(FavorisRepositoryInterface::class, FavorisRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
