<?php
function isMutant($dna){

  $matrix;
  $size = sizeof($dna);

  //Generación de la matriz
  for ($row=0; $row < $size; $row++) {
    for ($col=0; $col < $size; $col++) {
      $matrix[$row][$col] = $dna[$row][$col];
    }
  }

  // Si la cantidad de filas y columnas en menor o igual a la cantidad de coincidencias
  // a verificar mas 2 ( 4+2=6 ), Es condición necesaria que los elementos centrales coincidan
  // Estos casos cuentan con funciones detectoras especiales
  switch ($size) {
    case 6:
    $result = analizeDnaSize6($size, $matrix);
    break;

    case 5:
    $result = analizeDnaSize5($size, $matrix);
    break;

    default:
    $result = analizeDna($size, $matrix);
    break;
  }

  return $result;

}

/**
 * [analizeDnaSize6 Analiza por ADN Mutante en matriz con tamaño 6]
 * @param  int $size   Tamaño de la matriz
 * @param  array $matrix Matriz con cadena DNA
 * @return boolean Si verifica ADN Mutante
 */
function analizeDnaSize6($size, $matrix){
  // Elemento central
  $mid = intdiv(($size-1), 2);


  for ($position=0; $position < $size; $position++) {

    // Si el par elementos centrales coinciden
    if ($matrix[$position][$mid] == $matrix[$position][$mid+1]) {
      // Y los elementos unicos antes y después del par coinciden o los pares antes y después
      if (
        ($matrix[$position][$mid] == $matrix[$position][$mid-1] && $matrix[$position][$mid] == $matrix[$position][$mid+2])
        ||
        ($matrix[$position][$mid] == $matrix[$position][$mid-1] && $matrix[$position][$mid] == $matrix[$position][$mid-2])
        ||
        ($matrix[$position][$mid] == $matrix[$position][$mid+2] && $matrix[$position][$mid] == $matrix[$position][$mid+3])
      ) {
        return true;
      }
    }

    // Si el par elementos centrales coinciden
    if ($matrix[$mid][$position] == $matrix[$mid+1][$position]) {
      // Y los elementos unicos antes y después del par coinciden o los pares antes y después
      if (
        ($matrix[$mid][$position] == $matrix[$mid-1][$position] && $matrix[$mid][$position] == $matrix[$mid+2][$position])
        ||
        ($matrix[$mid][$position] == $matrix[$mid-1][$position] && $matrix[$mid][$position] == $matrix[$mid-2][$position])
        ||
        ($matrix[$mid][$position] == $matrix[$mid+2][$position] && $matrix[$mid][$position] == $matrix[$mid+3][$position])
      ) {
        return true;
      }
    }

  }

  // Se analiza diagonalmente
  return analizeDiagonal($size, $matrix);

}

/**
 * [analizeDnaSize5 Analiza por ADN Mutante en matriz con tamaño 5]
 * @param  int $size   Tamaño de la matriz
 * @param  array $matrix Matriz con cadena DNA
 * @return boolean Si verifica ADN Mutante
 */
function analizeDnaSize5($size, $matrix){
  // Elemento central
  $mid = intdiv(($size-1), 2);

  for ($position=0; $position < $size; $position++) {

    // Si el par elementos centrales coinciden
    if ($matrix[$position][$mid] == $matrix[$position][$mid+1]) {
      // Y los elementos unicos antes y después del par coinciden o los pares después
      if (
        ($matrix[$position][$mid] == $matrix[$position][$mid-1] && $matrix[$position][$mid] == $matrix[$position][$mid+2])
        ||
        ($matrix[$position][$mid] == $matrix[$position][$mid-1] && $matrix[$position][$mid] == $matrix[$position][$mid-2])
      ) {
        return true;
      }
    }

    // Si el par elementos centrales coinciden
    if ($matrix[$mid][$position] == $matrix[$mid+1][$position]) {
      // Y los elementos unicos antes y después del par coinciden o los pares después
      if (
        ($matrix[$mid][$position] == $matrix[$mid-1][$position] && $matrix[$mid][$position] == $matrix[$mid+2][$position])
        ||
        ($matrix[$mid][$position] == $matrix[$mid-1][$position] && $matrix[$mid][$position] == $matrix[$mid-2][$position])
      ) {
        return true;
      }
    }

  }

  // Se analiza diagonalmente
  return analizeDiagonal($size, $matrix);

}

/**
 * [analizeDna Analiza por ADN Mutante]
 * @param  int $size   Tamaño de la matriz
 * @param  array $matrix Matriz con cadena DNA
 * @return boolean Si verifica ADN Mutante
 */
function analizeDna($size, $matrix){
  // Horizontal
  for ($row=0; $row < $size; $row++) {
    for ($col=0; $col < $size-3; $col++) {
      // Si el elemento en la col siguiente es igual
      if ($matrix[$row][$col] == $matrix[$row][$col+1])
      // Si los elementos en las dos col siguientes son iguales a row-col
      if ($matrix[$row][$col] == $matrix[$row][$col+2] && $matrix[$row][$col] == $matrix[$row][$col+3]) {
        return true;
      }
    }
  }

  // Vertical
  for ($row=0; $row < $size-3; $row++) {
    for ($col=0; $col < $size; $col++) {
      // Si el elemento en la row siguiente es igual
      if ($matrix[$row][$col] == $matrix[$row+1][$col]) {
        // Si los elementos en las dos col siguientes son iguales a row-col
        if ($matrix[$row][$col] == $matrix[$row+2][$col] && $matrix[$row][$col] == $matrix[$row+3][$col]) {
          return true;
        }
      }
    }
  }

  // Se analiza diagonalmente
  return analizeDiagonal($size, $matrix);

}

/**
 * [analizeDiagonal Analiza por ADN Mutante en diagonales de la Matriz]
 * @param  int $size   Tamaño de la matriz
 * @param  array $matrix Matriz con cadena DNA
 * @return boolean Si verifica ADN Mutante
 */
function analizeDiagonal($size, $matrix){
  // Derecha y abajo
  for ($row=0; $row < $size - 3; $row++) {
    for ($col=0; $col < $size - 3; $col++) {
      // Si el elemento en la row-col siguiente es igual
      if ($matrix[$row][$col] == $matrix[$row+1][$col+1]) {
        // Si los elementos en las dos row-col siguientes son iguales a row-col
        if ($matrix[$row][$col] == $matrix[$row+2][$col+2] && $matrix[$row][$col] == $matrix[$row+3][$col+3]) {
          return true;
        }
      }
    }
  }

  // Derecha y arriba
  for ($row=3; $row < $size; $row++) {
    for ($col=0; $col < $size - 3; $col++) {
      // Si el elemento en la row-col siguiente es igual
      if ($matrix[$row][$col] == $matrix[$row-1][$col+1]) {
        // Si los elementos en las dos row-col siguientes son iguales a row-col
        if ($matrix[$row][$col] == $matrix[$row-2][$col+2] && $matrix[$row][$col] == $matrix[$row-3][$col+3]) {
          return true;
        }
      }
    }
  }
}

?>
