<?php

declare(strict_types=1);

use Slim\App;
use Slim\Psr7\Factory\ServerRequestFactory;

it('returns a successful health check response', function (): void {
    /** @var App<\Psr\Container\ContainerInterface|null> $app */
    $app = require __DIR__ . '/../../bootstrap/app.php';

    $request = (new ServerRequestFactory())->createServerRequest(
        'GET',
        '/health'
    );

    $response = $app->handle($request);

    expect($response->getStatusCode())->toBe(200);

    $body = (string) $response->getBody();

    expect(json_decode($body, true))->toBe([
        'status' => 'ok',
        'message' => 'Slim API Starter is running.',
    ]);
});
