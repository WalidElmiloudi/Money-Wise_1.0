<?php

session_start();
require 'Income.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$userID = $_SESSION['userId'];

$conn = new Database('localhost','money_wallet','root','');
$pdo = $conn->connect();

$income = new Income($userID,$amount,$type,$description);

$income->add($pdo);

header("Location: ../views/incomes.php");
exit;
?>