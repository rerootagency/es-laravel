<?php
namespace RerootAgency\LaravelElasticsearch;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use RerootAgency\Elasticsearch\Clients\Client;
use RerootAgency\Elasticsearch\Clients\AwsClient;
use RerootAgency\LaravelElasticsearch\Managers\ClientManager;

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
        app()->bind('es-laravel.manager', function($app) {
            return new ClientManager($app);
        });

        $this->app->singleton(Client::class, function ($app) {
            return new Client(
                config('es-laravel.host'),
                config('es-laravel.port'),
                config('es-laravel.path'),
                config('es-laravel.user'),
                config('es-laravel.pass'),
                config('es-laravel.scheme')
            );
        });

        $this->app->singleton(AwsClient::class, function ($app) {
            return new AwsClient(
                config('es-laravel.aws_key'),
                config('es-laravel.aws_secret'),
                config('es-laravel.aws_region'),
                config('es-laravel.host'),
                config('es-laravel.port'),
                config('es-laravel.path'),
                config('es-laravel.user'),
                config('es-laravel.pass'),
                config('es-laravel.scheme')
            );
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'es-laravel'
        );
    }
}
