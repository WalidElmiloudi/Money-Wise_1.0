<?php

require_once '../vendor/autoload.php';

use Controllers\Income;
use Controllers\Expence;

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$userID = $_SESSION['userId'];

$id = $_GET['id'];
$target = $_GET['target'];

switch($target){
  case 'incomes' : $object = new Income($userID,$amount,$type,$description);
                   break;
  case 'expences' : $object = new Expence($userID,$amount,$type,$description);
                   break;
}

$object->update($id);

header("Location: ../views/$target.php");
exit;
?>