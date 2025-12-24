<?php

require_once 'Database.php';

class Statistic{
  private $user_id;

  function __construct($user_id){
    $this->user_id = $user_id;
  }

  public function getTotal($table_name){
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("SELECT SUM(montant) as total FROM $table_name WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }

  public function getBalance(){
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("SELECT SUM(montant) as total FROM incomes WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $income = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $pdo->prepare("SELECT SUM(montant) as total FROM expences WHERE userID = :user_id");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $expence = $stmt->fetch(PDO::FETCH_ASSOC);

    $balance = $income['total'] - $expence['total'];
    return $balance;
  }

  public function getMonthlyTotal($table_name){
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("SELECT SUM(montant) as total FROM $table_name WHERE userID = :user_id AND MONTH(date) = MONTH(CURDATE())");
    $stmt->execute([
      ':user_id'=>$this->user_id
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }

  public function getTotalByCategory($table_name,$category){
    $conn = new Database('localhost','money_wallet','root','');
    $pdo = $conn->connect();
    $stmt = $pdo->prepare("SELECT SUM(montant) as total FROM $table_name WHERE userID = :user_id AND category = :category");
    $stmt->execute([
      ':user_id'=>$this->user_id,
      ':category'=>$category
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }
}
?>