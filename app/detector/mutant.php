<?php
function isMutant($dna){

  $matrix;
  $size = sizeof($dna);

  //Generación de la matrix
  for ($row=0; $row < $size; $row++) {
    for ($col=0; $col < $size; $col++) {
      $matrix[$row][$col] = $dna[$row][$col];
    }
  }

  // Si la cantidad de filas y columnas en menor o igual a la cantidad de coincidencias
  // a verificar mas 2 ( 4+2=6 ), Es condición necesaria que los elementos centrales coincidan

  print_r($matrix[4][4]);
  if ($size <= 6) {
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
  } else {
    // echo "es mayor a 6";
  }

  // print_r($matrix);

}

?>
