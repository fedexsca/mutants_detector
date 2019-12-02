<?php
/**
 * Connect MySQL with PDO class
 */
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

    // return the database connection back
    return $dbConn;
  }
}
