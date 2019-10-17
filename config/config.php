<?php

    return [
        'driver' => env('ELASTICSEARCH_DRIVER', 'elasticsearch'),
        'host' => env('ELASTICSEARCH_HOST', 'localhost'),
        'port' => env('ELASTICSEARCH_PORT', 9200),
        'path' => env('ELASTICSEARCH_PATH', ''),
        'user' => env('ELASTICSEARCH_USER', ''),
        'pass' => env('ELASTICSEARCH_PASS', ''),
        'scheme' => env('ELASTICSEARCH_SCHEME', 'http'),
        'aws_key' => env('ELASTICSEARCH_AWS_KEY'),
        'aws_secret' => env('ELASTICSEARCH_AWS_SECRET'),
        'aws_region' => env('ELASTICSEARCH_AWS_REGION'),
    ];