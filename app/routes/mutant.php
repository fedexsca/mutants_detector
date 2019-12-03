<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once __DIR__ . '/../models/Person.php';
include __DIR__ . '/../detector/mutant.php';

// Ruta de servicio mutant
$app->post('/mutant', function (Request $request, Response $response, $args) {
  // Obtención del JSON en el body del request
  $data = json_decode(file_get_contents('php://input'), true);

  // Creación del objeto
  $person = new Person();
  $person->setDna($data['dna']);
  $person->setDnaSecuence();

  if (db::exist($person->dnaSecuence)) {          // Si ya existe la secuencia en DB
    $person->incrementCount();                       // Se guarda la consulta
    if ($person->getIsMutant()) {                     //Si es mutante
      $status = 200;                                    // Respuesta 200 OK
    } else {                                          // Si no es mutante
      $status = 403;                                    // Respuesta 403 Forbidden
    }

  } else {                                        // Si no se ha analizado previamente
    if ($person->checkDna()) {                      // Si valida condiciones DNA
      $mutant = isMutant($person->dna);               // Se evalúa si es mutante
      $person->setIsMutant($mutant);                  // Se setea estado de analisis
      $person->save();                                // Se almacena en DB

      if ($mutant) {                                  // Si el analisis es positivo
        $status = 200;                                // Respuesta 200 OK
      } else {                                        // Si el analisis es negativo
        $status = 403;                                // Respuesta 403 Forbidden
      }

    } else {                                        // Si no valida condiciones para análisis
      $status = 422;                                  // Respuesta 422 Unprocessable Entity
    }

  }

  $response = $response->withStatus($status);     // Se establece el estado de la respuesta
  return $response;                               // Devolución de Respuesta a cliente
});
?>
