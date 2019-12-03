<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once __DIR__ . '/../models/Person.php';

$app->get('/stats', function (Request $request, Response $response, $args) {

  $sql = "SELECT
            -- Sumatoria mutantes
            sum(case when is_mutant = 1 then count else 0 end) AS count_mutant_dna,
            -- Sumatoria humanos
            sum(case when is_mutant = 0 then count else 0 end) AS count_human_dna,
            -- Ratio mutantes/humanos
            sum(case when is_mutant = 1 then count else 0 end)/sum(case when is_mutant = 0 then count else 0 end) as ratio
          FROM people";

  $stats = db::query($sql);

  $payload = json_encode($stats[0], JSON_NUMERIC_CHECK);

  $response->getBody()->write($payload);
  return $response
  ->withHeader('Content-Type', 'application/json');

});

?>
