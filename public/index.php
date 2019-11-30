<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include_once __DIR__ . '/../app/Person.php';

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->post('/mutant', function (Request $request, Response $response, $args) {
  $data = json_decode(file_get_contents('php://input'), true);

  $person = new Person();
  $person->setDna($data['dna']);

  if ($person->checkDna()) {
    $mutant = $person->isMutant();
  } else {
    $response->getBody()->write("El DNA enviado no es analizable");
  }

  if ($mutant) {
    $response = $response->withStatus(200);
  } else {
    $response = $response->withStatus(403);
  }

  return $response;
});

// $app->get('/stats', function (Request $request, Response $response, $args) {
//     $response->getBody()->write("Stats");
//     return $response;
// });


$app->run();
