<?php

declare(strict_types=1);

namespace App\Modules\Health\Actions;

use App\Modules\Health\Services\HealthCheckService;
use App\Shared\Response\ResponseFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final readonly class HealthCheckAction
{
    public function __construct(
        private ResponseFactory $responseFactory,
        private HealthCheckService $healthCheckService
    ) {
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        return $this->responseFactory->json(
            $response,
            $this->healthCheckService->check()
        );
    }
}
