<?php
namespace RerootAgency\LaravelElasticsearch\Managers;

use Illuminate\Support\Manager;
use RerootAgency\Elasticsearch\Clients\Client;
use RerootAgency\Elasticsearch\Clients\AwsClient;
use RerootAgency\Elasticsearch\Contracts\ClientInterface;

class ClientManager extends Manager
{
    public function getDefaultDriver()
    {
        $driver = config('es-laravel.driver');

        if(empty($driver)) {
            throw new \Exception('Default client driver is not set.');
        }

        return $driver;
    }

    public function createAwsDriver(): ClientInterface
    {
        return app()->make(AwsClient::class);
    }

    public function createElasticsearchDriver(): ClientInterface
    {
        return app()->make(Client::class);
    }
}
