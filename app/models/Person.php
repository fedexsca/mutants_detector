<?php
class Person
{

  function setDna($dna){
    $this->dna = $dna;
  }

  function setIsMutant($mutant){
    if (is_null($mutant)) {
      $this->isMutant = 'false';
    } else {
      $this->isMutant = $mutant;
    }
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

  function save(){

    $dnaSecuence = "";

    foreach ($this->dna as $key => $value) {
      $dnaSecuence .= $value;
    }

    $sql = "INSERT INTO people VALUES (null, '$dnaSecuence', $this->isMutant,1);";

    try {
      // Get DB Object
      $db = new db();

      // connect to DB
      $db = $db->connect();

      // query
      $stmt = $db->query( $sql );
      $db = null; // clear db object


    } catch( PDOException $e ) {

      // show error message as Json format
      echo '{"error": {"msg": ' . $e->getMessage() . '}';
    }
  }

  // function getTotalAnalized(){
  //
  //
  // }

  function all(){
     $sql = "SELECT count(dna) AS total FROM people;";
     return Person::query($sql);
  }

  function positive(){
     $sql = "SELECT count(dna) AS total FROM people;";
     return Person::query($sql);
  }

  function query($sql){
    try {
      // Get DB Object
      $db = new db();

      // connect to DB
      $db = $db->connect();

      // query
      $stmt = $db->query( $sql );
      $resultset = $stmt->fetchAll( PDO::FETCH_OBJ );
      $db = null; // clear db object

      // print out the result as json format
      return $resultset;


    } catch( PDOException $e ) {

      // show error message as Json format
      echo '{"error": {"msg": ' . $e->getMessage() . '}';
    }
  }

}

?>
