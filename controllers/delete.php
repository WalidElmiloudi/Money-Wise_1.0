<?php

require_once '../vendor/autoload.php';

use Controllers\Income;
use Controllers\Expence;

$id = $_GET['id'];
$target = $_GET['target'];
$userID = $_SESSION['userId'];


switch($target){
  case 'incomes' : $object = new Income($userID,"","","");
                  break;
  case 'expences' : $object = new Expence($userID,"","","");
                  break;
}

$object->delete($id);

header("Location: ../views/$target.php");
exit;
?>