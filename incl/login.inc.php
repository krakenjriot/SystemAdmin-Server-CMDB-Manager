<?php

if (isset($_POST["login"])){

    include_once '../libs/dbh.inc.php';
	include_once '../func/func.php';

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $email = strtolower($email);

    if(empty($email) || empty($password)){//1
      header("location: ../login.php?header=error&msg=\"you need fillup all form fields\"");
      exit();
    }
    else
    {//2

    $sql = "SELECT * FROM t_users WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1) {//3
      header("location: ../login.php?header=error&msg=\"account is not existing, Please Try Again!\"");
      exit();
    }//3
      else {//4
      if($row = mysqli_fetch_assoc($result)){//5
      $hashedpwd = password_verify($password, $row['user_pwd']);
        if($hashedpwd == false){//6
        header("location: ../login.php?header=error&msg=\"password mismatched!\"");
        exit();
      }//6
        elseif($hashedpwd == true){//7
        session_start();
        $_SESSION['u_id'] = $row['user_id'];
        $_SESSION['u_email'] = $row['user_email'];
        $_SESSION['u_first'] = $row['user_first'];
        $_SESSION['u_last'] = $row['user_last'];
		$_SESSION['ipaddress'] = get_client_ip_server();
		$_SESSION['pingresult'] = 0;
        $_SESSION['u_hostname'] = "noMachineSelected";		
		
		
		//logs all transactions	
		###############################################################################
		$ipaddress = $_SESSION['ipaddress'];
		
		$datetimestamp = date("Y.m.d.s");
		$u_email = 	$_SESSION['u_email'];
		$logonstamp = "User: $u_email,DateTimeStamp:$datetimestamp,IP Address:$ipaddress";
		
		file_put_contents("../logonstamp/$u_email.$ipaddress.$datetimestamp.log"," DateTimeStamp: ".$datetimestamp."\n\r Email/ID: ".$u_email."\n\r RemoteIPAdr: ".$ipaddress);	
		###############################################################################
		
		//redirect to main page
		###############################################################################	
		header("location: ../index1.php?hostname=tmp&header=Login&msg=\"Loggin Success!\"");
        exit();
      }//7
    }//5
    }//4
  }//2
}//isset register
else {//1
  header("location: ../login.php?header=Login&msg=\"Failed!\"");
  exit();
}//1
