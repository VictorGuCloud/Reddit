<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SubredditPostServiceProvider extends ServiceProvider
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
        app()->bind('SubredditPost', \App\Services\SubredditPostServices::class);
    }
}
