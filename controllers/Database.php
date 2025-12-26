<?php


class Database{
  private $host;
  private $db_name;
  private $user;
  private $pass;

  function __construct($host,$db_name,$user,$pass){
    $this->host = $host;
    $this->db_name = $db_name;
    $this->user = $user;
    $this->pass = $pass;
  }
  
  public function connect(){
    try {
        return new PDO(
            "mysql:host={$this->host};dbname={$this->db_name}",
            "{$this->user}",
            "{$this->pass}",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        error_log($e->getMessage());
        die("Connection to database failed !");
    }
  }
}

// $conn = new Database("localhost","money_wallet","root","");
// $pdo = $conn->connect();


?>