<?php

session_start();
require 'Income.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$userID = $_SESSION['userId'];

$income = new Income($userID);

$income->add($amount,$type,$description);

header("Location: ../views/incomes.php");
exit;
?>