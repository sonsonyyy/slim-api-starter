<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__)->safeLoad();

$driver = $_ENV['DB_CONNECTION'] ?? 'pgsql';

$adapter = match ($driver) {
    'mysql' => 'mysql',
    'pgsql', 'postgres', 'postgresql' => 'pgsql',
    default => throw new InvalidArgumentException("Unsupported database driver [{$driver}]."),
};

$defaultPort = $adapter === 'mysql' ? 3306 : 5432;

return [
    'paths' => [
        'migrations' => 'database/migrations',
        'seeds' => 'database/seeds',
    ],

    'environments' => [
        'default_environment' => $_ENV['APP_ENV'] ?? 'local',

        $_ENV['APP_ENV'] ?? 'local' => [
            'adapter' => $adapter,
            'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
            'name' => $_ENV['DB_DATABASE'] ?? 'slim_api_starter',
            'user' => $_ENV['DB_USERNAME'] ?? 'root',
            'pass' => $_ENV['DB_PASSWORD'] ?? '',
            'port' => (int) ($_ENV['DB_PORT'] ?? $defaultPort),
            'charset' => 'utf8',
        ],
    ],

    'version_order' => 'creation',
];
