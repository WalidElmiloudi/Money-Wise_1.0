<?php

session_start();
require 'Expence.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$userID = $_SESSION['userId'];

$conn = new Database('localhost','money_wallet','root','');
$pdo = $conn->connect();

$expence = new Expence($userID,$amount,$type,$description);

$expence->add($pdo);

header("Location: ../views/expences.php");
exit;
?>