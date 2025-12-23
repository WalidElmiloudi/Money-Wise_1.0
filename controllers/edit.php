<?php

require '../configs/config.php';

$amount = $_POST['amount'];
$type = $_POST['category'];
$description = $_POST['description'];

$id = $_GET['id'];
$target = $_GET['target'];

$conn->query("UPDATE $target SET montant=$amount, category='$type', description='$description' WHERE id = '$id' ");

header("Location: ../views/$target.php");
exit;
?>