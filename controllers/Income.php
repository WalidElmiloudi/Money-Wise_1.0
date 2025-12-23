<?php

require 'Database.php';

class Income{
  private $user_id;

  function __construct($user_id){
    $this->user_id = $user_id;
  }

  public function add($amount,$category,$description){
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("INSERT INTO incomes (montant,description,category,userID) VALUES (:montant,:description,:category,:userID)");
    $stmt->execute([
      ':montant'=>$amount,
      ':description'=>$description,
      ':category'=>$category,
      ':userID'=>$this->user_id
    ]);
  }

  public function update($amount,$category,$description,$income_id){
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("UPDATE incomes SET montant = :montant,description = :description,category = :category WHERE id = :id");
    $stmt->execute([
      ':montant'=>$amount,
      ':description'=>$description,
      ':category'=>$category,
      ':id'=>$income_id
    ]);
  }

  public function delete($income_id){
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("DELETE FROM incomes WHERE id = :id");
    $stmt->execute([
      ':id'=>$income_id
    ]);
    }

  public function getAll(){
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("SELECT * FROM incomes WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  }
}
?>
