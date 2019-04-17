<?php
/*******************************************/
//initialize session

set_time_limit (600);
session_start();

if(!isset($_SESSION['u_email'])) {
  header("location: login1.php?header=Session&msg=\"Please Login\"");
  exit();
}
$hostname = $_SESSION['u_hostname'];
$u_id  = $_SESSION['u_id'];
$u_email  = $_SESSION['u_email'];

/*******************************************/

?>


<?php 
			
			if(isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['pass3'])) {				
					//##############################################################################################//
					//##############################################################################################//
					//check if email is existing
					
					
					include_once 'libs/dbh.inc.php';
					include_once 'func/func.php';
					
					//$email = $u_email;	
					$email = mysqli_real_escape_string($conn, $_GET['email']);	
					$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);	
					$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);	
					$pass3 = mysqli_real_escape_string($conn, $_POST['pass3']);	
					//$email = strtolower($hash);
					



					
			
					//verify email existing
					$sql = "SELECT * FROM t_users WHERE user_email = '$email'; ";			
					$result = mysqli_query($conn, $sql);			
					$resultCheck = mysqli_num_rows($result);
						if($resultCheck == 0 ) {//3
							header("location: msg.php?val1=Email Verification&val2=Failed! please try again!");
							exit();	
							//$verified = 0;	
						}//
						else if($resultCheck == 1) {//3
							//header("location: msg.php?val1=Hash Code Verification&val2=Verified matched!");
							//exit();					
							$verified1 = 1;
						}//			
					
					
					//verify old password correct
					$sql = "SELECT * FROM t_users WHERE user_email='$email'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);


					if($row = mysqli_fetch_assoc($result)){//5
						$hashedpwd = password_verify($pass1, $row['user_pwd']);
						if($hashedpwd == false){//6
							header("location: msg.php?val1=Old Pass Verification&val2=Failed! please try again!");
							exit();	
						}//6
						else {
							$verified2 = 1;
						}
					}	
					  
					  
		
					
					//verify two new password matched
					if($pass2 != $pass3){
						header("location: msg.php?val1=Two New Pass Verification&val2=Failed! please try again!");
						exit();	
							//$verified = 0;	
					}
					else if($pass2 == $pass3){
						$verified3 = 1;						
					}
					
					
					
					
					//update password
					if(($verified1==1) && ($verified2==1)  && ($verified3==1)){
						
						$hashedpwd = password_hash($pass3, PASSWORD_DEFAULT);
						
						$sql = "UPDATE t_users 
								SET user_pwd = '$hashedpwd' 
								WHERE user_email='$email'; ";
								$result = mysqli_query($conn, $sql);	
						
						//logout 
						session_start();
						setcookie(session_name(), '', 100);
						setcookie();
						session_unset();
						session_destroy();
						$_SESSION = array();
						
						
						header("location: msg.php?val1=Reset Password&val2=Congratulations!, you have successfully resetted your password!");
						exit();									
					}
			
					
		
					
			
			
			
		
			
		
			
			}//isset
			//##############################################################################################//
			//##############################################################################################//
			
					echo "email ".$email."</br>";
					echo "pass1 ".$pass1."</br>";
					echo "pass2 ".$pass2."</br>";
					echo "pass3 ".$pass3."</br>";
					
					echo "verified 1 ".$verified1."</br>";
					echo "verified 2 ".$verified2."</br>";
					echo "verified 3 ".$verified3."</br>";		
?>		







	