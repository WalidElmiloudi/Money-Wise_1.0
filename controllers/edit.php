<?php

require 'Income.php';
require 'Expence.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$userID = $_SESSION['userId'];

$conn = new Database('localhost','money_wallet','root','');
$pdo = $conn->connect();

$id = $_GET['id'];
$target = $_GET['target'];

switch($target){
  case 'incomes' : $object = new Income($userID,$amount,$type,$description);
                   break;
  case 'expences' : $object = new Expence($userID,$amount,$type,$description);
                   break;
}

$object->update($pdo,$id);

header("Location: ../views/$target.php");
exit;
?>