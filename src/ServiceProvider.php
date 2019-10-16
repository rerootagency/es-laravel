<?php
namespace RerootAgency\LaravelElasticsearch;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use RerootAgency\Elasticsearch\Client;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('es-laravel.php'),
        ], 'es-laravel-config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('es-laravel', function ($app) {
            return new Client(config('es-laravel.host'), config('es-laravel.port'));
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'es-laravel'
        );
    }
}
