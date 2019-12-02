<?php
class Person
{

  function setDna($dna){
    $this->dna = $dna;
  }

  function setIsMutant($mutant){
      $this->isMutant = $mutant;
  }

  function checkDna(){

    // Verificación que el DNA posee al menos 4 caracteres, que
    // todas las cadenas tienen el mismo largo y que la matriz es cuadrada
    $chars = strlen($this->dna[0]);
    $secuences = sizeof($this->dna);

    if ($chars < 4 || $secuences != $chars) {
      return false;
    }

    for ($i=1; $i < $secuences; $i++) {
      if (strlen($this->dna[$i]) != $chars) {
        return false;
      }
    }

    // Si cumple con la validacion es analizable
    return true;

  }

}

?>
