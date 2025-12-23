<?php

require '../configs/config.php';

$id = $_GET['id'];
$target = $_GET['target'];

$conn->query("DELETE FROM $target WHERE id = '$id' ");

header("Location: ../views/$target.php");
exit;
?>