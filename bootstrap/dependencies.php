<?php

declare(strict_types=1);

use App\Modules\Health\Actions\HealthCheckAction;
use App\Modules\Health\Services\HealthCheckService;
use App\Shared\Response\ResponseFactory;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder): void {
    $containerBuilder->addDefinitions([
        ResponseFactory::class => function (): ResponseFactory {
            return new ResponseFactory();
        },

        HealthCheckService::class => function (): HealthCheckService {
            return new HealthCheckService();
        },

        HealthCheckAction::class => function (ContainerInterface $container): HealthCheckAction {
            return new HealthCheckAction(
                $container->get(ResponseFactory::class),
                $container->get(HealthCheckService::class)
            );
        },
    ]);
};
