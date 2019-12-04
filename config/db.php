<?php
class db {

  private $dsn = 'mysql:dbname=mutant_detector;unix_socket=/cloudsql/mutantsml:southamerica-east1:mutantssql';
  private $user = 'root';
  private $password = '33233733';

  public function connect() {


    $dbConn = new PDO( $this->dsn, $this->user, $this->password );

    // https://www.php.net/manual/en/pdo.setattribute.php
    $dbConn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // Devolver conexión a DB
    return $dbConn;
  }

  public function exist($dna){
    $sql = "SELECT count(*) as exist  FROM people WHERE dna = '$dna';";
    $exist = db::query($sql);
    return $exist[0]->exist;
  }

  public function store($sql){
    try {
      // obtener objeto DB
      $db = new db();

      // conectar a db
      $db = $db->connect();

      // query
      $stmt = $db->query( $sql );
      $db = null; // limpiar


    } catch( PDOException $e ) {

      // mensaje de error
      echo '{"error": {"msg": ' . $e->getMessage() . '}';
    }
  }

  public function query($sql){
    try {
      // obtener objeto DB
      $db = new db();

      // conectar a db
      $db = $db->connect();

      // query
      $stmt = $db->query( $sql );
      $resultset = $stmt->fetchAll( PDO::FETCH_OBJ );
      $db = null; // limpiar

      // devolver resultado
      return $resultset;


    } catch( PDOException $e ) {

      // mensaje de error
      echo '{"error": {"msg": ' . $e->getMessage() . '}';
    }
  }

}
