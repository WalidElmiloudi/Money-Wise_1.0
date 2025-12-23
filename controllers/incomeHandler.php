<?php

session_start();
require '../configs/config.php';

$amount = $_POST['amount'];
$type = $_POST['category'];
$description = $_POST['description'];
$userID = $_SESSION['userId'];

$conn->query("INSERT INTO incomes (montant,description,category,userID) VALUES ('$amount','$description','$type','$userID')");

header("Location: ../views/incomes.php");
exit;
?>