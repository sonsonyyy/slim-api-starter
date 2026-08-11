<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$containerBuilder = new ContainerBuilder();

$settings = require __DIR__ . '/settings.php';
$dependencies = require __DIR__ . '/dependencies.php';

$settings($containerBuilder);
$dependencies($containerBuilder);

$container = $containerBuilder->build();

AppFactory::setContainer($container);

$app = AppFactory::create();

(require __DIR__ . '/middleware.php')($app);
(require __DIR__ . '/routes.php')($app);

return $app;
