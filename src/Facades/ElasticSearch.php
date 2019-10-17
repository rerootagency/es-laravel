<?php
namespace RerootAgency\LaravelElasticsearch\Facades;

use Illuminate\Support\Facades\Facade;

class ElasticSearch extends Facade
{
    protected static function getFacadeAccessor() { return 'es-laravel.manager'; }
}