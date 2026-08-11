<?php

declare(strict_types=1);

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder): void {
    $containerBuilder->addDefinitions([
        'settings' => [
            'app' => [
                'name' => $_ENV['APP_NAME'] ?? 'Slim API Starter',
                'env' => $_ENV['APP_ENV'] ?? 'production',
                'debug' => filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOL),
                'url' => $_ENV['APP_URL'] ?? 'http://localhost:8080',
            ],

            'database' => [
                'driver' => $_ENV['DB_CONNECTION'] ?? 'pgsql',
                'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
                'port' => $_ENV['DB_PORT'] ?? '5432',
                'database' => $_ENV['DB_DATABASE'] ?? 'slim_api_starter',
                'username' => $_ENV['DB_USERNAME'] ?? 'root',
                'password' => $_ENV['DB_PASSWORD'] ?? '',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
            ],

            'logging' => [
                'level' => $_ENV['LOG_LEVEL'] ?? 'debug',
                'path' => dirname(__DIR__) . '/storage/logs/app.log',
            ],
        ],
    ]);
};
