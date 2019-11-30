<?php
class Person
{

  function setDna($dna){
    $this->dna = $dna;
  }

  function checkDna(){

    // Verificación que el DNA posee al menos 4 caracteres o 4 secuencias y que
    // todas las cadenas tienen el mismo largo
    $chars = strlen($this->dna[0]);
    $secuences = sizeof($this->dna);

    if ($chars < 4 && $secuences < 4) {
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

  function isMutant(){
    foreach ($this->dna as $key => $value) {
      return true;
    }
  }


}

?>
