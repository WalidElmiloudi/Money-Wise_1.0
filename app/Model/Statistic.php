<?php

namespace App\Model;

require_once '../vendor/autoload.php';

use App\Core\Database;

use PDO;

class Statistic{
  private $user_id;
  private $pdo;

  function __construct($user_id){
    $this->user_id = $user_id;
    $this->pdo = Database::getInstance();
  }

  public function getTotal($table_name){
    $stmt = $this->pdo->prepare("SELECT SUM(montant) as total FROM $table_name WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }

  public function getBalance(){
    $stmt = $this->pdo->prepare("SELECT SUM(montant) as total FROM incomes WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $income = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $this->pdo->prepare("SELECT SUM(montant) as total FROM expences WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $expence = $stmt->fetch(PDO::FETCH_ASSOC);

    $balance = $income['total'] - $expence['total'];
    return $balance;
  }

  public function getMonthlyTotal($table_name,$month){
    $stmt = $this->pdo->prepare("SELECT SUM(montant) as total FROM $table_name WHERE userID = :user_id AND MONTH(date) = {$month} AND YEAR(date) = YEAR(CURDATE())");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }

  public function getTotalByCategory($table_name,$category){
    $stmt = $this->pdo->prepare("SELECT SUM(montant) as total FROM $table_name WHERE userID = :user_id AND category = :category");
    $stmt->execute([
      ':user_id'=>$this->user_id,
      ':category'=>$category
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }
}
?>