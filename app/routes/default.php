<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
$app->any('/', function (Request $request, Response $response, $args) {


  $response->getBody()->write("API de detección de mutantes por Federico Scaiola para MercadoLibre");
  return $response;

});

?>
