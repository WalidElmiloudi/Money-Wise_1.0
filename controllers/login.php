<?php
require '../configs/config.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email = '$email'");
if($result->num_rows>0){
  $user = $result->fetch_assoc();
  if(password_verify($password,$user['password'])){
    $_SESSION['userId'] = $user['id'];
    $_SESSION['username'] =$user['name'];
    header("Location: ../views/home.php");
    exit;
  }
}

header("Location: ../views/index.php");
exit;
?>