<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SubredditServiceProvider extends ServiceProvider
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
        app()->bind('Subreddit', \App\Services\SubredditServices::class);
    }
}
