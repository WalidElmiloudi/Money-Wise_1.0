<?php

require 'Income.php';
require 'Expence.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$userID = $_SESSION['userId'];

$id = $_GET['id'];
$target = $_GET['target'];

switch($target){
  case 'incomes' : $object = new Income($userID);
                   break;
  case 'expences' : $object = new Expence($userID);
                   break;
}

$object->update($amount,$type,$description,$id);

header("Location: ../views/$target.php");
exit;
?>