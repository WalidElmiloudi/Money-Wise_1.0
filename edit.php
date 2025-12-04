<?php

$host     = "localhost";
$user     = "root";
$password = "";
$db       = "smart_wallet";

$conn = new mysqli($host, $user, $password, $db);

$amount = $_POST['amount'];
$type = $_POST['category'];
$description = $_POST['description'];

$id = $_GET['id'];
$target = $_GET['target'];

$conn->query("UPDATE $target SET montant=$amount, category='$type', description='$description' WHERE id = '$id' ");

header("Location: $target.php");
exit;
?>