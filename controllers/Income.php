<?php

require_once 'Database.php';

class Income{
  private $user_id;
  private $amount;
  private $category;
  private $description;

  function __construct($user_id,$amount,$category,$description){
    $this->user_id = $user_id;
    $this->amount = $amount;
    $this->category = $category;
    $this->description = $description;
  }

  public function add($pdo){
    $stmt = $pdo->prepare("INSERT INTO incomes (montant,description,category,userID) VALUES (:montant,:description,:category,:userID)");
    $stmt->execute([
      ':montant'=>$this->amount,
      ':description'=>$this->description,
      ':category'=>$this->category,
      ':userID'=>$this->user_id
    ]);
  }

  public function update($pdo,$income_id){
    $stmt = $pdo->prepare("UPDATE incomes SET montant = :montant,description = :description,category = :category WHERE id = :id");
    $stmt->execute([
      ':montant'=>$this->amount,
      ':description'=>$this->description,
      ':category'=>$this->category,
      ':id'=>$income_id
    ]);
  }

  public function delete($pdo,$income_id){
    $stmt = $pdo->prepare("DELETE FROM incomes WHERE id = :id");
    $stmt->execute([
      ':id'=>$income_id
    ]);
    }
  public function getAll($pdo){
    $stmt = $pdo->prepare("SELECT * FROM incomes WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  }
}
?>