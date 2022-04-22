<?php

namespace App\Providers;

use App\Services\Contracts\InvoicesServiceInterface;
use App\Services\InvoicesService;
use Illuminate\Support\ServiceProvider;

class InvoicesServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            InvoicesServiceInterface::class,
            InvoicesService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
    }
}
