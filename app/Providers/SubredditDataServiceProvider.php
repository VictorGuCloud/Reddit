<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SubredditDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind('SubredditData', \App\Services\SubredditDataServices::class);
    }
}
