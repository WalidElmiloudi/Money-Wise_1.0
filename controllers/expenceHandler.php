<?php

require '../configs/config.php';
session_start();

$amount = $_POST['amount'];
$type = $_POST['category'];
$description = $_POST['description'];
$userID = $_SESSION['userId'];

$conn->query("INSERT INTO expences (montant,description,category,userID) VALUES ('$amount','$description','$type','$userID')");

header("Location: ../views/expences.php");
exit;
?>