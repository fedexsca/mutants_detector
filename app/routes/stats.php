<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->get('/stats', function (Request $request, Response $response, $args) {

  $data = array('count_mutant_dna' => 40, 'count_human_dna' => 100, 'ratio' => 0.4);
  $payload = json_encode($data);

  $response->getBody()->write($payload);
  return $response
  ->withHeader('Content-Type', 'application/json');
});

?>
