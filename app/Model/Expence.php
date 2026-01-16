<?php

namespace App\Model;

require_once '../vendor/autoload.php';

use App\Core\Database;
use PDO;
use App\Model\Income;

class Expence extends Income{

  public function add()
  {
    $stmt = $this->pdo->prepare("INSERT INTO expences (montant,description,category,userID) VALUES (:montant,:description,:category,:userID)");
    $stmt->execute([
      ':montant'=>$this->amount,
      ':description'=>$this->description,
      ':category'=>$this->category,
      ':userID'=>$this->user_id
    ]);
  }

  public function update($expence_id){
    $stmt = $this->pdo->prepare("UPDATE expences SET montant = :montant,description = :description,category = :category WHERE id = :id");
    $stmt->execute([
      ':montant'=>$this->amount,
      ':description'=>$this->description,
      ':category'=>$this->category,
      ':id'=>$expence_id
    ]);
  }

  public function delete($expence_id){
    $stmt = $this->pdo->prepare("DELETE FROM expences WHERE id = :id");
    $stmt->execute([
      ':id'=>$expence_id
    ]);
    }

  public function getAll(){
    $stmt = $this->pdo->prepare("SELECT * FROM expences WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  }
}

?>