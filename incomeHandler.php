<?php

$host     = "localhost";
$user     = "root";
$password = "";
$db       = "smart_wallet";

$conn = new mysqli($host, $user, $password, $db);

$amount = $_POST['amount'];
$type = $_POST['category'];
$description = $_POST['description'];

$conn->query("INSERT INTO incomes (montant,description,category) VALUES ('$amount','$description','$type')");

header("Location: incomes.php");
exit;
