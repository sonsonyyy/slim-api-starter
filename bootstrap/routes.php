<?php

declare(strict_types=1);

use Slim\App;

return function (App $app): void {
    (require __DIR__ . '/../routes/api.php')($app);
};
