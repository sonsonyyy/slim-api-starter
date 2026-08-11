<?php

declare(strict_types=1);

namespace App\Shared\Response;

use Psr\Http\Message\ResponseInterface;

final readonly class ResponseFactory
{
    /**
     * @param array<string, mixed> $data
     */
    public function json(
        ResponseInterface $response,
        array $data,
        int $statusCode = 200
    ): ResponseInterface {
        $payload = json_encode($data, JSON_THROW_ON_ERROR);

        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($statusCode);
    }
}
