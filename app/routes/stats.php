<?php

$app->get('/stats', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Stats");
    return $response;
});

?>
