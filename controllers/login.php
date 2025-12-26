<?php
require 'User.php';

session_start();

$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));

$auth_user = new User($email,$password);
$logged_in = $auth_user->login();
  if($logged_in){
    $user_id = $auth_user->getId();
    $user_name = $auth_user->getName();

    $_SESSION['userId'] = $user_id;
    $_SESSION['username'] =$user_name;
    
    header("Location: ../views/home.php");
    exit;
  }

header("Location: ../views/index.php");
exit;
?>