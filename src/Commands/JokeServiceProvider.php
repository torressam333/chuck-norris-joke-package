<?php

namespace Sam\Commands;

use Illuminate\Support\ServiceProvider;

class JokeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.sam.tell-a-joke', function($app) {
            return $app['Sam\Commands\Joke'];
        });

        //Register command
        $this->commands('command.sam.tell-a-joke');
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
