<?php

require 'Income.php';
require 'Expence.php';

$id = $_GET['id'];
$target = $_GET['target'];
$userID = $_SESSION['userId'];

switch($target){
  case 'incomes' : $object = new Income($userID);
                  break;
  case 'expences' : $object = new Expence($userID);
                  break;
}

$object->delete($id);

header("Location: ../views/$target.php");
exit;
?>