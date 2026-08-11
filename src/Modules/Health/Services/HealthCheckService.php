<?php

declare(strict_types=1);

namespace App\Modules\Health\Services;

final readonly class HealthCheckService
{
    /**
     * @return array<string, string>
     */
    public function check(): array
    {
        return [
            'status' => 'ok',
            'message' => 'Slim API Starter is running.',
        ];
    }
}
