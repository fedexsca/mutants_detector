<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/db.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

require __DIR__ . '/../app/routes/default.php';
require __DIR__ . '/../app/routes/mutant.php';
require __DIR__ . '/../app/routes/stats.php';

$app->run();
?>
