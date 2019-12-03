<?php
class Person
{

  function setDna($dna){
    $this->dna = $dna;
  }


  function setDnaSecuence(){
    $dnaSecuence = "";

    foreach ($this->dna as $key => $value) {
      $dnaSecuence .= $value;
    }

    $this->dnaSecuence = $dnaSecuence;
  }

  function setIsMutant($mutant){
    if (is_null($mutant)) {
      $this->isMutant = 'false';
    } else {
      $this->isMutant = $mutant;
    }
  }

  function getIsMutant(){
    $sql = "SELECT is_mutant FROM people WHERE dna = '$this->dnaSecuence';";
    $status = db::query($sql);
    return $status[0]->is_mutant;
  }

  // Verificación que el DNA posee al menos 4 caracteres, que
  // todas las cadenas tienen el mismo largo y que la matriz es cuadrada
  // y que se permiten solo caracteres específicos
  function checkDna(){
    $chars = strlen($this->dna[0]);
    $secuences = sizeof($this->dna);

    if ($chars < 4 || $secuences != $chars) {
      return false;
    }

    for ($i=0; $i < $secuences; $i++) {
      if (strlen($this->dna[$i]) != $chars || $this->not_clean($this->dna[$i])) {
        return false;
      }
    }

    // Si cumple con la validacion es analizable
    return true;
  }

  // Verifica que solo contenga caracteres permitidos
  function not_clean ($string) {
    return preg_match("/[^ATCG]/u", $string);
  }

  // Guardar consulta en DB
  function save(){

    // Si ya existe registro en DB de la secuencia se aumenta el contador
    if (db::exist($this->dnaSecuence)) {
      $sql = "UPDATE people SET count = count+1 WHERE dna = '$this->dnaSecuence';";
      // Caso contrario se guarda un nuevo registro en DB
    } else {
      $sql = "INSERT INTO people VALUES (null, '$this->dnaSecuence', $this->isMutant,1);";
    }

    db::store($sql);
  }

  // Incrementar DNA ya existente
  function incrementCount(){
    $sql = "UPDATE people SET count = count+1 WHERE dna = '$this->dnaSecuence';";
    db::store($sql);
  }

}
