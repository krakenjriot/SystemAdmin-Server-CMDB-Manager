<?php

/*
if (isset($_POST["login"])){
        header("location: ../login1.php?header=error&msg=\"Invalid Characters Detected, Please Try Again!\"");
        exit();	
}
*/

if (isset($_POST["register"])){

    include_once '../libs/dbh.inc.php';
	include_once '../func/func.php';

    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $secretword = mysqli_real_escape_string($conn, $_POST["secretword"]);
	$password1 = mysqli_real_escape_string($conn, $_POST["password1"]);
	$password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

    $email = strtolower($email);

    if(empty($firstname) || empty($lastname) || empty($email) || empty($password1)){
      header("location: ../register2.php?header=error&msg=\"you need fillup all form fields\"");
      exit();
    } else {
    //check if input char is valid
      #if(false){
      if(!preg_match('/^[a-zA-Z]*$/', $firstname) || !preg_match('/^[a-zA-Z]*$/', $lastname)){
        header("location: ../register2.php?header=error&msg=\"Invalid Characters Detected, Please Try Again!\"");
        exit();
      }
      else {
        //check email is valid
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          header("location: ../register2.php?header=error&msg=\"Invalid email, Please Try Again!\"");
          exit();
        } else {
          $sql = "SELECT * FROM t_users WHERE user_email='$email'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0) {
            header("location: ../register2.php?header=Account Creation&msg=\"Sorry Email has already been taken, Please Try Again!\"");
            exit();
          } else {
            //hashing the password
            $hashedpwd = password_hash($password1, PASSWORD_DEFAULT);
			$registration_hash = GenRandomString_50();
			
			
            //insert the user into the db.
            //user_id	user_first	user_last	user_email	user_uid	user_pwd
            $sql = "INSERT INTO t_users (user_first, user_last, user_email, user_pwd, registration_hash) VALUE ('$firstname','$lastname','$email','$hashedpwd','$registration_hash'); ";
            $result = mysqli_query($conn, $sql);
			
			
					
					/*
					//echo $hash;

					//update reset_pass_hash

					$sql = "UPDATE t_users
							SET registration_hash='$hash'
							WHERE user_email='$email';";

					$result = mysqli_query($conn, $sql);
					//header("location:msg.php?val1=$email&val2=reset link has been sent to email, please check now!");


					//send link
					$link = "http://verify_reset_link.php?x=".$hash;
					*/
					
				
					
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\sendreglink.bat '.$email.' '.$registration_hash.' ');
					//$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\sendResetLink.bat '.$email.' '.$registration_hash.' ');
					
					echo "success!</br>";
					echo "registration_hash=$registration_hash </br>";
					echo "Output: $output </br>";
					
					
					header("location: ../msg.php?val1=Registration Verification&val2=Success!");
					exit();	
					
					//header("location: ../registration.success.php?header=Account Creation&msg=\"Success!\"");
					//exit();
          }
        }
      }
    }
}//isset register
elseif (isset($_POST["cancel"])){
  header("location: ../login1.php?header=Cancelled?&msg=\"What is your problem?\"");
  exit();
}//isset cancel
else {
  header("location: ../register2.php?header=registration&msg=\"Failed!\"");
  exit();
}
