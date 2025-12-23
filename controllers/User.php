<?php

require 'Database.php';

class User{
  private $id;
  private $name;
  private $email;

  function __construct($email){
    $this->email = $email;
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email'=>$this->email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->id = $result['id'];
    $this->name = $result['name'];
  }

  public function getName(){
    return $this->name;
  }

  public function getId(){
    return $this->id;
  }

}

?>