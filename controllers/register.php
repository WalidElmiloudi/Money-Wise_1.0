<?php
require '../configs/config.php';

$name = $_POST['firstname']." ".$_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = password_hash($password,PASSWORD_DEFAULT);

$conn->query("INSERT INTO users (name,email,password) VALUES ('$name','$email','$hashedPassword')");

header("Location: index.php");
exit;

?>