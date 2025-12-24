<?php
require_once 'Database.php';

class Auth{

    private $name;
    private $email;
    private $password;

    function __construct($email,$password){
      $this->email = $email;
      $this->password = $password; 
    }

    public function login(){

      $conn = new Database('localhost','money_wallet','root','');
      $pdo = $conn->connect();
      $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->execute([':email' => $this->email]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if(!empty($user)){
        if(password_verify($this->password,$user['password'])){
          return true;
        } else{
          return false;
        }
      } else{
        return false;
      }
    }

    public function register($name){
      $this->name = $name;
      $hashed_password = password_hash($this->password,PASSWORD_DEFAULT);
      $conn = new Database('localhost','money_wallet','root','');
      $pdo = $conn->connect();
      $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->execute([':email' => $this->email]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if(empty($user)){
        $stmt = $pdo->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
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

}
?>