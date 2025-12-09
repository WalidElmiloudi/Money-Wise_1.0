<?php

session_start();

$sortBy = $_POST['sort'];
$table = $_GET['target'];

switch($sortBy){
  case 'Amount' :usort($_SESSION['backup'],function($a,$b){
    return $a['montant'] <=> $b['montant'];
  });
  $_SESSION['filteredArray'] = $_SESSION['backup'];
  break;
  case 'Date' :usort($_SESSION['backup'],function($a,$b){
    return $a['date'] <=> $b['date'];
  });
  $_SESSION['filteredArray'] = $_SESSION['backup'];
  break;
}

header("Location: $table.php");
exit;

?>