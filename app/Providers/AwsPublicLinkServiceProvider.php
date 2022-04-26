<?php

namespace App\Providers;

use App\Services\AwsPublicLink;
use App\Services\Contracts\AwsPublicLinkInterface;
use Illuminate\Support\ServiceProvider;

class AwsPublicLinkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AwsPublicLinkInterface::class,
            AwsPublicLink::class
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
