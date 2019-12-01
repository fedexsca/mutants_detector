<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

require __DIR__ . '/../app/routes/mutant.php';
require __DIR__ . '/../app/routes/stats.php';

$app->run();
?>
