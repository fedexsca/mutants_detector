<?php
class db {

  private $dbhost = '127.0.0.1';
  private $dbuser = 'root';
  private $dbpass = '';
  private $dbname = 'mutant_detector';

  public function connect() {

    // https://www.php.net/manual/en/pdo.connections.php
    $prepare_conn_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
    $dbConn = new PDO( $prepare_conn_str, $this->dbuser, $this->dbpass );

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
