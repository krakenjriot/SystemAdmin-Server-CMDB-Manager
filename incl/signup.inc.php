<?php
if (isset($_POST["register"])){

  include_once '../libs/dbh.inc.php';
  $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
  $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) ||  ){
    header('location: register.php?registration=empty')
    exit();
  }

} else {
  header("location: ../signup.php");
  exit();
}
