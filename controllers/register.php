<?php

require 'Auth.php';

$name = htmlspecialchars(trim($_POST['firstname']))." ".htmlspecialchars(trim($_POST['lastname']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$hashedPassword = password_hash($password,PASSWORD_DEFAULT);

$auth_user = new Auth($email,$password);
$signed_in = $auth_user->register($name);
if($signed_in){
  header("Location:../views/index.php");
exit;
} else{
  die("Registiration Failed");
}

?>