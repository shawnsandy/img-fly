<?php

namespace ShawnSandy\ImgFly;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use ShawnSandy\ImgFly\Classes\ImgFly;

class ImgflyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('imgfly', \ShawnSandy\ImgFly\Middleware\ImgflyMiddleware::class);

        $this->publishes([
            __DIR__.'/Config/imgfly.php' => config_path('imgfly.php'),
        ], 'imgfly_config');

        // $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'imgfly');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/imgfly'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/Views', 'imgfly');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/imgfly'),
        ]);

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/imgfly'),
        ], 'imgfly_assets');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \ShawnSandy\ImgFly\Commands\ImgflyCommand::class,
            ]);
        }

        $this->app->bind('Imgfly', function(){
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
        $this->mergeConfigFrom(
            __DIR__ . '/Config/imgfly.php', 'imgfly'
        );
    }
}
