<?php

declare(strict_types=1);

use Slim\App;

return function (App $app): void {
    $app->addBodyParsingMiddleware();

    $app->addRoutingMiddleware();

    $errorMiddleware = $app->addErrorMiddleware(
        displayErrorDetails: (bool) ($_ENV['APP_DEBUG'] ?? false),
        logErrors: true,
        logErrorDetails: true
    );
};
