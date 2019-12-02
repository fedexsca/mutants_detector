<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once __DIR__ . '/../models/Person.php';

$app->get('/stats', function (Request $request, Response $response, $args) {

  $total = Person::all();
  $positive = Person::positive();
  $human = $total - $positive;
  $ratio = $positive / $human;

  $stats = [
    "count_mutan_dna" => $positive,
    "count_human_dna" => $human,
    "ratio" => $ratio
  ];

  $payload = json_encode($stats);

  $response->getBody()->write($payload);
  return $response
  ->withHeader('Content-Type', 'application/json');

});

?>
