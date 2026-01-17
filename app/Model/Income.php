<?php

namespace App\Model;

class Income{
  private int $user_id;
  private float $amount;
  private string $category;
  private string $description;

  public function __construct(int $user_id,float $amount,string $category,string $description){
    $this->user_id = $user_id;
    $this->amount = $amount;
    $this->category = $category;
    $this->description = $description;
  }

  public function getUserId(): int
  {
    return $this->user_id;
  }

  public function getAmount(): float
  {
    return $this->amount;
  }

  public function getCategory(): string
  {
    return $this->category;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  // public function add(){
  //   $stmt = $this->pdo->prepare("INSERT INTO incomes (montant,description,category,userID) VALUES (:montant,:description,:category,:userID)");
  //   $stmt->execute([
  //     ':montant'=>$this->amount,
  //     ':description'=>$this->description,
  //     ':category'=>$this->category,
  //     ':userID'=>$this->user_id
  //   ]);
  // }

  // public function update($income_id){
  //   $stmt = $this->pdo->prepare("UPDATE incomes SET montant = :montant,description = :description,category = :category WHERE id = :id");
  //   $stmt->execute([
  //     ':montant'=>$this->amount,
  //     ':description'=>$this->description,
  //     ':category'=>$this->category,
  //     ':id'=>$income_id
  //   ]);
  // }

  // public function delete($income_id){
  //   $stmt = $this->pdo->prepare("DELETE FROM incomes WHERE id = :id");
  //   $stmt->execute([
  //     ':id'=>$income_id
  //   ]);
  //   }
  // public function getAll(){
  //   $stmt = $this->pdo->prepare("SELECT * FROM incomes WHERE userID = :user_id");
  //   $stmt->execute([
  //     ':user_id'=>$this->user_id
  //   ]);
  //   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //   return $results;
  // }
}
?>