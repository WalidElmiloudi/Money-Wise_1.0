<?php

namespace Controllers;

require_once '../vendor/autoload.php';

use Controllers\Database;

class User{
  private $id;
  private $name;
  private $email;
  private $password;
  private $pdo;

  
  function __construct($email,$password){
      $this->email = $email;
      $this->password = $password;
      $this->pdo = Database::getInstance();
  }
  
  public function register($name){
      $this->name = $name;
      $hashed_password = password_hash($this->password,PASSWORD_DEFAULT);
      $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->execute([':email' => $this->email]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if(empty($user)){
        $stmt = $this->pdo->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
        $stmt->execute([
        ':name'=>$this->name,
        ':email' => $this->email,
        ':password' =>$hashed_password
        ]);
        return true;
      } else{
        return false;
      }
  }

  public function login(){
      $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->execute([':email' => $this->email]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if(!empty($user)){
        if(password_verify($this->password,$user['password'])){
          $this->name = $user['name'];
          $this->id = $user['id'];
          return true;
        } else{
          return false;
        }
      } else{
        return false;
      }
  }

  public function getName(){
    return $this->name;
  }

  public function getId(){
    return $this->id;
  }

}

?>