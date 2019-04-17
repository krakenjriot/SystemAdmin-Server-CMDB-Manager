<?php

if (isset($_POST["register"])){

    include_once '../libs/dbh.inc.php';

    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $email = strtolower($email);

    if(empty($firstname) || empty($lastname) || empty($email) || empty($password)){
      header("location: ../register.php?header=error&msg=\"you need fillup all form fields\"");
      exit();
    } else {
    //check if input char is valid
      #if(false){
      if(!preg_match('/^[a-zA-Z]*$/', $firstname) || !preg_match('/^[a-zA-Z]*$/', $lastname)){
        header("location: ../register.php?header=error&msg=\"Invalid Characters Detected, Please Try Again!\"");
        exit();
      }
      else {
        //check email is valid
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          header("location: ../register.php?header=error&msg=\"Invalid email, Please Try Again!\"");
          exit();
        } else {
          $sql = "SELECT * FROM t_users WHERE user_email='$email'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0) {
            header("location: ../register.php?header=Account Creation&msg=\"Sorry Email has already been taken, Please Try Again!\"");
            exit();
          } else {
            //hashing the password
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
            //insert the user into the db.
            //user_id	user_first	user_last	user_email	user_uid	user_pwd
            $sql = "INSERT INTO t_users (user_first, user_last, user_email, user_pwd) VALUE ('$firstname','$lastname','$email','$hashedpwd'); ";
            $result = mysqli_query($conn, $sql);
            header("location: ../register.php?header=Account Creation&msg=\"Success!\"");
            exit();
          }
        }
      }
    }
}//isset register
elseif (isset($_POST["cancel"])){
  header("location: ../login.php?header=Cancelled?&msg=\"What is your problem?\"");
  exit();
}//isset cancel
else {
  header("location: ../register.php?header=registration&msg=\"Failed!\"");
  exit();
}
