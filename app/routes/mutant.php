<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once __DIR__ . '/../models/Person.php';
include __DIR__ . '/../detector/mutant.php';

$app->post('/mutant', function (Request $request, Response $response, $args) {
  $data = json_decode(file_get_contents('php://input'), true);

  $person = new Person();
  $person->setDna($data['dna']);

  if ($person->checkDna()) {
    $mutant = isMutant($person->dna);
    $person->setIsMutant($mutant);

    if ($mutant) {
      $response = $response->withStatus(200);
    } else {
      $response = $response->withStatus(403);
    }

  } else {
    $response = $response->withStatus(422);
  }

  return $response;
});
?>
