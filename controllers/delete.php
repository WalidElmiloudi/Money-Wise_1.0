<?php

require 'Income.php';
require 'Expence.php';

$id = $_GET['id'];
$target = $_GET['target'];
$userID = $_SESSION['userId'];

$conn = new Database('localhost','money_wallet','root','');
$pdo = $conn->connect();

switch($target){
  case 'incomes' : $object = new Income($userID,"","","");
                  break;
  case 'expences' : $object = new Expence($userID,"","","");
                  break;
}

$object->delete($pdo,$id);

header("Location: ../views/$target.php");
exit;
?>