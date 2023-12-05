<?php

namespace OtherCode\ImgFly;

use Illuminate\Support\ServiceProvider;

class ImgFlyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/imgfly.php' => config_path('imgfly.php'),
        ]);

        $this->app->bind('ImgFly', function () {
            return new ImgFly();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/imgfly.php', 'imgfly');
    }
}
