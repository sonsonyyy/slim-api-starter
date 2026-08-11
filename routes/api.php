<?php

declare(strict_types=1);

use App\Modules\Health\Actions\HealthCheckAction;
use Slim\App;

return function (App $app): void {
    $app->get('/health', HealthCheckAction::class);
};
