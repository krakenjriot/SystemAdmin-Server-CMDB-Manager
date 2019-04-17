<?php
/*
/*******************************************/
//initialize session
/*
set_time_limit (600);
session_start();

if(!isset($_SESSION['u_email'])) {
  header("location: login1.php?header=Session&msg=\"Please Login\"");
  exit();
}
$hostname = $_SESSION['u_hostname'];
$u_id  = $_SESSION['u_id'];
$u_email  = $_SESSION['u_email'];
*/
/*******************************************/

?>


<?php 
			if(isset($_GET['x'])) {
			//##############################################################################################//
			//##############################################################################################//
			//check if email is existing
			include_once 'libs/dbh.inc.php';
			include_once 'func/func.php';
			$registration_hash = mysqli_real_escape_string($conn, $_GET['x']);	
			$email = mysqli_real_escape_string($conn, $_GET['email']);	
			//$email = strtolower($hash);
			
			//echo $reset_pass_hash;
			
			
		    $sql = "SELECT * FROM t_users WHERE registration_hash = '$registration_hash' AND user_email = '$email'; ";
			
			$result = mysqli_query($conn, $sql);
			
			$resultCheck = mysqli_num_rows($result);
			
			
			
				if($resultCheck < 1) {//3
					header("location: msg.php?val1=Registration Verification&val2=Failed!");
					exit();	
					//$verified = 0;	
					
					
				}//
				else if($resultCheck = 1) {//3

					//$verified = 1;
					$sql = "UPDATE t_users 
					SET user_stat = 1
					WHERE registration_hash = '$registration_hash' AND user_email = '$email'; ";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck = 1){
						header("location: msg.php?val1=Registration Verification&val2=Success!");
						exit();	
					}		
					
				}//
			
			}//isset
			//##############################################################################################//
			//##############################################################################################//
			
			
?>		




	